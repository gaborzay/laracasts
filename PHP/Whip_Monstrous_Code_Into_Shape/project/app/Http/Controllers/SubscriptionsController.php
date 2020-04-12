<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\RegistersLifetimeMember;
use App\RegistersSubscriber;
use App\RegistersTeamMember;
use Illuminate\Http\Request;

/**
 * Class SubscriptionsController
 * @package App\Http\Controllers
 *
 * 1. Identify a point of flexibility.
 *  Sign Up the User. But do they want a ...
 *  1. Forum Account
 *  2. Regular Subscriber
 *  3. Team Member Access
 *  4. Forever Account
 *
 * 2. Extract each strategy into its own class.
 *  1. RegistersForumUser
 *  2. RegistersSubscriber
 *  3. RegistersTeamMember
 *  4. RegistersLifetimeMember
 *
 * 3. Ensure that each of those strategies adheres to a common contract/interface.
 *  ->handle()
 *
 * 4. Determine the proper strategy, and let it handle the task. (Usually factory method)
 * $this->getRegistrationStrategy($request)->handle($request->all());
 */
class SubscriptionsController extends Controller
{
    public function store(Request $request)
    {
        $this->getRegistrationStrategy($request)->handle($request->all());
    }

    protected function getRegistrationStrategy(Request $request)
    {
        if ($request->plan == 'forever') {
            return new RegistersLifetimeMember;
        }

        if ($request->invitation) {
            return new RegistersTeamMember;
        }

        return new RegistersSubscriber;
    }

    public function update(Request $request)
    {
        $plan = $request->plan;
        $code = $request->coupon;

        $this->user
            ->subscription()
//            ->usingCoupon($this->normalizeCoupon($code, $plan))
            ->usingCoupon(Coupon::normalize($code)->against($plan))
            ->swap($plan);
    }

    // NORMALIZE
    protected function normalizeCoupon($code, $plan)
    {
        $coupon = Coupon::havingCode($code);

        if (!$coupon || !$coupon->worksWithPlan($plan)) {
            $code = false;
        }

        return false;
    }
}

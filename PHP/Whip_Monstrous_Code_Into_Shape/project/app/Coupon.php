<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public static function normalize($code)
    {
        $coupon = static::where('code', $code)->first();

        return $coupon ?: new static;
    }

    public function against($plan)
    {
        if (!$this->worksWithPlan($plan)) {
            return false;
        }

        return $this->code;
    }

    public function worksWithPlan($plan)
    {
        // $this->code
    }

    public static function havingCode($code)
    {
        return new static;
    }

    public function scopeHavingCode($query, $code)
    {
        return $query->where('code', $code);
    }

    public static function validateForPlan($code, $plan)
    {
        $coupon = static::havingCode($code)->first();

        if (!$coupon || !$coupon->worksWithPlan($plan)) {
            $code = false;
        }

        return $coupon->code;
    }
}

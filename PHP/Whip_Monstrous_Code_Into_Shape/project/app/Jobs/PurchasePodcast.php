<?php

namespace App\Jobs;

use Illuminate\Foundation\Bus\Dispatchable;

/**
 * Class PurchasePodcast
 * @package App\Jobs
 */
class PurchasePodcast
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle()
    {
        $this->preparePurchase()
            ->sendEmail();
    }

    private function preparePurchase()
    {
        var_dump('preparing the purchase');

        return $this;
    }

    private function sendEmail()
    {
        var_dump('send an email with their invoice');

        return $this;
    }
}

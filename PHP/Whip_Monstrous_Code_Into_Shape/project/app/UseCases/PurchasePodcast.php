<?php


namespace App\UseCases;

/**
 * UseCase, Non-Queued Job, or Self-Handling command
 * are basically the exact same thing.
 */
class PurchasePodcast extends UseCase
{
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

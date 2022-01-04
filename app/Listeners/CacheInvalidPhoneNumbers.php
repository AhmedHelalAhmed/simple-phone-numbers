<?php

namespace App\Listeners;

use App\Events\VisitorHitThePage;
use App\Services\CachingInvalidPhoneNumbersService;

/**
 * Class CacheInvalidPhoneNumbers
 * @package App\Listeners
 * @author Ahmed Helal Ahmed
 */
class CacheInvalidPhoneNumbers
{
    /**
     * Handle the event.
     *
     * @param \App\Events\VisitorHitThePage $event
     * @return void
     */
    public function handle(VisitorHitThePage $event)
    {
        app(CachingInvalidPhoneNumbersService::class)->execute();
    }
}

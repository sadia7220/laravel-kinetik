<?php

namespace App\Listeners;

use App\Events\BillEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class BillGeneratedEmailSendListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\BillEvent  $event
     * @return void
     */
    public function handle(BillEvent $event)
    {
        // Log::info($event->user);

        //$email = $event;
    
        Log::info(5555);
        Log::info($event->customer);

        \Mail::to($event->customer->email)->send(new \App\Mail\BillGeneratedEmail($event->customer, $event->bill));
    }
}

<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class BillEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $customer;
    public $bill;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($customer, $bill)
    {
        Log::info(101);
        Log::info($customer);
        $this->customer = $customer;
        $this->bill = $bill;
        Log::info(10100);
        Log::info($customer);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BillGeneratedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    public $bill;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer, $bill)
    {
        $this->customer = $customer;
        $this->bill = $bill;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@gmail.com')
                    ->subject('Bill Generate Email')
                    ->markdown('emails.generatedBill');
    }
}

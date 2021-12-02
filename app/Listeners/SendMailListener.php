<?php

namespace App\Listeners;

use App\Events\SendMailEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
class SendMailListener
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
     * @param  SendMailEvent  $event
     * @return void
     */
    public function handle(SendMailEvent $event)
    {
        //
        $email=$event->email;
       $data=['email'=>$event->email,
       'name'=>$event->name];
        Mail::send('admin.mailmsg',['data1'=>$data],function($message) use ($email){
            $message->from('yogasrin1812@gmail.com');
            $message->to($email)->subject('Success message');
        });
    }
}

<?php

namespace App\Listeners;

use App\Events\UserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
class UserListener
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
     * @param  UserEvent  $event
     * @return void
     */
    public function handle(UserEvent $event)
    {
        //
        // echo "Name:". $event->name." <br> ";
        // echo "Email:". $event->email." <br> ";
        //  echo "Phone Number:". $event->phone;

      $email= $event->user;
      $msg="Mail from laravel Event Listener";
      // echo $email;
        Mail::raw($msg,function($message) use ($email){
            $message->from('yogasrin1812@gmail.com');
            $message->to($email)->subject('minute update');
        });
    }
}

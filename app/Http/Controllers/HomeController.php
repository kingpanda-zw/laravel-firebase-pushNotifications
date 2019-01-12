<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PushNotification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request){

        /*this is how we get the api-key that we have inserted in the pushnotification config file (config/pushnotification)*/
        $api_key = config('pushnotification.fcm.apiKey');

        $send = PushNotification::setService('fcm')
            ->setMessage([
                'notification' => [
                     'title'=>'Whoooooooooooooo',
                     'body'=>'This is the message',
                     'sound' => 'default'
                     ],
                 "collapse_key" => "type_a",
                 "data" => [
                      "user_id"=>2,
                      "post_id"=> 16,
                       ]
                 ])
           ->setApiKey($api_key)
           /* put your device token in her e.g. e21SVkj0:AIJkjsdkjkasasdio3234jejjnfsdnfdsfmnxnmbxcv
            * and if you have more than one device just just a comma to separate the device tokens e.g. 
            * ->setDevicesToken(['er2387323:8723872378239828332','877283:239823kjlksdkfskdfhkjsdfdf'])
            */ 
            ->setDevicesToken([''])
            ->send()
            ->getFeedback();


        if($send){

            dd("Notification Sent");

        }else{

            dd("Notification not sent");
        }

    }
}


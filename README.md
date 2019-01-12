# laravel-fcm-notifications
An example showing how to send push notifications using firebase

Works with Laravel 5.7*
Firsty install the package required for FCM/GCM/APN

<code>composer require edujugon/push-notification</code>

Add a provider to this package in the config\app.php file

<pre>Edujugon\PushNotification\Providers\PushNotificationServiceProvider::class,</pre>

Add an alias to this package 

<pre>'PushNotification' => Edujugon\PushNotification\Facades\PushNotification::class,</pre>


Set up your database in the .env file for login in to send the notification from inside your app

Get your API key from Google cloud console platform

Insert that API key in your newly created config\pushnotification.php file

Get your device token from the firebase console and manually put it in the App\Http\Controllers\HomeController.php file

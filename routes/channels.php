<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// تسجيل قناة البث الخاصة بالمستخدم
Broadcast::channel('App.User.{id}', function ($user, $id) {
    // تحقق مما إذا كان المستخدم المخول يطابق المعرف
    return (int) $user->id === (int) $id;
});

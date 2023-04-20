<?php

namespace App\Traits;

trait NotificationTrait
{
    protected function handleNotificationView($type, $message, $url)
    {
        return view('components.notification', [
            'type' => $type,
            'message' => $message,
            'url' => $url,
        ]);
    }
}

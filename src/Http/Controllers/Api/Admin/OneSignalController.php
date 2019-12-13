<?php

namespace DesignByCode\Admin\Http\Controllers\Api\Admin;

use Berkayk\OneSignal\OneSignalClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DesignByCode\Admin\Models\Product;

class OneSignalController extends Controller
{
    

    public function send(Product $product) 
    {
            $message = 'hello';

            $one = new OneSignalClient($message, $url = null, $data = null, $buttons = null, $schedule = null, $headings = null, $subtitle = null);
            $one->sendNotificationToAll(
            "Some Message", 
            $url = null, 
            $data = null, 
            $buttons = null, 
            $schedule = null
        );
    }

}

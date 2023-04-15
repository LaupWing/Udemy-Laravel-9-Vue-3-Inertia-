<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Response;

class NotificationController extends Controller
{
   public function index(Request $request): Response {
      return inertia(
         "Notifaction/Index",
         [
            "notifications" => $request->user()->notifications()->paginate(10)
         ]
      );
   }
}

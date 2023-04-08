<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{
   public function index(){
      return inertia(
         "Realtor/index",
         ["listings" => Auth::user()->listings()]
      );
   }
}

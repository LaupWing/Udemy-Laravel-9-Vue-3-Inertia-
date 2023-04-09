<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{
   public function __construct()
   {
      $this->authorizeResource(Listing::class, "listing");
   }

   public function index(){
      return inertia(
         "Realtor/index",
         ["listings" => Auth::user()->listings()]
      );
   }

   public function destroy(Listing $listing)
   {
      $listing->deleteOrFail();

      return redirect()->back()->with("success", "Listing was deleted!");
   }
}
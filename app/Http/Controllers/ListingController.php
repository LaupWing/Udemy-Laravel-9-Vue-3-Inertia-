<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
   public function __construct()
   {
      $this->authorizeResource(Listing::class, "listing");
   }

   // public function __construct(){
   //    $this->middleware("auth")->except(["index", "show"])
   // }
   
   public function index(Request $request)
   {
      $filters = $request->only(["priceFrom", "priceTo", "areaFrom", "areaTo", "beds", "baths"]);
   
      return inertia("Listing/Index", [
         "filters" => $filters,
         "listings" => Listing::mostRecent()
            ->filter($filters)
            ->withoutSold()
            ->paginate(10)
            ->withQueryString()
      ]);
   }

   public function show(Listing $listing)
   {
      $listing->load(["images"]);
      $offer = !Auth::user() 
         ? null 
         : $listing->offers()->byMe()->first();

      return inertia("Listing/Show", [
         "listing" => $listing,
         "offerMade" => $offer
      ]);
   }

  
}

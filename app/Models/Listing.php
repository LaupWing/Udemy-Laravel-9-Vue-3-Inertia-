<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
   use HasFactory;

   protected $fillable = [
      "beds",
      "baths",
      "area",
      "city",
      "code",
      "street",
      "street_number",
      "price"
   ];

   public function owner(): BelongsTo {
      return $this->belongsTo(
         \App\Models\User::class, 
         "by_user_id"
      );
   }

   public function scopeMostRecent(Builder $query): Builder {
      return $query->orderbyDesc("created_at");
   }

   public function scopeFilter(Builder $query, array $filters){

   }
}

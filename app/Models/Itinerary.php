<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Itinerary extends Model {
    public function days() {
        return $this->hasMany(DayActivity::class);
    }

    // public function package() {
    //     return $this->belongsTo(Package::class);
    // }
}

class DayActivity extends Model {
    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }
}

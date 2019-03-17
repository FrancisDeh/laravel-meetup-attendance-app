<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function visitor() {
        return $this->belongsTo(Visitor::class);
    }
}

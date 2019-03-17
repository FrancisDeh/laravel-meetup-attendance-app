<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    public function attendance () {
        return $this->hasMany(Attendance::class);
    }
}

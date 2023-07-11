<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $timestamps = false;

    public function states()
    {
        return $this->hasMany(State::class);
    }

}

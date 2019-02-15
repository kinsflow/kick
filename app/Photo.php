<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function user()
    {
        $this->hasOne(User::class, 'photo_id');
    }
}

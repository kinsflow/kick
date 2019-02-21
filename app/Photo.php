<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $uploads = [
        '/images/'
    ];


    protected $fillable = [
        'file_path'
        ];
    public function user()
    {
        $this->hasMany(User::class, 'photo_id');
    }
    public function post()
    {
        $this->belongsTo(Photo::class, 'photo_id');
    }
}

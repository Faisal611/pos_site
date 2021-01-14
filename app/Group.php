<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'title',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}

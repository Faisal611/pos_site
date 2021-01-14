<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'group_id', 'name', 'email', 'phone', 'address',
    ];

    public function group()
    {
        return $this->hasOne(Group::class, 'id', 'group_id');
    }
}

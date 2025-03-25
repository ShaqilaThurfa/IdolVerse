<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idol extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'password',
        'groupId',
        'agencyId',
        'photo',
        'birthday',
        'birth country',
        'gender',
        // 'status', ini kalo misalnya idolnya bisa di ban atau di suspend
        'position',
        'height',
        'description',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}

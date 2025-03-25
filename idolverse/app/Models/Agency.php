<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'CEO',
        'logo',
        'website',
    ];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function idols()
    {
        return $this->hasMany(Idol::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'agencyId',
        'type',
        'description',
        'photo',
        'members',
        'instagram',
        'website',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function idols()
    {
        return $this->hasMany(Idol::class);
    }
}

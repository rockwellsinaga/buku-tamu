<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $fillable = [
        'Nama',
        'slug',
        'description',
        'image_path',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function visitors()
    {
        return $this->hasMany(Visitor::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function groupVisits()
    {
        return $this->hasMany(GroupVisit::class);
    }
}

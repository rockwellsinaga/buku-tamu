<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visitor extends Model
{
    use HasFactory;

    protected $table = 'memberguesses';

    protected $fillable = ['Nama', 'job_id', 'pendidikan_id', 'gender_id', 'Alamat', 'event_id'];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    public function education(): BelongsTo
    {
        return $this->belongsTo(EducationLevel::class, 'pendidikan_id');
    }
}

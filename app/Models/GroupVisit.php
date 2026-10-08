<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupVisit extends Model
{
    use HasFactory;

    protected $table = 'rombongan';

    protected $guarded = ['id'];

    protected $casts = [
        'JumlahPersonil' => 'integer',
        'JumlahLaki' => 'integer',
        'JumlahPerempuan' => 'integer',
        'JumlahPNS' => 'integer',
        'JumlahPSwasta' => 'integer',
        'JumlahPeneliti' => 'integer',
        'JumlahGuru' => 'integer',
        'JumlahDosen' => 'integer',
        'JumlahPensiunan' => 'integer',
        'JumlahTNI' => 'integer',
        'JumlahWiraswasta' => 'integer',
        'JumlahPelajar' => 'integer',
        'JumlahMahasiswa' => 'integer',
        'JumlahLainnya' => 'integer',
        'JumlahSD' => 'integer',
        'JumlahSMP' => 'integer',
        'JumlahSMA' => 'integer',
        'JumlahD1' => 'integer',
        'JumlahD2' => 'integer',
        'JumlahD3' => 'integer',
        'JumlahS1' => 'integer',
        'JumlahS2' => 'integer',
        'JumlahS3' => 'integer',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}

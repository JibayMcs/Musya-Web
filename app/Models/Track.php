<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Owenoj\LaravelGetId3\GetId3;

class Track extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'cover',
        'path',
        'album_id'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function id3()
    {
        return GetId3::fromDiskAndPath('public', str_replace('home/vagrant/musya/storage/app/public/', '', $this->path));
    }

    public function duration(): string
    {
        $duration = $this->id3()->getPlaytimeSeconds();
        return Carbon::parse($duration)->format($duration >= 3600 ? 'H:i:s' : 'i:s');
    }

    /**
     * @throws \getid3_exception
     */
    public function cover()
    {
        return $this->id3()->getArtwork();
    }
}

<?php

namespace App\Observers;

use App\Models\Artist;
use Illuminate\Support\Facades\Http;

class ArtistObserver
{
    /**
     * Handle the Artist "created" event.
     *
     * @param \App\Models\Artist $artist
     * @return void
     */
    public function created(Artist $artist)
    {
        $headers = [
            'X-RapidAPI-Host' => 'shazam-core.p.rapidapi.com',
            'X-RapidAPI-Key' => 'DMDvhZnqZNmshIkHfjic9AAYf9J4p1IRJW0jsnuGv8jxRiiSYR'
        ];

        $request = Http::withHeaders($headers);

        $artistInfoResponse = $request->get("https://shazam-core.p.rapidapi.com/v1/search/multi?offset=0&query=$artist->name&search_type=SONGS_ARTISTS");

        if ($artistInfoResponse->status() == 200) {
            $artist->picture = $artistInfoResponse->object()->artists->hits[0]->artist->avatar;
            $artist->save();
        }
    }

    /**
     * Handle the Artist "updated" event.
     *
     * @param \App\Models\Artist $artist
     * @return void
     */
    public function updated(Artist $artist)
    {
        //
    }

    /**
     * Handle the Artist "deleted" event.
     *
     * @param \App\Models\Artist $artist
     * @return void
     */
    public function deleted(Artist $artist)
    {
        //
    }

    /**
     * Handle the Artist "restored" event.
     *
     * @param \App\Models\Artist $artist
     * @return void
     */
    public function restored(Artist $artist)
    {
        //
    }

    /**
     * Handle the Artist "force deleted" event.
     *
     * @param \App\Models\Artist $artist
     * @return void
     */
    public function forceDeleted(Artist $artist)
    {
        //
    }
}

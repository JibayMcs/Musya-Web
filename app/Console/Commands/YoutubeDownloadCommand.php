<?php

namespace App\Console\Commands;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Track;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use YoutubeDl\Options;
use YoutubeDl\YoutubeDl;

class YoutubeDownloadCommand extends Command
{


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'youtubedl {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'YoutubeDownloadCommand Commands';

    protected function implode_recursive(string $separator, array $array): string
    {
        $string = '';
        foreach ($array as $i => $a) {
            if (is_array($a)) {
                $string .= $this->implode_recursive($separator, $a);
            } else {
                $string .= $a;
                if ($i < count($array) - 1) {
                    $string .= $separator;
                }
            }
        }

        return $string;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $url = $this->argument('url');
        $storage_url = Storage::disk('public')->path('music');
        $storage_path = "$storage_url/%(artist)s/%(album)s/";

        $yt = new YoutubeDl();

        $yt->setBinPath('/usr/local/bin/yt-dlp');
//        $yt->setPythonPath('/usr/bin/python3');

        $options = Options::create()
            ->output('%(title)s.%(ext)s')
            ->downloadPath($storage_path)
            ->url($url)
            ->addMetadata(true)
            ->extractAudio(true)
            ->audioFormat(Options::AUDIO_FORMAT_MP3)
            ->audioQuality(Options::AUDIO_FORMAT_BEST)
            ->embedThumbnail(true)
//            ->noOverwrites(true)
            ->skipUnavailableFragments(true)
            ->cookies(Storage::disk('public')->path('cookies.txt'))
            ->maxDownloads(50)
            ->noPart(true);
        //->skipDownload(true)

        $collection = $yt->download($options);

        $this->comment($collection->count());

        foreach ($collection->getVideos() as $video) {
            if ($video->getError() !== null) {
                $this->comment("Error downloading video: {$video->getError()}.");
            } else {
                $this->comment($video->getTitle());
                // $this->comment($video->toJson());

                $artist = Artist::firstOrCreate([
                    'name' => explode(',', trim($video->getArtist()))[0],
                ], [
                    'picture' => '',
                    'biography' => ''
                ]);

                $album = Album::firstOrCreate([
                    'name' => $video->getAlbum() !== null ? $video->getAlbum() : 'NA',
                ], [
                    'cover' => $video->get('thumbnail'),
                    'artist_id' => $artist->id
                ]);

                $track = Track::firstOrCreate([
                    'id' => $video->getId(),
                ], [
                    'name' => $video->getTitle(),
                    'cover' => $video->get('thumbnail'),
                    'path' => $video->get('_filename'),
                    'album_id' => $album->id
                ]);

                $this->comment($track->id);
            }
        }
        return 1;
    }

}

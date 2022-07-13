<?php

namespace App\Console\Commands;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Track;
use Illuminate\Console\Command;
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
    protected $signature = 'youtubedl {url} {--max-dl=-1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'YoutubeDownloadCommand Commands';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $url = $this->argument('url');
        $maxDownload = $this->option('max-dl');

        $storage_url = Storage::disk('public')->path('music');
        $storage_path = "$storage_url/%(artist)s/%(album)s/";

        $yt = new YoutubeDl();

        $yt->setBinPath(config('musya.youtubedl_bin_path'));
        //$yt->setPythonPath(config('musya.python3_bin_path'));

        $options = Options::create()
            ->output('%(title)s.%(ext)s')
            ->downloadPath($storage_path)
            ->url($url)
            ->addMetadata(false)
            ->extractAudio(true)
            ->audioFormat(Options::AUDIO_FORMAT_MP3)
            ->audioQuality(Options::AUDIO_FORMAT_BEST)
            ->embedThumbnail(true)
            ->matchFilter("album!=''")
            //->noOverwrites(true)
            ->skipUnavailableFragments(true)
            ->cookies(Storage::disk('public')->path('cookies.txt'))
            ->maxDownloads($maxDownload)
            ->noPart(true);
            //->skipDownload(true);


        $collection = $yt->download($options);

        $this->comment($collection->count());


        foreach ($collection->getVideos() as $video) {
            if ($video->getError() !== null) {
                $this->comment("Error downloading video: {$video->getError()}.");
            } else {
                $this->comment($video->getTitle());

                $artist = Artist::firstOrCreate([
                    'name' => explode(',', trim($video->getArtist()))[0],
                ], [
                    'picture' => '',
                    'biography' => ''
                ]);

                $album = Album::firstOrCreate([
                    'name' => $video->getAlbum(),
                ], [
                    'cover' => $video->get('thumbnail'),
                    'artist_id' => $artist->id
                ]);

                Track::firstOrCreate([
                    'id' => $video->getId(),
                ], [
                    'name' => $video->getTrack(),
                    'cover' => $video->get('thumbnail'),
                    'path' => $this->getAudioFilePath($video),
                    'album_id' => $album->id,
                    'filesize' => $video->getFilesize() ?? 0,
                    'duration' => $video->getDuration() ?? 0,
                ]);
            }
        }
        return 1;
    }

    private function getAudioFilePath($video): string
    {
        $index = strpos($video->get('_filename'), '/app/public/') + strlen('/app/public/');
        $result = substr($video->get('_filename'), $index);

        return Storage::url($result);
    }
}

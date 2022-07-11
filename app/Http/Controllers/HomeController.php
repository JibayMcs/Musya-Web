<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Track;
use App\Playlist;
use App\UserHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Modules\Album\Entities\Album;
use Modules\Audio\Entities\Audio;
use Modules\Audio\Entities\AudioArtist;

class HomeController extends Controller
{

    public function index()
    {
        $artists = Artist::all();
        $recentTracks = Track::orderBy('created_at', 'DESC')->take(10)->get();
        return view('home', compact('artists', 'recentTracks'));
    }

    public function play_single_music(Request $request)
    {
        $checkValidate = Validator::validate($request->except('_token'), [
            'musicid' => 'required',
            'musictype' => 'required'
        ]);

        if ($checkValidate) {
            if ($request->musictype == 'artist') {
                $artist = Artist::find($request->musicid);
                if ($artist) {
                    $songArr = (object)[];

                    foreach ($artist->albums as $album) {
                        foreach ($album->tracks as $audio) {
                            /*if (isset(Auth::user()->id)) {
                                $checkHistory = UserHistory::where('user_id', Auth::user()->id)->get();
                                if (sizeof($checkHistory) > 0) {
                                    $audioId = json_decode($checkHistory[0]->audio_id);
                                    if (!in_array($audio->id, $audioId)) {
                                        array_push($audioId, $audio->id);
                                    }
                                    UserHistory::where('user_id', Auth::user()->id)->update(['audio_id' => json_encode($audioId)]);
                                } else {
                                    UserHistory::create(['user_id' => Auth::user()->id, 'audio_id' => json_encode([$audio->id])]);
                                }
                            }*/
                            /*if (!empty($audio->banner_image)) {
                                $banner_image = url('images/audio/thumb/' . $audio->banner_image);
                            } else {*/

                            $banner_image = url('images/index_bg.png');

                            //}

                            $songArr = (object)[
                                'mid' => $audio->id,
                                'mp3url' => Storage::url(str_replace('home/vagrant/musya/storage/app/public/', '', $audio->path)),
                                'song_name' => $audio->name,
                                'artists' => $artist->name,
                                'image' => "data:image/jpeg;base64, " . $audio->cover(),
                                'banner_image' => $banner_image,
                                'share_uri' => url('audio/single/' . $audio->id . '/' . $audio->audio_slug),
                                'is_aws' => $audio->aws_upload,
                                'status' => 'success'
                            ];
                        }
                        $resp[] = $songArr;
                        return response()->json(json_encode($resp));
                    }
                } else {
                    $resp = ['status' => 'false', 'msg' => __('frontWords.no_artist_song_err')];
                    return response()->json(json_encode($resp));
                }
            }

            /*if ($request->musictype == 'album') {
                $album = Album::where('id', $request->musicid)->select('song_list', 'image')->get();
                if (sizeof($album) > 0) {
                    $countUpdate = Album::where('id', $request->musicid)->update(['listening_count' => DB::raw('listening_count + 1')]);
                    $song = json_decode($album[0]['song_list']);
                    for ($i = 0; $i < sizeof($song); $i++) {
                        $songDetail = Audio::where('id', $song[$i])->get();
                        $songArr = (object)[];
                        if (sizeof($songDetail) > 0) {
                            foreach ($songDetail as $detail) {

                                if (isset(Auth::user()->id)) {
                                    $checkHistory = UserHistory::where('user_id', Auth::user()->id)->get();
                                    if (sizeof($checkHistory) > 0) {
                                        $audioId = json_decode($checkHistory[0]->audio_id);
                                        if (!in_array($detail->id, $audioId)) {
                                            array_push($audioId, $detail->id);
                                        }
                                        UserHistory::where('user_id', Auth::user()->id)->update(['audio_id' => json_encode($audioId)]);
                                    } else {
                                        UserHistory::create(['user_id' => Auth::user()->id, 'audio_id' => json_encode([$detail->id])]);
                                    }
                                }

                                $artists_name = $this->getArtistName(['artist_id' => $detail->artist_id]);
                                if (!empty($detail->banner_image)) {
                                    $banner_image = url('images/audio/thumb/' . $detail->banner_image);
                                } else {
                                    $banner_image = url('images/index_bg.png');
                                }
                                $songArr = (object)[
                                    'mid' => $detail->id,
                                    'mp3url' => ($detail->aws_upload == 1) ? $this->getSongAWSUrl($songDetail) : url('/images/audio/' . $detail->audio),
                                    'song_name' => $detail->audio_title,
                                    'artists' => $artists_name,
                                    'image' => url('/images/album/' . $album[0]->image),
                                    'banner_image' => $banner_image,
                                    'share_uri' => url('audio/single/' . $detail->id . '/' . $detail->audio_slug),
                                    'is_aws' => $detail->aws_upload,
                                    'status' => 'success'
                                ];
                            }
                            $resp[] = $songArr;
                        }
                    }
                } else {
                    $resp = ['status' => 'false', 'msg' => __('frontWords.no_song')];
                }
            }*/

            /*if ($request->musictype == 'playlist') {
                $playlist = Playlist::where('id', $request->musicid)->select('song_list')->get();
                if (sizeof($playlist) > 0) {
                    $countUpdate = Audio::where('id', $request->musicid)->update(['listening_count' => DB::raw('listening_count + 1')]);
                    $song = json_decode($playlist[0]['song_list']);

                    if ($song != '') {
                        for ($i = 0; $i < sizeof($song); $i++) {
                            $songDetail = Audio::where('id', $song[$i])->get();
                            $songArr = (object)[];
                            if (sizeof($songDetail) > 0) {
                                foreach ($songDetail as $detail) {

                                    if (isset(Auth::user()->id)) {
                                        $checkHistory = UserHistory::where('user_id', Auth::user()->id)->get();
                                        if (sizeof($checkHistory) > 0) {
                                            $audioId = json_decode($checkHistory[0]->audio_id);
                                            if (!in_array($detail->id, $audioId)) {
                                                array_push($audioId, $detail->id);
                                            }
                                            UserHistory::where('user_id', Auth::user()->id)->update(['audio_id' => json_encode($audioId)]);
                                        } else {
                                            UserHistory::create(['user_id' => Auth::user()->id, 'audio_id' => json_encode([$detail->id])]);
                                        }
                                    }
                                    $artists_name = $this->getArtistName(['artist_id' => $detail->artist_id]);
                                    if (!empty($detail->banner_image)) {
                                        $banner_image = url('images/audio/thumb/' . $detail->banner_image);
                                    } else {
                                        $banner_image = url('images/index_bg.png');
                                    }
                                    $songArr = (object)[
                                        'mid' => $detail->id,
                                        'mp3url' => ($detail->aws_upload == 1) ? $this->getSongAWSUrl($songDetail) : url('/images/audio/' . $detail->audio),
                                        'song_name' => $detail->audio_title,
                                        'artists' => $artists_name,
                                        'image' => url('/images/audio/thumb/' . $detail->image),
                                        'banner_image' => $banner_image,
                                        'share_uri' => url('audio/single/' . $detail->id . '/' . $detail->audio_slug),
                                        'is_aws' => $detail->aws_upload,
                                        'status' => 'success'
                                    ];
                                }
                                $resp[] = $songArr;
                            }
                        }
                    } else {
                        $resp = ['status' => 'false', 'msg' => __('frontWords.no_song')];
                    }
                } else {
                    $resp = ['status' => 'false', 'msg' => __('frontWords.no_song')];
                }
            }*/

            if ($request->musictype == 'audio') {

                /*if (isset(Auth::user()->id)) {
                    $checkHistory = UserHistory::where('user_id', Auth::user()->id)->get();
                    if (sizeof($checkHistory) > 0) {
                        $audioId = json_decode($checkHistory[0]->audio_id);
                        if (!in_array($request->musicid, $audioId)) {
                            array_push($audioId, $request->musicid);
                        }
                        UserHistory::where('user_id', Auth::user()->id)->update(['audio_id' => json_encode($audioId)]);
                    } else {
                        UserHistory::create(['user_id' => Auth::user()->id, 'audio_id' => json_encode([$request->musicid])]);
                    }
                }*/

                $audio = Track::whereId($request->musicid)->firstOrFail();
                if ($audio) {
//                    $countUpdate = Audio::where('id', $request->musicid)->update(['listening_count' => DB::raw('listening_count + 1')]);
                    $artists_name = $audio->album->artist->name;

                    /*if (!empty($audio[0]->banner_image)) {
                        $banner_image = url('images/audio/thumb/' . $audio[0]->banner_image);
                    } else {*/

                    $banner_image = url('images/index_bg.png');

                    //}
                    $songArr = (object)[
                        'mid' => $audio->id,
                        'mp3url' => Storage::url(str_replace('home/vagrant/musya/storage/app/public/', '', $audio->path)),
                        'song_name' => $audio->name,
                        'artists' => $artists_name,
                        'image' => "data:image/jpeg;base64, " . $audio->cover(),
                        'banner_image' => $banner_image,
                        'share_uri' => 'future_slug',
                        'is_aws' => false,
                        'status' => 1
                    ];
                    $resp[] = $songArr;
                    return response()->json(json_encode($resp));
                } else {
                    $resp = ['status' => 'false', 'msg' => __('frontWords.no_song')];
                    return response()->json(json_encode($resp));
                }
            }

            /*if ($request->musictype == 'genre') {
                $audioData = Audio::where('audio_genre_id', $request->musicid)->get();
                $songArr = (object)[];
                if (sizeof($audioData) > 0) {
                    foreach ($audioData as $audio) {
                        $artists_name = $this->getArtistName(['artist_id' => $audio->artist_id]);
                        if (!empty($audio->banner_image)) {
                            $banner_image = url('/images/audio/thumb/' . $audio->banner_image);
                        } else {
                            $banner_image = url('/images/index_bg.png');
                        }
                        $songArr = (object)[
                            'mid' => $audio->id,
                            'mp3url' => ($audio->aws_upload == 1) ? $this->getSongAWSUrl($audioData) : url('/images/audio/' . $audio->audio),
                            'song_name' => $audio->audio_title,
                            'artists' => $artists_name,
                            'image' => url('/images/audio/thumb/' . $audio->image),
                            'banner_image' => $banner_image,
                            'share_uri' => url('audio/single/' . $audio->id . '/' . $audio->audio_slug),
                            'is_aws' => $audio->aws_upload,
                            'status' => 'success'
                        ];
                        $resp[] = $songArr;
                    }
                } else {
                    $resp = ['status' => 'false', 'msg' => __('frontWords.no_song')];
                }
            }*/

        } else {
            $resp[] = $checkValidate;
        }
        //return abort(419, json_encode($resp));
    }
}

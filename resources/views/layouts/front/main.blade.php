<html lang="{{ app()->getLocale() }}">
<!-- Begin Head -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title> @yield('title')</title>
    @if(isset($settings['favicon']))
        <link rel="shortcut icon" href="{{ asset('images/sites/'.$settings['favicon']) }}">
    @endif
    @yield('style')

    <link href="{{ asset('assets/css/front/fonts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/front/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/js/front/plugins/swiper/css/swiper.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/js/front/plugins/nice_select/nice-select.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/js/player/volume.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/js/front/plugins/scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/front/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link href="{{ asset('assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link href="{{asset('assets/css/star-rating.css')}}" rel="stylesheet" type="text/css">
    <script>
        var userBaseUrl = "{{url('/')}}";
        var checkUserId = '{{ isset(Auth::user()->id) ? Auth::user()->id : ''}}';
    </script>

    <script src="{{ asset('assets/js/front/jquery.js') }}"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script>
        var jsDynamicText = '<?php echo json_encode(['select_lang' => __('frontWords.select_lang'), 'something_wrong' => __('frontWords.something_wrong'), 'playlist_err' => __('frontWords.playlist_err'), 'select_playlist' => __('frontWords.select_playlist'), 'no_song' => __('frontWords.no_song'), 'required_fields' => __('frontWords.required_fields'), 'pass_err' => __('frontWords.pass_err'), 'cnf_pass_err' => __('frontWords.cnf_pass_err'), 'cnf_mismatch' => __('frontWords.cnf_mismatch'), 'only_allowed' => __('frontWords.only_allowed'), 'files' => __('frontWords.files'), 'login_err' => __('frontWords.login_err'), 'coupon_err' => __('frontWords.coupon_err'), 'search_err' => __('frontWords.search_err'), 'are_u_sure' => __('frontWords.are_u_sure'), 'delete_records' => __('frontWords.delete_records'), 'delete_records' => __('adminWords.delete_records'), 'delete' => __('adminWords.delete')]) ?>';

    </script>
</head>

@include('layouts.front.header')

<div class="append_html_data">
    @yield('content')
</div>

@include('layouts.front.audio_player')

<script>

    var player;

    function onYouTubeIframeAPIReady() {

        player = new YT.Player('ytPlayer', {
            videoId: '',
            playerVars: {
                'autoplay': 0,
                'controls': 0,
                'modestbranding': 0,
                'playsinline': 1
            },
            events: {
                'onReady': initialize,
                'onStateChange': onPlayerStateChange,
            }
        });
    }


    function onPlayerStateChange(event) {

        if (event.data == 1) {
            $(".yt_play_pause").removeClass('yt-play').addClass('yt-pause');
            $('.yt_play_pause').find('i').removeClass('fa fa-play').addClass('fa fa-pause');
        } else if (event.data == 2) {
            $(".yt_play_pause").removeClass('yt-pause').addClass('yt-play');
            $('.yt_play_pause').find('i').removeClass('fa fa-pause').addClass('fa fa-play');
        }
    }

    function initialize() {

        updateTimerDisplay();
        updateProgressBar();
        clearInterval(time_update_interval);

        var time_update_interval = setInterval(function () {
            updateTimerDisplay();
            updateProgressBar();
        }, 1000);

    }

    $(document).on("click", ".yt_music", function () {

        var _this = $(this);
        var musicId = $(_this).data('musicid');
        player.loadVideoById(musicId);
        $('.jplayer_wrapper').addClass('yt_player_opened');

        $('#ytPlayer').show();
        $(".yt-now-playing").html('');

        $(".yt_play_pause").removeClass('yt-play').addClass('yt-pause');
        $('.yt_play_pause').find('i').removeClass('fa fa-play').addClass('fa fa-pause');

        var image = $(_this).attr("data-image");
        var title = (_this).attr("data-title");

        var html = `<div class="jp-track-name">
                                    <span class="que_img"><img src="${image}"></span>
                                    <div class="que_data">${title}
                                    </div>
                                </div>`;

        $(".yt-now-playing").append(html);
    });

    function updateTimerDisplay() {
        $('.yt-current-time').text(formatTime(player.getCurrentTime()));
        $('.yt-duration').text(formatTime(player.getDuration()));
    }


    function formatTime(value) {
        const sec = parseInt(value, 10); // convert value to number if it's string
        let hours = Math.floor(sec / 3600); // get hours
        let minutes = Math.floor((sec - (hours * 3600)) / 60); // get minutes
        let seconds = sec - (hours * 3600) - (minutes * 60); //  get seconds
        if (hours < 10) {
            hours = "0" + hours;
        }
        if (minutes < 10) {
            minutes = "0" + minutes;
        }
        if (seconds < 10) {
            seconds = "0" + seconds;
        }
        if (hours > '00') { // Check Hours
            return hours + ':' + minutes + ':' + seconds; // Return is HH : MM : SS
        } else {
            return minutes + ':' + seconds; // Return is HH : MM : SS
        }
    }

    function updateProgressBar() {
        $('#progress-bar').val((player.getCurrentTime() / player.getDuration()) * 100);
    }


    $(document).on("click", ".play_music", function () {
        $(".main_yt_player").hide();
        $(".main_jplayer").show();
        player.pauseVideo();
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{ asset('assets/js/front/jquery.js') }}"></script>
<script src="{{ asset('assets/js/front/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/front/plugins/swiper/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/player/jplayer.playlist.min.js') }}"></script>
<script src="{{ asset('assets/js/player/jquery.jplayer.min.js') }}"></script>
<script src="{{ asset('assets/js/audio-player.js') }}"></script>
<script src="{{ asset('assets/js/player/volume.js') }}"></script>
<script src="{{asset('assets/js/star-rating.js')}}"></script>
<script src="{{ asset('assets/js/front/plugins/nice_select/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/front/plugins/scroll/jquery.mCustomScrollbar.js') }}"></script>
<script src="{{ asset('assets/js/front/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/js/card.js') }}"></script>
<script src="{{ asset('assets/js/valid.js') }}"></script>
<script src="{{ asset('assets/js/submit.js') }}"></script>
<script src="{{ asset('assets/js/front/user-ajax-custom.js?'.time()) }}"></script>
@yield('script')

{{--@toastr_js
@toastr_render--}}


</body>
</html>

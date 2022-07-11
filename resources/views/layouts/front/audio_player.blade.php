<!----Audio Player Section---->
<div class="ms_player_wrapper jplayer_wrapper">
    <div class="ms_player_close">
        <i class="fa fa-angle-down" aria-hidden="true"></i>
    </div>
    <div class="player_mid">
        <div class="audio-player">
            <div id="jquery_jplayer_1" class="jp-jplayer"></div>
            <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
                <div class="player_left">
                    <div class="ms_play_song">
                        <div class="play_song_name">
                            <a href="javascript:void(0);" id="playlist-text">
                                <div class="jp-now-playing flex-item yt-music-title">
                                    <div class="jp-track-name"></div>
                                    <div class="jp-artist-name"></div>
                                </div>
                                <div class="yt-now-playing flex-item yt-video-title"></div>
                            </a>
                        </div>
                    </div>
                    <div class="play_song_options">
                        <ul>
                            @if(!empty($userPlan) && $userPlan->is_download == 1)
                                <li><a href="javascript:void(0);" class="download_track ms_download jp_cur_download"><span class="song_optn_icon"><i class="ms_icon icon_download"></i></span>
                                        {{ __('frontWords.download_now') }}</a>
                                </li>
                            @endif
                            <li><a href="javascript:void(0);" class="addToFavourite favourite_music jp_cur_favourite"><span class="song_optn_icon"><i class="ms_icon icon_fav"></i></span></a></li>
                            <li><a href="javascript:void(0);" class="ms_add_playlist jp_cur_playlist"><span class="song_optn_icon"><i
                                            class="ms_icon icon_playlist"></i></span>{{ __('frontWords.add_to_playlist') }}</a></li>
                            <li><a href="javascript:void(0);" class="ms_share_music jp_cur_share"><span class="song_optn_icon"><i class="ms_icon icon_share"></i></span>{{ __('frontWords.share') }}</a>
                            </li>
                        </ul>
                    </div>
                    <span class="play-left-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                </div>
                <!----Right Queue---->
                <div class="jp_queue_wrapper">
                    <span class="que_text ms_btn" id="myPlaylistQueue"><i class="fa fa-angle-up" aria-hidden="true"></i> {{ __('frontWords.queue') }}</span>
                    <div id="playlist-wrap" class="jp-playlist">
                        <div class="jp_queue_cls"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                        <h2><img src="{{ asset('images/add-to-queue.png') }}" alt="Queue">{{ __('frontWords.queue') }}</h2>

                        <div class="jp_queue_list_inner">
                            <ul>
                                <li class="jp-playlist-current">&nbsp;</li>
                            </ul>
                        </div>
                        <div class="jp_queue_btn">
                            <!-- <a href="clear_modal" class="ms_save ms_btn" data-toggle="modal" data-target="#save_modal">Save Playlist</a> -->
                            <a href="javascript:void(0);" class="ms_btn ms_clear" data-toggle="modal" data-target="#clear_modal">{{ __('frontWords.clear') }}</a>
                        </div>
                    </div>
                </div>
                <div class="jp-type-playlist">
                    <div class="jp-gui jp-interface flex-wrap">
                        <div class="jp-controls flex-item">
                            <button class="jp-previous" tabindex="0">
                                <i class="ms_play_control"></i>
                            </button>
                            <button class="yt_play_pause" tabindex="0">
                                <i class="fa fa-play"></i>
                            </button>

                            <button class="jp-play" tabindex="0">
                                <i class="ms_play_control"></i>
                            </button>

                            <button class="jp-next" tabindex="0">
                                <i class="ms_play_control"></i>
                            </button>
                        </div>
                        <div class="jp-progress-container flex-item">
                            <div class="jp-time-holder">
                                <span class="jp-current-time music-timer" role="timer" aria-label="time">&nbsp;</span>
                                <span class="jp-duration music-timer" role="timer" aria-label="duration">&nbsp;</span>
                                <span class="yt-current-time yt-video-bar" role="timer" aria-label="time">&nbsp;</span>
                                <span class="yt-duration yt-video-bar" role="timer" aria-label="duration">&nbsp;</span>
                            </div>
                            <div class="jp-progress">
                                <div class="jp-seek-bar">
                                    <div class="jp-play-bar">
                                        <div class="bullet">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="range" id="progress-bar" class="custom-yt-range yt-video-bar" value="0" style="width: 100%;">
                        </div>
                        <div class="jp-volume-controls flex-item">
                            <div class="widget knob-container">
                                <div class="knob-wrapper-outer">
                                    <div class="knob-wrapper">
                                        <div class="knob-mask">
                                            <div class="knob d3"><span></span></div>
                                            <div class="handle"></div>
                                            <div class="round">
                                                <img src="{{ asset('assets/images/svg/volume.svg') }}" alt="volume">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <input></input> -->
                                </div>
                            </div>
                        </div>
                        <div class="jp-toggles flex-item music-suffuling">
                            <button class="jp-shuffle" tabindex="0" title="Shuffle">
                                <i class="ms_play_control"></i></button>
                            <button class="jp-repeat" tabindex="0" title="Repeat"><i class="ms_play_control"></i></button>
                        </div>

                    </div>
                </div>
                <div id="ytPlayer" class="youtube-video" style="display:none;">
                </div>
            </div>
        </div>
    </div>
    <!--main div-->
</div>

<div class="ms_register_popup">
    <div id="registerModal" class="modal fade centered-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered register_dialog">

            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal"><i class="fa_icon form_close"></i></button>
                <div class="modal-body">
                    <div class="ms_register_img">
                        <img src="{{ asset('assets/images/register_img.png') }}" alt="" class="img-fluid"/>
                    </div>
                    <div class="ms_register_form">
                        <form id="registrationModal" method="post" action="{{ route('register') }}" data-reset="1" data-modal="1" modal-open="loginModal">
                            @csrf
                            <h2>{{ __('frontWords.register_heading') }}</h2>
                            <div class="form-group">
                                <input type="text" placeholder="{{ __('adminWords.enter').' '.__('adminWords.name') }}" class="form-control require" name="name">
                                <span class="form_icon">
                                <i class="fa_icon form-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="{{ __('adminWords.enter').' '.__('adminWords.email') }}" class="form-control require" name="email" data-valid="email"
                                       data-error="Invalid email.">
                                <span class="form_icon">
                                        <i class="fa_icon form-envelope" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="{{ __('adminWords.enter').' '.__('adminWords.mobile').' '.__('adminWords.number') }}" class="form-control require" name="mobile"
                                       data-valid="mobile" data-error="Invalid mobile number.">
                                <span class="form_icon">
                                        <i class="fa_icon form-lock" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="{{ __('adminWords.enter').' '.__('adminWords.password') }}" class="form-control require" name="password" length="6"
                                       data-length-error="Password must contain atleast 6 character." id="userPass">
                                <span class="form_icon">
                                        <i class="fa_icon form-lock" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="{{ __('adminWords.confirm_password') }}" name="cnf_password" data-error="{{ __('frontWords.cnf_pass_err') }}"
                                       class="form-control require">
                                <span class="form_icon">
                                        <i class=" fa_icon form-lock" aria-hidden="true"></i>
                                    </span>
                            </div>

                            <a class="ms_btn" data-action="submitThisForm">Register now</a>
                            <div class="auth_controls">
                                <p>{{ __('frontWords.already_acc') }} ? <a href="#loginModal" data-toggle="modal" class="ms_modal hideCurrentModel">{{ __('frontWords.login_here') }}</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="ms_lang_popup">
    <div id="lang_modal" class="modal fade centered-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content add_lang">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa_icon form_close"></i>
                </button>

                <div class="modal-body">
                    <h1>{{ __('frontWords.lang_section') }}</h1>
                    <p>{{ __('frontWords.select_languages') }}</p>
                    <ul class="lang_list">
                        @php
                            if(!empty($audioLanguage)){
                                $lang = [];
                                if(isset(Auth::user()->id)){
                                    $checkLang = select(['column' => 'user_language', 'table' => 'favourites', 'where' => ['user_id' => Auth::user()->id] ]);
                                    if(sizeof($checkLang) > 0 && $checkLang[0]->user_language != ''){
                                        $lang = json_decode($checkLang[0]->user_language);
                                    }
                                }
                                foreach($audioLanguage as $key=>$value){ @endphp
                        <li>
                            <label class="lang_check_label"> {{ $value }}
                                <input type="checkbox" name="check" class="lang_filter" value="{{ $key }}" {{ (sizeof($lang) > 0 && in_array($key, $lang) ? 'checked' : '' ) }}>
                                <span class="label-text"></span>
                            </label>
                        </li>
                        @php   }
                                }
                        @endphp
                    </ul>
                    <div class="ms_lang_btn">
                        <a href="javascript:void(0);" class="ms_btn language_filter">{{ __('frontWords.apply') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="loginModal" class="modal fade centered-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered login_dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">
                <i class="fa_icon form_close"></i>
            </button>
            <div class="modal-body">
                <form id="userLogin" method="post" action="{{ route('login') }}" data-modal="1" data-redirect="{{ url('/home') }}">
                    @csrf
                    <div class="ms_register_img">
                        <img src="{{ asset('assets/images/register_img.png') }}" alt="" class="img-fluid"/>
                    </div>
                    <div class="ms_register_form">
                        <h2>{{ __('frontWords.login_heading') }}</h2>
                        <div class="form-group">
                            <input type="email" required placeholder="{{ __('adminWords.enter').' '.__('adminWords.email') }}" class="form-control require" data-valid="email"
                                   data-error="Invalid email." name="email">
                            <span class="form_icon">
                            <i class="fa_icon form-envelope" aria-hidden="true"></i>
                        </span>
                        </div>
                        <div class="form-group">
                            <input type="password" required placeholder="{{ __('adminWords.enter').' '.__('adminWords.password') }}" class="form-control require" name="password">
                            <span class="form_icon">
                        <i class="fa_icon form-lock" aria-hidden="true"></i>
                        </span>
                        </div>
                        <div class="remember_checkbox">
                            <label>{{ __('adminWords.remember_me') }}
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <input type="submit" class="ms_btn" value="login now"/>
                        <!--<a class="ms_btn" data-action="submitThisForm">login now</a>-->
                        <div class="form-group">
                            <div class="foo_sharing">
                                <ul class="p-0">
                                    @if(isset($settings['is_fb']) && $settings['is_fb'] == 1)
                                        <li><a href="{{route('socialLogin','facebook')}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    @endif
                                    @if(isset($settings['is_google']) && $settings['is_google'] == 1)
                                        <li><a href="{{route('socialLogin','google')}}" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    @endif
                                    @if(isset($settings['is_twitter']) && $settings['is_twitter'] == 1)
                                        <li><a href="{{route('socialLogin','twitter')}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    @endif
                                    @if(isset($settings['is_linkedin']) && $settings['is_linkedin'] == 1)
                                        <li><a href="{{route('socialLogin','linkedin')}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    @endif
                                    @if(isset($settings['is_github']) && $settings['is_github'] == 1)
                                        <li><a href="{{ route('socialLogin','github') }}" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a></li>
                                    @endif
                                    @if(isset($settings['is_amazon']) && $settings['is_amazon'] == 1)
                                        <li><a href="{{route('socialLogin','amazon')}}" target="_blank"><i class="fa fa-amazon" aria-hidden="true"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="auth_controls">
                            <div class="popup_forgot">
                                <a href="#myModalForgot" data-toggle="modal" data-target="#myModalForgot" class="ms_modal1">{{ __('adminWords.forgot_password') }}</a>
                            </div>
                            <p>{{ __('frontWords.havenot_acc') }} <a href="#registerModal" data-toggle="modal" class="ms_modal1 hideCurrentModel">{{ __('frontWords.register_here') }}</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="myModalForgot" class="modal fade centered-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered login_dialog">
        <div class="myLoader"></div>
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">
                <i class="fa_icon form_close"></i>
            </button>
            <div class="modal-body">
                <form action="{{ route('password.email') }}" method="POST">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>{{ __('adminWords.error_msg') }}</strong><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{ @csrf_field() }}
                    <div class="ms_register_img">
                        <img src="{{ asset('assets/images/register_img.png') }}" alt="" class="img-fluid"/>
                    </div>
                    <div class="ms_register_form">
                        <h2>{{ __('adminWords.forgot_password') }}</h2>
                        <div class="form-group">
                            <input id="userForgotEmail" name="email" required type="text" placeholder="{{ __('adminWords.enter').' '.__('adminWords.email') }}" class="form-control require">
                            <span class="form_icon">
                                    <i class="fa_icon form-envelope" aria-hidden="true"></i>
                                </span>
                        </div>
                        <input type="submit" id="forgotButton" class="ms_btn pointer" value="{{ __('frontWords.send_pass') }}">
                        <div class="auth_controls">
                            <p>{{ __('frontWords.forgot_pass_msg') }}</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="ms_create_playlist_modal">
    <div id="create_playlist_modal" class="modal  centered-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa_icon form_close"></i>
                </button>
                <div class="modal-body">
                    <div class="ms_share_img">
                        <img src="{{ asset('assets/images/svg/playlist.svg') }}" class="img-fluid" alt="Playlist">
                    </div>
                    <div class="ms_share_text">
                        <h1>{{ __('frontWords.create_playlist') }}</h1>
                        <input type="text" name="playlist_name" id="playlist_name" class="form-control require" placeholder="{{ __('frontWords.playlist').' '.__('adminWords.name') }}">
                        <div class="clr_modal_btn">
                            <a href="javascript:void(0);" class="ms_btn create_new_playlist">{{ __('frontWords.create') }}</a>
                            <button class="hst_loader hide"><i class="fa fa-circle-o-notch fa-spin"></i>
                                {{ __('frontWords.loading') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ms_add_in_playlist_modal">
    <div id="add_in_playlist_modal" class="modal  centered-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa_icon form_close"></i>
                </button>
                <div class="modal-body">
                    <div class="ms_share_img">
                        <img src="{{ asset('assets/images/svg/playlist.svg') }}" class="img-fluid" alt="Playlist">
                    </div>
                    <div class="ms_share_text">
                        <h1>{{ __('frontWords.playlist') }}</h1>
                        <select name="playlistname" class="form-control">
                            @php
                                if(isset($playlist) && sizeof($playlist) > 0){
                                    foreach($playlist as $list){
                                        echo '<option value="'.$list->id.'">'.$list->playlist_name.'</option>';
                                    }
                                }else{
                                    echo '<option value="">'.__('adminWords.select').' '.__('frontWords.playlist').'</option>';
                                }
                            @endphp
                        </select>
                        <div class="clr_modal_btn">
                            <a href="javascript:void(0);" class="add_in_playlist ms_add_in_playlist ms_btn ms_btn_pad">
                                {{ __('adminWords.add').' '.__('adminWords.to').' '.__('frontWords.playlist') }}
                            </a>
                            <a href="javascript:void(0);" class="ms_btn ms_btn_pad create_playlist">
                                {{ __('adminWords.create').' '.__('frontWords.playlist')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ms_share_music_modal">
    <div id="ms_share_music_modal_id" class="modal  centered-modal hide" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa_icon form_close"></i>
                </button>
                <div class="modal-body">
                    <div class="ms_share_img">
                        <img src="{{ url('assets/images/svg/sharing.svg') }}" class="img-fluid" alt="Share">
                    </div>
                    <div class="foo_sharing ms_share_text">
                        <h1>{{ __('frontWords.share_with') }}</h1>
                        <ul>
                            <li><a href="javascript:void(0);" class="ms_share_facebook" onclick=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:void(0);" class="ms_share_linkedin" onclick=""><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:void(0);" class="ms_share_twitter" onclick=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:void(0);" class="ms_share_googleplus" onclick=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ms_share_music_modal">
    <div id="ms_lyric_modal_id" class="modal  centered-modal hide" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa_icon form_close"></i>
                </button>
                <div class="modal-body">
                    <div class="lyric_box box_open_dv">
                        @if(isset($is_single) && isset($audio) && sizeof($audio) > 0)
                            <h4>{{ $audio[0]->audio_title }}</h4>
                            @php
                                if($audio[0]->lyrics != ""){
                                    echo htmlspecialchars_decode($audio[0]->lyrics);
                                }else{
                                    echo '<p>'.__('frontWords.lyrics_err').'</p>';
                                }
                            @endphp
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ms_clear_modal">
    <div id="clear_modal" class="modal  centered-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa_icon form_close"></i>
                </button>
                <div class="modal-body">
                    <h1>{{ __('frontWords.clear_queue') }}</h1>
                    <div class="clr_modal_btn">
                        <a href="javascript:void(0);" class="ms_btn ms_remove_all">{{ __('frontWords.clear_all') }}</a>
                        <a href="javascript:void(0);" class="ms_btn ms_cancel">{{ __('frontWords.cancel') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="pricingPlanModal" class="modal fade centered-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered login_dialog">

        <input type="hidden" value="" id="planDetail"/>
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">
                <i class="fa_icon form_close"></i>
            </button>
            <div class="modal-body">
                <form id="userPlanPayment" method="post" action="{{ route('login') }}" data-modal="1" data-redirect="{{ url('/home') }}">
                    @csrf
                    <div class="ms_register_img">
                        <img src="{{ asset('assets/images/register_img.png') }}" alt="" class="img-fluid"/>
                    </div>
                    <div class="ms_register_form">
                        <h2>{{ __('frontWords.payment_gateway') }}</h2>
                        <div class="form-group">
                            <select name="payment_method" class="form-control" id="startPayment">
                                @php
                                    if(isset($payments) && sizeof($payments) > 0){
                                            echo '<option value="">'.__('frontWords.select_pay_method').'</option>';
                                        foreach($payments as $payment){
                                            echo '<option value="'.$payment->gateway_name.'">'.$payment->gateway_name.'</option>';
                                        }
                                    }else{
                                        echo '<option value="">'.__('frontWords.select_pay_method').'</option>';
                                    }
                                @endphp
                            </select>
                        </div>
                        <div class="paymentGateway">
                            <input type="button" class="ms_btn" value="Purchase Now" id="purchasePlan"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

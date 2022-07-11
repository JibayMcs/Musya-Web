@extends('layouts.front.main')
@section('title', __('frontWords.artist'))
@section('content')

    <!---Artist page--->
    <div class="ms_artist_wrapper common_pages_space">
        <div class="ms_artist_inner">
            <!-- Trending section -->
            <div class="ms_artist_slider trending_artist_slider">
                <div class="slider_heading_wrap">
                    <div class="slider_cheading">
                        <h4 class="cheading_title">{{ __('frontWords.recently_added').' '.__('frontWords.artists') }} &nbsp;</h4>
                    </div>
                    <!-- Add Arrows -->
                    <div class="slider_cmn_controls">
                        <div class="slider_cmn_nav "><span class="swiper-button-next1 slider_nav_next"></span></div>
                        <div class="slider_cmn_nav"><span class="swiper-button-prev1 slider_nav_prev"></span></div>
                    </div>
                </div>
                <div class="ms_artist_innerslider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                            @forelse($recentlyAdded as $artist)
                                <div class="swiper-slide play_btn play_icon_btn">
                                    <div class="slider_cbox slider_artist_box text-center play_box_container">
                                        <div class="slider_cimgbox slider_artist_imgbox play_box_img">
                                            <img src="{{$artist->picture}}" alt="" class="img-fluid">
                                        </div>
                                        <div class="ms_play_icon play_music" data-musicid="{{$artist->id}}" data-musictype="artist" data-url="{{route('song.play')}}">
                                            <img src="{{asset('images/svg/play.svg')}}" alt="play icone">
                                        </div>
                                        <div class="slider_ctext slider_artist_text">
                                            <a class="slider_ctitle slider_artist_ttl limited_text_line getAjaxRecord" data-type="artist"
                                               href="{{route('artists.show', $artist->id)}}">{{$artist->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="ms_empty_data">
                                    <p>@lang('frontWords.no_artists')</p>
                                </div>
                            @endforelse

                        </div>
                    </div>
                </div>

            </div>
            <!-- Recommended Artists section -->
            <div class="ms_artist_slider recommended_artist_slider">
                <div class="slider_heading_wrap">
                    <div class="slider_cheading">
                        <h4 class="cheading_title">{{ __("frontWords.all_artists") }} &nbsp;</h4>
                    </div>
                </div>
                <div class="ms_artist_innerslider">
                    <div class="row">
                        @foreach($artists as $artist)
                            <div class="col-md-12 col-xl-3 p-5">

                                <div class="slider_cbox slider_artist_box text-center play_box_container">
                                    <div class="slider_cimgbox slider_artist_imgbox play_box_img">
                                        <img src="{{$artist->picture}}" alt="" class="img-fluid">
                                    </div>
                                    <div class="ms_play_icon play_music" data-musicid="{{$artist->id}}" data-musictype="artist" data-url="{{route('song.play')}}">
                                        <img src="{{asset('images/svg/play.svg')}}" alt="play icone">
                                    </div>
                                    <div class="slider_ctext slider_artist_text">
                                        <a class="slider_ctitle slider_artist_ttl limited_text_line getAjaxRecord" data-type="artist"
                                           href="{{route('artists.show', $artist->id)}}">{{$artist->name}}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{--@include('layouts.front.footer')--}}
    </div>
@endsection

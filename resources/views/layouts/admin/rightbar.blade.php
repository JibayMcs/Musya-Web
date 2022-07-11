<!-- Header Start -->
<header class="header-wrapper main-header">
    <div class="header-inner-wrapper">
        <div class="header-right">
            <div class="header-left">
                <div class="header-links">
                    <a href="javascript:void(0);" class="toggle-btn">
                        <span></span>
                    </a>
                </div>
            </div>
            <div class="header-controls">
                
                {{--<div class="notification-wrapper header-links">
                    <div class="languagebar">

                        <label class="mb-0 toltiped ml-2" data-original-title="This change will reflect the whole website">

                            <svg class="mr-2" height="20px" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 469.333 469.333" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><g xmlns="http://www.w3.org/2000/svg"><g><g><path d="M253.227,300.267L253.227,300.267L199.04,246.72l0.64-0.64c37.12-41.387,63.573-88.96,79.147-139.307h62.507V64H192     V21.333h-42.667V64H0v42.453h238.293c-14.4,41.173-36.907,80.213-67.627,114.347c-19.84-22.08-36.267-46.08-49.28-71.467H78.72     c15.573,34.773,36.907,67.627,63.573,97.28l-108.48,107.2L64,384l106.667-106.667l66.347,66.347L253.227,300.267z" fill="currentColor" data-original="#000000"/><path d="M373.333,192h-42.667l-96,256h42.667l24-64h101.333l24,64h42.667L373.333,192z M317.333,341.333L352,248.853     l34.667,92.48H317.333z" fill="currentColor" data-original="#000000"/></g></g></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g></g></svg>
                        </label>
                        <div class="dropdown">
                            @inject('languages', 'Modules\Language\Entities\Language')
                            @php
                                $getDefault = $languages->where('is_default', 1)->get();
                            @endphp
                            <a class="dropdown-toggle" href="#" role="button" id="languagelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="live-icon">{{ (sizeof($getDefault) > 0 ? ucfirst($getDefault[0]->language_name) : 'English') }}</span><span class="feather icon-chevron-down live-icon"></span></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languagelink">
                                @php
                                    $getLang = $languages->where('status', 1)->get();
                                    if(sizeof($getLang) > 0){
                                        foreach($getLang as $lang){
                                            $flag = 'flag-icon-'.strtolower($lang->language_code);
                                            echo '<a class="dropdown-item '.(Session::get('locale') == $lang->language_code ? 'active' : '').'" href="'.url('locale/'.$lang->language_code).'"><i class="flag '.$flag.' flag-icon-squared"></i>'.ucfirst($lang->language_name).'</a>';
                                        }
                                    }
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>   --}}

                <div class="user-info-wrapper header-links">
                    <a href="javascript:void(0);" class="user-info">
                        @if(isset(Auth::user()->image) &&  file_exists(public_path('images/user/'.Auth::user()->image)))
                            <img src="{{ asset('images/user/'.Auth::user()->image) }}" alt="" class="user-img">
                        @else
                            <img src="{{ asset('assets/images/users/profile.svg') }}" alt="" class="user-img">
                        @endif
                        <div class="blink-animation">
                            <span class="blink-circle"></span>
                            <span class="main-circle"></span>
                        </div>
                    </a>
                    <div class="user-info-box">
                        <div class="drop-down-header">
                            <h4>{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}</h4>
                        </div>
                        <ul>
                            <li>
                                <a target="_blank" href="{{ url('/home') }}">
                                    <i class="fas fa-eye mr-2"></i>{{ __('adminWords.live_preview') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('edit/'.Auth::user()->id) }}">
                                    <i class="far fa-edit mr-1"></i> {{ __('adminWords.my_profile') }}
                                </a>
                            </li>
                            <li>
                                <a id="logout"><i class="fas fa-sign-out-alt mr-2"></i>{{ __('adminWords.logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">  {{ csrf_field() }}</form>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>

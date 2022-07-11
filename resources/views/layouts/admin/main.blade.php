<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title> @yield('title')</title>

    @if(isset($settings['favicon']))
        <link rel="shortcut icon" href="{{ asset('images/sites/'.$settings['favicon']) }}">
    @endif

    <link href="{{ asset('assets/css/admin/fonts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/admin/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    @yield('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <link href="{{ asset('assets/css/admin/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/admin/icofont.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/admin/nice-select.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/css/admin/style.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" id="theme-change" type="text/css" href="#">

    <script>var adminBaseUrl = '{{url("/")}}'</script>
</head>
<body class="musioo_body_layout vertical-layout">

<div id="page-wrapper musioo-container">
    @include('layouts.admin.rightbar')
    @include('layouts.admin.leftbar')
    <div class="page-wrapper">
        <div class="main-content">
            @yield('content')

            <div class="musioo-footer footerbar text-center ad-footer-btm">
                <footer class="footer">
                    <p class="mb-0">{{ isset($settings['copyrightText']) ? $settings['copyrightText'] : '' }}</p>
                </footer>
            </div>
        </div>
    </div>
</div>
<!-- Preview Setting Box -->
<div class="slide-setting-box">
    <div class="slide-setting-holder">
        <div class="setting-box-head">
            <h4>{{ __('adminWords.admin').' '.__('adminWords.dashboard') }}</h4>
            <a href="javascript:void(0);" class="close-btn">{{ __('adminWords.close') }}</a>
        </div>
    </div>
</div>
<!-- Preview Setting -->
<script>
    var jsDynamicText = '<?php echo json_encode(['create' => __('adminWords.create'), 'add' => __('adminWords.add'), 'update' => __('adminWords.update'), 'fileType' => __('adminWords.file_type'), 'chooseImage' => __('adminWords.choose_image'), 'imgExtErr' => __('adminWords.img_ext'), 'dimensionErr' => __('adminWords.dimension_err'), 'selectImgErr' => __('adminWords.select_image'), 'pleaseChoose' => __('adminWords.choose'), 'blogCat' => __('adminWords.blog_cat'), 'audioGenre' => __('adminWords.audio_genre'), 'artistGenre' => __('adminWords.artist_genres'), 'notification' => __('adminWords.notification'), 'language' => __('adminWords.language'), 'delete_records' => __('adminWords.delete_records'), 'cantUndone' => __('adminWords.cantUndone'), 'delete' => __('adminWords.delete'), 'currency' => __('adminWords.currency'), 'ok' => __('adminWords.ok'), 'update_rate_text' => __('adminWords.update_rate_text'), 'are_u_sure' => __('adminWords.are_u_sure'), 'make_default' => __('adminWords.make_default'), 'default_curr' => __('adminWords.default_curr'), 'playlistGenre' => __('frontWords.playlist') . ' ' . __('adminWords.genre'), 'city' => __('adminWords.city'), 'country' => __('adminWords.country'), 'state' => __('adminWords.state'), 'select' => __('adminWords.select')]) ?>';
</script>

<script src="{{ asset('assets/js/admin/jquery.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{ asset('assets/js/admin/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/admin/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/admin/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/admin/nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/admin/custom.js') }}"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/js/valid.js') }}"></script>
<script src="{{ asset('assets/js/submit.js') }}"></script>
@yield('script')

</body>
</html>

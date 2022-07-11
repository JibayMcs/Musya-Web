{{--@section('title', __('adminWords.dashboard'))--}}
@extends('layouts.admin.main')

@section('content')
    <!-- Container Start -->

    <!-- Page Title Start -->
    <div class="row">
        <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title-wrapper">
                <div class="page-title-box">
                    <h4 class="page-title bold">{{ __('adminWords.dashboard') }}</h4>
                </div>
                <div class="breadcrumb-list">
                    <ul>
                        <li class="breadcrumb-link">
                            <a href="{{url('/admin')}}"><i class="fas fa-home mr-2"></i>{{ __('adminWords.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-link active">{{ __('adminWords.admin') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Start -->
    <div class="dashboard-info-boxes">
        <div class="dashboard-info-sections">
            <!-- Start Card-->
            <div class="card ad-info-card">
                <a href="{{ url('users') }}" target="_blank">
                    <div class="card-body dd-flex align-items-center">
                        <div class="icon-info">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 64 64"
                                 style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
                                    <path xmlns="http://www.w3.org/2000/svg"
                                          d="M59.923,35.052,51,31.333v-2.67A9.948,9.948,0,0,0,55.8,22H56a3,3,0,0,0,.082-6l.98-2.272a8.078,8.078,0,0,0-4.07-10.551L50.2,1.907A10.248,10.248,0,0,0,39.968,3.019L38.412,4.193a6.259,6.259,0,0,0-3.8,2.831,6.2,6.2,0,0,0-.552,5.216,10.372,10.372,0,0,0-4.561.111,8.047,8.047,0,0,0-4.507-9.173L22.2,1.907A10.248,10.248,0,0,0,11.968,3.019L10.412,4.193a6.23,6.23,0,0,0-4.03,8.822L7.876,16A3,3,0,0,0,8,22h.2A9.962,9.962,0,0,0,13,28.661v2.672L4.077,35.052A4.987,4.987,0,0,0,1,39.667V53a1,1,0,0,0,1,1H9v8a1,1,0,0,0,1,1H54a1,1,0,0,0,1-1V54h7a1,1,0,0,0,1-1V39.667A4.987,4.987,0,0,0,59.923,35.052ZM35.373,14.727,38.164,16a6.078,6.078,0,0,1,3.061,7.939l-.3.685L39.9,22.553a1,1,0,0,0-1.5-.353l-1.6,1.2a8,8,0,0,1-9.6,0l-1.6-1.2a.989.989,0,0,0-.829-.173,1,1,0,0,0-.666.526L23,24.771l-.826-1.651A4.229,4.229,0,0,1,25.954,17a4.671,4.671,0,0,1,3.893,2.083l.314.472,1.664-1.11-.314-.471A6.661,6.661,0,0,0,27.74,15.25,8.213,8.213,0,0,1,35.373,14.727ZM42,29h1a1,1,0,0,1,0,2H42ZM29,40.539a9.992,9.992,0,0,0,6,0v2.047l-3,3-3-3ZM32,39a8.009,8.009,0,0,1-8-8V27.236l1.358-2.717L26,25a10,10,0,0,0,12,0l.642-.481L40,27.236V31A8.009,8.009,0,0,1,32,39ZM22,31H21a1,1,0,0,1,0-2h1ZM9,51.04V52H3V39.667A2.994,2.994,0,0,1,4.846,36.9l9.539-3.974A1,1,0,0,0,15,32V28.064a1.046,1.046,0,0,0-.579-.907,7.968,7.968,0,0,1-4.372-6.267A1,1,0,0,0,9.055,20H8a1,1,0,0,1,0-2H9a1,1,0,0,0,1-1.007l-.007-1a1,1,0,0,0-.105-.44L8.171,12.12A4.228,4.228,0,0,1,11.059,6.1a1.025,1.025,0,0,0,.391-.179l1.72-1.3a8.218,8.218,0,0,1,8.2-.89L24.164,5a6.078,6.078,0,0,1,3.061,7.939l-.162.375a9.687,9.687,0,0,0-1.093.705L24.393,15.2l0,0a6.221,6.221,0,0,0-4.014,8.812L21.875,27H21a3,3,0,0,0,0,6h1.2A10.024,10.024,0,0,0,27,39.647V42.24L12.662,46.223A5.014,5.014,0,0,0,9,51.04ZM53,61H47V53H45v8H19V53H17v8H11V51.04a3.007,3.007,0,0,1,2.2-2.89l14.509-4.03,3.587,3.587a1,1,0,0,0,1.414,0l3.587-3.587L50.8,48.15A3.007,3.007,0,0,1,53,51.04Zm8-9H55v-.96a5.014,5.014,0,0,0-3.662-4.817L37,42.24V39.647A10.024,10.024,0,0,0,41.8,33H43a3,3,0,0,0,0-6h-.918l.98-2.271a8.078,8.078,0,0,0-4.07-10.551l-2.32-1.057-.5-1A4.228,4.228,0,0,1,39.059,6.1a1.025,1.025,0,0,0,.391-.179l1.72-1.3a8.218,8.218,0,0,1,8.2-.89L52.164,5a6.078,6.078,0,0,1,3.061,7.939L54.075,15.6a1,1,0,0,0-.082.4l.007,1A1,1,0,0,0,55,18h1a1,1,0,0,1,0,2H54.945a1,1,0,0,0-.994.89,7.964,7.964,0,0,1-4.4,6.279,1,1,0,0,0-.555.895V32a1,1,0,0,0,.615.923L59.154,36.9A2.994,2.994,0,0,1,61,39.667Z"
                                          fill="currentColor" data-original="#000000"/>
                                </g></svg>
                        </div>
                        <div class="icon-info-text">
                            <h5 class="ad-title">{{ __('adminWords.users') }}</h5>
                            <h4 class="ad-card-title">0</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Start Card-->
        <div class="dashboard-info-sections">
            <div class="card ad-info-card">
                <a href="{{ url('audio') }}" target="_blank">
                    <div class="card-body dd-flex align-items-center">
                        <div class="icon-info">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0"
                                 viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
                                    <g xmlns="http://www.w3.org/2000/svg" id="XMLID_1043_">
                                        <g id="XMLID_694_">
                                            <path id="XMLID_697_"
                                                  d="m255.985 210.001c-25.364 0-46 20.636-46 46s20.636 46 46 46 46-20.636 46-46-20.635-46-46-46zm0 72c-14.336 0-26-11.663-26-26s11.664-26 26-26 26 11.663 26 26-11.663 26-26 26z"
                                                  fill="currentColor" data-original="#000000"/>
                                            <path id="XMLID_726_"
                                                  d="m255.985 162.001c-51.832 0-94 42.168-94 94s42.168 94 94 94 94-42.168 94-94-42.168-94-94-94zm0 168c-40.804 0-74-33.196-74-74s33.196-74 74-74 74 33.196 74 74-33.196 74-74 74z"
                                                  fill="currentColor" data-original="#000000"/>
                                            <path id="XMLID_729_"
                                                  d="m511.594 7.232c-1.529-5.307-7.07-8.364-12.378-6.84l-50.946 14.682c-4.806.729-8.489 4.878-8.489 9.887v71.132c-4.718-2.913-10.05-4.921-15.756-5.775-21.235-21.549-45.991-38.6-73.657-50.684-29.824-13.027-61.579-19.633-94.382-19.633-63.038 0-122.303 24.548-166.877 69.123-44.574 44.574-69.123 103.839-69.123 166.877 0 30.368 5.656 59.777 16.803 87.595-7.116 2.872-13.783 7.182-19.543 12.941-22.976 22.977-22.976 60.362 0 83.339l69.196 69.196c1.953 1.952 4.512 2.929 7.071 2.929s5.119-.977 7.071-2.929l44.633-44.633c33.937 18.053 72.067 27.562 110.769 27.562 46.681 0 91.817-13.608 130.531-39.354 4.599-3.059 5.848-9.266 2.789-13.865-3.058-4.599-9.266-5.847-13.864-2.789-35.421 23.558-76.729 36.009-119.456 36.009-33.365 0-66.257-7.722-95.912-22.418l9.707-9.707c22.976-22.977 22.976-60.362 0-83.339-20.747-20.745-53.24-22.76-76.267-6.04-10.909-7.922-23.944-11.63-36.847-11.142-11.064-26.387-16.68-54.39-16.68-83.354 0-119.103 96.897-216 216-216 53.482 0 103.659 19.14 143.146 54.233-13.824 6.882-23.35 21.155-23.35 37.617 0 23.159 18.841 42 42 42 12.549 0 23.822-5.539 31.525-14.292 14.88 29.804 22.679 62.801 22.679 96.442 0 42.729-12.452 84.035-36.009 119.455-3.059 4.599-1.81 10.807 2.789 13.864 1.703 1.133 3.626 1.675 5.529 1.675 3.235 0 6.41-1.567 8.336-4.463 25.747-38.712 39.355-83.85 39.355-130.531 0-42.159-11.216-83.4-32.465-119.52.168-1.521.261-3.064.261-4.629v-99.28l44.973-12.961c5.305-1.532 8.367-7.073 6.838-12.38zm-411.011 363.448c15.179-15.178 39.876-15.177 55.054 0 15.178 15.178 15.178 39.875 0 55.054l-62.125 62.125-62.125-62.125c-15.178-15.179-15.178-39.876 0-55.054 7.589-7.589 17.559-11.384 27.527-11.384s19.938 3.795 27.527 11.384c3.906 3.904 10.237 3.904 14.142 0zm317.198-216.828c-12.131 0-22-9.869-22-22s9.869-22 22-22 22 9.869 22 22-9.869 22-22 22z"
                                                  fill="currentColor" data-original="#000000"/>
                                            <path id="XMLID_737_"
                                                  d="m255.985 444.668c104.031 0 188.667-84.636 188.667-188.667 0-5.522-4.477-10-10-10s-10 4.478-10 10c0 93.003-75.664 168.667-168.667 168.667-5.523 0-10 4.478-10 10s4.477 10 10 10z"
                                                  fill="currentColor" data-original="#000000"/>
                                            <path id="XMLID_738_"
                                                  d="m245.985 387.334c0 5.522 4.477 10 10 10 77.932 0 141.333-63.401 141.333-141.333 0-5.522-4.477-10-10-10s-10 4.478-10 10c0 66.903-54.43 121.333-121.333 121.333-5.523 0-10 4.478-10 10z"
                                                  fill="currentColor" data-original="#000000"/>
                                            <path id="XMLID_739_"
                                                  d="m415.795 405.811c-2.63 0-5.21 1.061-7.08 2.92-1.86 1.87-2.92 4.44-2.92 7.08 0 2.63 1.06 5.21 2.92 7.07 1.87 1.86 4.44 2.93 7.08 2.93 2.63 0 5.21-1.069 7.07-2.93s2.93-4.44 2.93-7.07c0-2.64-1.07-5.21-2.93-7.08-1.86-1.86-4.44-2.92-7.07-2.92z"
                                                  fill="currentColor" data-original="#000000"/>
                                        </g>
                                    </g>
                                </g></svg>
                        </div>
                        <div class="icon-info-text">
                            <h5 class="ad-title">{{ __('adminWords.song') }}</h5>
                            <h4 class="ad-card-title">0</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Start Card-->
        <div class="dashboard-info-sections">
            <div class="card ad-info-card">
                <a href="{{ url('artist') }}" target="_blank">
                    <div class="card-body dd-flex align-items-center">
                        <div class="icon-info">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 64 64"
                                 style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <rect x="17.757" y="32" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -16.8909 25.2218)" width="8.485" height="2" fill="currentColor" data-original="#000000"/>
                                        <path
                                            d="M54,53H11.243C9.455,53,8,51.546,8,49.758c0-0.867,0.337-1.681,0.95-2.293L13,43.414l1.293,1.293   C14.48,44.895,14.735,45,15,45h4c0.265,0,0.52-0.105,0.707-0.293L34.414,30H38c0.265,0,0.52-0.105,0.707-0.293l2-2   C40.902,27.512,41,27.256,41,27c7.168,0,13-5.832,13-13S48.168,1,41,1S28,6.832,28,14c-0.256,0-0.512,0.098-0.707,0.293l-2,2   C25.105,16.48,25,16.734,25,17v3.586L10.293,35.293C10.105,35.48,10,35.734,10,36v4c0,0.266,0.105,0.52,0.293,0.707L11.586,42   l-4.05,4.05C6.545,47.04,6,48.356,6,49.758C6,52.648,8.352,55,11.243,55H54c1.103,0,2,0.897,2,2s-0.897,2-2,2H24.816   c-0.414-1.161-1.514-2-2.816-2h-6c-0.552,0-1,0.447-1,1v1h-4v2h4v1c0,0.553,0.448,1,1,1h6c1.302,0,2.402-0.839,2.816-2H54   c2.206,0,4-1.794,4-4S56.206,53,54,53z M41,3c6.065,0,11,4.935,11,11s-4.935,11-11,11c-0.58,0-1.159-0.049-1.725-0.139L36.914,22.5   l8.793-8.793c0.391-0.391,0.391-1.023,0-1.414l-3-3c-0.391-0.391-1.023-0.391-1.414,0L32.5,18.086l-2.361-2.361   C30.049,15.158,30,14.579,30,14C30,7.935,34.935,3,41,3z M35.5,21.086L33.914,19.5L42,11.414L43.586,13L35.5,21.086z M27,17.414   l1-1L38.586,27l-1,1h-3.172L27,20.586V17.414z M26,22.414L32.586,29L31,30.586L24.414,24L26,22.414z M12,36.414l11-11L29.586,32   l-11,11h-3.172L12,39.586V36.414z M22,61h-5v-2h5c0.551,0,1,0.448,1,1S22.551,61,22,61z"
                                            fill="currentColor" data-original="#000000"/>
                                        <path
                                            d="M53,30c0,1.654,1.346,3,3,3s3-1.346,3-3v-7.586l2.293,2.293l1.414-1.414l-4-4c-0.286-0.287-0.716-0.374-1.09-0.217   C57.244,19.23,57,19.596,57,20v7.184C56.686,27.072,56.352,27,56,27C54.346,27,53,28.346,53,30z M56,29c0.551,0,1,0.448,1,1   s-0.449,1-1,1s-1-0.448-1-1S55.449,29,56,29z"
                                            fill="currentColor" data-original="#000000"/>
                                        <path
                                            d="M37.617,37.076C37.244,37.23,37,37.596,37,38v7.184C36.686,45.072,36.352,45,36,45c-1.654,0-3,1.346-3,3s1.346,3,3,3   s3-1.346,3-3v-7.586l2.293,2.293l1.414-1.414l-4-4C38.42,37.007,37.991,36.919,37.617,37.076z M36,49c-0.551,0-1-0.448-1-1   s0.449-1,1-1s1,0.448,1,1S36.551,49,36,49z"
                                            fill="currentColor" data-original="#000000"/>
                                        <path
                                            d="M10,24c0,1.654,1.346,3,3,3s3-1.346,3-3v-7.586l2.293,2.293l1.414-1.414l-4-4c-0.287-0.287-0.716-0.374-1.09-0.217   C14.244,13.23,14,13.596,14,14v7.184C13.686,21.072,13.352,21,13,21C11.346,21,10,22.346,10,24z M13,23c0.551,0,1,0.448,1,1   s-0.449,1-1,1s-1-0.448-1-1S12.449,23,13,23z"
                                            fill="currentColor" data-original="#000000"/>
                                        <path
                                            d="M62.316,45.052c-1.582-0.528-2.841-1.787-3.368-3.368C58.812,41.275,58.431,41,58,41s-0.812,0.275-0.949,0.684   c-0.527,1.581-1.786,2.84-3.368,3.368C53.275,45.188,53,45.569,53,46s0.275,0.812,0.684,0.948c1.582,0.528,2.841,1.787,3.368,3.368   C57.188,50.725,57.569,51,58,51s0.812-0.275,0.949-0.684c0.527-1.581,1.786-2.84,3.368-3.368C62.725,46.812,63,46.431,63,46   S62.725,45.188,62.316,45.052z M58,47.804c-0.492-0.7-1.104-1.312-1.804-1.804c0.701-0.492,1.312-1.104,1.804-1.804   c0.492,0.7,1.104,1.312,1.804,1.804C59.104,46.492,58.492,47.104,58,47.804z"
                                            fill="currentColor" data-original="#000000"/>
                                        <path
                                            d="M6.949,10.316c0.527-1.581,1.786-2.84,3.368-3.368C10.725,6.812,11,6.431,11,6s-0.275-0.812-0.684-0.948   C8.734,4.523,7.476,3.265,6.949,1.684C6.812,1.275,6.431,1,6,1S5.188,1.275,5.051,1.684c-0.527,1.581-1.786,2.84-3.368,3.368   C1.275,5.188,1,5.569,1,6s0.275,0.812,0.684,0.948c1.582,0.528,2.841,1.787,3.368,3.368C5.188,10.725,5.569,11,6,11   S6.812,10.725,6.949,10.316z M4.196,6C4.896,5.508,5.508,4.896,6,4.196C6.492,4.896,7.104,5.508,7.804,6   C7.104,6.492,6.492,7.104,6,7.804C5.508,7.104,4.896,6.492,4.196,6z"
                                            fill="currentColor" data-original="#000000"/>
                                    </g>
                                </g></svg>
                        </div>
                        <div class="icon-info-text">
                            <h5 class="ad-title">{{ __('adminWords.artists') }}</h5>
                            <h4 class="ad-card-title">0</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Start Card-->
        <div class="dashboard-info-sections">
            <div class="card ad-info-card">
                <a href="{{ url('album') }}" target="_blank">
                    <div class="card-body dd-flex align-items-center">
                        <div class="icon-info">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 512 512"
                                 style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
                                    <g xmlns="http://www.w3.org/2000/svg" transform="translate(1 1)">
                                        <g>
                                            <g>
                                                <path
                                                    d="M451.267,101.4H434.2V58.733c0-5.12-3.413-8.533-8.533-8.533H408.6V7.533c0-5.12-3.413-8.533-8.533-8.533H109.933     c-5.12,0-8.533,3.413-8.533,8.533V50.2H84.333c-5.12,0-8.533,3.413-8.533,8.533V101.4H58.733c-5.12,0-8.533,3.413-8.533,8.533     v392.533c0,5.12,3.413,8.533,8.533,8.533h392.533c5.12,0,8.533-3.413,8.533-8.533V109.933     C459.8,104.813,456.387,101.4,451.267,101.4z M118.467,16.067h273.067V50.2H118.467V16.067z M92.867,67.267h17.067h290.133     h17.067V101.4H92.867V67.267z M442.733,493.933H67.267V118.467h17.067h341.333h17.067V493.933z"
                                                    fill="currentColor" data-original="#000000"/>
                                                <path
                                                    d="M355.693,186.733l-153.6,25.6c-3.413,0.853-6.827,4.267-6.827,8.533v42.667v87.593     c-9.076-6.736-21.05-10.793-34.133-10.793c-28.16,0-51.2,18.773-51.2,42.667c0,23.893,23.04,42.667,51.2,42.667     c28.16,0,51.2-18.773,51.2-42.667V270.929l136.533-22.756v60.286c-9.076-6.736-21.05-10.793-34.133-10.793     c-28.16,0-51.2,18.773-51.2,42.667c0,23.893,23.04,42.667,51.2,42.667s51.2-18.773,51.2-42.667v-102.4v-42.667     c0-2.56-1.707-5.12-3.413-6.827C360.813,186.733,358.253,186.733,355.693,186.733z M161.133,408.6     C142.36,408.6,127,397.507,127,383c0-14.507,15.36-25.6,34.133-25.6c18.773,0,34.133,11.093,34.133,25.6     C195.267,397.507,179.907,408.6,161.133,408.6z M212.333,227.693l136.533-23.04v25.6l-136.533,23.04V227.693z M314.733,365.933     c-18.773,0-34.133-11.093-34.133-25.6c0-14.507,15.36-25.6,34.133-25.6c18.773,0,34.133,11.093,34.133,25.6     C348.867,354.84,333.507,365.933,314.733,365.933z"
                                                    fill="currentColor" data-original="#000000"/>
                                            </g>
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                </g></svg>
                        </div>
                        <div class="icon-info-text">
                            <h5 class="ad-title">{{ __('adminWords.albums') }}</h5>
                            <h4 class="ad-card-title">0</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Start Card-->
        <div class="dashboard-info-sections">
            <div class="card ad-info-card">
                <a href="{{ url('coupon_management') }}" target="_blank">
                    <div class="card-body dd-flex align-items-center">
                        <div class="icon-info">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 512 512"
                                 style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
                                    <g xmlns="http://www.w3.org/2000/svg" id="Line_stroke_cut_Ex" data-name="Line stroke cut Ex">
                                        <g>
                                            <path
                                                d="m56 240a8 8 0 0 0 8 8h176a8 8 0 0 0 8-8v-96a8 8 0 0 0 -8-8h-58.7a27.836 27.836 0 0 0 2.7-12v-20a8 8 0 0 0 -8-8h-28a27.917 27.917 0 0 0 -20 8.423 27.917 27.917 0 0 0 -20-8.423h-28a8 8 0 0 0 -8 8v20a27.836 27.836 0 0 0 2.7 12h-10.7a8 8 0 0 0 -8 8zm16-40h32v32h-32zm48 32v-32h112v32zm112-48h-112v-32h112zm-84-72h20v12a12.013 12.013 0 0 1 -12 12h-20v-12a12.013 12.013 0 0 1 12-12zm-60 12v-12h20a12.013 12.013 0 0 1 12 12v12h-20a12.013 12.013 0 0 1 -12-12zm16 28v32h-32v-32z"
                                                fill="currentColor" data-original="#000000"/>
                                            <path
                                                d="m392 56a8 8 0 0 0 -8-8h-76a28.032 28.032 0 0 0 -28 28v12a8 8 0 0 0 8 8h76a28.032 28.032 0 0 0 28-28zm-16 12a12.013 12.013 0 0 1 -12 12h-68v-4a12.013 12.013 0 0 1 12-12h68z"
                                                fill="currentColor" data-original="#000000"/>
                                            <path d="m56 56h56v16h-56z" fill="currentColor" data-original="#000000"/>
                                            <path d="m128 56h120v16h-120z" fill="currentColor" data-original="#000000"/>
                                            <path d="m280 120h32v16h-32z" fill="currentColor" data-original="#000000"/>
                                            <path d="m328 120h64v16h-64z" fill="currentColor" data-original="#000000"/>
                                            <path d="m360 160h32v16h-32z" fill="currentColor" data-original="#000000"/>
                                            <path d="m280 160h64v16h-64z" fill="currentColor" data-original="#000000"/>
                                            <path d="m456.178 374.324a8.006 8.006 0 0 0 -.178 1.676v128h16v-127.152l8.394-39.172-15.645-3.352z" fill="currentColor" data-original="#000000"/>
                                            <path
                                                d="m495.845 262.431-28.785-143.921a28.075 28.075 0 0 0 -27.46-22.51h-7.6v-62a18.021 18.021 0 0 0 -18-18h-380a18.021 18.021 0 0 0 -18 18v62h16v-62a2 2 0 0 1 2-2h380a2 2 0 0 1 2 2v236c0 .469-.1 2-1.395 2h-10.76l-61.6-77a8 8 0 0 0 -10.9-1.512l-9.507 6.791a67.949 67.949 0 0 0 -26.493 71.721h-261.345a2 2 0 0 1 -2-2v-158h-16v158a18.021 18.021 0 0 0 18 18h15.415l31.814 113.019a17.993 17.993 0 0 0 22.2 12.449l140.126-39.445-10.141 20.733a8 8 0 0 0 3.671 10.7l3.594 1.758a67.419 67.419 0 0 0 42.612 5.724l-6.758 13.817a8 8 0 0 0 3.671 10.7l3.594 1.758a68.128 68.128 0 0 0 68.2-4.893v69.68h16v-136a8.008 8.008 0 0 0 -1.183-4.188l-49.1-79.939c-.029-.046-.058-.093-.088-.139a51.95 51.95 0 0 1 13.516-70.434l3.342-2.388 59.268 74.088a8 8 0 0 0 6.247 3h14.605c9.754 0 17.395-7.906 17.395-18v-158h7.6a12.034 12.034 0 0 1 11.767 9.647l28.46 142.3-11.653 54.38 15.644 3.352 12-56a8.007 8.007 0 0 0 .027-3.248zm-244.472 132.033 12.841-26.256 61.967-17.443-8.909 18.213a52.008 52.008 0 0 1 -65.9 25.486zm100.627 18.836a52.08 52.08 0 0 1 -57.508 13.159l10.638-21.749a67.53 67.53 0 0 0 26.516-28.7l10.587-21.646 9.767 15.9zm-22.722-80.031-230.178 64.796a2 2 0 0 1 -2.468-1.382l-30.595-108.683h235.533q1.188 2.187 2.551 4.315z"
                                                fill="currentColor" data-original="#000000"/>
                                        </g>
                                    </g>
                                </g></svg>
                        </div>
                        <div class="icon-info-text">
                            <h5 class="ad-title">{{ __('adminWords.coupons') }}</h5>
                            <h4 class="ad-card-title">0</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="dash-graph-wrapper">
        <div class="row">
            <div class="col-xl-6 col-lg-12 col-md-12">
                <div class="card chart-card">
                    <div class="card-header">
                        <h4 class="has-btn">
                            {{ __('adminWords.monthly_user').date('Y') }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="chart-holder">
                                    <div id="chartG"></div>
                                    {{--                                    <input type="hidden" id="userMonthCount" value="{{ json_encode($userMonthCount) }}" data-label="{{ __('adminWords.monthly_user').date('Y') }}">--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12">
                <div class="card chart-card">
                    <div class="card-header">
                        <h4 class="has-btn">
                            {{ __('adminWords.monthly_subs').date('Y') }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="chart-holder">
                                    <div id="chartGG"></div>
                                    {{--                                    <input type="hidden" id="subsMonthCount" value="{{ json_encode($subsMonthCount) }}" data-label="{{ __('adminWords.monthly_subs').date('Y') }}">--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--@if(isset($settings['latest_subs']) && $settings['latest_subs'] == 1)
        <!-- Latest Subscription -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card chart-card">
                    <div class="card-header">
                        <h4 class="has-btn">{{ __('adminWords.latest_subs') }}
                            <span>
                                    <a href="{{ url('subscription') }}" class="effect-btn btn btn-primary sm-btn" target="_blank">{{ __('adminWords.all').' '.__('adminWords.subscriptions') }}</a>
                                </span>
                        </h4>
                    </div>
                    <div class="card-body pb-4">
                        <div class="chart-holder">
                            <div class="table-responsive">
                                <table class="table table-styled mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('adminWords.txn_id') }}</th>
                                        <th>{{ __('adminWords.customer_name') }}</th>
                                        <th>{{ __('adminWords.quantity') }}</th>
                                        <th>{{ __('adminWords.payment_method') }}</th>
                                        <th>{{ __('adminWords.total_price') }}</th>
                                        <th>{{ __('adminWords.txn_date') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(sizeof($recent_subscription) > 0)
                                        @foreach($recent_subscription as $subscription)
                                            @php
                                                $getPlan = select(['column' => 'plan_name', 'table' => 'plans', 'where' => ['id' => $subscription->plan_id]]);
                                                $subs = json_decode($subscription->payment_data)[0];
                                                $arr = [];
                                                if(strpos($subs->payment_gateway, '_') != ''){
                                                    $arr = explode('_', $subs->payment_gateway);
                                                }
                                            @endphp
                                            <tr>
                                                <td>#</td>
                                                <td><a href="{{ url('user/invoice/'.$subscription->id.'/'.$subs->order_id.'/1') }}" target="_blank">{{ $subs->order_id }}</a></td>
                                                <td>{{ $subs->user_name }}</td>
                                                <td>1</td>
                                                <td><label class="mb-0 badge badge-info toltiped" data-original-title=""
                                                           title="{{ !empty($arr) ? ucfirst($arr[0]).' '.ucfirst($arr[1]) : $subs->payment_gateway }}">{{ !empty($arr) ? ucfirst($arr[0]).' '.ucfirst($arr[1]) : $subs->payment_gateway }}</label>
                                                </td>
                                                <td>{{ $subs->currency.$subs->amount }}</td>
                                                <td><label class="mb-0 badge badge-success toltiped" data-original-title=""
                                                           title="{{ date('d-m-Y', strtotime($subscription->created_at)) }}">{{ date('d-m-Y', strtotime($subscription->created_at)) }}</label></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <td colspan="6" class="text-center">{{ __('adminWords.no_data') }}</td>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif--}}


    <div class="dash-recent-data-wrapper">

        <!-- HTML New -->
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="card chart-card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                <h4>{{ __('adminWords.recently_added') }}</h4>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                                <div class="widgets-chart-tabs">
                                    <ul class="nav" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="tabA-tab" data-toggle="pill" href="#tabA" role="tab" aria-controls="tabA" aria-selected="true">
                                                {{ __('adminWords.audio') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabB-tab" data-toggle="pill" href="#tabB" role="tab" aria-controls="tabB" aria-selected="false">
                                                {{ __('adminWords.album') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabA" role="tabpanel" aria-labelledby="tabA-tab">
                                <div class="tab-wrapper">
                                    <div class="content-holder audio-alubm-wrapper">
                                        <div class="table-responsive">
                                            <table class="table table-styled mb-0">
                                                <tbody>
                                                {{--@php
                                                    $song = 1;
                                                    $albm = 1;
                                                    $user = 1;
                                                @endphp
                                                @if(sizeof($recent_track) > 0)
                                                    @foreach($recent_track as $track)
                                                        <tr>
                                                            <td>
                                                                {{ $song++ }}
                                                            </td>
                                                            <td>
                                                                        <span class="img-thumb">
                                                                            <img src="{{ asset('images/audio/thumb/'.$track->image) }}" alt="">
                                                                        </span>
                                                            </td>
                                                            <td>
                                                                        <span class="text-desc">
                                                                            <span>{{ $track->audio_title }}</span>
                                                                        </span>
                                                            </td>
                                                            <td class="text-right">
                                                                <label class="mb-0 badge badge-success toltiped " title="" data-original-title="{{ date('d-m-Y', strtotime($track->created_at)) }}">
                                                                    {{ date('d-m-Y', strtotime($track->created_at)) }}
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else--}}
                                                <p>{{ __('frontWords.no_track') }}</p>
                                                {{--                                                @endif--}}
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="view-btn-wrap">
                                            <a href="{{ url('audio') }}" target="_blank" class="effect-btn btn btn-primary mt-2">
                                                {{ __('adminWords.view_all').' '.__('adminWords.audio') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabB" role="tabpanel" aria-labelledby="tabB-tab">
                                <div class="tab-wrapper">
                                    <div class="content-holder audio-alubm-wrapper">
                                        <div class="table-responsive">
                                            <table class="table table-styled mb-0">
                                                <tbody>
                                                {{--@if(sizeof($recent_album) > 0)
                                                    @foreach($recent_album as $album)
                                                        <tr>
                                                            <td>
                                                                {{ $albm++ }}
                                                            </td>
                                                            <td>
                                                                        <span class="img-thumb">
                                                                            <img src="{{ asset('images/album/'.$album->image) }}"/>
                                                                        </span>
                                                            </td>
                                                            <td>
                                                                        <span class="text-desc">
                                                                            <span>{{ $album->album_name }}</span>
                                                                        </span>
                                                            </td>
                                                            <td class="text-right">
                                                                <label class="mb-0 badge badge-success toltiped " title=""
                                                                       data-original-title="{{ date('d-m-Y', strtotime($album->created_at)) }}">{{ date('d-m-Y', strtotime($album->created_at)) }}</label>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else--}}
                                                <p>{{ __('frontWords.no_album') }}</p>
                                                {{--                                                @endif--}}

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="view-btn-wrap">
                                            <a href="{{ url('album') }}" class="effect-btn btn btn-primary mt-2" target="_blank">
                                                {{ __('adminWords.view_all').' '.__('adminWords.album') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card table-card users-wrap">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('adminWords.recent_users') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-holder">
                            <div class="table-responsive">
                                <table class="table table-styled mb-0">
                                    <tbody>
                                    {{--@if(sizeof($recent_users) > 0)
                                        @foreach($recent_users as $users)
                                            <tr>
                                                <td>
                                                    {{ $user++ }}
                                                </td>
                                                <td>
                                                            <span class="img-thumb">
                                                                @if(!empty($users->image))
                                                                    <img src="{{ asset('images/user/'.$users->image) }}"/>
                                                                @else
                                                                    <img src="{{ asset('images/user/user1-1651222429.webp') }}"/>
                                                                @endif
                                                            </span>
                                                </td>
                                                <td>
                                                            <span class="text-desc">
                                                                <span>{{ $users->name }}</span>
                                                            </span>
                                                </td>
                                                <td class="text-right">
                                                    <label class="mb-0 badge badge-success toltiped " title="" data-original-title="{{ date('d-m-Y', strtotime($users->created_at)) }}">
                                                        {{ date('d-m-Y', strtotime($users->created_at)) }}
                                                    </label>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else--}}
                                    <p>{{ __('frontWords.no_user') }}</p>
                                    {{--                                    @endif--}}

                                    </tbody>
                                </table>
                            </div>
                            <div class="view-btn-wrap">
                                <a href="{{ url('users') }}" target="_blank" class="effect-btn btn btn-primary mt-2">
                                    {{ __('adminWords.view_all').' '.__('adminWords.users') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('assets/js/admin/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/control-chart-apexcharts.js') }}"></script>
@endsection

<!DOCTYPE html>

<html>

<head>

    <title>@yield('title')</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Logo -->
    <link rel="icon" href="{{ asset('logo/logo-sm.png') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ url('https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,700,900&amp;subset=latin,latin-ext') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ url('https://fonts.googleapis.com/css?family=PT+Serif:700italic,700,400italic&amp;subset=latin,cyrillic-ext,latin-ext,cyrillic') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('landing-page/assets/style/jquery.qtip.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('landing-page/assets/style/jquery-ui.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('landing-page/assets/style/superfish.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('landing-page/assets/style/flexnav.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('landing-page/assets/style/DateTimePicker.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('landing-page/assets/style/fancybox/jquery.fancybox.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('landing-page/assets/style/fancybox/helpers/jquery.fancybox-buttons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('landing-page/assets/style/revolution/layers.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('landing-page/assets/style/revolution/settings.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('landing-page/assets/style/revolution/navigation.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('landing-page/assets/style/base.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('landing-page/assets/style/responsive.css') }}" />

    <script type="text/javascript" src="{{ asset('landing-page/assets/script/jquery.min.js') }}"></script>

</head>

{{-- <body class="template-page-home"> --}}

<body class="@yield('template')">

    @stack('style')

    <!-- Header -->
    <div class="
        @if (Request::routeIs('landingPage*.home')) template-header
        @elseif (Request::routeIs('landingPage*.booking'))
        template-header template-header-background
        template-header-background-1
        @elseif (Request::routeIs('landingPage*.contact'))
        template-header template-header-background template-header-background-2 @endif
    "
        style="
    @if (Request::routeIs('landingPage*.booking')) background-image: url('landing-page/assets/media/image/header/header_01.jpg');
     @elseif (Request::routeIs('landingPage*.contact'))
        background-image: url('landing-page/assets/media/image/header/header_02.jpg'); @endif">



        <!-- Top header -->
        <div class="template-header-top">

            <!-- Logo -->
            <div class="template-header-top-logo">
                <a href="{{ url('/') }}" title="">
                    <img src="{{ asset('logo/logo-sm.png') }}" alt="logo" class="template-logo" />
                    <img src="{{ asset('logo/logo-sm.png') }}" alt="logo"
                        class="template-logo template-logo-sticky" />
                </a>
            </div>

            <!-- Menu-->
            <div class="template-header-top-menu template-main">
                @include('layouts.component_landingpage.navbar')
            </div>

            <!-- Social icons -->
            <div class="template-header-top-icon-list template-component-social-icon-list-1">
                <ul class="template-component-social-icon-list">
                    <li><a href="{{ url('https://twitter.com/quanticalabs') }}" class="template-icon-social-twitter"
                            target="_blank"></a></li>
                    <li><a href="{{ url('https://www.facebook.com/QuanticaLabs') }}"
                            class="template-icon-social-facebook" target="_blank"></a></li>
                    <li><a href="#" class="template-icon-meta-menu"></a></li>
                </ul>
            </div>

        </div>

        <div class="template-header-bottom">

            @if (Request::routeIs('landingPage.home'))
                <div id="rev_slider_wrapper" class="rev_slider_wrapper fullwidthbanner-container">

                    <div id="rev_slider" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
                        <ul>
                            @forelse ($carousel as $item)
                                <li data-index="slide-1-{{ $item->id }}" data-transition="fade" data-slotamount="1"
                                    data-easein="default" data-easeout="default" data-masterspeed="500" data-rotate="0"
                                    data-delay="6000">
                                    <!-- Main image -->
                                    <img src="{{ Storage::url($item->image_carousel) }}"
                                        alt="slide-1-{{ $item->id }}" data-bgfit="cover"
                                        data-bgposition="center bottom">
                                    <!-- Layers -->
                                    <!-- Layer 01 -->
                                    <div class="tp-caption tp-resizeme"
                                        data-x="['center','center','center','center','center']"
                                        data-hoffset="['0','0','0','0','0']"
                                        data-y="['middle','middle','middle','middle','middle']"
                                        data-voffset="['-120','-105','-91','-33','-36']"
                                        data-fontsize="['17','17','17','15','14']"
                                        data-fontweight="['700','700','700','700','900']"
                                        data-lineheight="['17','17','17','15','27']"
                                        data-whitespace="['nowrap','nowrap','nowrap','nowrap','normal']"
                                        data-width="['auto','auto','auto','auto','300']" data-height="auto"
                                        data-basealign="grid" data-transform_idle="o:1;"
                                        data-transform_in="o:1;x:[175%];y:0px;z:0px;s:2000;e:Power4.easeInOut;"
                                        data-transform_out="o:0;x:0px;y:0px;z:0px;s:1000;e:Power4.easeInOut;"
                                        data-mask_in="x:[-100%];y:0px;s:inherit;e:inherit;"
                                        data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="100"
                                        data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                        style="letter-spacing: 2px;">

                                        {{ $item->header_carousel }}
                                    </div>

                                    <!-- Layer 02 -->
                                    <div class="tp-caption tp-resizeme"
                                        data-x="['center','center','center','center','center']"
                                        data-hoffset="['0','0','0','0','0']"
                                        data-y="['middle','middle','middle','middle','middle']"
                                        data-voffset="['-41','-35','-29','17','26']"
                                        data-fontsize="['62','55','43','29','22']"
                                        data-fontweight="['900','900','900','700','700']"
                                        data-lineheight="['62','55','43','29','32']"
                                        data-whitespace="['nowrap','nowrap','nowrap','nowrap','normal']"
                                        data-width="['auto','auto','auto','auto','300']" data-height="auto"
                                        data-basealign="grid" data-transform_idle="o:1;"
                                        data-transform_in="o:1;x:0px;y:[100%];z:0px;s:2000;e:Power4.easeInOut;"
                                        data-transform_out="o:1;x:0px;y:[100%];z:0px;s:1000;e:Power4.easeInOut;"
                                        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                        data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1000"
                                        data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                        style="letter-spacing: 4px;">

                                        {{ $item->sub_header_carousel }}
                                    </div>

                                    {{-- <!-- Layer 03 -->
                            <div class="tp-caption tp-resizeme"
                                data-x="['center','center','center','center','center']"
                                data-hoffset="['0','0','0','0','0']"
                                data-y="['middle','middle','middle','middle','middle']"
                                data-voffset="['41','35','29','60','74']"
                                data-fontsize="['62','55','43','29','22']"
                                data-fontweight="['900','900','900','700','700']"
                                data-lineheight="['62','55','43','29','32']"
                                data-whitespace="['nowrap','nowrap','nowrap','nowrap','normal']"
                                data-width="['auto','auto','auto','auto','300']" data-height="auto"
                                data-basealign="grid" data-transform_idle="o:1;"
                                data-transform_in="o:1;x:0px;y:[100%];z:0px;s:2000;e:Power4.easeInOut;"
                                data-transform_out="o:1;x:0px;y:[100%];z:0px;s:1000;e:Power4.easeInOut;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1500"
                                data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                style="letter-spacing: 4px;">

                                IN GREAT HANDS WITH US
                            </div> --}}

                                    <!-- Layer 04 -->
                                    <div class="tp-caption tp-resizeme"
                                        data-x="['center','center','center','center','center']"
                                        data-hoffset="['0','0','0','0','0']"
                                        data-y="['middle','middle','middle','middle','middle']"
                                        data-voffset="['150','137','121','142','165']"
                                        data-fontsize="['15','15','15','15','15']"
                                        data-fontweight="['400','400','400','400','400']"
                                        data-lineheight="['15','15','15','15','15']"
                                        data-whitespace="['nowrap','nowrap','nowrap','nowrap','nowrap']"
                                        data-width="['auto','auto','auto','auto','auto']" data-height="auto"
                                        data-basealign="grid" data-transform_idle="o:1;"
                                        data-transform_in="o:1;x:0px;y:[-100%];z:0px;s:1500;e:Power4.easeInOut;"
                                        data-transform_out="o:1;x:0px;y:[100%];z:0px;s:750;e:Power4.easeInOut;"
                                        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                        data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="2500"
                                        data-splitin="none" data-splitout="none" data-responsive_offset="on">

                                        <a class="template-component-button template-color-white"
                                            href="{{ route('landingPage.booking') }}"
                                            title="Purchase Template">Booking
                                            Now!</a>
                                    </div>
                                </li>

                            @empty
                                <li data-index="slide-1" data-transition="fade" data-slotamount="1"
                                    data-easein="default" data-easeout="default" data-masterspeed="500"
                                    data-rotate="0" data-delay="6000">
                                    <!-- Main image -->
                                    <img src="{{ asset('landing-page/assets/media/image/header/header_06.png') }}"
                                        alt="slide-1" data-bgfit="cover" data-bgposition="center bottom">
                                    <!-- Layers -->
                                    <!-- Layer 01 -->
                                    <div class="tp-caption tp-resizeme"
                                        data-x="['center','center','center','center','center']"
                                        data-hoffset="['0','0','0','0','0']"
                                        data-y="['middle','middle','middle','middle','middle']"
                                        data-voffset="['-120','-105','-91','-33','-36']"
                                        data-fontsize="['17','17','17','15','14']"
                                        data-fontweight="['700','700','700','700','900']"
                                        data-lineheight="['17','17','17','15','27']"
                                        data-whitespace="['nowrap','nowrap','nowrap','nowrap','normal']"
                                        data-width="['auto','auto','auto','auto','300']" data-height="auto"
                                        data-basealign="grid" data-transform_idle="o:1;"
                                        data-transform_in="o:1;x:[175%];y:0px;z:0px;s:2000;e:Power4.easeInOut;"
                                        data-transform_out="o:0;x:0px;y:0px;z:0px;s:1000;e:Power4.easeInOut;"
                                        data-mask_in="x:[-100%];y:0px;s:inherit;e:inherit;"
                                        data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="100"
                                        data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                        style="letter-spacing: 2px;">

                                        WELCOME TO AUTOSPA HAND CAR WASH
                                    </div>

                                    <!-- Layer 02 -->
                                    <div class="tp-caption tp-resizeme"
                                        data-x="['center','center','center','center','center']"
                                        data-hoffset="['0','0','0','0','0']"
                                        data-y="['middle','middle','middle','middle','middle']"
                                        data-voffset="['-41','-35','-29','17','26']"
                                        data-fontsize="['62','55','43','29','22']"
                                        data-fontweight="['900','900','900','700','700']"
                                        data-lineheight="['62','55','43','29','32']"
                                        data-whitespace="['nowrap','nowrap','nowrap','nowrap','normal']"
                                        data-width="['auto','auto','auto','auto','300']" data-height="auto"
                                        data-basealign="grid" data-transform_idle="o:1;"
                                        data-transform_in="o:1;x:0px;y:[100%];z:0px;s:2000;e:Power4.easeInOut;"
                                        data-transform_out="o:1;x:0px;y:[100%];z:0px;s:1000;e:Power4.easeInOut;"
                                        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                        data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1000"
                                        data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                        style="letter-spacing: 4px;">

                                        YOUR CAR IS ALWAYS
                                    </div>

                                    <!-- Layer 03 -->
                                    <div class="tp-caption tp-resizeme"
                                        data-x="['center','center','center','center','center']"
                                        data-hoffset="['0','0','0','0','0']"
                                        data-y="['middle','middle','middle','middle','middle']"
                                        data-voffset="['41','35','29','60','74']"
                                        data-fontsize="['62','55','43','29','22']"
                                        data-fontweight="['900','900','900','700','700']"
                                        data-lineheight="['62','55','43','29','32']"
                                        data-whitespace="['nowrap','nowrap','nowrap','nowrap','normal']"
                                        data-width="['auto','auto','auto','auto','300']" data-height="auto"
                                        data-basealign="grid" data-transform_idle="o:1;"
                                        data-transform_in="o:1;x:0px;y:[100%];z:0px;s:2000;e:Power4.easeInOut;"
                                        data-transform_out="o:1;x:0px;y:[100%];z:0px;s:1000;e:Power4.easeInOut;"
                                        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                        data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1500"
                                        data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                        style="letter-spacing: 4px;">

                                        IN GREAT HANDS WITH US
                                    </div>

                                    <!-- Layer 04 -->
                                    <div class="tp-caption tp-resizeme"
                                        data-x="['center','center','center','center','center']"
                                        data-hoffset="['0','0','0','0','0']"
                                        data-y="['middle','middle','middle','middle','middle']"
                                        data-voffset="['150','137','121','142','165']"
                                        data-fontsize="['15','15','15','15','15']"
                                        data-fontweight="['400','400','400','400','400']"
                                        data-lineheight="['15','15','15','15','15']"
                                        data-whitespace="['nowrap','nowrap','nowrap','nowrap','nowrap']"
                                        data-width="['auto','auto','auto','auto','auto']" data-height="auto"
                                        data-basealign="grid" data-transform_idle="o:1;"
                                        data-transform_in="o:1;x:0px;y:[-100%];z:0px;s:1500;e:Power4.easeInOut;"
                                        data-transform_out="o:1;x:0px;y:[100%];z:0px;s:750;e:Power4.easeInOut;"
                                        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                        data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="2500"
                                        data-splitin="none" data-splitout="none" data-responsive_offset="on">

                                        <a class="template-component-button template-color-white"
                                            href="{{ route('landingPage.booking') }}"
                                            title="Purchase Template">Booking
                                            Now!</a>
                                    </div>
                                </li>
                            @endforelse
                            <!-- Slide 1 -->

                        </ul>
                    </div>
                </div>
            @elseif (Request::routeIs('landingPage.booking'))
                <div class="template-main">

                    <div class="template-header-bottom-page-title">
                        <h1>Booking Cuci Mobil</h1>
                    </div>

                    <div class="template-header-bottom-page-breadcrumb">
                        <a href="{{ route('landingPage.home') }}">Home</a><span
                            class="template-icon-meta-arrow-right-12"></span><a
                            href="{{ route('landingPage.booking') }}">Booking Cuci Mobil</a>
                    </div>

                </div>
            @elseif (Request::routeIs('landingPage.contact'))
                <div class="template-main">
                    <div class="template-header-bottom-page-title">
                        <h1>Contact</h1>
                    </div>

                    <div class="template-header-bottom-page-breadcrumb">
                        <a href="{{ route('landingPage.home') }}">Home</a><span
                            class="template-icon-meta-arrow-right-12"></span><a
                            href="{{ route('landingPage.contact') }}">Contact</a>
                    </div>

                </div>
            @endif
            <!--/-->

            <!-- Slider JS -->
            <script type="text/javascript">
                var tpj = jQuery;
                var revapi4;
                tpj(document).ready(function() {
                    if (tpj("#rev_slider").revolution == undefined) {
                        revslider_showDoubleJqueryError("#rev_slider");
                    } else {
                        revapi4 = tpj("#rev_slider").show().revolution({
                            jsFileLocation: "script/",
                            sliderType: "standard",
                            sliderLayout: "fullwidth",
                            dottedOverlay: "none",
                            delay: 9000,
                            responsiveLevels: [1920, 1189, 959, 767, 479],
                            gridwidth: [1170, 940, 750, 460, 300],
                            gridheight: [750, 600, 550, 550, 550],
                            lazyType: "none",
                            navigation: {
                                keyboardNavigation: "on",
                                mouseScrollNavigation: "off",
                                onHoverStop: "on",
                                keyboard_direction: "horizontal",
                                touch: {
                                    touchenabled: "on",
                                    swipe_treshold: 75,
                                    swipe_min_touches: 1,
                                    drag_block_vertical: false,
                                    swipe_direction: "horizontal",
                                },
                                arrows: {
                                    style: "preview1",
                                    enable: true,
                                    hide_onmobile: true,
                                    hide_onleave: true,
                                    hide_delay: 200,
                                    hide_delay_mobile: 1500,
                                    hide_under: 0,
                                    hide_over: 9999,
                                    tmp: '',
                                    left: {
                                        h_align: "left",
                                        v_align: "center",
                                        h_offset: 0,
                                        v_offset: 0,
                                    },
                                    right: {
                                        h_align: "right",
                                        v_align: "center",
                                        h_offset: 0,
                                        v_offset: 0,
                                    }
                                },
                                bullets: {
                                    style: "preview1",
                                    enable: true,
                                    hide_onmobile: true,
                                    hide_onleave: true,
                                    hide_delay: 200,
                                    hide_delay_mobile: 1500,
                                    hide_under: 0,
                                    hide_over: 9999,
                                    direction: "horizontal",
                                    h_align: "center",
                                    v_align: "bottom",
                                    space: 10,
                                    h_offset: 0,
                                    v_offset: 20,
                                    tmp: '<span class="tp-bullet-image"></span><span class="tp-bullet-title"></span>'
                                },
                            },
                            shadow: 0,
                            spinner: "spinner1",
                            stopAfterLoops: -1,
                            stopAtSlide: -1,
                            disableProgressBar: "on",
                            shuffle: "off",
                            autoHeight: "off",
                            hideSliderAtLimit: 0,
                            hideCaptionAtLimit: 0,
                            hideAllCaptionAtLilmit: 0,
                            debugMode: false,
                            fallbacks: {
                                simplifyAll: "off",
                                nextSlideOnWindowFocus: "off",
                                disableFocusListener: false,
                            }
                        });
                    }
                }); /*ready*/
            </script>

        </div>

    </div>

    <!-- Content -->
    <div class="template-content">

        @yield('contentLandingPage')

    </div>
    {{-- <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#template-booking').booking();
        });
    </script> --}}

    <!-- Footer -->
    <div class="template-footer">

        <div class="template-main">

            @include('layouts.component_landingpage.footer')

        </div>

    </div>

    <!-- Search box -->
    <div class="template-component-search-form">
        <div></div>
        <form>
            <div>
                <input type="search" name="search" />
                <span class="template-icon-meta-search"></span>
                <input type="submit" name="submit" value="" />
            </div>
        </form>
    </div>

    <!-- Go to top button -->
    <a href="#go-to-top" class="template-component-go-to-top template-icon-meta-arrow-large-tb"></a>

    <!-- Wrapper for date picker -->
    <div id="dtBox"></div>

    @stack('script')


    <!-- JS files -->
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/superfish.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/jquery.easing.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/jquery.blockUI.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/jquery.qtip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/jquery.fancybox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/jquery.actual.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/jquery.flexnav.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/jquery.waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/sticky.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/jquery.scrollTo.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/jquery.fancybox-media.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/jquery.fancybox-buttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/jquery.carouFredSel.packed.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/jquery.responsiveElement.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/jquery.touchSwipe.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/DateTimePicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('http://maps.google.com/maps/api/js') }}"></script>

    <!-- Revolution Slider files -->
    <script type="text/javascript"
        src="{{ asset('landing-page/assets/script/revolution/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('landing-page/assets/script/revolution/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('landing-page/assets/script/revolution/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('landing-page/assets/script/revolution/extensions/revolution.extension.carousel.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('landing-page/assets/script/revolution/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('landing-page/assets/script/revolution/extensions/revolution.extension.layeranimation.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('landing-page/assets/script/revolution/extensions/revolution.extension.migration.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('landing-page/assets/script/revolution/extensions/revolution.extension.navigation.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('landing-page/assets/script/revolution/extensions/revolution.extension.parallax.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('landing-page/assets/script/revolution/extensions/revolution.extension.slideanims.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('landing-page/assets/script/revolution/extensions/revolution.extension.video.min.js') }}"></script>

    <!-- Plugins files -->
    <script type="text/javascript" src="{{ asset('landing-page/assets/plugin/booking/jquery.booking.js') }}"></script>

    <!-- Components files -->
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/template/jquery.template.tab.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/template/jquery.template.image.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/template/jquery.template.helper.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/template/jquery.template.header.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/template/jquery.template.counter.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/template/jquery.template.gallery.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/template/jquery.template.goToTop.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/template/jquery.template.fancybox.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/template/jquery.template.moreLess.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/template/jquery.template.googleMap.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/template/jquery.template.accordion.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/template/jquery.template.searchForm.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/template/jquery.template.testimonial.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('landing-page/assets/script/public.js') }}"></script>

</body>

</html>

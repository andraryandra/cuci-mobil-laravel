@extends('layouts.landing-page')
@section('title', 'Landing Page - Home')
@section('template', 'template-page-home')
@section('contentLandingPage')

    <!-- Section -->
    <div class="template-section template-section-padding-1 template-clear-fix template-main">

        <!-- Header + subheader -->
        <div class="template-component-header-subheader">
            <h2>Who Is Autospa</h2>
            <div></div>
            <span>Car wash &amp; detailling service</span>
        </div>

        <!-- Layout 33x66% -->
        <div class="template-layout-33x66 template-clear-fix">

            <!-- Left column -->
            <div class="template-layout-column-left">
                <img src="{{ asset('landing-page/assets/media/image/sample/460x678/image_01.jpg') }}" alt="" />
            </div>

            <!-- Right column -->
            <div class="template-layout-column-right">

                <!-- Text -->
                <p class="template-padding-reset">
                    Autospa Hand Wash is an eco-friendly, hand car wash and detailing service based in Portland.
                    Our company was founded back in 2005 by a team of experts with more then 10 years of
                    professional car wash experience.
                    We operate three car washes throught Portland area. Our goal is to provide our customers with
                    the friendliest, most convenient
                    hand car wash experience possible. We use the most modern and up-to-date water reclamation
                    modules as a part of our car wash systems.
                    Our products are all biodegradable and eco-friendly.
                </p>

                <!-- Feature list -->
                <div class="template-component-feature-list template-component-feature-list-position-top template-clear-fix">

                    <!-- Layout 50x50% -->
                    <ul class="template-layout-50x50 template-clear-fix">

                        <!-- Left column -->
                        <li class="template-layout-column-left template-margin-bottom-reset">
                            <div class="template-component-space template-component-space-2"></div>
                            <span class="template-icon-feature-water-drop"></span>
                            <h5>The Best Car Wash</h5>
                            <ul class="template-component-list">
                                <li><span class="template-icon-meta-check"></span>We offer multiple services at a
                                    great value</li>
                                <li><span class="template-icon-meta-check"></span>Multiple car wash locations
                                    throughout Portland</li>
                                <li><span class="template-icon-meta-check"></span>Biodegradable and eco-friendly
                                    products</li>
                                <li><span class="template-icon-meta-check"></span>Pay for your wash electronically
                                    and securely</li>
                                <li><span class="template-icon-meta-check"></span>Trained and skilled car wash crew
                                    members</li>
                            </ul>
                        </li>

                        <!-- Right column -->
                        <li class="template-layout-column-right template-margin-bottom-reset">
                            <div class="template-component-space template-component-space-2"></div>
                            <span class="template-icon-feature-user-chat"></span>
                            <h5>Contacting Us</h5>
                            <ul class="template-component-list">
                                <li><span class="template-icon-meta-check"></span>We are very open and easy to
                                    reach company</li>
                                <li><span class="template-icon-meta-check"></span>Our email is checked hourly
                                    during the day</li>
                                <li><span class="template-icon-meta-check"></span>Book an appointment online under
                                    3 minutes</li>
                                <li><span class="template-icon-meta-check"></span>Our tool free number will be
                                    answered</li>
                                <li><span class="template-icon-meta-check"></span>You can pay online for your
                                    appointment</li>
                            </ul>
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!-- Section -->
    <div class="template-section template-section-padding-reset template-clear-fix template-background-color-1">

        <!-- Call to action -->
        <div class="template-component-call-to-action">
            <div class="template-main">
                <h3>No 1. Car Wash Booking System</h3>
                <a href="book-your-wash.html" class="template-component-button">Book Appointment</a>
            </div>
        </div>

    </div>

    <!-- Section -->
    <div
        class="template-section template-background-image template-background-image-5 template-background-image-parallax template-color-white template-clear-fix">

        <!-- Mian -->
        <div class="template-main">

            <!-- Header + subheader -->
            <div class="template-component-header-subheader">
                <h2>Our Process</h2>
                <div></div>
                <span>We know your time is valuable</span>
            </div>

            <!-- Space -->
            <div class="template-component-space template-component-space-1"></div>

            <!-- Process list -->
            <div class="template-component-process-list template-clear-fix">

                <!-- Layout 25x25x25x25% -->
                <ul class="template-layout-25x25x25x25 template-clear-fix template-layout-margin-reset">

                    <!-- Left column -->
                    <li class="template-layout-column-left">
                        <span class="template-icon-feature-check"></span>
                        <h5>1. Booking</h5>
                        <span class="template-icon-meta-arrow-large-rl"></span>
                    </li>

                    <!-- Center left column -->
                    <li class="template-layout-column-center-left">
                        <span class="template-icon-feature-car-check"></span>
                        <h5>2. Inspection</h5>
                        <span class="template-icon-meta-arrow-large-rl"></span>
                    </li>

                    <!-- Center right column -->
                    <li class="template-layout-column-center-right">
                        <span class="template-icon-feature-payment"></span>
                        <h5>3. Valuation</h5>
                        <span class="template-icon-meta-arrow-large-rl"></span>
                    </li>

                    <!-- Right column -->
                    <li class="template-layout-column-right">
                        <span class="template-icon-feature-vacuum-cleaner"></span>
                        <h5>4. Completion</h5>
                    </li>

                </ul>

            </div>

        </div>


    </div>

    <!-- Section -->
    <div class="template-section template-section-padding-1 template-clear-fix template-main">

        <!-- Header + subheader -->
        <div class="template-component-header-subheader">
            <h2>Wash Packages</h2>
            <div></div>
            <span>Which wash is the best for your vehicle?</span>
        </div>

        <!-- Booking -->
        <div class="template-component-booking" id="template-booking">

            <form>

                <ul>

                    <li>

                        <!-- Content -->
                        <div class="template-component-booking-item-content">

                            <!-- Vehicle list -->
                            <ul class="template-component-booking-vehicle-list">

                                <!-- Vehicle -->
                                <li data-id="regular-size-car">

                                    <div>

                                        <!-- Icon -->
                                        <div class="template-icon-vehicle-small-car"></div>

                                        <!-- Name -->
                                        <div>Regular Size Car</div>

                                    </div>

                                </li>

                                <!-- Vehicle -->
                                <li data-id="medium-size-car">
                                    <div>
                                        <div class="template-icon-vehicle-car-mid-size"></div>
                                        <div>Medium Size Car</div>
                                    </div>
                                </li>

                                <!-- Vehicle -->
                                <li data-id="compact-suv">
                                    <div>
                                        <div class="template-icon-vehicle-suv"></div>
                                        <div>Compact SUV</div>
                                    </div>
                                </li>

                                <!-- Vehicle -->
                                <li data-id="minivan">
                                    <div>
                                        <div class="template-icon-vehicle-minivan"></div>
                                        <div>Minivan</div>
                                    </div>
                                </li>

                                <!-- Vehicle -->
                                <li data-id="pickup-truck">
                                    <div>
                                        <div class="template-icon-vehicle-pickup"></div>
                                        <div>Pickup Truck</div>
                                    </div>
                                </li>

                                <!-- Vehicle -->
                                <li data-id="cargo-truck">
                                    <div>
                                        <div class="template-icon-vehicle-truck-mid-size"></div>
                                        <div>Cargo Truck</div>
                                    </div>
                                </li>

                            </ul>

                        </div>

                    </li>

                    <li>

                        <!-- Content -->
                        <div class="template-component-booking-item-content">

                            <!-- Package list -->
                            <ul class="template-component-booking-package-list">

                                <!-- Package -->
                                <li data-id="basic-hand-wash-1"
                                    data-id-vehicle-rel="regular-size-car,compact-suv,minivan,pickup-truck,cargo-truck">

                                    <!-- Header -->
                                    <h4 class="template-component-booking-package-name">Basic Hand Wash</h4>

                                    <!-- Price -->
                                    <div class="template-component-booking-package-price">
                                        <span class="template-component-booking-package-price-currency">$</span>
                                        <span class="template-component-booking-package-price-total">15</span>
                                        <span class="template-component-booking-package-price-decimal">95</span>
                                    </div>

                                    <!-- Duration -->
                                    <div class="template-component-booking-package-duration">
                                        <span class="template-icon-booking-meta-duration"></span>
                                        <span class="template-component-booking-package-duration-value">25</span>
                                        <span class="template-component-booking-package-duration-unit">min</span>
                                    </div>

                                    <!-- Services -->
                                    <ul class="template-component-booking-package-service-list">
                                        <li data-id="exterior-hand-wash">Exterior Hand Wash</li>
                                        <li data-id="towel-hand-dry">Towel Hand Dry</li>
                                        <li data-id="wheel-shine">Wheel Shine</li>
                                    </ul>

                                    <!-- Button -->
                                    <div class="template-component-button-box">
                                        <a href="book-your-wash.html" class="template-component-button">Book
                                            Now</a>
                                    </div>

                                </li>

                                <!-- Package -->
                                <li data-id="basic-hand-wash-2" data-id-vehicle-rel="medium-size-car">

                                    <!-- Header -->
                                    <h4 class="template-component-booking-package-name">Basic Hand Wash</h4>

                                    <!-- Price -->
                                    <div class="template-component-booking-package-price">
                                        <span class="template-component-booking-package-price-currency">$</span>
                                        <span class="template-component-booking-package-price-total">17</span>
                                        <span class="template-component-booking-package-price-decimal">95</span>
                                    </div>

                                    <!-- Duration -->
                                    <div class="template-component-booking-package-duration">
                                        <span class="template-icon-booking-meta-duration"></span>
                                        <span class="template-component-booking-package-duration-value">30</span>
                                        <span class="template-component-booking-package-duration-unit">min</span>
                                    </div>

                                    <!-- Services -->
                                    <ul class="template-component-booking-package-service-list">
                                        <li data-id="exterior-hand-wash">Exterior Hand Wash</li>
                                        <li data-id="towel-hand-dry">Towel Hand Dry</li>
                                        <li data-id="wheel-shine">Wheel Shine</li>
                                    </ul>

                                    <!-- Button -->
                                    <div class="template-component-button-box">
                                        <a href="book-your-wash.html" class="template-component-button">Book
                                            Now</a>
                                    </div>

                                </li>

                                <!-- Package -->
                                <li data-id="deluxe-wash-1"
                                    data-id-vehicle-rel="regular-size-car,compact-suv,minivan,pickup-truck,cargo-truck">
                                    <h4 class="template-component-booking-package-name">Deluxe Wash</h4>
                                    <div class="template-component-booking-package-price">
                                        <span class="template-component-booking-package-price-currency">$</span>
                                        <span class="template-component-booking-package-price-total">27</span>
                                        <span class="template-component-booking-package-price-decimal">95</span>
                                    </div>
                                    <div class="template-component-booking-package-duration">
                                        <span class="template-icon-booking-meta-duration"></span>
                                        <span class="template-component-booking-package-duration-value">45</span>
                                        <span class="template-component-booking-package-duration-unit">min</span>
                                    </div>
                                    <ul class="template-component-booking-package-service-list">
                                        <li data-id="exterior-hand-wash">Exterior Hand Wash</li>
                                        <li data-id="towel-hand-dry">Towel Hand Dry</li>
                                        <li data-id="wheel-shine">Wheel Shine</li>
                                        <li data-id="tire-dressing">Tire Dressing</li>
                                        <li data-id="windows-in-and-out">Windows In &amp; Out</li>
                                        <li data-id="sealer-hand-wax">Sealer Hand Wax</li>
                                    </ul>
                                    <div class="template-component-button-box">
                                        <a href="book-your-wash.html" class="template-component-button">Book
                                            Now</a>
                                    </div>
                                </li>

                                <!-- Package -->
                                <li data-id="deluxe-wash-2" data-id-vehicle-rel="medium-size-car">
                                    <h4 class="template-component-booking-package-name">Deluxe Wash</h4>
                                    <div class="template-component-booking-package-price">
                                        <span class="template-component-booking-package-price-currency">$</span>
                                        <span class="template-component-booking-package-price-total">30</span>
                                        <span class="template-component-booking-package-price-decimal">95</span>
                                    </div>
                                    <div class="template-component-booking-package-duration">
                                        <span class="template-icon-booking-meta-duration"></span>
                                        <span class="template-component-booking-package-duration-value">55</span>
                                        <span class="template-component-booking-package-duration-unit">min</span>
                                    </div>
                                    <ul class="template-component-booking-package-service-list">
                                        <li data-id="exterior-hand-wash">Exterior Hand Wash</li>
                                        <li data-id="towel-hand-dry">Towel Hand Dry</li>
                                        <li data-id="wheel-shine">Wheel Shine</li>
                                        <li data-id="tire-dressing">Tire Dressing</li>
                                        <li data-id="windows-in-and-out">Windows In &amp; Out</li>
                                        <li data-id="sealer-hand-wax">Sealer Hand Wax</li>
                                    </ul>
                                    <div class="template-component-button-box">
                                        <a href="book-your-wash.html" class="template-component-button">Book
                                            Now</a>
                                    </div>
                                </li>

                                <!-- Package -->
                                <li data-id="ultimate-shine-1" data-id-vehicle-rel="regular-size-car,compact-suv,minivan">
                                    <h4 class="template-component-booking-package-name">Ultimate Shine</h4>
                                    <div class="template-component-booking-package-price">
                                        <span class="template-component-booking-package-price-currency">$</span>
                                        <span class="template-component-booking-package-price-total">40</span>
                                        <span class="template-component-booking-package-price-decimal">45</span>
                                    </div>
                                    <div class="template-component-booking-package-duration">
                                        <span class="template-icon-booking-meta-duration"></span>
                                        <span class="template-component-booking-package-duration-value">60</span>
                                        <span class="template-component-booking-package-duration-unit">min</span>
                                    </div>
                                    <ul class="template-component-booking-package-service-list">
                                        <li data-id="exterior-hand-wash">Exterior Hand Wash</li>
                                        <li data-id="towel-hand-dry">Towel Hand Dry</li>
                                        <li data-id="wheel-shine">Wheel Shine</li>
                                        <li data-id="tire-dressing">Tire Dressing</li>
                                        <li data-id="windows-in-and-out">Windows In &amp; Out</li>
                                        <li data-id="sealer-hand-wax">Sealer Hand Wax</li>
                                        <li data-id="interior-vacuum">Interior Vacuum</li>
                                        <li data-id="trunk-vacuum">Trunk Vacuum</li>
                                        <li data-id="door-shuts-and-plastics">Door Shuts &amp; Plastics</li>
                                        <li data-id="dashboard-clean">Dashboard Clean</li>
                                    </ul>
                                    <div class="template-component-button-box">
                                        <a href="book-your-wash.html" class="template-component-button">Book
                                            Now</a>
                                    </div>
                                </li>

                                <!-- Package -->
                                <li data-id="ultimate-shine-2" data-id-vehicle-rel="medium-size-car">
                                    <h4 class="template-component-booking-package-name">Ultimate Shine</h4>
                                    <div class="template-component-booking-package-price">
                                        <span class="template-component-booking-package-price-currency">$</span>
                                        <span class="template-component-booking-package-price-total">52</span>
                                        <span class="template-component-booking-package-price-decimal">95</span>
                                    </div>
                                    <div class="template-component-booking-package-duration">
                                        <span class="template-icon-booking-meta-duration"></span>
                                        <span class="template-component-booking-package-duration-value">80</span>
                                        <span class="template-component-booking-package-duration-unit">min</span>
                                    </div>
                                    <ul class="template-component-booking-package-service-list">
                                        <li data-id="exterior-hand-wash">Exterior Hand Wash</li>
                                        <li data-id="towel-hand-dry">Towel Hand Dry</li>
                                        <li data-id="wheel-shine">Wheel Shine</li>
                                        <li data-id="tire-dressing">Tire Dressing</li>
                                        <li data-id="windows-in-and-out">Windows In &amp; Out</li>
                                        <li data-id="sealer-hand-wax">Sealer Hand Wax</li>
                                        <li data-id="interior-vacuum">Interior Vacuum</li>
                                        <li data-id="trunk-vacuum">Trunk Vacuum</li>
                                        <li data-id="door-shuts-and-plastics">Door Shuts &amp; Plastics</li>
                                        <li data-id="dashboard-clean">Dashboard Clean</li>
                                    </ul>
                                    <div class="template-component-button-box">
                                        <a href="book-your-wash.html" class="template-component-button">Book
                                            Now</a>
                                    </div>
                                </li>

                                <!-- Package -->
                                <li data-id="platinium-works-1" data-id-vehicle-rel="regular-size-car">
                                    <h4 class="template-component-booking-package-name">Platinum Works</h4>
                                    <div class="template-component-booking-package-price">
                                        <span class="template-component-booking-package-price-currency">$</span>
                                        <span class="template-component-booking-package-price-total">65</span>
                                        <span class="template-component-booking-package-price-decimal">95</span>
                                    </div>
                                    <div class="template-component-booking-package-duration">
                                        <span class="template-icon-booking-meta-duration"></span>
                                        <span class="template-component-booking-package-duration-value">100</span>
                                        <span class="template-component-booking-package-duration-unit">min</span>
                                    </div>
                                    <ul class="template-component-booking-package-service-list">
                                        <li data-id="exterior-hand-wash">Exterior Hand Wash</li>
                                        <li data-id="towel-hand-dry">Towel Hand Dry</li>
                                        <li data-id="wheel-shine">Wheel Shine</li>
                                        <li data-id="tire-dressing">Tire Dressing</li>
                                        <li data-id="windows-in-and-out">Windows In &amp; Out</li>
                                        <li data-id="sealer-hand-wax">Sealer Hand Wax</li>
                                        <li data-id="interior-vacuum">Interior Vacuum</li>
                                        <li data-id="trunk-vacuum">Trunk Vacuum</li>
                                        <li data-id="door-shuts-and-plastics">Door Shuts &amp; Plastics</li>
                                        <li data-id="dashboard-clean">Dashboard Clean</li>
                                        <li data-id="air-freshener">Air Freshener</li>
                                        <li data-id="triple-coat-hand-wax">Triple Coat Hand Wax</li>
                                        <li data-id="exterior-vinyl-protectant">Exterior Vinyl Protectant</li>
                                    </ul>
                                    <div class="template-component-button-box">
                                        <a href="book-your-wash.html" class="template-component-button">Book
                                            Now</a>
                                    </div>
                                </li>

                                <!-- Package -->
                                <li data-id="platinium-works-2" data-id-vehicle-rel="medium-size-car">
                                    <h4 class="template-component-booking-package-name">Platinum Works</h4>
                                    <div class="template-component-booking-package-price">
                                        <span class="template-component-booking-package-price-currency">$</span>
                                        <span class="template-component-booking-package-price-total">82</span>
                                        <span class="template-component-booking-package-price-decimal">95</span>
                                    </div>
                                    <div class="template-component-booking-package-duration">
                                        <span class="template-icon-booking-meta-duration"></span>
                                        <span class="template-component-booking-package-duration-value">125</span>
                                        <span class="template-component-booking-package-duration-unit">min</span>
                                    </div>
                                    <ul class="template-component-booking-package-service-list">
                                        <li data-id="exterior-hand-wash">Exterior Hand Wash</li>
                                        <li data-id="towel-hand-dry">Towel Hand Dry</li>
                                        <li data-id="wheel-shine">Wheel Shine</li>
                                        <li data-id="tire-dressing">Tire Dressing</li>
                                        <li data-id="windows-in-and-out">Windows In &amp; Out</li>
                                        <li data-id="sealer-hand-wax">Sealer Hand Wax</li>
                                        <li data-id="interior-vacuum">Interior Vacuum</li>
                                        <li data-id="trunk-vacuum">Trunk Vacuum</li>
                                        <li data-id="door-shuts-and-plastics">Door Shuts &amp; Plastics</li>
                                        <li data-id="dashboard-clean">Dashboard Clean</li>
                                        <li data-id="air-freshener">Air Freshener</li>
                                        <li data-id="triple-coat-hand-wax">Triple Coat Hand Wax</li>
                                        <li data-id="exterior-vinyl-protectant">Exterior Vinyl Protectant</li>
                                    </ul>
                                    <div class="template-component-button-box">
                                        <a href="book-your-wash.html" class="template-component-button">Book
                                            Now</a>
                                    </div>
                                </li>

                            </ul>

                        </div>

                    </li>

                </ul>

            </form>

        </div>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('#template-booking').booking();
            });
        </script>

    </div>

    <!-- Section -->
    <div class="template-section template-section-padding-reset template-clear-fix">

        <!-- Flex layout 50x50% -->
        <div class="template-layout-flex template-background-color-1 template-clear-fix">

            <!-- Left column -->
            <div class="template-background-image template-background-image-1"></div>

            <!-- Right column -->
            <div class="template-section-padding-1">

                <!-- Features list -->
                <div class="template-component-feature-list template-component-feature-list-position-top">

                    <!-- Layout 50x50% -->
                    <ul class="template-layout-50x50 template-clear-fix">

                        <!-- Left column -->
                        <li class="template-layout-column-left">
                            <span class="template-icon-feature-location-map"></span>
                            <h5>Convenience</h5>
                            <p>We are dedicated to providing quality service, customer satisfaction at a great value
                                in multiple locations offering convenient hours.</p>
                        </li>

                        <!-- Right column -->
                        <li class="template-layout-column-right">
                            <span class="template-icon-feature-eco-nature"></span>
                            <h5>Organic products</h5>
                            <p>Our products are eco-friendly and interior products are all organic. We use less than
                                a gallon of water with absolutely zero-waste.</p>
                        </li>

                        <!-- Left column -->
                        <li class="template-layout-column-left">
                            <span class="template-icon-feature-team"></span>
                            <h5>Experienced Team</h5>
                            <p>Our crew members are all trained and skilled and fully equiped with equipment and
                                supplies needed that we can deliver the best results.</p>
                        </li>

                        <!-- Right column -->
                        <li class="template-layout-column-right">
                            <span class="template-icon-feature-spray-bottle"></span>
                            <h5>Great Value</h5>
                            <p>We offer multiple services at a great value to meet your needs. We offer a premium
                                service while saving your time and money.</p>
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!-- Section -->
    <div class="template-section template-clear-fix template-main">

        <!-- Header + subheader -->
        <div class="template-component-header-subheader">
            <h2>Latest Projects</h2>
            <div></div>
            <span>Car wash gallery</span>
        </div>

        <!-- Gallery -->
        <div class="template-component-gallery">

            <!-- Filter buttons list -->
            <ul class="template-component-gallery-filter-list">
                <li><a href="#" class="template-filter-all template-state-selected">All</a></li>
                <li><a href="#" class="template-filter-hand-wash">Hand Wash</a></li>
                <li><a href="#" class="template-filter-auto-detail">Auto Detail</a></li>
                <li><a href="#" class="template-filter-triple-foam">Triple Foam</a></li>
                <li><a href="#" class="template-filter-hand-polish">Hand Polish</a></li>
                <li><a href="#" class="template-filter-hand-wax">Hand Wax</a></li>
            </ul>

            <!-- Images list -->
            <ul class="template-component-gallery-image-list">

                <!-- Image -->
                <li class="template-filter-hand-wash">

                    <div class="template-component-image template-component-image-preloader">

                        <!-- Orginal image -->
                        <a href="{{ asset('landing-page/assets/media/image/sample/460x678/image_01.jpg') }}"
                            class="template-fancybox" data-fancybox-group="gallery-1">

                            <!-- Thumbnail -->
                            <img src="{{ asset('landing-page/assets/media/image/sample/460x678/image_01.jpg') }}"
                                alt="" />

                            <!-- Image hover -->
                            <span class="template-component-image-hover">
                                <span>
                                    <span>
                                        <span class="template-component-image-hover-header">BMW i3</span>
                                        <span class="template-component-image-hover-divider"></span>
                                        <span class="template-component-image-hover-subheader">Triple Foam</span>
                                    </span>
                                </span>
                            </span>

                        </a>

                        <!-- Fancybox description -->
                        <div class="template-component-image-description">
                            Suspendisse sagittis placerat diam sit amet viverra neque elementum et. Donec lacinia in
                            tortor ac tristique.
                            In dui leo bibendum et dignissim non laoreet ut nulla. Nunc vulputate odio a dapibus
                            feugiat tortor velit iaculis libero
                            sit amet euismod lacus elit et enim. Aliquam semper nunc sed rhoncus interdum.
                        </div>

                    </div>

                </li>

                <!-- Image -->
                <li class="template-filter-auto-detail template-filter-triple-foam">
                    <div class="template-component-image template-component-image-preloader">
                        <a href="{{ asset('landing-page/assets/media/image/sample/460x306/image_01.jpg') }}"
                            class="template-fancybox" data-fancybox-group="gallery-1">
                            <img src="{{ asset('landing-page/assets/media/image/sample/460x306/image_01.jpg') }}"
                                alt="" />
                            <span class="template-component-image-hover">
                                <span>
                                    <span>
                                        <span class="template-component-image-hover-header">Renault Clio</span>
                                        <span class="template-component-image-hover-divider"></span>
                                        <span class="template-component-image-hover-subheader">Hand Polish</span>
                                    </span>
                                </span>
                            </span>
                        </a>
                        <div class="template-component-image-description">
                            Nam mollis libero at mollis lacinia. Praesent nunc turpis mollis in congue a lacinia at
                            nisl.
                            Quisque tincidunt vehicula dolor a eleifend. In nec tellus eu nisi fringilla molestie ac
                            eu enim.
                            Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque gravida nibh a
                            lobortis blandit risus turpis auctor ligula.
                        </div>
                    </div>
                </li>

                <!-- Image -->
                <li class="template-filter-hand-wash template-filter-auto-detail template-filter-hand-wax">
                    <div class="template-component-image template-component-image-preloader">
                        <a href="{{ asset('landing-page/assets/media/image/sample/460x306/image_02.jpg') }}"
                            class="template-fancybox" data-fancybox-group="gallery-1">
                            <img src="{{ asset('landing-page/assets/media/image/sample/460x306/image_02.jpg') }}"
                                alt="" />
                            <span class="template-component-image-hover">
                                <span>
                                    <span>
                                        <span class="template-component-image-hover-header">Volkswagen Polo</span>
                                        <span class="template-component-image-hover-divider"></span>
                                        <span class="template-component-image-hover-subheader">Interior
                                            Dusting</span>
                                    </span>
                                </span>
                            </span>
                        </a>
                        <div class="template-component-image-description">
                            Morbi est augue porta in consequat nec pretium eget nunc. In ullamcorper ante quis
                            pharetra finibus.
                            Phasellus tincidunt augue sed velit molestie a pretium neque accumsan. Nam id ligula
                            arcu. Proin non tempus eros.
                            Pellentesque congue libero eget tristique consectetur.
                        </div>
                    </div>
                </li>

                <!-- Image -->
                <li
                    class="template-component-gallery-image-list-width-2 template-filter-hand-wash template-filter-triple-foam">
                    <div class="template-component-image template-component-image-preloader">
                        <a href="{{ asset('landing-page/assets/media/image/sample/760x506/image_06.jpg') }}"
                            class="template-fancybox" data-fancybox-group="gallery-1">
                            <img src="{{ asset('landing-page/assets/media/image/sample/760x506/image_06.jpg') }}"
                                alt="" />
                            <span class="template-component-image-hover">
                                <span>
                                    <span>
                                        <span class="template-component-image-hover-header">Fiat Bravo</span>
                                        <span class="template-component-image-hover-divider"></span>
                                        <span class="template-component-image-hover-subheader">Cleaning Waterless
                                            Wash &amp; Wax with Carnauba</span>
                                    </span>
                                </span>
                            </span>
                        </a>
                        <div class="template-component-image-description">
                            Donec eget massa vitae metus maximus tempor. Vivamus maximus mattis ultricies. Sed
                            viverra vitae metus in ornare.
                            Ut lacus massa finibus quis luctus quis faucibus sit amet risus. Ut elit neque pulvinar
                            sit amet ipsum eget feugiat consequat
                            magna. Quisque fringilla ex sit amet rutrum varius velit arcu tempus tellus vitae
                            euismod felis orci vel turpis.
                        </div>
                    </div>
                </li>

                <!-- Image -->
                <li class="template-filter-triple-foam template-filter-hand-polish">
                    <div class="template-component-image template-component-image-preloader">
                        <a href="{{ asset('landing-page/assets/media/image/sample/460x678/image_03.jpg') }}"
                            class="template-fancybox" data-fancybox-group="gallery-1">
                            <img src="{{ asset('landing-page/assets/media/image/sample/460x678/image_03.jpg') }}"
                                alt="" />
                            <span class="template-component-image-hover">
                                <span>
                                    <span>
                                        <span class="template-component-image-hover-header">BMW Mini Cooper</span>
                                        <span class="template-component-image-hover-divider"></span>
                                        <span class="template-component-image-hover-subheader">Wheel Shine</span>
                                    </span>
                                </span>
                            </span>
                        </a>
                        <div class="template-component-image-description">
                            Phasellus non commodo dolor. In iaculis eleifend ipsum id lacinia turpis sagittis ut. Ut
                            id vestibulum mauris
                            ac laoreet augue. Nullam malesuada tempor finibus. Aliquam viverra augue ac tincidunt
                            lacinia. Interdum et malesuada fames
                            ac ante ipsum primis in faucibus. Nullam ultricies viverra nulla ac egestas.
                        </div>
                    </div>
                </li>

                <!-- Image -->
                <li class="template-filter-auto-detail template-filter-hand-polish">
                    <div class="template-component-image template-component-image-preloader">
                        <a href="{{ asset('landing-page/assets/media/image/sample/460x306/image_04.jpg') }}"
                            class="template-fancybox" data-fancybox-group="gallery-1">
                            <img src="{{ asset('landing-page/assets/media/image/sample/460x306/image_04.jpg') }}"
                                alt="" />
                            <span class="template-component-image-hover">
                                <span>
                                    <span>
                                        <span class="template-component-image-hover-header">Mazda 3</span>
                                        <span class="template-component-image-hover-divider"></span>
                                        <span class="template-component-image-hover-subheader">Scratch
                                            Repair</span>
                                    </span>
                                </span>
                            </span>
                        </a>
                        <div class="template-component-image-description">
                            Praesent efficitur tortor sit amet nulla malesuada id venenatis velit sagittis. Aliquam
                            blandit ipsum quis iaculis feugiat.
                            Sed eros lacus aliquet ut libero et faucibus ultricies nisi. Donec hendrerit dignissim
                            ante vel feugiat augue tempor non.
                            Nunc auctor quam sollicitudin est blandit consectetur. Phasellus vitae suscipit purus.
                        </div>
                    </div>
                </li>

                <!-- Image -->
                <li class="template-filter-triple-foam template-filter-hand-polish template-filter-hand-wax">
                    <div class="template-component-image template-component-image-preloader">
                        <a href="{{ asset('landing-page/assets/media/image/sample/460x306/image_10.jpg') }}"
                            class="template-fancybox" data-fancybox-group="gallery-1">
                            <img src="{{ asset('landing-page/assets/media/image/sample/460x306/image_10.jpg') }}"
                                alt="" />
                            <span class="template-component-image-hover">
                                <span>
                                    <span>
                                        <span class="template-component-image-hover-header">Mercedes A200</span>
                                        <span class="template-component-image-hover-divider"></span>
                                        <span class="template-component-image-hover-subheader">Hazy Headlights
                                            Restoring</span>
                                    </span>
                                </span>
                            </span>
                        </a>
                        <div class="template-component-image-description">
                            Nam et ornare mauris. Nam fringilla eu metus ac vehicula. Mauris dapibus hendrerit ante
                            imperdiet varius orci.
                            Fusce rutrum lobortis erat. Nunc vehicula vehicula risus sit amet cursus. Curabitur non
                            congue magna vel porttitor magna.
                            Duis interdum ligula sed lectus elementum ut interdum neque dignissim.
                        </div>
                    </div>
                </li>

            </ul>

        </div>

        <!-- Button -->
        <div class="template-align-center">
            <a href="gallery.html" class="template-component-button">Browse More Projects</a>
        </div>

    </div>

    <!-- Section -->
    <div class="template-section template-section-padding-reset template-clear-fix">

        <!-- Flex layout 50x50% -->
        <div class="template-layout-flex template-clear-fix template-background-color-1">

            <!-- Left column -->
            <div>

                <!-- Header + subheader -->
                <div class="template-component-header-subheader">
                    <h2>Testimonials</h2>
                    <div></div>
                    <span>Our customers love us</span>
                </div>

                <!-- Space -->
                <div class="template-component-space template-component-space-2"></div>

                <!-- Testimonials list -->
                <div class="template-component-testimonial-list template-clear-fix">

                    <!-- Content -->
                    <ul class="template-clear-fix">
                        <li>
                            <p>I could not be happier with the job you did on my car. It looks great. Thank you for
                                your great service and I will continue to refer friends and family to you all.</p>
                            <h6>Dotti Newman</h6>
                            <span>Audi Q5</span>
                        </li>
                        <li>
                            <p>I think Auto Spa is the best car washers ever. Love the price, convenience and
                                customer service. Thanks so much! My car looks like new. I will definitely come
                                again.</p>
                            <h6>David Magnus</h6>
                            <span>Nissan Titan X5</span>
                        </li>
                        <li>
                            <p>Finally a car wash that does pay attention to the detail. I have a little extra time
                                and money and I let them do the full detail and it always has turned out great.</p>
                            <h6>Josh Williams</h6>
                            <span>Toyota Avensis</span>
                        </li>
                    </ul>

                    <!-- Navigation -->
                    <div class="template-component-testimonial-list-navigation">
                        <a href="#"
                            class="template-component-testimonial-list-navigation-left template-icon-meta-arrow-large-rl"></a>
                        <span
                            class="template-component-testimonial-list-navigation-center template-icon-feature-testimonials"></span>
                        <a href="#"
                            class="template-component-testimonial-list-navigation-right template-icon-meta-arrow-large-rl"></a>
                    </div>

                </div>

            </div>

            <!-- Right column -->
            <div class="template-background-image template-background-image-2 template-color-white">

                <!-- Header + subheader -->
                <div class="template-component-header-subheader">
                    <h2>Recent News</h2>
                    <div></div>
                    <span>Recent from the blog</span>
                </div>

                <!-- Recent posts list -->
                <ul class="template-component-recent-post">
                    <li>
                        <a href="single-post-right-sidebar.html">
                            <span>How to choose car detailing company</span>
                            <span>April 14, 2015</span>
                        </a>
                    </li>
                    <li>
                        <a href="single-post-right-sidebar.html">
                            <span>Interior car wash and detailing service</span>
                            <span>March 25, 2015</span>
                        </a>
                    </li>
                    <li>
                        <a href="single-post-right-sidebar.html">
                            <span>How to book a car wash online</span>
                            <span>March 05, 2015</span>
                        </a>
                    </li>
                </ul>

            </div>

        </div>

    </div>

    <!-- Section -->
    <div class="template-section template-section-padding-1 template-clear-fix template-main">

        <!-- Features list -->
        <div class="template-component-feature-list template-component-feature-list-position-left template-clear-fix">

            <!-- Layout 33x33x33% -->
            <ul class="template-layout-33x33x33 template-clear-fix">

                <!-- Left column -->
                <li class="template-layout-column-left">
                    <span class="template-icon-feature-phone-circle"></span>
                    <h5>Call Us At</h5>
                    <p>
                        (+505) 122 225 225<br />
                        (+505) 122 225 224<br />
                    </p>
                </li>

                <!-- Center column -->
                <li class="template-layout-column-center">
                    <span class="template-icon-feature-location-map"></span>
                    <h5>Our Address</h5>
                    <p>
                        464 Rhode Island Av.<br />
                        Portland, OR 97219
                    </p>
                </li>

                <!-- Right column -->
                <li class="template-layout-column-right">
                    <span class="template-icon-feature-clock"></span>
                    <h5>Working hours</h5>
                    <p>
                        Monday - Friday: 8 am - 6 pm<br />
                        Saturday: 8 am - 3 pm
                    </p>
                </li>

            </ul>
        </div>
    </div>
    {{-- </div> --}}


@endsection

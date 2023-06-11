@extends('layouts.landing-page')
@section('title', 'Landing Page - Booking')
@section('template', 'template-page-contact-style-1')
@section('contentLandingPage')


    <!-- Section -->
    <div class="template-section template-section-padding-1 template-main template-clear-fix">

        <!-- Features list -->
        <div class="template-component-feature-list template-component-feature-list-position-left template-clear-fix">

            <!-- Layout 33x33x33% -->
            <ul class="template-layout-4-column template-clear-fix" style="display: flex; flex-wrap: wrap;">
                @foreach ($contacts as $contact)
                    <li class="template-layout-column" style="flex: 0 0 25%; max-width: 25%; margin: 10px 0;">
                        <div style="display: flex; align-items: center;">
                            @if ($contact->image_contact)
                                <img src="{{ Storage::url($contact->image_contact) }}" alt="{{ $contact->id }}"
                                    width="85">
                            @else
                                <span class="template-icon-feature-phone-circle"></span>
                            @endif
                            <div style="margin-left: 10px;">
                                <h5 style="margin-bottom: 3px;">{{ $contact->title_contact }}</h5>
                                <p style="margin-bottom: 10px;">{!! $contact->description_contact !!}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>





        </div>

    </div>


@endsection

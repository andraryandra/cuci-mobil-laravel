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
                        {{-- <span class="template-icon-feature-phone-circle"></span> --}}
                        @if ($contact->image_contact)
                            <img src="{{ Storage::url($contact->image_contact) }}" alt="{{ $contact->id }}"
                                class="rounded mt-3" width="85">
                        @else
                            <span class="template-icon-feature-phone-circle"></span>
                        @endif
                        <h5>{{ $contact->title_contact }}</h5>
                        <p>{{ $contact->description_contact }}</p>
                    </li>
                @endforeach
            </ul>




        </div>

    </div>


@endsection

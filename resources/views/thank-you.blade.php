@extends('layouts.app')

@section('title', 'Thank You – ' . config('app.name'))
@section('description', 'Thank you for your appointment request. Green Diar will contact you to confirm your site visit or quotation.')

@section('content')

  @include('partials.page-header', ['title' => ['Thank', 'You'], 'crumbs' => ['Home' => route('home'), 'Contact Us' => route('contact'), 'Thank You' => null]])

  <section class="section thank-you">
    <div class="container thank-you-inner reveal">
      <div class="thank-you-wrap">
        <div class="thank-you-icon">
          <i class="fa-regular fa-circle-check"></i>
        </div>
        <h3 class="eyebrow">Request Received</h3>
        <h2>Thank You <span>{{ config('site.company') }}</span></h2>
        <p>We’ve received your appointment request. Our team will review your details and contact you shortly to confirm your site visit or quotation.</p>

        <div class="thank-you-details">
          <div class="detail">
            <strong>What happens next?</strong>
            <p>We’ll call or email you to confirm a convenient date and time for the site visit.</p>
          </div>
          <div class="detail">
            <strong>Need to reach us sooner?</strong>
            <p><a href="tel:{{ config('site.phone_link') }}">{{ config('site.phone') }}</a> or <a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a></p>
          </div>
        </div>

        <div class="thank-you-actions reveal">
          <a href="{{ route('home') }}" class="btn btn-accent">Back to Home <i class="fa-solid fa-arrow-right"></i></a>
          <a href="{{ route('contact') }}#appointment" class="btn btn-outline-dark">Book Another Appointment <i class="fa-solid fa-calendar-plus"></i></a>
        </div>
      </div>
    </div>
  </section>

  @include('partials.cta-strip', ['title' => 'Have another project in mind?', 'text' => 'Tell us what you need and we’ll arrange a site visit and quotation.'])

@endsection

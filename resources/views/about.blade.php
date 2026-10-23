@extends('layouts.app')

@section('title', 'About Us – ' . config('app.name'))
@section('description', 'Green Diar Technical & Landscaping Services: landscaping, garden maintenance and house maintenance for residential and commercial properties.')

@section('content')

  @include('partials.page-header', ['title' => ['About', 'Us'], 'crumbs' => ['About Us' => null]])

  @include('partials.about-intro')

  <!-- Vision & Mission -->
  <section class="section vision-mission tinted">
    <div class="container">
      <div class="vm-row">
        <div class="vm-img reveal">
          <img src="{{ asset('assets/images/landscape-design.jpg') }}" alt="Landscaped park with winding paths">
        </div>
        <div class="vm-content">
          <div class="section-head left">
            <span class="bg-title">Landscaping</span>
            <h3 class="eyebrow">Landscaping Services</h3>
            <h2>Every part of <span>your outdoor space</span></h2>
            <p>Our landscaping services cover all aspects of outdoor spaces, from landscape design and installation to garden maintenance, irrigation, soft and hard landscaping, planting, lawn care, seasonal flowers, tree and shrub maintenance, and complete garden improvement solutions.</p>
          </div>
        </div>
      </div>

      <div class="vm-row reverse">
        <div class="vm-img reveal">
          <img src="{{ asset('assets/images/power-washing.jpg') }}" alt="Power washing a paved surface">
        </div>
        <div class="vm-content">
          <div class="section-head left">
            <span class="bg-title">Maintenance</span>
            <h3 class="eyebrow">House Maintenance</h3>
            <h2>Care for <span>the essentials of your property</span></h2>
            <p>Our house maintenance services are designed to take care of the essential needs of your property. We provide a wide range of maintenance solutions including electrical, plumbing, carpentry, painting, civil works, AC-related services, repairs, installations, and general property maintenance.</p>
          </div>
        </div>
      </div>

      <div class="about-closing reveal">
        <p>At Green Diar, we focus on quality workmanship, professional service, attention to detail, and customer satisfaction. Our team works with a commitment to completing every project safely, efficiently, and to a high standard.</p>
        <p>Whether you need to transform your garden, maintain your home, resolve a technical issue, or manage ongoing property maintenance, Green Diar Technical &amp; Landscaping Services is your trusted partner for complete property care.</p>
        <strong>Green Diar — {{ config('site.tagline') }}</strong>
      </div>
    </div>
  </section>

  @include('partials.counter-strip')

  @include('partials.why-choose')

  @include('partials.testimonials')

  @include('partials.faqs', ['tinted' => false])

  @include('partials.cta-strip', ['title' => 'Your trusted partner for complete property care', 'text' => 'Talk to our team about landscaping, garden maintenance or house maintenance.'])

@endsection

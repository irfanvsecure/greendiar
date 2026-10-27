@extends('layouts.app')

@section('title', 'Services – ' . config('app.name'))
@section('description', 'Swimming pool construction and maintenance, garden maintenance, plant care, landscape and poolscape design, hardscape, pergolas, irrigation, grass and green wall installation.')

@section('content')

  @include('partials.page-header', ['title' => ['Our', 'Services'], 'crumbs' => ['Services' => null]])

  <section class="section services">
    <div class="container">
      <div class="section-row">
        <div class="section-head left">
          <span class="bg-title">Services</span>
          <h3 class="eyebrow">What We Do</h3>
          <h2>Landscaping &amp; property <span>services for every need</span></h2>
        </div>
        <p class="section-row-text reveal">From design and installation to regular upkeep, we handle every part of your outdoor space. Pick one service or request a quotation for several together.</p>
      </div>
      @include('partials.service-catalog')
    </div>
  </section>

  @include('partials.cta-strip', ['title' => 'Need one of our services?', 'text' => 'Request a site visit or quotation for one service or several together.'])

  @include('partials.counter-strip')

  @include('partials.faqs')

@endsection

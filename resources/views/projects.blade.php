@extends('layouts.app')

@section('title', 'Projects – ' . config('app.name'))
@section('description', 'Landscaping and outdoor projects by Green Diar: garden design, poolscapes, hardscape, pergolas, irrigation, grass and green walls.')

@section('content')

  @include('partials.page-header', ['title' => ['Our', 'Projects'], 'crumbs' => ['Projects' => null]])

  <section class="section projects">
    <div class="container">
      <div class="section-row">
        <div class="section-head left">
          <span class="bg-title">Our Work</span>
          <h3 class="eyebrow">Our Work</h3>
          <h2>Our landscaping <span>&amp; outdoor projects</span></h2>
        </div>
        <p class="section-row-text reveal">Browse by category to see the gardens, poolscapes, pathways, pergolas and green spaces we create and care for.</p>
      </div>
      @include('partials.projects-grid')
    </div>
  </section>

  @include('partials.cta-strip')

@endsection

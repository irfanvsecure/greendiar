@extends('layouts.app')

@section('title', ($query ? "Search: $query" : 'Search') . ' – ' . config('app.name'))
@section('description', 'Search Green Diar services: landscaping, swimming pools, garden and home maintenance.')

@section('content')

  @include('partials.page-header', ['title' => ['Search', 'Results'], 'crumbs' => ['Search' => null]])

  <section class="section search-results">
    <div class="container">
      <form class="search-form big reveal" action="{{ route('search') }}" method="get" role="search">
        <input type="search" name="q" value="{{ $query }}" placeholder="Search services, e.g. pool, garden, AC" aria-label="Search the website" required>
        <button type="submit" class="btn btn-accent">Search <i class="fa-solid fa-magnifying-glass"></i></button>
      </form>

      @if ($query === '')
        <p class="search-summary">Type what you are looking for above.</p>
      @elseif ($services->isEmpty() && $pages->isEmpty() && $faqs->isEmpty())
        <p class="search-summary">No results for <strong>“{{ $query }}”</strong>. Try a shorter word such as “pool”, “garden” or “maintenance”, or <a href="{{ route('contact') }}#appointment">ask us directly</a>.</p>
      @else
        <p class="search-summary">{{ $services->count() + $pages->count() + $faqs->count() }} result(s) for <strong>“{{ $query }}”</strong></p>
      @endif

      @if ($services->isNotEmpty())
        <h2 class="search-heading">Services</h2>
        <div class="search-grid">
          @foreach ($services as $item)
            <a class="search-card reveal" href="{{ route('contact', ['service' => $item['title']]) }}#appointment">
              <img src="{{ asset('assets/images/' . $item['image']) }}" alt="{{ $item['title'] }}" loading="lazy" @isset($item['position']) style="object-position: {{ $item['position'] }}" @endisset>
              <div>
                <small>{{ $item['category'] }}</small>
                <h3>{{ $item['title'] }}</h3>
                <p>{{ $item['summary'] }}</p>
                <span class="catalog-price">Request a Quote <i class="fa-solid fa-arrow-right"></i></span>
              </div>
            </a>
          @endforeach
        </div>
      @endif

      @if ($pages->isNotEmpty())
        <h2 class="search-heading">Pages</h2>
        <ul class="search-pages">
          @foreach ($pages as [$title, $url, $text])
            <li><a href="{{ $url }}"><strong>{{ $title }}</strong><span>{{ $text }}</span><i class="fa-solid fa-arrow-right"></i></a></li>
          @endforeach
        </ul>
      @endif

      @if ($faqs->isNotEmpty())
        <h2 class="search-heading">Questions</h2>
        @include('partials.accordion', ['faqs' => $faqs])
      @endif
    </div>
  </section>

  @include('partials.cta-strip', ['title' => "Can't find what you need?", 'text' => 'Tell us about your project and we will prepare a quotation.'])

@endsection

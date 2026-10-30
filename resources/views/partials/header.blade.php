<header class="header" id="header">
  @php
    // Live suggestions for the header search: every service plus the main pages.
    $searchSuggestions = collect(config('service_catalog.categories'))
      ->flatMap(fn ($items, $category) => collect($items)->map(fn ($item) => [
        't' => $item['title'], 'c' => $category, 'u' => route('contact', ['service' => $item['title']]) . '#appointment',
      ]))
      ->concat([
        ['t' => 'Home', 'c' => 'Page', 'u' => route('home')],
        ['t' => 'About Us', 'c' => 'Page', 'u' => route('about')],
        ['t' => 'Services', 'c' => 'Page', 'u' => route('services.index')],
        ['t' => 'Contact Us', 'c' => 'Page', 'u' => route('contact')],
      ])->values();
  @endphp

  <div class="container header-inner">
    @include('partials.logo')

    <nav class="nav" id="nav">
      <ul>
        <li><a href="{{ route('home') }}" @class(['current' => request()->routeIs('home')])>Home</a></li>
        <li><a href="{{ route('about') }}" @class(['current' => request()->routeIs('about')])>About Us</a></li>
        <li class="has-sub"><a href="{{ route('services.index') }}" @class(['current' => request()->routeIs('services.*')])>Services <i class="fa-solid fa-chevron-down"></i></a>
          <ul class="sub">
            @foreach (array_keys(config('service_catalog.categories')) as $category)
              <li><a href="{{ route('services.index') }}#{{ Str::slug($category) }}">{{ $category }}</a></li>
            @endforeach
          </ul>
        </li>
        @if (config('site.show_projects'))
          <li><a href="{{ route('projects') }}" @class(['current' => request()->routeIs('projects')])>Projects</a></li>
        @endif
        <li><a href="{{ route('contact') }}" @class(['current' => request()->routeIs('contact')])>Contact Us</a></li>
      </ul>
    </nav>

    <div class="header-actions">
      <div class="header-social">
        @foreach (config('site.social') as $icon => $url)
          <a href="{{ $url }}" aria-label="{{ $icon }}"><i class="fa-brands fa-{{ $icon }}"></i></a>
        @endforeach
      </div>

      {{-- Search icon; hovering (or clicking) opens the box, typing shows matching services --}}
      <div class="header-search" id="headerSearch">
        <button type="button" class="header-search-toggle" aria-label="Open search" aria-expanded="false"><i class="fa-solid fa-magnifying-glass"></i></button>
        <div class="header-search-panel">
          <form action="{{ route('search') }}" method="get" role="search">
            <input type="search" name="q" value="{{ request()->routeIs('search') ? request('q') : '' }}" placeholder="Search services..." aria-label="Search the website" autocomplete="off" required>
            <button type="submit" aria-label="Search"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
          <ul class="search-suggest" role="listbox" hidden></ul>
          <script type="application/json" id="searchData">@json($searchSuggestions)</script>
        </div>
      </div>

      <a href="tel:{{ config('site.phone_link') }}" class="header-call" aria-label="Call us at {{ config('site.phone') }}">
        <span class="call-icon"><i class="fa-solid fa-phone-volume"></i></span>
        <span class="header-call-text"><small>Call Us Any Time</small><strong>{{ config('site.phone') }}</strong></span>
      </a>
    </div>

    <button class="menu-toggle" id="menuToggle" aria-label="Menu"><span></span><span></span><span></span></button>
  </div>
</header>

<header class="header" id="header">
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
        <li class="nav-cta"><a href="{{ route('contact') }}#appointment" class="btn btn-accent">Get in Touch <i class="fa-solid fa-arrow-right"></i></a></li>
      </ul>
    </nav>

    <div class="header-actions">
      <a href="tel:{{ config('site.phone_link') }}" class="header-call" aria-label="Call us at {{ config('site.phone') }}">
        <span class="call-icon"><i class="fa-solid fa-phone-volume"></i></span>
        <span class="header-call-text"><small>Call Us Any Time</small><strong>{{ config('site.phone') }}</strong></span>
      </a>
      <a href="{{ route('contact') }}#appointment" class="btn btn-accent header-cta">Get in Touch <i class="fa-solid fa-arrow-right"></i></a>
    </div>

    <button class="menu-toggle" id="menuToggle" aria-label="Menu"><span></span><span></span><span></span></button>
  </div>
</header>

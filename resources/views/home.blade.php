@extends('layouts.app')

@section('content')

  <!-- Hero slider: photo and text change together (script.js). Later photos load after the page. -->
  <section class="hero" id="heroSlider" aria-roledescription="carousel" aria-label="Our main services">
    @php($heroSlides = [
      [
        'image' => 'pool-hero.jpg',
        'eyebrow' => 'Swimming Pool Construction & Maintenance',
        'title' => '<span>Build</span> the swimming pool <span>you have always wanted</span>',
        'text' => 'From design and excavation to tiling, filtration and the first fill, we build beautiful, durable pools and keep them crystal clear all year round.',
        'link' => ['Pool Services', route('services.index') . '#swimming-pools'],
      ],
      [
        'image' => 'walkways-pathways.jpg',
        'eyebrow' => 'Beautiful Garden',
        'title' => '<span>Transform</span> your outdoor space <span>into a lush paradise</span>',
        'text' => "Whether you're dreaming of a vibrant garden, a serene patio, or a functional outdoor living space, our team of skilled landscapers and gardeners is here to bring your vision to life. Let's create a landscape you'll love.",
        'link' => ['Our Services', route('services.index')],
      ],
      [
        'image' => 'aluminum-pergolas.jpg',
        'eyebrow' => 'Pergolas & Outdoor Living',
        'title' => '<span>Shade, comfort</span> and style <span>for outdoor living</span>',
        'text' => 'Modern aluminium and warm timber pergolas, gazebos and outdoor kitchens, designed and built to make the most of your outdoor space.',
        'link' => ['Outdoor Living', route('services.index') . '#pergolas-outdoor-living'],
      ],
      [
        'image' => 'patios-decks.jpg',
        'eyebrow' => 'Hardscape',
        'title' => '<span>Patios, decks</span> and pathways <span>built to last</span>',
        'text' => 'Durable patios, decks, walkways, stairs and driveways that connect your outdoor spaces safely and beautifully.',
        'link' => ['Hardscape Services', route('services.index') . '#hardscape'],
      ],
      [
        'image' => 'tree-trimming.jpg',
        'eyebrow' => 'Garden Maintenance',
        'title' => '<span>Healthy trees,</span> tidy gardens <span>all year round</span>',
        'text' => 'Scheduled garden care, tree and shrub trimming, plant care and clean-ups that keep your garden healthy, safe and looking its best.',
        'link' => ['Garden Services', route('services.index') . '#garden-maintenance'],
      ],
      [
        'image' => 'lawn-mowing.jpg',
        'eyebrow' => 'Lawns & Irrigation',
        'title' => '<span>Green lawns</span> that stay <span>thick and fresh</span>',
        'text' => 'Natural and artificial grass, regular mowing and efficient irrigation systems for a lawn you will be proud of.',
        'link' => ['Lawn Services', route('services.index') . '#irrigation-grass-green-walls'],
      ],
    ])
    <div class="hero-slides" id="heroSlides" aria-hidden="true">
      @foreach ($heroSlides as $slide)
        <img @class(['hero-media', 'active' => $loop->first]) {{ $loop->first ? 'src' : 'data-src' }}="{{ asset('assets/images/' . $slide['image']) }}" alt="" @if ($loop->first) fetchpriority="high" @endif>
      @endforeach
    </div>
    <div class="hero-overlay"></div>
    <div class="container hero-content">
      <div class="hero-texts">
        @foreach ($heroSlides as $slide)
          <div @class(['hero-text', 'active' => $loop->first]) role="group" aria-roledescription="slide" aria-label="{{ $loop->iteration }} of {{ $loop->count }}" @unless ($loop->first) aria-hidden="true" @endunless>
            <h3 class="eyebrow light">{{ $slide['eyebrow'] }}</h3>
            @if ($loop->first)
              <h1 class="hero-title">{!! $slide['title'] !!}</h1>
            @else
              <h2 class="hero-title">{!! $slide['title'] !!}</h2>
            @endif
            <p>{{ $slide['text'] }}</p>
            <div class="btn-group">
              <a href="{{ route('contact') }}#appointment" class="btn btn-light">Get in Touch <i class="fa-solid fa-arrow-right"></i></a>
              <a href="{{ $slide['link'][1] }}" class="btn btn-outline">{{ $slide['link'][0] }} <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        @endforeach
      </div>

      <div class="hero-bottom">
        <div class="hero-controls">
          <button class="hero-arrow prev" aria-label="Previous slide"><i class="fa-solid fa-chevron-left"></i></button>
          <div class="hero-dots">
            @foreach ($heroSlides as $slide)
              <button @class(['active' => $loop->first]) aria-label="Show slide {{ $loop->iteration }}: {{ $slide['eyebrow'] }}"></button>
            @endforeach
          </div>
          <button class="hero-arrow next" aria-label="Next slide"><i class="fa-solid fa-chevron-right"></i></button>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats + consultation -->
  <section class="stats-bar">
    <div class="container stats-inner">
      <div class="stats-left">
        <div class="counter-box counter-feature">
          <span class="counter-icon"><i class="fa-solid fa-users"></i></span>
          <div>
            <span class="counter-num"><span class="count" data-to="1">0</span>K+</span>
            <span class="counter-title">Happy Customers</span>
            <small>Residential &amp; commercial clients</small>
          </div>
        </div>
      </div>
      <div class="consult-box">
        <h2>Planning a pool, garden or home project?</h2>
        <p>Tell us what you need and we will arrange a free site visit and a clear, no-obligation quotation.</p>
        <a href="{{ route('contact') }}#appointment" class="btn btn-light">Get a Quote <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
  </section>

  @include('partials.about-intro')

  <!-- Services -->
  <section class="section services" id="services">
    <div class="container">
      <div class="section-row">
        <div class="section-head left">
          <span class="bg-title">Services</span>
          <h3 class="eyebrow">Services</h3>
          <h2>Landscaping &amp; property <span>services for every need</span></h2>
        </div>
        <p class="section-row-text reveal">From landscape design and installation to garden maintenance, irrigation and outdoor living, we keep your property looking its best and functioning efficiently throughout the year.</p>
      </div>
      {{-- Both home groups in one looping, auto-playing slider --}}
      @include('partials.service-catalog', [
        'autoplay' => true,
        'groups' => ['' => collect(config('service_catalog.categories'))->collapse()
          ->only(config('service_catalog.home'))->all()],
      ])
      <div class="catalog-more reveal"><a href="{{ route('services.index') }}" class="btn btn-accent">View All Services <i class="fa-solid fa-arrow-right"></i></a></div>
    </div>
  </section>

  <!-- Expertise -->
  <section class="section expertise">
    <div class="container grid-2">
      <div>
        <div class="section-head left">
          <span class="bg-title">Expertise</span>
          <h3 class="eyebrow">Expertise</h3>
          <h2>Our expertise <span>in landscaping &amp; property care</span></h2>
          <p>Our services cover every part of your property, from poolscapes and swimming pools to landscape design and installation, garden maintenance, irrigation, planting, lawn care and complete home maintenance.</p>
          <p>At Green Diar, we focus on quality workmanship, professional service, attention to detail, and customer satisfaction.</p>
        </div>
        <div class="funfacts reveal">
          <div class="funfact"><i class="fa-solid fa-leaf"></i><span>Landscape &amp; Garden</span></div>
          <div class="funfact"><i class="fa-solid fa-water-ladder"></i><span>Swimming Pool</span></div>
          <div class="funfact"><i class="fa-solid fa-screwdriver-wrench"></i><span>Home Maintenance</span></div>
        </div>
        <div class="section-cta reveal"><a href="{{ route('contact') }}#appointment" class="btn btn-accent">Get in Touch <i class="fa-solid fa-arrow-right"></i></a></div>
      </div>
      {{-- Three image cards: two stacked on the left, one tall on the right --}}
      <div class="expertise-gallery three reveal">
        <div class="col">
          <a class="expertise-img" href="{{ route('services.index') }}#garden-maintenance">
            <img src="{{ asset('assets/images/plantscape-design.jpg') }}" alt="Landscaped garden with stone path and pond">
            <span>Landscape &amp; Garden</span>
          </a>
          <a class="expertise-img" href="{{ route('services.index') }}">
            <img src="{{ asset('assets/images/expertise-home-maintenance.jpg') }}" alt="Technician cleaning the filter of a split AC unit" style="object-position: 60% center">
            <span>Home Maintenance</span>
          </a>
        </div>
        <div class="col">
          <a class="expertise-img" href="{{ route('services.index') }}#swimming-pools">
            <img src="{{ asset('assets/images/expertise-pool.jpg') }}" alt="Swimming pool in a garden surrounded by trees">
            <span>Swimming Pool</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Video CTA -->
  <section class="video-cta">
    <div class="container">
      <div class="video-top">
        <h2>Watch our gardening &amp; <span>landscaping projects in action</span></h2>
        @if (config('site.video_url'))
          <button class="play-btn" id="playBtn" data-video="{{ config('site.video_url') }}" aria-label="Play video"><i class="fa-solid fa-play"></i></button>
        @endif
      </div>
      <div class="video-bottom reveal">
        <div class="video-note">
          <i class="fa-solid fa-hand-holding-heart"></i>
          <p>With years of experience, we specialize in creating stunning, functional garden landscapes tailored to your vision and needs.</p>
        </div>
        <a href="{{ route('contact') }}#appointment" class="btn btn-accent">Get in Touch <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
  </section>

  @include('partials.why-choose')

  <!-- How it works -->
  <section class="section process dark" id="process">
    <div class="container">
      <div class="section-row">
        <div class="section-head left">
          <span class="bg-title">Methodology</span>
          <h3 class="eyebrow light">Our Methodology</h3>
          <h2>From vision <span>to reality</span></h2>
        </div>
        <p class="section-row-text reveal">A well-planned, customer-focused process—from the first discussion to the final handover.</p>
      </div>
      <div class="method-steps">
        @foreach ([
          ['fa-magnifying-glass-location', 'Consultation & Site Inspection', 'We understand your needs and inspect the site to plan the right approach.'],
          ['fa-pen-ruler', 'Design & Project Planning', 'Custom designs and practical plans tailored to your space and budget.'],
          ['fa-file-invoice-dollar', 'Costing & Material Sourcing', 'Clear quotations, then quality materials from reliable suppliers.'],
          ['fa-handshake', 'Project Execution & Handover', 'Skilled work, a final inspection and care guidance at handover.'],
        ] as $i => [$icon, $title, $text])
          <div class="method-card reveal">
            <span class="method-no">{{ sprintf('%02d', $i + 1) }}</span>
            <span class="method-icon"><i class="fa-solid {{ $icon }}"></i></span>
            <h3>{{ $title }}</h3>
            <p>{{ $text }}</p>
          </div>
        @endforeach
      </div>
      <div class="catalog-more reveal"><a href="{{ route('contact') }}#appointment" class="btn btn-light">Start Your Project <i class="fa-solid fa-arrow-right"></i></a></div>
    </div>
  </section>

  @if (config('site.show_projects'))
  <!-- Projects -->
  <section class="section projects" id="projects">
    <div class="container">
      <div class="section-row">
        <div class="section-head left">
          <span class="bg-title">Our Work</span>
          <h3 class="eyebrow">Our Work</h3>
          <h2>Our landscaping <span>&amp; outdoor projects</span></h2>
        </div>
        <p class="section-row-text reveal">A look at the outdoor spaces we design, build and maintain—from gardens and poolscapes to pathways, lighting and irrigation.</p>
      </div>

      @include('partials.projects-grid', ['only' => [
        'lighting-design', 'poolscape-design', 'plantscape-design',
        'tree-trimming', 'walkways-pathways', 'irrigation-system-installation',
      ]])
      <div class="catalog-more reveal"><a href="{{ route('projects') }}" class="btn btn-accent">View All Projects <i class="fa-solid fa-arrow-right"></i></a></div>
    </div>
  </section>
  @endif

  @include('partials.testimonials')

  @include('partials.faqs')

@endsection

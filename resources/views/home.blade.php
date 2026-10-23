@extends('layouts.app')

@section('content')

  <!-- Hero -->
  <section class="hero">
    {{-- Background slideshow: slow zoom/pan on each photo with a cross-fade (script.js). Later slides load after the page. --}}
    <div class="hero-slides" id="heroSlides" aria-hidden="true">
      <img class="hero-media active" src="{{ asset('assets/images/walkways-pathways.jpg') }}" alt="">
      @foreach (['aluminum-pergolas.jpg', 'patios-decks.jpg', 'tree-trimming.jpg', 'lawn-mowing.jpg'] as $slide)
        <img class="hero-media" data-src="{{ asset('assets/images/' . $slide) }}" alt="">
      @endforeach
    </div>
    <div class="hero-overlay"></div>
    <div class="container hero-content">
      <h3 class="eyebrow light reveal">Beautiful Garden</h3>
      <h1 class="reveal"><span>Transform</span> your outdoor space <span>into a lush paradise</span></h1>
      <p class="reveal">Whether you're dreaming of a vibrant garden, a serene patio, or a functional outdoor living space, our team of skilled landscapers and gardeners is here to bring your vision to life. Let's create a landscape you'll love.</p>
      <div class="btn-group reveal">
        <a href="{{ route('contact') }}#appointment" class="btn btn-light">Get in Touch <i class="fa-solid fa-arrow-right"></i></a>
        <a href="{{ route('services.index') }}" class="btn btn-outline">Our Services <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
  </section>

  <!-- Stats + consultation -->
  <section class="stats-bar">
    <div class="container stats-inner">
      <div class="stats-left">
        <div class="counter-box">
          <span class="counter-title">Happy<br>Customers</span>
          <span class="counter-num"><span class="count" data-to="3.6" data-decimals="1">0</span>k+</span>
        </div>
        <p>Let's bring your dream garden to life! Whether you're looking for a complete landscape overhaul or simple garden maintenance.</p>
      </div>
      <div class="consult-box">
        <h2>Ready to Transform Your Outdoor Space?</h2>
        <p>Contact us today for a free consultation and discover how we can turn your vision into reality.</p>
        <a href="{{ route('contact') }}#appointment" class="btn btn-light">Get in Touch <i class="fa-solid fa-arrow-right"></i></a>
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
          <p>Our landscaping services cover all aspects of outdoor spaces, from landscape design and installation to garden maintenance, irrigation, soft and hard landscaping, planting, lawn care, and tree and shrub maintenance.</p>
          <p>At Green Diar, we focus on quality workmanship, professional service, attention to detail, and customer satisfaction.</p>
        </div>
        <div class="funfacts reveal">
          <div class="funfact"><i class="fa-solid fa-seedling"></i><strong><span class="count" data-to="92">0</span>%</strong><span>Garden Maintenance</span></div>
          <div class="funfact"><i class="fa-solid fa-tree"></i><strong><span class="count" data-to="82">0</span>%</strong><span>Landscape Design</span></div>
          <div class="funfact"><i class="fa-solid fa-leaf"></i><strong><span class="count" data-to="98">0</span>%</strong><span>Plant Care</span></div>
        </div>
        <div class="section-cta reveal"><a href="{{ route('contact') }}#appointment" class="btn btn-accent">Get in Touch <i class="fa-solid fa-arrow-right"></i></a></div>
      </div>
      <div class="expertise-gallery reveal">
        <div class="col">
          <img src="{{ asset('assets/images/plantscape-design.jpg') }}" alt="Plantscape design">
          <img src="{{ asset('assets/images/natural-grass.jpg') }}" alt="Natural grass installation">
        </div>
        <div class="col">
          <img src="{{ asset('assets/images/plant-care.jpg') }}" alt="Plant care">
          <img src="{{ asset('assets/images/shrub-trimming.jpg') }}" alt="Shrub trimming">
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

  @include('partials.testimonials')

  @include('partials.faqs')

@endsection

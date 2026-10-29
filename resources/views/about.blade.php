@extends('layouts.app')

@section('title', 'About Us – ' . config('app.name'))
@section('description', 'Green Diar Technical & Landscaping Services: landscaping, swimming pool construction and maintenance, garden and home maintenance for residential and commercial properties.')

@section('content')

  @include('partials.page-header', ['title' => ['About', 'Us'], 'crumbs' => ['About Us' => null]])

  @include('partials.about-intro')

  @include('partials.about-row', [
    'reverse' => true,
    'tinted' => true,
    'images' => ['landscape-design.jpg' => 'Landscaped park with winding paths', 'plantscape-design.jpg' => 'Plantscape design'],
    'bg' => 'Landscaping',
    'eyebrow' => 'Landscape & Garden',
    'title' => ['Every part of', 'your outdoor space'],
    'text' => 'Our landscaping services cover all aspects of outdoor spaces, from landscape design and installation to garden maintenance, irrigation, soft and hard landscaping, planting, lawn care, seasonal flowers, tree and shrub maintenance, and complete garden improvement solutions.',
    'points' => [
      ['fa-pen-ruler', 'Design & Installation', 'Gardens planned around your space, then built with quality plants and materials.'],
      ['fa-seedling', 'Year-Round Garden Care', 'Scheduled maintenance that keeps lawns, plants and irrigation in top shape.'],
    ],
    'service' => 'Landscape Design',
  ])

  @include('partials.about-row', [
    'images' => ['home-maintenance.jpg' => 'Technician cleaning the filter of a split AC unit', 'cctv-installation.jpg' => 'CCTV camera installation'],
    'bg' => 'Maintenance',
    'eyebrow' => 'Home Maintenance',
    'title' => ['Care for', 'the essentials of your property'],
    'text' => 'Our house maintenance services are designed to take care of the essential needs of your property. We provide a wide range of maintenance solutions including electrical, plumbing, carpentry, painting, civil works, AC-related services, repairs, installations, and general property maintenance.',
    'points' => [
      ['fa-screwdriver-wrench', 'Repairs & Installations', 'Fast, tidy fixes for electrical, plumbing, AC and carpentry issues.'],
      ['fa-calendar-check', 'Planned Maintenance', 'Regular check-ups that prevent problems and protect your property.'],
    ],
    'service' => 'Home Maintenance',
  ])

  @include('partials.about-row', [
    'reverse' => true,
    'tinted' => true,
    'images' => ['pool-tiling.jpg' => 'Newly built and tiled swimming pool', 'pool-maintenance.jpg' => 'Technician brushing a swimming pool'],
    'bg' => 'Pools',
    'eyebrow' => 'Swimming Pool Construction & Maintenance',
    'title' => ['Pools built to last,', 'cared for every season'],
    'text' => 'We design and build swimming pools that suit your property, lifestyle and budget, and manage everything from approvals and excavation to tiling, filtration and the first fill. Once your pool is ready, our maintenance team keeps the water clear, balanced and safe all year round.',
    'points' => [
      ['fa-helmet-safety', 'Pool Construction', 'Complete new pools, from design and approvals to final handover.'],
      ['fa-water', 'Pool Maintenance', 'Cleaning, water balancing and equipment checks on a regular schedule.'],
    ],
    'service' => 'Swimming Pool Construction',
  ])

  @include('partials.about-row', [
    'reverse' => true,
    'images' => ['customer-satisfaction.jpg' => 'Hand passing a smiley face to a customer'],
    'bg' => 'Satisfaction',
    'eyebrow' => 'Customer Satisfaction',
    'title' => ['Your satisfaction is', 'our measure of success'],
    'text' => [
      'Customer satisfaction is at the heart of Green Diar Technical & Landscaping Services. We are committed to understanding our clients’ needs, delivering reliable workmanship, and providing professional service with attention to every detail. From landscaping and swimming pool construction to home maintenance, we strive to build lasting relationships through clear communication, dependable solutions, and a commitment to quality.',
      'Your satisfaction is our measure of success. We aim to make every experience smooth, every project worthwhile, and every space better than you imagined. Your trust matters to us, and we work hard to earn it through quality service, lasting results, and care that continues long after the job is complete. Your vision is our priority, and your confidence in us is the foundation of every successful project.',
    ],
  ])

  @include('partials.about-row', [
    'images' => ['garden-maintenance.webp' => 'Well-kept garden with a green lawn and flower beds in front of a house'],
    'bg' => 'Our Promise',
    'eyebrow' => 'Mission & Values',
    'title' => ['What drives us', 'every single day'],
    'tabs' => [
      'Our Mission' => ['text' => [
        'Green Diar Technical & Landscaping Services is dedicated to enhancing the beauty, comfort, and functionality of every property we serve. We strive to deliver reliable landscaping, garden maintenance, swimming pool construction, and technical maintenance solutions through skilled workmanship, quality materials, and customer-focused service. Our mission is to build lasting relationships with our clients by completing every project with care, professionalism, and attention to detail.',
      ]],
      'Our Values' => ['points' => [
        ['fa-award', 'Quality Excellence', 'We strive to deliver high-quality workmanship and dependable solutions that meet our clients’ expectations.'],
        ['fa-handshake', 'Customer Commitment', 'We listen to our clients, understand their requirements, and work to deliver solutions that meet their expectations.'],
        ['fa-scale-balanced', 'Integrity & Transparency', 'We believe in honest communication, fair practices, and building trust through every interaction.'],
        ['fa-seedling', 'Sustainability & Care', 'We value responsible practices that help maintain beautiful, functional, and sustainable spaces.'],
      ]],
    ],
  ])

  <section class="section pt-0">
    <div class="container about-closing reveal">
      <p>At Green Diar, we focus on quality workmanship, professional service, attention to detail, and customer satisfaction. Our team works with a commitment to completing every project safely, efficiently, and to a high standard.</p>
      <p>Whether you need to transform your garden, build or maintain a swimming pool, maintain your home, or manage ongoing property maintenance, Green Diar Technical &amp; Landscaping Services is your trusted partner for complete property care.</p>
      <strong>Green Diar — {{ config('site.tagline') }}</strong>
    </div>
  </section>

  @include('partials.cta-strip', ['title' => 'Your trusted partner for complete property care', 'text' => 'Talk to our team about landscaping, swimming pools or home maintenance.'])

@endsection

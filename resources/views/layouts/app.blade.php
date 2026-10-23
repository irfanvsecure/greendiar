<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', config('app.name') . ' – Technical & Landscaping Services')</title>
  <meta name="description" content="@yield('description', 'Green Diar Technical & Landscaping Services: landscaping, garden maintenance and house maintenance for residential and commercial properties.')">
  <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11.1.14/swiper-bundle.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  @stack('styles')
</head>
<body>

  <div class="preloader" id="preloader">
    <div class="loader-ring"></div>
    <i class="fa-solid fa-leaf"></i>
  </div>

  @include('partials.header')

  <main>
    @yield('content')
  </main>

  @include('partials.footer')

  <div class="modal" id="videoModal">
    <div class="modal-inner">
      <button class="modal-close" id="modalClose" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
      <div class="modal-frame"><iframe id="videoFrame" src="" allow="autoplay; encrypted-media" allowfullscreen title="Video"></iframe></div>
    </div>
  </div>

  @if (config('site.whatsapp'))
    <a class="whatsapp-btn" href="https://wa.me/{{ config('site.whatsapp') }}?text={{ rawurlencode(config('site.whatsapp_message')) }}" target="_blank" rel="noopener" aria-label="Chat with us on WhatsApp">
      <i class="fa-brands fa-whatsapp"></i>
    </a>
  @endif
  <button class="to-top" id="toTop" aria-label="Back to top"><i class="fa-solid fa-arrow-up"></i></button>
  <div class="cursor-ball" id="cursorBall" aria-hidden="true"></div>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11.1.14/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lenis@1.1.13/dist/lenis.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/SplitText.min.js"></script>
  <script src="{{ asset('assets/js/script.js') }}"></script>
  <script src="{{ asset('assets/js/animations.js') }}"></script>
  @stack('scripts')
</body>
</html>

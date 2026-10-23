<footer class="footer" id="footer">
  <div class="container footer-grid">
    <div>
      @include('partials.logo')
      <p>Technical &amp; landscaping services for residential and commercial properties. {{ config('site.tagline') }}</p>
      <div class="social">
        @foreach (config('site.social') as $icon => $url)
          <a href="{{ $url }}" aria-label="{{ $icon }}"><i class="fa-brands fa-{{ $icon }}"></i></a>
        @endforeach
      </div>
    </div>
    <div>
      <h4>Explore</h4>
      <ul class="footer-links">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About Us</a></li>
        <li><a href="{{ route('services.index') }}">Services</a></li>
        <li><a href="{{ route('projects') }}">Projects</a></li>
        <li><a href="{{ route('contact') }}">Contact Us</a></li>
      </ul>
    </div>
    <div>
      <h4>Working Hours</h4>
      <ul class="hours">
        @foreach (config('site.hours') as $day => $time)
          <li><span>{{ $day }}</span><span>{{ $time }}</span></li>
        @endforeach
      </ul>
    </div>
    <div>
      <h4>Address</h4>
      <p>{{ config('site.address') }}</p>
      <h4>Contact</h4>
      <p><a href="tel:{{ config('site.phone_link') }}">{{ config('site.phone') }}</a><br><a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a></p>
    </div>
  </div>
  <div class="container footer-bottom">
    <p>Copyright © {{ date('Y') }} {{ config('site.company') }}. All Rights Reserved.</p>
    <div class="footer-legal">
      <a href="{{ route('privacy') }}">Privacy Policy</a>
      <a href="{{ route('terms') }}">Terms &amp; Conditions</a>
      <span class="credit">Designed &amp; Developed by <a href="https://mait.ae" target="_blank" rel="noopener">mait.ae</a></span>
    </div>
  </div>
</footer>

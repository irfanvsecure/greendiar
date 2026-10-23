{{-- Logo for dark backgrounds: icon + wordmark images (exported at display size, 1x and 2x) and the company line as real text so it stays sharp --}}
<a href="{{ route('home') }}" class="logo" aria-label="{{ config('app.name') }} Technical &amp; Landscaping Services LLC – Home">
  <img class="logo-icon" src="{{ asset('assets/images/logo-icon.png') }}" srcset="{{ asset('assets/images/logo-icon.png') }} 1x, {{ asset('assets/images/logo-icon@2x.png') }} 2x" width="52" height="54" alt="">
  <span class="logo-text">
    <img src="{{ asset('assets/images/logo-word.png') }}" srcset="{{ asset('assets/images/logo-word.png') }} 1x, {{ asset('assets/images/logo-word@2x.png') }} 2x" width="148" height="32" alt="{{ config('app.name') }}">
    <small>Technical &amp; Landscaping Services</small>
  </span>
</a>

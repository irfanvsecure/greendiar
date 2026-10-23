<section class="counter-strip">
  <div class="container counter-inner">
    @foreach (['Total Services' => 320, 'Team Members' => 250, 'Awards Won' => 100] as $label => $value)
      <div class="counter-item reveal">
        <strong><span class="count" data-to="{{ $value }}">0</span>+</strong>
        <span>{{ $label }}</span>
      </div>
    @endforeach
    <img class="counter-img" src="{{ asset('assets/images/irrigation.jpg') }}" alt="">
  </div>
</section>

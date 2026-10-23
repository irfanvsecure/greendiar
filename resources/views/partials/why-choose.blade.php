<section class="section why tinted">
  <div class="container grid-2 align-center">
    <div class="why-img reveal">
      <img src="{{ asset('assets/images/wooden-pergolas.jpg') }}" alt="Wooden pergola with outdoor seating">
    </div>
    <div>
      <div class="section-head left">
        <span class="bg-title">Why Us?</span>
        <h3 class="eyebrow">Why Choose Us</h3>
        <h2>Quality, reliability <span>&amp; excellence in every project</span></h2>
        <p>Green Diar Technical &amp; Landscaping Services is committed to transforming outdoor spaces and maintaining properties through reliable services, skilled workmanship, and attention to detail. Whether it is creating beautiful landscapes, maintaining your home, or installing swimming pools, we strive to exceed our clients' expectations at every step.</p>
      </div>
      <div class="why-boxes">
        @foreach ([
          ['fa-pen-ruler', 'Tailored Solutions', 'Plans built around your property, preferences and budget.'],
          ['fa-award', 'Quality Workmanship', 'Skilled teams, good materials and attention to detail.'],
          ['fa-clock', 'Reliable Service', 'On time, safe and professional on every visit.'],
          ['fa-face-smile', 'Customer Satisfaction', 'We are only done when you are happy with the result.'],
        ] as [$icon, $title, $text])
          <div class="why-box reveal">
            <span class="icon-sq"><i class="fa-solid {{ $icon }}"></i></span>
            <h3>{{ $title }}</h3>
            <p>{{ $text }}</p>
          </div>
        @endforeach
      </div>
      <div class="section-cta reveal"><a href="{{ route('contact') }}#appointment" class="btn btn-accent">Get in Touch <i class="fa-solid fa-arrow-right"></i></a></div>
    </div>
  </div>
</section>

<section class="testimonials">
  <div class="container">
    <div class="testimonial-card reveal">
      <div class="section-head left">
        <span class="bg-title">Review</span>
        <h3 class="eyebrow">Testimonials</h3>
        <h2>Our happy <span>clients say</span></h2>
      </div>
      <div class="slider" id="slider">
        <div class="slides">
          @foreach ([
            ['Emma Wilson', 'Homeowner', 'Our backyard has been completely transformed! The team was professional, attentive, and delivered beyond our expectations. The quality of work is outstanding.'],
            ['Jane Cooper', 'Villa Owner', 'From the first consultation to the final planting, everything ran on schedule. Our garden is now the favourite room in the house.'],
            ['Robert Fox', 'Property Manager', 'They listened, gave honest advice on what would thrive, and the maintenance plan keeps everything looking fresh every month.'],
          ] as [$name, $role, $quote])
            <div class="slide">
              <i class="fa-solid fa-quote-left quote"></i>
              <p>{{ $quote }}</p>
              <div class="author"><span class="author-initials" aria-hidden="true">{{ collect(explode(' ', $name))->map(fn ($w) => $w[0])->join('') }}</span><div><strong>{{ $name }}</strong><span>{{ $role }}</span></div></div>
            </div>
          @endforeach
        </div>
        <div class="slider-nav">
          <button class="prev" aria-label="Previous"><i class="fa-solid fa-arrow-left"></i></button>
          <button class="next" aria-label="Next"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
      </div>
    </div>
  </div>
</section>

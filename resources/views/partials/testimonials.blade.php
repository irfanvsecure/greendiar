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
            ['Ahmed Al Mansoori', 'Villa Owner', 'The irrigation system they installed cut our water bill noticeably, and the lawn has never looked greener, even through the summer heat.'],
            ['Sarah Khan', 'Homeowner', 'They turned a bare, sandy courtyard into a shaded garden with seating and lighting. We now spend every evening outside.'],
            ['Michael Brown', 'Facility Manager', 'Reliable, punctual and tidy. Their monthly maintenance team keeps our commercial landscaping in perfect condition.'],
            ['Fatima Rashid', 'Townhouse Owner', 'Great advice on plants that suit the UAE climate. Everything they planted is thriving and the design fits our small space perfectly.'],
            ['David Miller', 'Restaurant Owner', 'Our outdoor terrace looks stunning now. Customers keep complimenting the greenery, and the project was finished on time and on budget.'],
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

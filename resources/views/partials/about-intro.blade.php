<section class="section about" id="about">
  <div class="container grid-2">
    <div class="about-images reveal">
      <img class="about-img-1" src="{{ asset('assets/images/tree-trimming.jpg') }}" alt="Gardener pruning a tree">
      <img class="about-img-2" src="{{ asset('assets/images/plant-repotting.jpg') }}" alt="Repotting a seedling">
      <div class="experience-badge">
        <strong><span class="count" data-to="25">0</span>+</strong>
        <span>Years Of Experience</span>
      </div>
    </div>
    <div class="about-content">
      <div class="section-head left">
        <span class="bg-title">About Us</span>
        <h3 class="eyebrow">About Us</h3>
        <h2>Green Diar <span>Technical &amp; Landscaping Services</span></h2>
        <p>At Green Diar Technical &amp; Landscaping Services, we believe that a well-maintained property is more than just a beautiful space — it is a place where people feel comfortable, safe, and proud to live.</p>
        <p>We are a professional technical and landscaping services company providing comprehensive landscaping, garden maintenance and house maintenance for residential and commercial properties. Our goal is to provide reliable, high-quality solutions that keep your property looking its best and functioning efficiently throughout the year.</p>
      </div>
      <ul class="check-list reveal">
        <li><i class="fa-solid fa-circle-check"></i> Landscaping &amp; Garden Care</li>
        <li><i class="fa-solid fa-circle-check"></i> House Maintenance</li>
        <li><i class="fa-solid fa-circle-check"></i> Quality Workmanship</li>
        <li><i class="fa-solid fa-circle-check"></i> Customer Satisfaction</li>
      </ul>
      <div class="about-footer reveal">
        @unless (request()->routeIs('about'))
          <a href="{{ route('about') }}" class="btn btn-accent">More About Us <i class="fa-solid fa-arrow-right"></i></a>
        @endunless
        <a href="tel:{{ config('site.phone_link') }}" class="call-box">
          <span class="call-icon"><i class="fa-solid fa-phone-volume"></i></span>
          <span><small>Call Us Any Time</small><strong>{{ config('site.phone') }}</strong></span>
        </a>
      </div>
    </div>
  </div>
</section>

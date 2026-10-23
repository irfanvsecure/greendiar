<section @class(['section', 'faqs', 'tinted' => $tinted ?? true]) id="faqs">
  <div class="container grid-2">
    <div>
      <div class="section-head left">
        <span class="bg-title">FAQs</span>
        <h3 class="eyebrow">Frequently Asked Questions</h3>
        <h2>Everything you need to know <span>about our services</span></h2>
        <p>Creating Beautiful Spaces. Maintaining Lasting Value.</p>
      </div>
      <div class="faq-cta reveal">
        <span class="icon-circle"><i class="fa-solid fa-question"></i></span>
        <div><h3>Still Have Questions?</h3><p>Call, email or send us a request and our team will be happy to help.</p></div>
        <a href="{{ route('contact') }}#appointment" class="btn btn-accent full">Get In Touch</a>
      </div>
    </div>
    @include('partials.accordion', ['faqs' => config('site.faqs')])
  </div>
</section>

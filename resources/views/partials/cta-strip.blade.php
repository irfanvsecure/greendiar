{{-- Call-to-action strip linking to the appointment form. Optional: $title, $text. --}}
<section class="section project-cta tinted">
  <div class="container project-cta-inner reveal">
    <div>
      <h2>{{ $title ?? 'Have a project in mind?' }}</h2>
      <p>{{ $text ?? "Tell us what you need and we'll arrange a site visit and quotation." }}</p>
    </div>
    <div class="btn-group">
      <a href="{{ route('contact') }}#appointment" class="btn btn-accent">Get in Touch <i class="fa-solid fa-arrow-right"></i></a>
      <a href="tel:{{ config('site.phone_link') }}" class="btn btn-outline-dark">Call {{ config('site.phone') }} <i class="fa-solid fa-phone"></i></a>
    </div>
  </div>
</section>

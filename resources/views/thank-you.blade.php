@extends('layouts.app')

@section('title', 'Thank You – ' . config('app.name'))
@section('description', 'Thank you for your appointment request. Green Diar will contact you to confirm your site visit or quotation.')

@stack('styles')
<style>
  .thank-you-hero {
    position: relative;
    overflow: hidden;
    border-radius: 30px;
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    color: #fff;
    padding: 60px 40px;
    margin-bottom: 40px;
    box-shadow: 0 20px 50px rgba(11, 61, 44, 0.35);
  }
  .thank-you-hero::before {
    content: "";
    position: absolute;
    inset: -20%;
    background: url('{{ asset('assets/images/footer-bg.jpg') }}') center / cover no-repeat;
    opacity: .10;
    pointer-events: none;
    z-index: 0;
    border-radius: 30px;
  }
  .thank-you-hero > * { position: relative; z-index: 1; }
  .thank-you-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 8px 18px;
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 100px;
    color: var(--accent-light);
    font-size: 14px;
    font-weight: 600;
    letter-spacing: .06em;
    text-transform: uppercase;
    margin-bottom: 20px;
    backdrop-filter: blur(6px);
  }
  .thank-you-badge i { font-size: 16px; }
  .thank-you-wrap {
    max-width: 900px;
    margin: 0 auto;
  }
  .thank-you-hero h2 {
    font-size: clamp(28px, 5vw, 42px);
    font-weight: 800;
    line-height: 1.2;
    margin: 0 0 14px;
    letter-spacing: -.02em;
  }
  .thank-you-hero h2 span { color: var(--accent-light); }
  .thank-you-hero p {
    font-size: 18px;
    line-height: 1.6;
    color: rgba(255,255,255,.9);
    margin: 0;
    max-width: 620px;
    opacity: .95;
  }

  .thank-you-card {
    background: #fff;
    border-radius: 24px;
    padding: 40px;
    box-shadow: 0 12px 40px rgba(0,0,0,.06);
    border: 1px solid rgba(11,61,44,.05);
  }
  .thank-you-icon {
    width: 72px;
    height: 72px;
    border-radius: 50%;
    background: var(--accent-light);
    color: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px;
    margin: 0 0 24px;
    box-shadow: 0 10px 25px rgba(213,245,122,.35);
  }
  .thank-you-eyebrow {
    font-size: 15px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .12em;
    color: var(--accent);
    margin: 0 0 12px;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .thank-you-eyebrow i { font-size: 18px; }
  .thank-you-content h3 {
    font-size: clamp(24px, 4vw, 30px);
    font-weight: 800;
    color: var(--primary);
    margin: 0 0 16px;
    line-height: 1.3;
  }
  .thank-you-content p {
    color: rgba(11,61,44,.75);
    font-size: 17px;
    line-height: 1.7;
    margin: 0 0 28px;
  }

  .thank-you-details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 32px;
    padding-top: 32px;
    border-top: 1px solid rgba(11,61,44,.08);
  }
  .detail {
    display: flex;
    gap: 16px;
  }
  .detail-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    background: rgba(11,61,44,.05);
    color: var(--accent);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
  }
  .detail-text strong {
    display: block;
    font-size: 15px;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 4px;
  }
  .detail-text p {
    margin: 0;
    font-size: 14px;
    color: rgba(11,61,44,.65);
    line-height: 1.5;
  }
  .detail-text a { color: var(--accent); text-decoration: underline; text-decoration-thickness: 1px; text-underline-offset: 3px; }
  .detail-text a:hover { color: var(--primary); }

  .thank-you-actions {
    display: flex;
    gap: 16px;
    margin-top: 40px;
    flex-wrap: wrap;
  }
  .thank-you-actions .btn { padding: 16px 32px; font-size: 16px; font-weight: 700; }
  .btn-accent i, .btn-outline-dark i { position: static !important; width: auto; height: auto; background: none; color: inherit; font-size: 16px; transform: none !important; margin-left: 10px; }

  @media (max-width: 640px) {
    .thank-you-hero { padding: 40px 24px; }
    .thank-you-card { padding: 30px 24px; }
    .thank-you-actions { flex-direction: column; }
    .thank-you-actions .btn { width: 100%; justify-content: center; }
  }
</style>
@endstack

@section('content')

  @include('partials.page-header', ['title' => ['Thank', 'You'], 'crumbs' => ['Home' => route('home'), 'Contact Us' => route('contact'), 'Thank You' => null]])

  <section class="section thank-you">
    <div class="container thank-you-inner reveal">
      <div class="thank-you-wrap">

        <div class="thank-you-hero">
          <span class="thank-you-badge"><i class="fa-regular fa-circle-check"></i> Request Received</span>
          <h2>Thank You <span>{{ config('site.company') }}</span></h2>
          <p>We’ve received your appointment request. Our team will review your details and contact you shortly to confirm your site visit or quotation.</p>
        </div>

        <div class="thank-you-card">
          <div class="thank-you-icon">
            <i class="fa-regular fa-circle-check"></i>
          </div>
          <h3 class="thank-you-eyebrow"><i class="fa-solid fa-arrow-right"></i> What happens next?</h3>
          <div class="thank-you-content">
            <p>We’ll call or email you to confirm a convenient date and time for the site visit. Please keep your phone handy so we can reach you.</p>

            <div class="thank-you-details">
              <div class="detail">
                <div class="detail-icon"><i class="fa-solid fa-phone"></i></div>
                <div class="detail-text">
                  <strong>Call Us</strong>
                  <p><a href="tel:{{ config('site.phone_link') }}">{{ config('site.phone') }}</a></p>
                </div>
              </div>
              <div class="detail">
                <div class="detail-icon"><i class="fa-solid fa-envelope"></i></div>
                <div class="detail-text">
                  <strong>Email Us</strong>
                  <p><a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a></p>
                </div>
              </div>
              <div class="detail">
                <div class="detail-icon"><i class="fa-solid fa-location-dot"></i></div>
                <div class="detail-text">
                  <strong>Visit Us</strong>
                  <p>{{ config('site.address') }}</p>
                </div>
              </div>
            </div>
          </div>

          <div class="thank-you-actions reveal">
            <a href="{{ route('home') }}" class="btn btn-accent">Back to Home <i class="fa-solid fa-arrow-right"></i></a>
            <a href="{{ route('contact') }}#appointment" class="btn btn-outline-dark">Book Another Appointment <i class="fa-solid fa-calendar-plus"></i></a>
          </div>
        </div>

      </div>
    </div>
  </section>

  @include('partials.cta-strip', ['title' => 'Have another project in mind?', 'text' => 'Tell us what you need and we’ll arrange a site visit and quotation.'])

@endsection

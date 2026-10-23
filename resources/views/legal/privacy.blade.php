@extends('layouts.app')

@section('title', 'Privacy Policy – ' . config('app.name'))
@section('description', 'How ' . config('site.company') . ' collects, uses and protects the information you share through this website.')

@section('content')

  @include('partials.page-header', ['title' => ['Privacy', 'Policy'], 'crumbs' => ['Privacy Policy' => null]])

  <section class="section legal">
    <div class="container legal-content">
      <p class="legal-updated">Last updated: {{ config('site.legal_updated') }}</p>

      <p>This Privacy Policy explains how {{ config('site.company') }} ("Green Diar", "we", "us") collects, uses and protects the information you share when you use this website. By using the website, you agree to the practices described here.</p>

      <h2>1. Information we collect</h2>
      <p>We only collect the information you choose to give us, mainly through the appointment form on our Contact page:</p>
      <ul>
        <li>Your name, location, email address and phone number</li>
        <li>Your address, if you provide it</li>
        <li>The service you are interested in, your preferred date and time, and any details you write in the message box</li>
      </ul>
      <p>If you call, email or message us on WhatsApp, we also receive the details you share in that conversation.</p>

      <h2>2. How we use your information</h2>
      <ul>
        <li>To respond to your enquiry and arrange appointments or site visits</li>
        <li>To prepare quotations and deliver the services you request</li>
        <li>To contact you about your project or booking</li>
        <li>To keep records of our work and meet our legal and accounting obligations</li>
      </ul>
      <p>We do not sell or rent your personal information, and we do not use it for unrelated marketing without your consent.</p>

      <h2>3. Sharing your information</h2>
      <p>We share your information only when it is needed to provide our services, for example with team members or trusted contractors working on your project, or when we are required to do so by law.</p>

      <h2>4. Cookies and third-party services</h2>
      <p>This website uses essential cookies to keep it secure and working properly, such as protecting the contact form from misuse. The website also loads some content from third parties, which may receive basic technical information such as your IP address:</p>
      <ul>
        <li><strong>Google Maps</strong>, which shows our location on the Contact page</li>
        <li><strong>Google Fonts</strong> and public content delivery networks (CDNs) that supply fonts, icons and scripts</li>
        <li><strong>WhatsApp</strong>, if you choose to contact us using the WhatsApp button</li>
      </ul>
      <p>These services are covered by their own privacy policies.</p>

      <h2>5. How long we keep your information</h2>
      <p>We keep your information only for as long as needed to handle your enquiry, deliver our services and meet legal requirements. After that, it is deleted or anonymised.</p>

      <h2>6. Keeping your information safe</h2>
      <p>We take reasonable technical and organisational measures to protect your information from loss, misuse and unauthorised access. No method of sending information over the internet is completely secure, but we work to protect the information you share with us.</p>

      <h2>7. Your rights</h2>
      <p>You can ask us to tell you what information we hold about you, to correct it, or to delete it. To make a request, contact us using the details below.</p>

      <h2>8. Changes to this policy</h2>
      <p>We may update this Privacy Policy from time to time. The latest version will always be available on this page, with the date it was last updated.</p>

      <h2>9. Contact us</h2>
      <p>If you have any questions about this Privacy Policy, please contact us:</p>
      <ul class="legal-contact">
        <li><i class="fa-solid fa-envelope"></i> <a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a></li>
        <li><i class="fa-solid fa-phone"></i> <a href="tel:{{ config('site.phone_link') }}">{{ config('site.phone') }}</a></li>
        <li><i class="fa-solid fa-location-dot"></i> {{ config('site.address') }}</li>
      </ul>
    </div>
  </section>

@endsection

@extends('layouts.app')

@section('title', 'Terms & Conditions – ' . config('app.name'))
@section('description', 'The terms and conditions for using the ' . config('site.company') . ' website and booking our services.')

@section('content')

  @include('partials.page-header', ['title' => ['Terms &', 'Conditions'], 'crumbs' => ['Terms & Conditions' => null]])

  <section class="section legal">
    <div class="container legal-content">
      <p class="legal-updated">Last updated: {{ config('site.legal_updated') }}</p>

      <p>These Terms &amp; Conditions apply to your use of this website, which is operated by {{ config('site.company') }} ("Green Diar", "we", "us"). By using the website, you agree to these terms. If you do not agree, please do not use the website.</p>

      <h2>1. Use of the website</h2>
      <p>You may use this website to learn about our services and to contact us. You agree not to misuse the website, including by trying to gain unauthorised access, interfering with how it works, or submitting false or harmful information through its forms.</p>

      <h2>2. Information on the website</h2>
      <p>We work to keep the information on this website accurate and up to date, but it is provided for general information only. Service descriptions and photographs are illustrative and may differ from the final work, which depends on your site, requirements and the agreed scope.</p>

      <h2>3. Enquiries, quotations and appointments</h2>
      <ul>
        <li>Submitting the appointment form is a request, not a confirmed booking. We will contact you to confirm the date and time.</li>
        <li>Quotations are prepared after we understand your requirements and, where needed, after a site visit.</li>
        <li>Prices, timelines and the scope of work are confirmed in writing in each quotation or agreement.</li>
        <li>Work starts only after the quotation or agreement has been accepted.</li>
      </ul>

      <h2>4. Services and payment</h2>
      <p>Each project is governed by the quotation or agreement accepted for it, including payment terms, schedules and any warranties. If anything in that document differs from these terms, the quotation or agreement applies.</p>

      <h2>5. Site access and approvals</h2>
      <p>You agree to give our team safe and reasonable access to the site. Where a project needs approvals or permits, such as for swimming pool installation, the responsibilities for obtaining them will be agreed in the quotation.</p>

      <h2>6. Intellectual property</h2>
      <p>The content of this website, including text, logos, graphics and design, belongs to {{ config('site.company') }} or is used with permission. You may not copy, reproduce or reuse it without our written consent.</p>

      <h2>7. Links to other websites</h2>
      <p>This website may link to other websites and services, such as WhatsApp and Google Maps. We are not responsible for their content or how they handle your information.</p>

      <h2>8. Limitation of liability</h2>
      <p>To the extent allowed by law, we are not liable for any loss or damage resulting from your use of this website or from relying on its content. This does not affect our responsibilities under any agreement for services.</p>

      <h2>9. Privacy</h2>
      <p>The way we handle your personal information is described in our <a href="{{ route('privacy') }}">Privacy Policy</a>.</p>

      <h2>10. Changes to these terms</h2>
      <p>We may update these Terms &amp; Conditions from time to time. The latest version will always be available on this page, with the date it was last updated.</p>

      <h2>11. Governing law</h2>
      <p>These terms are governed by the laws of {{ config('site.jurisdiction') }}.</p>

      <h2>12. Contact us</h2>
      <p>If you have any questions about these Terms &amp; Conditions, please contact us:</p>
      <ul class="legal-contact">
        <li><i class="fa-solid fa-envelope"></i> <a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a></li>
        <li><i class="fa-solid fa-phone"></i> <a href="tel:{{ config('site.phone_link') }}">{{ config('site.phone') }}</a></li>
        <li><i class="fa-solid fa-location-dot"></i> {{ config('site.address') }}</li>
      </ul>
    </div>
  </section>

@endsection

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name') }} – Coming Soon</title>
  <meta name="description" content="{{ config('site.company') }}: our new website is on its way.">
  <meta name="robots" content="noindex">
  <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <style>
    :root { --primary: #0B3D2C; --accent: #2A7D2E; --accent-light: #D5F57A; --white: #fff; }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { min-height: 100vh; font-family: "Plus Jakarta Sans", sans-serif; color: rgba(255,255,255,.8); background: var(--primary) url('{{ asset('assets/images/footer-bg.jpg') }}') center / cover no-repeat; display: flex; flex-direction: column; }
    body::before { content: ""; position: fixed; inset: 0; background: linear-gradient(180deg, rgba(11,61,44,.92), rgba(11,61,44,.97)); z-index: -1; }
    a { color: inherit; text-decoration: none; }
    .wrap { flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 48px 16px; }
    .logo { display: inline-flex; align-items: center; gap: 10px; margin-bottom: 48px; }
    .logo-text { display: flex; flex-direction: column; align-items: flex-start; }
    .logo-text small { font-size: 11px; letter-spacing: .04em; color: rgba(255,255,255,.75); margin-top: 2px; }
    .badge { display: inline-flex; align-items: center; gap: 8px; padding: 8px 18px; border-radius: 100px; background: rgba(213,245,122,.12); color: var(--accent-light); font-size: 14px; font-weight: 600; margin-bottom: 24px; }
    .badge i { animation: spin 4s linear infinite; }
    @keyframes spin { to { transform: rotate(360deg); } }
    h1 { color: var(--white); font-size: clamp(34px, 6vw, 60px); font-weight: 800; line-height: 1.1; letter-spacing: -.02em; max-width: 760px; }
    h1 span { color: var(--accent-light); }
    p.lead { font-size: 18px; line-height: 1.7; max-width: 560px; margin: 20px auto 40px; }
    .contacts { display: flex; flex-wrap: wrap; justify-content: center; gap: 14px; }
    .btn { display: inline-flex; align-items: center; gap: 10px; padding: 15px 26px; border-radius: 100px; font-weight: 700; font-size: 16px; transition: .3s; border: 1px solid rgba(255,255,255,.25); color: var(--white); }
    .btn:hover { border-color: var(--accent-light); color: var(--accent-light); }
    .btn-primary { background: var(--accent-light); border-color: var(--accent-light); color: var(--primary); }
    .btn-primary:hover { background: var(--white); border-color: var(--white); color: var(--primary); }
    footer { text-align: center; padding: 24px 16px; font-size: 14px; color: rgba(255,255,255,.55); }
  </style>
</head>
<body>

  <div class="wrap">
    <span class="logo" aria-label="{{ config('site.company') }}">
      <img src="{{ asset('assets/images/logo-icon.png') }}" srcset="{{ asset('assets/images/logo-icon.png') }} 1x, {{ asset('assets/images/logo-icon@2x.png') }} 2x" width="52" height="54" alt="">
      <span class="logo-text">
        <img src="{{ asset('assets/images/logo-word.png') }}" srcset="{{ asset('assets/images/logo-word.png') }} 1x, {{ asset('assets/images/logo-word@2x.png') }} 2x" width="148" height="32" alt="{{ config('app.name') }}">
        <small>Technical &amp; Landscaping Services</small>
      </span>
    </span>

    <span class="badge"><i class="fa-solid fa-gear"></i> Under Construction</span>
    <h1>Our new website is <span>growing</span>. We'll be live soon.</h1>
    <p class="lead">We're putting the finishing touches on our new site. In the meantime, our team is ready to help with landscaping, garden maintenance, pools and property maintenance.</p>

    <div class="contacts">
      <a class="btn btn-primary" href="tel:{{ config('site.phone_link') }}"><i class="fa-solid fa-phone"></i> {{ config('site.phone') }}</a>
      @if (config('site.whatsapp'))
        <a class="btn" href="https://wa.me/{{ config('site.whatsapp') }}?text={{ rawurlencode(config('site.whatsapp_message')) }}" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
      @endif
      <a class="btn" href="mailto:{{ config('site.email') }}"><i class="fa-regular fa-envelope"></i> {{ config('site.email') }}</a>
    </div>
  </div>

  <footer>&copy; {{ date('Y') }} {{ config('site.company') }}</footer>

</body>
</html>

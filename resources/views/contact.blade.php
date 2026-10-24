@extends('layouts.app')

@section('title', 'Contact Us – ' . config('app.name'))
@section('description', 'Book an appointment with Green Diar for landscaping, garden maintenance or house maintenance. Request a site visit or quotation.')

@section('content')

  @include('partials.page-header', ['title' => ['Contact', 'Us'], 'crumbs' => ['Contact Us' => null]])

  <section class="section contact">
    <div class="container contact-grid appt-grid">
      <div class="contact-form-wrap" id="appointment">
        <div class="section-head left">
          <span class="bg-title">Appointment</span>
          <h3 class="eyebrow">Book an Appointment</h3>
          <h2>Request a site visit <span>or quotation</span></h2>
          <p>Tell us what you need and when suits you. Our team will confirm your appointment and arrange a site visit where required.</p>
        </div>

        @php($selectedService = old('service', request('service')))
        <form class="contact-form reveal" id="contactForm" action="{{ route('contact.store') }}" method="post" novalidate>
          @csrf
          <div class="form-row cols-3">
            <div @class(['field', 'invalid' => $errors->has('name')])>
              <label for="name">Owner Name</label>
              <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Owner Name *" autocomplete="name" required>
              @error('name')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div @class(['field', 'invalid' => $errors->has('location')])>
              <label for="location">Location</label>
              <input type="text" id="location" name="location" value="{{ old('location') }}" placeholder="Location *" autocomplete="address-level2" required>
              @error('location')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div @class(['field', 'invalid' => $errors->has('email')])>
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address *" autocomplete="email" required>
              @error('email')<span class="error">{{ $message }}</span>@enderror
            </div>
          </div>
          <div class="form-row cols-3">
            <div @class(['field', 'invalid' => $errors->has('phone')])>
              <label for="phone">Phone</label>
              <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone *" autocomplete="tel" required>
              @error('phone')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div @class(['field', 'invalid' => $errors->has('service')])>
              <label for="service">Service</label>
              <select id="service" name="service" required>
                <option value="">Select Service *</option>
                @foreach (config('service_catalog.categories') as $category => $items)
                  <optgroup label="{{ $category }}">
                    @foreach ($items as $item)
                      <option value="{{ $item['title'] }}" @selected($selectedService === $item['title'])>{{ $item['title'] }}</option>
                    @endforeach
                  </optgroup>
                @endforeach
                @foreach (config('service_catalog.form_only') as $category => $titles)
                  <optgroup label="{{ $category }}">
                    @foreach ($titles as $title)
                      <option value="{{ $title }}" @selected($selectedService === $title)>{{ $title }}</option>
                    @endforeach
                  </optgroup>
                @endforeach
              </select>
              @error('service')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="field">
              <label for="address">Address</label>
              <input type="text" id="address" name="address" value="{{ old('address') }}" placeholder="Address" autocomplete="street-address">
            </div>
          </div>
          <div class="form-row time-row">
            <div @class(['field', 'invalid' => $errors->has('date')])>
              <label for="date">Date</label>
              <input type="date" id="date" name="date" value="{{ old('date') }}" min="{{ now()->toDateString() }}" required>
              @error('date')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div @class(['field', 'invalid' => $errors->has('hour')])>
              <label for="hour">Hours</label>
              <select id="hour" name="hour" required>
                <option value="">Hours *</option>
                @foreach (range(1, 12) as $h)
                  <option value="{{ $h }}" @selected(old('hour') == $h)>{{ $h }}</option>
                @endforeach
              </select>
              @error('hour')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div @class(['field', 'invalid' => $errors->has('minute')])>
              <label for="minute">Minutes</label>
              <select id="minute" name="minute" required>
                <option value="">Minutes *</option>
                @foreach (['00', '15', '30', '45'] as $m)
                  <option value="{{ $m }}" @selected(old('minute') === $m)>{{ $m }}</option>
                @endforeach
              </select>
              @error('minute')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="field">
              <label for="meridiem">AM or PM</label>
              <select id="meridiem" name="meridiem">
                <option value="AM" @selected(old('meridiem') === 'AM')>AM</option>
                <option value="PM" @selected(old('meridiem') === 'PM')>PM</option>
              </select>
            </div>
          </div>
          <div class="field">
            <label for="message">Services required</label>
            <textarea id="message" name="message" rows="5" placeholder="Tell us about what services are required..">{{ old('message') }}</textarea>
          </div>
          <button type="submit" class="btn btn-accent">Request Appointment <i class="fa-solid fa-arrow-right"></i></button>
          <p @class(['form-status', 'ok' => session('status'), 'fail' => session('error')]) id="formStatus" role="status" aria-live="polite">{{ session('status') ?? session('error') }}</p>
        </form>
      </div>

      <aside class="contact-side reveal">
        <img src="{{ asset('assets/images/aluminum-pergolas.jpg') }}" alt="Aluminium pergola beside a pool">
        <div class="contact-cards">
          <a href="tel:{{ config('site.phone_link') }}" class="contact-card">
            <span class="icon-circle"><i class="fa-solid fa-phone"></i></span>
            <span><strong>Give Us A Call</strong>{{ config('site.phone') }}</span>
          </a>
          <a href="mailto:{{ config('site.email') }}" class="contact-card">
            <span class="icon-circle"><i class="fa-solid fa-envelope"></i></span>
            <span><strong>Send Us A Message</strong>{{ config('site.email') }}</span>
          </a>
          <div class="contact-card">
            <span class="icon-circle"><i class="fa-solid fa-location-dot"></i></span>
            <span><strong>Visit Our Location</strong>{{ config('site.address') }}</span>
          </div>
        </div>
      </aside>
    </div>
  </section>

  <section class="map">
    <iframe src="https://maps.google.com/maps?q={{ urlencode(config('site.map_query')) }}&amp;t=m&amp;z=12&amp;output=embed" title="Our location on Google Maps" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>

@endsection

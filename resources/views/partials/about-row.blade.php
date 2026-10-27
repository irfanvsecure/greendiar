{{-- About page section in the same layout as the home About section (partials/about-intro).
     Expects $images = [large, small] (file => alt), $bg, $eyebrow, $title = [plain, light], $text, $points = [[icon, title, text], ...].
     Optional: $reverse (images on the right), $tinted, $service (preselected in the quote form).
     $tabs = [label => ['text' => [paragraphs], 'points' => [...]]] shows tabbed content instead of $text / $points. --}}
<section @class(['section', 'about', 'about-row', 'reverse' => $reverse ?? false, 'tinted' => $tinted ?? false])>
  <div class="container grid-2 align-center">
    <div class="about-images reveal">
      @foreach ($images as $file => $alt)
        <img class="about-img-{{ $loop->iteration }}" src="{{ asset('assets/images/' . $file) }}" alt="{{ $alt }}" loading="lazy">
      @endforeach
    </div>
    <div class="about-content">
      <div class="section-head left">
        <span class="bg-title">{{ $bg }}</span>
        <h3 class="eyebrow">{{ $eyebrow }}</h3>
        <h2>{{ $title[0] }} <span>{{ $title[1] }}</span></h2>
        @isset($text)<p>{{ $text }}</p>@endisset
      </div>
      @isset($tabs)
        <div class="about-tabs reveal" data-tabs>
          <div class="about-tab-list" role="tablist">
            @foreach ($tabs as $label => $tab)
              <button role="tab" id="tab-{{ Str::slug($label) }}" aria-controls="panel-{{ Str::slug($label) }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" @class(['active' => $loop->first])>{{ $label }}</button>
            @endforeach
          </div>
          <div class="about-tab-panels">
            @foreach ($tabs as $label => $tab)
              <div role="tabpanel" id="panel-{{ Str::slug($label) }}" aria-labelledby="tab-{{ Str::slug($label) }}" @class(['about-tab-panel', 'active' => $loop->first])>
                @foreach ($tab['text'] ?? [] as $paragraph)
                  <p>{{ $paragraph }}</p>
                @endforeach
                @if (!empty($tab['points']))
                  <div class="about-points values">
                    @foreach ($tab['points'] as [$icon, $pointTitle, $pointText])
                      <div class="about-point">
                        <span class="icon-sq"><i class="fa-solid {{ $icon }}"></i></span>
                        <div><h3>{{ $pointTitle }}</h3><p>{{ $pointText }}</p></div>
                      </div>
                    @endforeach
                  </div>
                @endif
              </div>
            @endforeach
          </div>
        </div>
      @else
        <div class="about-points">
          @foreach ($points as [$icon, $pointTitle, $pointText])
            <div class="about-point reveal">
              <span class="icon-sq"><i class="fa-solid {{ $icon }}"></i></span>
              <div><h3>{{ $pointTitle }}</h3><p>{{ $pointText }}</p></div>
            </div>
          @endforeach
        </div>
      @endisset
      <div class="about-footer reveal">
        <a href="{{ route('contact', isset($service) ? ['service' => $service] : []) }}#appointment" class="btn btn-accent">Get in Touch <i class="fa-solid fa-arrow-right"></i></a>
        <a href="tel:{{ config('site.phone_link') }}" class="call-box">
          <span class="call-icon"><i class="fa-solid fa-phone-volume"></i></span>
          <span><small>Call Us Any Time</small><strong>{{ config('site.phone') }}</strong></span>
        </a>
      </div>
    </div>
  </div>
</section>

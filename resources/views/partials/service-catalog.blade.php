{{-- Service categories, each as a horizontal card slider (Swiper). Data: config/service_catalog.php
     $groups: [category => [slug => service]]; defaults to every category. An empty category name hides the row title.
     $perView: cards per row on desktop. $autoplay: loop the cards and advance them automatically. --}}
@php($groups = $groups ?? config('service_catalog.categories'))
<div class="catalog">
  @foreach ($groups as $category => $items)
    <div class="catalog-row" @if ($category) id="{{ Str::slug($category) }}" @endif>
      @if ($category)<h3 class="catalog-title">{{ $category }}</h3>@endif
      <div class="catalog-slider" data-per-view="{{ $perView ?? 5 }}" @if ($autoplay ?? false) data-autoplay @endif>
        <div class="swiper catalog-swiper">
          <div class="swiper-wrapper">
            @foreach ($items as $slug => $item)
              <div class="swiper-slide catalog-card">
                <a href="{{ route('contact', ['service' => $item['title']]) }}#appointment">
                  <div class="catalog-img"><img src="{{ asset('assets/images/' . $item['image']) }}" alt="{{ $item['title'] }}" loading="lazy" @isset($item['position']) style="object-position: {{ $item['position'] }}" @endisset></div>
                  <h4>{{ $item['title'] }}</h4>
                  <span class="catalog-price">Request a Quote <i class="fa-solid fa-arrow-right"></i></span>
                </a>
              </div>
            @endforeach
          </div>
        </div>
        <button class="catalog-nav prev" aria-label="Previous {{ $category }} services"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="catalog-nav next" aria-label="Next {{ $category }} services"><i class="fa-solid fa-chevron-right"></i></button>
      </div>
    </div>
  @endforeach
</div>

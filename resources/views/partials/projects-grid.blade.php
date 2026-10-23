{{-- Filterable project grid built from the service catalog (titles, photos and summaries).
     $only: optional list of service slugs to show (in that order); defaults to every project below. --}}
@php
  $groups = [
    'design' => ['Design', ['landscape-design', 'poolscape-design', 'plantscape-design', 'lighting-design']],
    'maintenance' => ['Garden Maintenance', ['garden-maintenance', 'lawn-mowing', 'tree-trimming', 'shrub-trimming']],
    'hardscape' => ['Hardscape', ['walkways-pathways', 'patios-decks', 'outdoor-stairs', 'driveway-carports']],
    'outdoor' => ['Outdoor Living', ['aluminum-pergolas-gazebos', 'wooden-pergolas-gazebos', 'outdoor-kitchens']],
    'irrigation' => ['Irrigation & Grass', ['irrigation-system-installation', 'natural-grass-installation', 'artificial-grass-installation', 'natural-green-walls']],
  ];
  $services = collect(config('service_catalog.categories'))->collapse();
  $categoryOf = collect($groups)->flatMap(fn ($group, $key) => array_fill_keys($group[1], $key));
  $slugs = $only ?? $categoryOf->keys()->all();
  $filters = collect($groups)->filter(fn ($group, $key) => collect($slugs)->contains(fn ($slug) => $categoryOf[$slug] === $key));
@endphp

<ul class="filters" id="filters">
  <li class="active" data-filter="all">All</li>
  @foreach ($filters as $key => [$label])
    <li data-filter="{{ $key }}">{{ $label }}</li>
  @endforeach
</ul>

<div class="grid-3 project-grid">
  @foreach ($slugs as $slug)
    @php($item = $services[$slug])
    <article class="project" data-cat="{{ $categoryOf[$slug] }}">
      <div class="img-wrap"><img src="{{ asset('assets/images/' . $item['image']) }}" alt="{{ $item['title'] }}" loading="lazy" @isset($item['position']) style="object-position: {{ $item['position'] }}" @endisset></div>
      <div class="project-body"><h4>{{ $item['title'] }}</h4><p>{{ $item['summary'] }}</p><a href="{{ route('contact', ['service' => $item['title']]) }}#appointment" class="arrow-btn" aria-label="Request {{ $item['title'] }}"><i class="fa-solid fa-arrow-right"></i></a></div>
    </article>
  @endforeach
</div>

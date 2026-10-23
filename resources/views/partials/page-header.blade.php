{{-- Inner page banner. Expects $title = [plain, light] and $crumbs = [label => url|null]. --}}
<section class="page-header">
  <div class="container">
    <h1 class="reveal">{{ $title[0] }} <span>{{ $title[1] }}</span></h1>
    <ol class="breadcrumb reveal">
      <li><a href="{{ route('home') }}">Home</a></li>
      @foreach ($crumbs as $label => $url)
        @if ($url)
          <li><a href="{{ $url }}">{{ $label }}</a></li>
        @else
          <li aria-current="page">{{ $label }}</li>
        @endif
      @endforeach
    </ol>
  </div>
</section>

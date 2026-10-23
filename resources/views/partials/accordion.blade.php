<div class="accordion reveal">
  @foreach ($faqs as $question => $answer)
    <div @class(['acc-item', 'open' => $loop->first])>
      <button class="acc-head">{{ $question }}<i class="fa-solid fa-plus"></i></button>
      <div class="acc-body"><p>{{ $answer }}</p></div>
    </div>
  @endforeach
</div>

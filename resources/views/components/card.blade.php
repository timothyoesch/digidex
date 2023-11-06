<div {{$attributes->merge(["class"=>"ddx-card"])}} onclick="window.location.href = '{{route("cards.show", $card)}}'">
    <div class="ddx-card-image">
        <img src="https://gravatar.com/avatar/{{$card->image}}" class="rounded-full aspect-ratio-1/1 h-8 w-8">
    </div>
    <p class="text-sm font-medium text-indigo-700 hover:underline"><a href="{{route("cards.show", $card)}}">{{$card->name}}</a></p>
    @foreach ($fields as $field)
        <p class="text-sm">{{$card->$field}}</p>
    @endforeach
</div>

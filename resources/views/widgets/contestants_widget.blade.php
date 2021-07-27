@foreach ($contestants as $key => $contestant)
    <div class="item" onclick="modelVoteShow({{$contestant->id}}, '{{$contestant->name }}')">
        <div class="order">{{$key + 1}}</div>

        {{ $contestant->name }}{{ $contestant->id }}

        <div class="votes-style"> {{ $contestant->number_of_votes }} </div>

    </div>              
@endforeach
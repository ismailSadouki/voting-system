

@foreach ($contestants as $key => $contestant)
{{-- <div class="item" onclick="modelVoteShow({{$contestant->id}}, '{{$contestant->name }}')"> --}}
<a class="col-12 text-center leaderboard-card losos" onclick="modelToggleVote('{{$contestant->id}}', '{{$contestant->name }}')">
    <div class="row" style="justify-content: space-between;">
        <div class="col-3 leaderboard-card-text" style="color:{{ $key == 0 ? ' #e83e8c' : '' }}">{{ $contestant->number_of_votes }}</div>
        
        <div class="col-4 leaderboard-card-text">
            <div>{{ $contestant->name }} </div>
        </div>
        <div class="col-2 leaderboard-card-text">
            @switch($key)
                @case(0)
                    <img src="{{ asset('medal1.svg') }}" alt="medal vector" class="medal-image">
                    @break
                @case(1)
                    <img src="{{ asset('medal2.svg') }}" alt="medal vector" class="medal-image">
                    @break
                @case(2)
                    <img src="{{ asset('medal3.svg') }}" alt="medal vector" class="medal-image">
                    @break
                @case(3)
                    <img src="{{ asset('medal4.svg') }}" alt="medal vector" class="medal-image">
                    @break
                @default
                <img src="{{ asset('medal4.svg') }}" alt="medal vector" class="medal-image">
                    
            @endswitch
            <div class="medal">{{$key + 1}}</div>
        </div>
    </div>
    <hr>
</a>
@endforeach

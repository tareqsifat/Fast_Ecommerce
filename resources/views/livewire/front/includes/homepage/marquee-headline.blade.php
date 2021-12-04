<div>
    @if($data)
    <div class="marquee_wrapper px-4 mt-4">
        <marquee class="pt-3" behavior="{{$data->behavior}}" direction="{{$data->direction}}" Scrollamount="{{ $data->speed }}" style="color: {{$data->color}};">
            {{$data->text}}
        </marquee>
    </div>
    @endif
</div>
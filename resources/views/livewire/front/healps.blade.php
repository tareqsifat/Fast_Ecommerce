<main id="main" class="main-site">

    @section('cssStyles')
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        a {
            text-decoration: none;
        }

        li a {
            font-size: 13px;
        }
        .d-none{
            display: block !important;
        }
    </style> -->
    @endsection
    @section('title')
    {{'help'}}
    @endsection
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul class="my-4">
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link"><span class="text_success">@yield('title')</span></li>
            </ul>
        </div>
        <div class="main-content-area bgffffff p-5 mb-5">
            <div class="accordion accordion-flush " id="accordionFlushExample">
                @foreach($globalfaq as $key => $fqItem)
                <div class="accordion-item {{ $globalfaq->last()->id==$fqItem->id ? '':'border_bottom_e7' }}">
                    <h2 class="m-0 accordion-header card-header" id="flush-heading{{$key}}">
                        <button class="accordion-button collapsed font-size-18 border_none bg-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$key}}" aria-expanded="false" aria-controls="flush-collapse{{$key}}">
                            #{{$key+1}} {{$fqItem->title}}
                        </button>
                    </h2>
                    <div id="flush-collapse{{$key}}" class="accordion-collapse collapse p-3" aria-labelledby="flush-heading{{$key}}" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body font-size-16">{{$fqItem->description}}</div>
                    </div>
                </div>
                @endforeach
            </div>
            @if(!empty($findpage->description))
            <div class="mt-5">
                <p style="text-align: justify;">{!! $findpage->description !!}</p>
            </div>
            @endif
        </div>
    </div>
    <!--end container-->
</main>
@push('scripts')
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script>
    $('.collapse').collapse()
</script>
@endpush
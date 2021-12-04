<div class="row">
    @section('title')
    {{'Faq '}}
    @endsection
    <div class="col-12">
        <div class="card">
            <div class="card-body p-0">
                <div id="accordion">
                    <style>
                        .cart_header_hover:hover {
                            background: #dadada !important
                        }
                    </style>
                    @php $i=1; @endphp
                    @foreach($datas as $item)
                    <div class="card mb-0">
                        <div class="card-header bg-white cart_header_hover" id="headingOne{{$i}}">
                            <h5 class="mb-0 mt-0 font-14">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{$i}}" aria-expanded="true" aria-controls="collapseOne{{$i}}" class="text-dark">
                                    {{$item->title}}
                                </a>
                            </h5>
                        </div>
                        <div id="collapseOne{{$i}}" class="collapse" aria-labelledby="headingOne{{$i}}" data-parent="#accordion">
                            <div class="card-body">
                                {{ $item->description }}
                            </div>
                        </div>
                    </div>

                    @php $i++; @endphp
                    @endforeach
                </div>

            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<div>
    <div class="row">
        @section('title')
        {{'search Product'}}
        @endsection
    </div>
    <div class="col-12">
        <div class="card pt-4">
            @if($data)
            <div class="w-50 m-auto">
                <img class="card-img-top img-thumbnail" src='@if(file_exists("uploads/products/thumbnails/$data->thumbnail")){{asset("uploads/products/thumbnails/$data->thumbnail")}} @else {{asset("defaults/default-blank-img.jpg")}}  @endif' alt="{{$data->thumbnail}}">
                <div class="m-auto w-100 text-center">
                    @foreach($data->productimages as $imgItem)
                    <img class="" width="80px" src='@if(file_exists("uploads/products/images/$imgItem->image")){{asset("uploads/products/images/$imgItem->image")}} @else {{asset("defaults/default-blank-img.jpg")}}  @endif' alt='{{asset("uploads/products/images/$imgItem->image")}}'>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="card-body">
                @if($data)
                <h4 class=" card-title font-16 mt-0">{{$data->title}}</h4>
                <div class="font-14">
                    <span class="badge badge-default">
                        <strong>Category:</strong>
                        {{$data->parentcategory->name}}
                        @if($data->subcategories)<i class="fa fa-angle-right"></i>{{$data->subcategories->name}} @endif
                        @if($data->childCategory) <i class="fa fa-angle-right"></i> {{$data->childCategory->name}}@endif
                        @if($data->ycategory) <i class="fa fa-angle-right"></i> {{$data->babycategory->name}}@endif
                        @if($data->newBornCategory) <i class="fa fa-angle-right"></i> {{$data->newBornCategory->name}}@endif
                        @if($data->eforeBornCategory) <i class="fa fa-angle-right"></i> {{$data->beforeBornCategory->name}}@endif
                    </span>
                    <br>
                    <div class="">
                        <span class="badge badge-primary">
                            <strong>Brand:</strong>
                            {{$data->brands->name}}
                        </span>
                        <br>
                        <span class="badge {{($data->availability == 0)?'badge-info':'badge-warning'}}">
                            <strong> Status:</strong>
                            {{($data->availability == 0)?'In stock':'Out of stoke'}}
                        </span>
                        <br>
                        <span class="badge badge-primary">
                            <strong>Total Views:</strong>
                            {{$data->mostview}}
                        </span>
                        @if($data->color)
                        <br>
                        <span class="badge badge-primary">
                            <strong>Color:</strong>
                            {{$data->color}}
                        </span>
                        @endif
                        @if($data->sold)
                        <br>
                        <span class="badge badge-primary">
                            <strong>Slod:</strong>
                            {{$data->sold}}
                        </span>
                        @endif
                        @if($data->sale_price)
                        <br>
                        <span class="badge badge-primary">
                            <strong>Offer Price:</strong>
                            {{$data->sale_price}}
                        </span>
                        @endif
                        @if($data->price)
                        <br>
                        <span class="badge badge-primary">
                            <strong>Price:</strong>
                            {{$data->price}}
                        </span>
                        @endif
                    </div>
                </div>
                <p class="card-text text-center">{!! $data->description !!}</p>
                <p class="card-text text-center">{!! $data->description2 !!}</p>
                @if($data->productspecification->count()>0)
                <div class="bgffffff row px-3 mb-4">
                    @foreach($data->productspecification as $spItem)
                    <div class="">
                        <h5 class="bg-success font-weight-bold font-size-14 px-2 text3749BB font-size-14">{{$spItem->title}}</h5>
                    </div>

                    <table class="w-100">
                        @foreach($spItem->ProductSpecificationOptions as $spSubItem)
                        <tr class="border_bottom_eee">
                            <th width="25%" class="py-4">{{$spSubItem->name}}</th>
                            <td>{{$spSubItem->description}}</td>
                        </tr>
                        @endforeach
                    </table>
                    @endforeach
                </div>
                @endif

                @else
                <h5 style="text-align: center;">Product Not Found</h5>
                @endif
            </div>
        </div>
    </div>
</div>
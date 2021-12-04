<main id="main" class="main-site mt-3">
    @section('title')
    {{"user-reviews"}}
    @endsection
    <div class="container pb-60">
        <div class="row">
            @livewire('front.auth.customers.profile.layouts')
            <div class="col-sm-12 col-md-8 m-0 p-0">
                <div class="card wrap-profile-content">
                    <div class="card-header">
                        <span><i class="fa fa-star font-size-18 mr-2"></i></span>
                        <strong class="text-gray-600">Reviews</strong>
                    </div>
                    <div class="inner card-body pt-5 bgffffff">
                        @if($reviews->count()>0)
                        <table class="table border-none">
                            <thead>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Product</th>
                                    <th>Review</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reviews as $nreviews)
                                <tr>
                                    <td>{{$nreviews->product_id}}</td>
                                    <td>
                                        <?php
                                        $product = DB::table('products')->where('id', $nreviews->product_id)->first();
                                        ?>
                                        <a class="text_dark" href="{{route('single',$product->slug)}}"> {{$product->title}}</a>
                                    </td>
                                    <td>
                                        <div class="comment-form-rating">
                                            <p class="stars">
                                                <label for="rated-1"></label>
                                                <input type="radio" @if($nreviews->review == 1 ) {{'checked="checked"'}} @endif>
                                                <label for="rated-2"></label>
                                                <input type="radio" @if($nreviews->review == 2 ) {{'checked="checked"'}} @endif>
                                                <label for="rated-3"></label>
                                                <input type="radio" @if($nreviews->review == 3 ) {{'checked="checked"'}} @endif>
                                                <label for="rated-4"></label>
                                                <input type="radio" @if($nreviews->review == 4 ) {{'checked="checked"'}} @endif>
                                                <label for="rated-5"></label>
                                                <input type="radio" @if($nreviews->review == 5 ) {{'checked="checked"'}} @endif>
                                            </p>
                                        </div>
                                        <a href="{{route('user.reviews.single', $product->id)}}" class="btn btn-sm btn-success">Review</a>
                                    </td>
                                    <td title="{{$nreviews->comment}}">{{Str::limit($nreviews->comment, 20)}}</td>
                                    <td>{{($nreviews->status == 1)? 'Aproved' : 'Panding...'}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="information-area">
                            <div class="p-3">
                                <div class="information-body">
                                    <div class="row my-2">
                                        <div class="font-weight-bold font-size-15 col-sm-12 col-md-12"><i class="">No review found</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end container-->
</main>
<main id="main" class="main-site mt-3">
    @section('title')
    {{"Review"}}
    @endsection
    <div class="container pb-60">
        <div class="row">
            @livewire('front.auth.customers.profile.layouts')
            <div class="col-sm-12 col-md-8 m-0 p-0">
                <div class="card wrap-profile-content">
                    <div class="card-header">
                        <strong class="text-gray-600">Orders Review</strong>
                    </div>
                    <div class="card-body pt-5 bgffffff">
                        <form wire:submit.prevent="submit" class="form">
                            <div class="form-group">
                                <label for=""><strong>Product Title: </strong></label>
                                <span>{{$pdatas->title}}</span>
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Brand:</strong></label>
                                <span>{{$pdatas->brands->name}}</span>
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Price:</strong></label>
                                <span>{{$pdatas->price}}</span>
                            </div>
                            <div class="form-group">
                                <div class="comment-form-rating">
                                    <label><strong>Your rating</strong></label>
                                    @if($errors->has('review'))<br> <span class="text-danger">{{$errors->first('review')}}</span> <br> @endif
                                    <p class="stars">
                                        <label for="rated-1"></label>
                                        <input wire:model.lazy="review" type="radio" id="rated-1" name="rating" value="1" @if($rdatas) @if($rdatas->review == 1 ) {{'checked="checked"'}} @endif @endif>
                                        <label for="rated-2"></label>
                                        <input wire:model.lazy="review" type="radio" id="rated-2" name="rating" value="2" @if($rdatas) @if($rdatas->review == 2 ) {{'checked="checked"'}} @endif @endif>
                                        <label for="rated-3"></label>
                                        <input wire:model.lazy="review" type="radio" id="rated-3" name="rating" value="3" @if($rdatas) @if($rdatas->review == 3 ) {{'checked="checked"'}} @endif @endif>
                                        <label for="rated-4"></label>
                                        <input wire:model.lazy="review" type="radio" id="rated-4" name="rating" value="4" @if($rdatas) @if($rdatas->review == 4 ) {{'checked="checked"'}} @endif @endif>
                                        <label for="rated-5"></label>
                                        <input wire:model.lazy="review" type="radio" id="rated-5" name="rating" value="5" @if($rdatas) @if($rdatas->review == 5 ) {{'checked="checked"'}} @endif @endif>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <br>
                                <label for="comment"><strong>Comment</strong></label>
                                @if($errors->has('comment'))<br> <span class="text-danger">{{$errors->first('comment')}}</span> <br> @endif
                                <br>
                                <textarea class="form-control" placeholder="Write your Comment of the product" wire:model.lazy="comment" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label> <br>
                                @if($errors->has('image.*'))<span class="text-danger">{{$errors->first('image')}}</span> @endif
                                @if ($image)
                                @foreach($image as $pimage)
                                <img class="img-thumbnail" height="80px" width="150px" src="{{ $pimage->temporaryUrl() }}">
                                <i wire:click.prevent="removepreviewImg({{$loop->index}})" class="fa fa-trash btn text-danger p-0 m-0"></i>
                                @endforeach
                                @endif
                                @foreach($reviewImage as $oldimage)
                                <img class="img-thumbnail" height="80px" width="150px" src='{{asset("uploads/reviews/$oldimage->image")}}'>
                                <i onclick="confirm('Are you sure to delete this product image?') || event.stopImmediatePropagation()" wire:click.prevent="removeOldImg({{$oldimage->id}})" class="fa fa-trash btn text-dark p-0 m-0"></i>
                                @endforeach
                                <input class="mt-2" multiple type="file" wire:model="image" id="upload{{ $iteration }}">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-dark">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end container-->
</main>
<main id="main" class="main-site">
    @section('title')
    {{$settings->title . 'ask question'}}
    @endsection
    @section('description')
    {{$settings->sitedescription}}
    @endsection
    <div class="row mt-5">
        <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12 col-md-offset-3">
            <div class="main-content-area bgffffff">
                <div class="wrap-login-item">
                    <div class="login-form form-item form-stl p-5 w-100">
                        <form action="" wire:submit.prevent="save">
                            <h2 class="font-size-20 text_success font-weight-bold mb-5">Ask Question</h2>
                            <div class="form-group">
                                <div class="card">
                                    <div class="card-body">{{$title}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Your E-Mail</label>
                                <input wire:model.lazy="email" class="form-control" type="text" placeholder="Email">
                                <input wire:model.lazy="product_id" type="hidden">
                            </div>
                            <div class="form-group">
                                <label>Your Question</label>
                                @if($errors->has('description')) <br> <span class="text_danger">{{$errors->first('description')}}</span> @endif
                                <textarea wire:model.lazy="description" class="form-control" placeholder="Your Question" name="" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="br-5 btn btn-success btn-block">
                                <a href="" class="br-5 mt-2 btn btn-dark btn-block">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end main products area-->
        </div>
    </div>
    <!--end container-->
</main>
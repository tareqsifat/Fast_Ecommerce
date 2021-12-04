<div class="container">
    @section('title')
    {{'Contact us'}}
    @endsection
    <div class="row my-5 py-5">
        <div class=" main-content-area">
            <div class="wrap-contacts w-100">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="contact-box contact-form">
                        <h2 class="box-title">Leave a Message</h2>
                        <form wire:submit.prevent="sendMessage" name="frm-contact">
                            <!-- name  -->
                            <label for="name">Name<span>*</span></label>
                            @if($errors->has('name'))<span class="text-danger">{{$errors->first('name')}}</span> @endif
                            <input placeholder="Enter Your Name" wire:model.lazy="name" class="form-control" type="text" value="" id="name" name="name">

                            <!-- email -->
                            <label for="email">Email</label>
                            @if($errors->has('email'))<span class="text-danger">{{$errors->first('email')}}</span> @endif
                            <input placeholder="Enter Your Email" wire:model.lazy="email" class="form-control" type="text" value="" id="email" name="email">
                            <!-- phone -->
                            <label for="phone">Phone<span>*</span></label>
                            @if($errors->has('phone'))<span class="text-danger">{{$errors->first('phone')}}</span> @endif
                            <input placeholder="Enter Your Phone" wire:model.lazy="phone" class="form-control" type="text" value="" id="phone" name="phone">

                            <!-- message -->
                            <label for="comment">Messages <span>*</span></label>
                            @if($errors->has('message'))<span class="text-danger">{{$errors->first('message')}}</span> @endif
                            <textarea placeholder="Enter Your Message" wire:model.lazy="message" class="form-control" name="comment" id="comment"></textarea>
                            <!-- submit -->
                            <button class="font-weight-bold mt-3 py-3 btn btn-block btn-success">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="contact-box contact-info">
                        <div class="wrap-map" wire:ignore>
                            <div class="mercado-google-maps" id="az-google-maps57341d9e51968" data-hue="" data-lightness="1" data-map-style="2" data-saturation="-100" data-modify-coloring="false" data-title_maps="{{$settings->title}}" data-phone="{{$settings->phone}}" data-email="{{$settings->email}}" data-address="{{$settings->address}}" data-longitude="90.399452" data-latitude="23.777176" data-pin-icon="" data-zoom="16" data-map-type="ROADMAP" data-map-height="263">
                            </div>
                        </div>
                        <h2 class="box-title">Contact Detail</h2>
                        <div class="wrap-icon-box">
                            <div class="icon-box-item">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <div class="right-info">
                                    <b>Email</b>
                                    <p><a href="mailto:{{$datas->email}}">{{$datas->email}}</a></p>
                                </div>
                            </div>

                            <div class="icon-box-item">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <div class="right-info">
                                    <b>Phone</b>
                                    <p><a href="tel:+{{$datas->phone}}">{{$datas->phone}}</a></p>
                                </div>
                            </div>

                            <div class="icon-box-item">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <div class="right-info">
                                    <b>Mail Office</b>
                                    <p>{{$datas->address}}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end main products area-->

    </div>
    <!--end row-->

</div>
<!--end container-->
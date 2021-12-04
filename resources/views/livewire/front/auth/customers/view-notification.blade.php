<main id="main" class="main-site mt-3">
    @section('title')
    {{"View Notification"}}
    @endsection
    <div class="container pb-60">
        <div class="row">
            @livewire('front.auth.customers.profile.layouts')
            <div class="col-sm-12 col-md-8 m-0 p-0">
                <div class="card wrap-profile-content">
                    <div class="card-header">
                        <strong class="text-gray-600">Notification</strong>
                    </div>
                    @if($getItemData)
                    <div class="card-body py-5">
                        <div class=""> {{$getItemData->message}}</div>
                        <div class="my-2 py-3">{{$getItemData->created_at}}</div>
                    </div>

                    <div class="card-footer">
                        <a class="btn btn-info" href="{{route('user.notification')}}">Back</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    <!--end container-->
</main>
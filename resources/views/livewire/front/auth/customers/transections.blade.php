<main id="main" class="main-site mt-3">
    @section('title')
    {{"user-tansections"}}
    @endsection
    <div class="container pb-60">
        <div class="row">
            @livewire('front.auth.customers.profile.layouts')
            <div class="col-sm-12 col-md-8 m-0 p-0">
                <div class="card wrap-profile-content">
                    <div class="card-header">
                        <strong class="text-gray-600">Transections</strong>
                    </div>
                    <div class="card-body pt-5 bgffffff">
                        <H4 class="text-align-center">Not Available </H4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end container-->
</main>
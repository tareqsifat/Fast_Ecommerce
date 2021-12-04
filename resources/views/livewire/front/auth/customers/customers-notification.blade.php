<main id="main" class="main-site mt-3">
    @section('title')
    {{"User Notification"}}
    @endsection
    <div class="container pb-60">
        <div class="row">
            @livewire('front.auth.customers.profile.layouts')
            <div class="col-sm-12 col-md-8 m-0 p-0">
                <div class="card wrap-profile-content">
                    <div class="card-header">
                        <strong class="text-gray-600">Notification</strong>
                    </div>
                    <div class="inner card-body pt-5 bgffffff">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                @foreach($datas as $ndata)
                                <tr>
                                    <td title="{{$ndata->message}}">{{Str::limit($ndata->message,20)}}</td>
                                    <td>{{$ndata->created_at->diffForHumans()}}</td>
                                    <td class="d-flex">
                                        <div class="btn mr-1"><a href="{{route('user.notification.view', $ndata->id)}}"><i class="fa fa-eye text-info"></i></a></div>
                                        <div onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="delete({{$ndata->id}})" class="btn text_dark"><i class="fa fa-trash text-danger"></i></div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end container-->
</main>
<div class="row">
    @section('title')
    {{'Notifications'}}
    @endsection
    <div class="col-12">
        <div class="alert @if($data->message_type == 'alert'){{'alert-warning'}} @elseif($data->message_type == 'warning') {{'alert-warning'}}  @elseif($data->message_type == 'success') {{'alert-success'}} @elseif($data->message_type == 'error') {{'alert-error'}} @endif">
        <span class="badge badge-info">New</span>    
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <i>{{$data->body}}</i>
        </div>
    </div>
    <div class="col-12">
        <h4>All Notifications <span class="text-info">({{$notificationMsg->count()}})</span></h4>
        @foreach($notificationMsg as $allNft)
        <div class="alert @if($allNft->notification->message_type == 'alert'){{'alert-warning'}} @elseif($allNft->notification->message_type == 'warning') {{'alert-warning'}}  @elseif($allNft->notification->message_type == 'success') {{'alert-success'}} @elseif($allNft->notification->message_type == 'error') {{'alert-error'}} @endif">
            <div> <i>{{$allNft->notification->body}}</i> <a  onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="delete({{$allNft->id}})"  href="javascript:void(0)" > <i class="fa fa-trash float-right"></i></a>
                <br>
                {{$allNft->notification->created_at->diffForHumans()}}
            </div>
        </div>
        @endforeach
    </div>
</div>
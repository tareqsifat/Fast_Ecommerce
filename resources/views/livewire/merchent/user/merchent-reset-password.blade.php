<div class="col-6">
    <h6 class="font-weight-bold">Change Password</h6>
    <form wire:submit.prevent="changePassword">
        <div class="form-group">
            <label for="password">OldPassword</label>
            @if($errors->has('oldPassword'))<br> <span class="text-danger">{{$errors->first('oldPassword')}}</span> <br> @endif
            <input wire:model.lazy="oldPassword" type="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="password">New Password</label>
            @if($errors->has('password'))<br> <span class="text-danger">{{$errors->first('password')}}</span> <br> @endif
            <input wire:model.lazy="password" type="password" class="form-control" placeholder="New Password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            @if($errors->has('password_confirmation'))<br> <span class="text-danger">{{$errors->first('password_confirmation')}}</span> <br> @endif
            <input wire:model.lazy="password_confirmation" type="password" class="form-control" placeholder="Password Confirmation">
        </div>
        <div class="form-group">
            <input type="submit" value="Save" class="btn btn-dark">
        </div>
    </form>
</div>
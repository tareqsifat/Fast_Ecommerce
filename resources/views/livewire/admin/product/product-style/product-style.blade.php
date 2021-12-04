<div class="row">
    @section('title')
    {{'Product Card Style'}}
    @endsection
    <div class="col-12">
        <form wire:submit.prevent="save" action="">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="card p-2">
                        <h5>Cart Button</h5>
                        <strong class="text-info">Normal Styles</strong> <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="card_text">Button Text</label>
                                    @if($errors->has('card_text'))<span class="text-danger">{{$errors->first('card_text')}}</span> @endif
                                    <input placeholder="Enter text" wire:model.lazy="card_text" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="card_button_transition">Button Transition</label>
                                    @if($errors->has('card_button_transition'))<span class="text-danger">{{$errors->first('card_button_transition')}}</span> @endif
                                    <input wire:model.lazy="card_button_transition" class="form-control" type="number" min='0' step="0.1" placeholder="Transition">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="card_button_text_color">Button Text Color</label>
                                    @if($errors->has('card_button_text_color'))<span class="text-danger">{{$errors->first('card_button_text_color')}}</span> @endif
                                    <input wire:model.lazy="card_button_text_color" class="form-control" type="color">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="card_button_background">Button Background Color</label>
                                    @if($errors->has('card_button_background'))<span class="text-danger">{{$errors->first('card_button_background')}}</span> @endif
                                    <input wire:model.lazy="card_button_background" class="form-control" type="color">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="card_button_border">Button Border</label>
                                    @if($errors->has('card_button_border'))<span class="text-danger">{{$errors->first('card_button_border')}}</span> @endif
                                    <input wire:model.lazy="card_button_border" class="form-control" type="color">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="card_button_font_style">Button Font Style</label>
                                    @if($errors->has('card_button_font_style'))<span class="text-danger">{{$errors->first('card_button_font_style')}}</span> @endif
                                    <select wire:model.lazy="card_button_font_style" class="form-control" id="">
                                        <option value="normal">Normal</option>
                                        <option value="italic">Italic</option>
                                        <option value="oblique">Oblique</option>
                                        <option value="initial">Initial</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="card_button_font_weight">Button Font Weight</label>
                                    @if($errors->has('card_button_font_weight'))<span class="text-danger">{{$errors->first('card_button_font_weight')}}</span> @endif
                                    <select wire:model.lazy="card_button_font_weight" class="form-control" id="">
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="300">300</option>
                                        <option value="400">400</option>
                                        <option value="500">500</option>
                                        <option value="600">600</option>
                                        <option value="700">700</option>
                                        <option value="800">800</option>
                                        <option value="900">900</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="card p-2">
                        <h5>Cart Button</h5>
                        <strong class="text-info">Hover Effect</strong> <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="card_button_text_hover_color">Button Text Hover Color</label>
                                    @if($errors->has('card_button_text_hover_color'))<span class="text-danger">{{$errors->first('card_button_text_hover_color')}}</span> @endif
                                    <input wire:model.lazy="card_button_text_hover_color" class="form-control" type="color">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="card_button_hover_background">Button Background Hover</label>
                                    @if($errors->has('card_button_hover_background'))<span class="text-danger">{{$errors->first('card_button_hover_background')}}</span> @endif
                                    <input wire:model.lazy="card_button_hover_background" class="form-control" type="color">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="card_button_hover_border">Button Border Hover</label>
                                    @if($errors->has('card_button_hover_border'))<span class="text-danger">{{$errors->first('card_button_hover_border')}}</span> @endif
                                    <input wire:model.lazy="card_button_hover_border" class="form-control" type="color">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="card_button_hover_font_style">Button Font Style</label>
                                    @if($errors->has('card_button_hover_font_style'))<span class="text-danger">{{$errors->first('card_button_hover_font_style')}}</span> @endif
                                    <select wire:model.lazy="card_button_hover_font_style" class="form-control" id="">
                                        <option value="normal">Normal</option>
                                        <option value="italic">Italic</option>
                                        <option value="oblique">Oblique</option>
                                        <option value="initial">Initial</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="card_button_hover_font_weight">Button Font Weight</label>
                                    @if($errors->has('card_button_hover_font_weight'))<span class="text-danger">{{$errors->first('card_button_hover_font_weight')}}</span> @endif
                                    <select wire:model.lazy="card_button_hover_font_weight" class="form-control" id="">
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="300">300</option>
                                        <option value="400">400</option>
                                        <option value="500">500</option>
                                        <option value="600">600</option>
                                        <option value="700">700</option>
                                        <option value="800">800</option>
                                        <option value="900">900</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="card p-2">
                        <h5>Wishlist Button</h5>
                        <strong class="text-info">Normal Styles</strong> <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="wishlist_button_transition">Button Transition</label>
                                    @if($errors->has('wishlist_button_transition'))<span class="text-danger">{{$errors->first('wishlist_button_transition')}}</span> @endif
                                    <input wire:model.lazy="wishlist_button_transition" class="form-control" type="number" min='0' step="0.1" placeholder="Transition">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="wishlist_button_text_color">Button Text Color</label>
                                    @if($errors->has('wishlist_button_text_color'))<span class="text-danger">{{$errors->first('wishlist_button_text_color')}}</span> @endif
                                    <input wire:model.lazy="wishlist_button_text_color" class="form-control" type="color">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="wishlist_button_background">Button Background Color</label>
                                    @if($errors->has('wishlist_button_background'))<span class="text-danger">{{$errors->first('wishlist_button_background')}}</span> @endif
                                    <input wire:model.lazy="wishlist_button_background" class="form-control" type="color">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="wishlist_button_border">Button Border</label>
                                    @if($errors->has('wishlist_button_border'))<span class="text-danger">{{$errors->first('wishlist_button_border')}}</span> @endif
                                    <input wire:model.lazy="wishlist_button_border" class="form-control" type="color">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="card p-2">
                        <h5>Wishlist Button</h5>
                        <strong class="text-info">Hover Effect</strong> <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="wishlist_button_hover_text_color">Button Text Hover Color</label>
                                    @if($errors->has('wishlist_button_hover_text_color'))<span class="text-danger">{{$errors->first('wishlist_button_hover_text_color')}}</span> @endif
                                    <input wire:model.lazy="wishlist_button_hover_text_color" class="form-control" type="color">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="wishlist_button_hover_background">Button Background Hover</label>
                                    @if($errors->has('wishlist_button_hover_background'))<span class="text-danger">{{$errors->first('wishlist_button_hover_background')}}</span> @endif
                                    <input wire:model.lazy="wishlist_button_hover_background" class="form-control" type="color">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="wishlist_button_hover_border">Button Border Hover</label>
                                    @if($errors->has('wishlist_button_hover_border'))<span class="text-danger">{{$errors->first('wishlist_button_hover_border')}}</span> @endif
                                    <input wire:model.lazy="wishlist_button_hover_border" class="form-control" type="color">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row ">
                <div class="col-sm-12 col-md-12 m-auto">
                    <input type="submit" value="Save" class="btn btn-info btn-block">
                </div>
            </div>
        </form>
    </div>
</div>
<?php

namespace App\Http\Livewire\Front\Auth\Customers;

use App\Models\Product;
use App\Models\Productreview;
use App\Models\ReviewImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class ReviewCU extends Component
{
    use WithFileUploads;
    public $review;
    public $product_id;
    public $product_name;
    public $comment;
    public $image = [];
    public $rdatas;
    public $pdatas;
    public $reviewID;
    public $iteration;

    public function mount($id)
    {
        $this->product_id = $id;
        $product =  Product::where('id', $id)->first();
        if ($product) {
            $this->product_name = $product->title;
            $review = Productreview::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
            if ($review) {
                $this->rdatas = $review;
                $this->review = $review->review;
                $this->reviewID = $review->id;
                $this->comment = $review->comment;
            }
            $this->pdatas = $product;
        } else {
            return abort(404);
        }
    }

    /**
     * remove old image fromt the view component 
     * @return \Illuminate\Http\Response
     */

    public function removeOldImg($id)
    {
        $delId = ReviewImage::find($id);
        if ($delId) {
            if (file_exists("uploads/reviews/images/$delId->image")) {
                File::delete("uploads/reviews/images/$delId->image");
            };
            ReviewImage::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'The Image Delete Successfully']);
        }
    }


    /**
     * remove old image fromt the view component 
     * 
     * @return \Illuminate\Http\Response
     */
    public function removepreviewImg($removeItem)
    {
        array_splice($this->image, $removeItem);
    }
    /** 
     * save ation method 
     * save into data base fromt user input when update
     * @return \Illuminate\Http\Response
     */
    public function submit()
    {
        $this->validate([
            'review' => "required",
            'comment' => "required",
        ]);
        $reviewdata =  Productreview::where('product_id', $this->product_id)->where('user_id', Auth::user()->id)->first();
        if ($reviewdata) {
            $reviewdata->update([
                'review' => $this->review,
                'comment' => $this->comment,
                'notification' => 0,
                'status' => 0,
            ]);


            if (!is_null($this->image)) {
                $this->validate([
                    'image.*' => 'image',
                ]);
                foreach ($this->image as $key => $image) {
                    $lastREviewId = ReviewImage::orderBy('id', 'desc')->first();
                    ($lastREviewId ? $lastId = $lastREviewId->id + $key : $lastId = $key);
                    $imagesfileName = $image->getClientOriginalName();
                    $filename = pathinfo($imagesfileName, PATHINFO_FILENAME);
                    $extension = pathinfo($imagesfileName, PATHINFO_EXTENSION);
                    $imagesName = $filename . '-' . $reviewdata->id . '-' . rand() . '.' . $extension;
                    $originalimagesName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $imagesName);
                    $this->image[$key] = Image::make($this->image[$key])->save("uploads/reviews/$originalimagesName");
                    ReviewImage::create([
                        'productreview_id' => $reviewdata->id,
                        'image' => $originalimagesName,
                    ]);
                };
            };
        } else {
            $productReview =  Productreview::create([
                'review' => $this->review,
                'comment' => $this->comment,
                'product_id' => $this->product_id,
                'product_name' => $this->product_name,
                'user_id' => Auth::user()->id,
            ]);
            if (!is_null($this->image)) {
                $this->validate([
                    'image.*' => 'image',
                ]);
                $i = 1;
                foreach ($this->image as $key => $image) {
                    $imagesfileName = $image->getClientOriginalName();
                    $filename = pathinfo($imagesfileName, PATHINFO_FILENAME);
                    $extension = pathinfo($imagesfileName, PATHINFO_EXTENSION);
                    $imagesName = $filename . $productReview->id . '-' . $i . '.' . $extension;
                    $originalimagesName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $imagesName);
                    $this->image[$key] = Image::make($this->image[$key])->save("uploads/reviews/$originalimagesName");
                    ReviewImage::create([
                        'productreview_id' => $productReview->id,
                        'image' => $originalimagesName,
                    ]);
                    $i++;
                };
            };
        }
        $this->image = null;
        return redirect('user/reviews');
    }
    public function render()
    {
        return view('livewire.front.auth.customers.review-c-u', [
            'reviewImage' => ReviewImage::where('productreview_id', $this->reviewID)->get(),
        ])->layout('layouts.web');
    }
}

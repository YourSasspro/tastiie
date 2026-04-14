<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductReviewController extends Controller
{
    public function getproductReview($id)
    {
        $product = Product::with(['reviews' => function ($query){
            return $query->latest();
        }])->withCount('reviews')->find($id);
        return view('web.default.pages.partials.product-reviews', compact('product'));
    }

    public function addProductReview(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|numeric|min:1|max:5',
            'review' => 'required|string',
        ]);

        $product = Product::find($request->product_id);

        $product->reviews()->create([
            'user_id' => getAuthUserId(),
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return back()->with('message', __('gen.review_add_successfully') );
    }
}

<?php

namespace App\Http\Controllers\Admin\Products;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductAvailability;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'nullable|string',
            'ingredients' => 'nullable|string',
            'allergens' => 'nullable|string',
            'preparation_advice' => 'nullable|string',
            'weight' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'expiry_date' => 'nullable|string',
            'nutritional_values' => 'nullable|array',
            'nutritional_values.*.name' => 'required|string',
            'nutritional_values.*.value' => 'required|string',
            'dietary_preferences' => 'nullable|array', // Validate as array
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'dates' => 'required|array',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ],[
            'name.required' => __('validation.required',['attribute' => __('gen.name')]),
            'category_id.required' => __('validation.required',['attribute' => __('gen.category')]),
            'category_id.exists' => __('validation.exists',['attribute' => __('gen.category')]),
            'price.required' => __('validation.required',['attribute' => __('gen.price')]),
            'quantity.required' => __('validation.required',['attribute' => __('gen.quantity')]),
            'nutritional_values.*.name.required' => __('validation.required',['attribute' => __('gen.nutritional_values')]),
            'nutritional_values.*.value.required' => __('validation.required',['attribute' => __('gen.nutritional_values')]),
            'image.image' => __('validation.image',['attribute' => __('gen.image')]),
            'image.mimes' => __('validation.mimes',['attribute' => __('gen.image')]),
            'image.max' => __('validation.max',['attribute' => __('gen.image')]),
            'dates.required' => __('validation.required',['attribute' => __('gen.dates')]),
            'start_time.required' => __('validation.required',['attribute' => __('gen.start_time')]),
            'end_time.required' => __('validation.required',['attribute' => __('gen.end_time')]),
            'end_time.after' => __('validation.after',['attribute' => __('gen.end_time'),'date' => __('gen.start_time')]),
        ]);

       // Convert dietary_preferences array to JSON
        $data = $request->all();
        $data['dietary_preferences'] = json_encode($request->dietary_preferences);
        $data['nutritional_values'] = json_encode($request->nutritional_values);
        $data['created_by'] = getAuthUserId();
        $data['updated_by'] = getAuthUserId();

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }

        // Save product
        $product = Product::create($data);

        // Ensure correct handling of 'days' array
        // $daysArray = explode(',', $request->days[0]);

        // // Store Availability for Each Selected Day
        // foreach ($daysArray as $day) {
        //     ProductAvailability::create([
        //         'product_id' => $product->id,
        //         'day' => trim($day), // Trim
        //         'start_time' => $request->start_time,
        //         'end_time' => $request->end_time,
        //     ]);
        // }

        // ensure correct handling of 'dates' array
        $datesArray = explode(',', $request->dates[0]);

        // Store Availability for Each Selected Date
        foreach ($datesArray as $date) {
            $formattedDate = Carbon::createFromFormat('m/d/Y', trim($date))->format('Y-m-d');

            ProductAvailability::create([
                'product_id' => $product->id,
                'available_date' => $formattedDate,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);
        }


        return redirect()->route('admin.products.index')->with('message', __('gen.created_successfully',['attribute' => trans('gen.product')]));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $product->load('availabilities');
        // dd($product);
        return view('admin.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Product $product)
    // {

    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'category_id' => 'required|exists:categories,id',
    //         'short_description' => 'nullable|string',
    //         'ingredients' => 'nullable|string',
    //         'allergens' => 'nullable|string',
    //         'preparation_advice' => 'nullable|string',
    //         'weight' => 'nullable|string',
    //         'price' => 'required|numeric',
    //         'quantity' => 'required|integer',
    //         'expiry_date' => 'nullable|string',
    //         'nutritional_values' => 'nullable|array',
    //         'nutritional_values.*.name' => 'required|string',
    //         'nutritional_values.*.value' => 'required|string',
    //         'dietary_preferences' => 'nullable|array', // Validate as array
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
    //         'dates' => 'required|array',
    //         'start_time' => 'required',
    //         'end_time' => 'required|after:start_time',
    //     ],[
    //         'name.required' => __('validation.required',['attribute' => __('gen.name')]),
    //         'category_id.required' => __('validation.required',['attribute' => __('gen.category')]),
    //         'category_id.exists' => __('validation.exists',['attribute' => __('gen.category')]),
    //         'price.required' => __('validation.required',['attribute' => __('gen.price')]),
    //         'quantity.required' => __('validation.required',['attribute' => __('gen.quantity')]),
    //         'nutritional_values.*.name.required' => __('validation.required',['attribute' => __('gen.nutritional_values')]),
    //         'nutritional_values.*.value.required' => __('validation.required',['attribute' => __('gen.nutritional_values')]),
    //         'image.image' => __('validation.image',['attribute' => __('gen.image')]),
    //         'image.mimes' => __('validation.mimes',['attribute' => __('gen.image')]),
    //         'image.max' => __('validation.max',['attribute' => __('gen.image')]),
    //         'dates.required' => __('validation.required',['attribute' => __('gen.dates')]),
    //         'start_time.required' => __('validation.required',['attribute' => __('gen.start_time')]),
    //         'end_time.required' => __('validation.required',['attribute' => __('gen.end_time')]),
    //         'end_time.after' => __('validation.after',['attribute' => __('gen.end_time'),'date' => __('gen.start_time')]),

    //     ]);

    //     // Convert dietary_preferences array to JSON
    //     $data = $request->all();
    //     $data['dietary_preferences'] = json_encode($request->dietary_preferences);
    //     $data['nutritional_values'] = json_encode($request->nutritional_values);
    //     $data['updated_by'] = getAuthUserId();
    //     // dd($data);

    //     // Handle image upload if exists
    //     if ($request->hasFile('image')) {
    //         $product->deleteImage();
    //         $imagePath = $request->file('image')->store('products', 'public');
    //         $data['image'] = $imagePath;
    //     }

    //     // Update product
    //     $product->update($data);

    //     // Ensure correct handling of 'days' array
    //     $datesArray = explode(',', $request->dates[0]);

    //     // Store Availability for Each Selected Day
    //     ProductAvailability::where('product_id', $product->id)->delete();
    //     // foreach ($daysArray as $day) {
    //     //     ProductAvailability::create([
    //     //         'product_id' => $product->id,
    //     //         'day' => trim($day), // Trim
    //     //         'start_time' => $request->start_time,
    //     //         'end_time' => $request->end_time,
    //     //     ]);
    //     // }

    //     // Store Availability for Each Selected Date
    //     foreach ($datesArray as $date) {
    //         $formattedDate = Carbon::createFromFormat('m/d/Y', trim($date))->format('Y-m-d');

    //         ProductAvailability::create([
    //             'product_id' => $product->id,
    //             'available_date' => $formattedDate,
    //             'start_time' => $request->start_time,
    //             'end_time' => $request->end_time,
    //         ]);
    //     }

    //     return redirect()->route('admin.products.index')->with('message', __('gen.updated_successfully',['attribute' => trans('gen.product')]));


    // }
    
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'nullable|string',
            'ingredients' => 'nullable|string',
            'allergens' => 'nullable|string',
            'preparation_advice' => 'nullable|string',
            'weight' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'expiry_date' => 'nullable|date',
    
            // Dates validation
            'dates' => 'required|array|min:1',
            'dates.*' => 'required|date',
    
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
    
            // Nutritional values
            'nutritional_values' => 'nullable|array',
            'nutritional_values.*.name' => 'required_with:nutritional_values|string',
            'nutritional_values.*.value' => 'required_with:nutritional_values|string',
            'nutritional_values.*.unit' => 'required_with:nutritional_values|string',
    
            'dietary_preferences' => 'nullable|array',
    
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);
    
        /*
        |--------------------------------------------------------------------------
        | Prepare Data
        |--------------------------------------------------------------------------
        */
    
        $data = $request->except(['dates']);
    
        $data['dietary_preferences'] = json_encode($request->dietary_preferences);
        $data['nutritional_values'] = json_encode($request->nutritional_values);
        $data['updated_by'] = getAuthUserId();
    
        /*
        |--------------------------------------------------------------------------
        | Handle Image Upload
        |--------------------------------------------------------------------------
        */
    
        if ($request->hasFile('image')) {
            $product->deleteImage();
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }
    
        /*
        |--------------------------------------------------------------------------
        | Update Product
        |--------------------------------------------------------------------------
        */
    
        $product->update($data);
    
        /*
        |--------------------------------------------------------------------------
        | Update Product Availability
        |--------------------------------------------------------------------------
        */
    
        // Delete old availabilities
        ProductAvailability::where('product_id', $product->id)->delete();
    
        foreach ($request->dates as $date) {
            ProductAvailability::create([
                'product_id'    => $product->id,
                'available_date'=> $date,
                'start_time'    => $request->start_time,
                'end_time'      => $request->end_time,
            ]);
        }
    
        return redirect()
            ->route('admin.products.index')
            ->with('message', __('gen.updated_successfully', [
                'attribute' => trans('gen.product')
            ]));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->deleteImage();
        $product->delete();
        return redirect()->route('admin.products.index')->with('message', __('gen.deleted_successfully',['attribute' => trans('gen.product')]));
    }
}

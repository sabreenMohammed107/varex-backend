<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ImageGallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $rows = Product::with('category')->get();
        return view('admin.products.index', compact('rows'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'home_title_en' => 'required|string|max:255',
            // 'home_title_ar' => 'required|string|max:255',
            // 'title_en' => 'required|string|max:255',
            // 'title_ar' => 'required|string|max:255',
            // 'description_en' => 'required|string',
            // 'description_ar' => 'required|string',
            // 'category_id' => 'required|exists:categories,id',
            // 'rank' => 'required|integer',
            // 'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // 'fully_qr_image' => 'nullable|string',
            // 'qr_image' => 'nullable|string',

        ]);
// dd($request->all());
        $product = new Product();
        $product->home_title = ['ar' => $request->home_title_ar, 'en' => $request->home_title_en];
        $product->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $product->description = ['ar' => $request->description_ar, 'en' => $request->description_en];
        $product->category_id = $request->category_id;
        $product->featured_text_ar = $request->featured_text_ar;
        $product->featured_text_en = $request->featured_text_en;
        $product->video_link = $request->video_link;
        $product->rank = $request->rank;
        $product->popular = $request->has('popular');
        $product->slider = $request->has('slider');
        $product->featured = $request->has('featured');
        $product->best_selling = $request->has('best_selling');
        $product->tags = $request->tags;

        //Upload main image
        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('uploads/product'), $mainImageName);
            $product->main_image = 'uploads/product/' . $mainImageName;
        }
        // Upload fully_qr_image
        if ($request->hasFile('fully_qr_image')) {
            $mainImage = $request->file('fully_qr_image');
            $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('uploads/product'), $mainImageName);
            $product->fully_qr_image = 'uploads/product/' . $mainImageName;
        }
        // Upload qr_image
        if ($request->hasFile('qr_image')) {
            $mainImage = $request->file('qr_image');
            $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('uploads/product'), $mainImageName);
            $product->qr_image = 'uploads/product/' . $mainImageName;
        }

        $product->save();



        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }

    public function show($id)
    {
        $product = Product::with('category', 'imageGalleries')->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::with('imageGalleries')->findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'category_id' => 'required|exists:categories,id',
        //     'rank' => 'required|integer',
        //     'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        //     'fully_qr_image' => 'nullable|string',
        //     'qr_image' => 'nullable|string',
        // ]);

        $product = Product::findOrFail($id);
        $product->home_title = ['ar' => $request->home_title_ar, 'en' => $request->home_title_en];
        $product->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $product->description = ['ar' => $request->description_ar, 'en' => $request->description_en];
        $product->category_id = $request->category_id;
        $product->featured_text_ar = $request->featured_text_ar;
        $product->featured_text_en = $request->featured_text_en;
        $product->video_link = $request->video_link;
        $product->rank = $request->rank;
        $product->popular = $request->has('popular');
        $product->slider = $request->has('slider');
        $product->featured = $request->has('featured');
        $product->best_selling = $request->has('best_selling');
        $product->tags = $request->tags;

 //Upload main image
 if ($request->hasFile('main_image')) {
    $mainImage = $request->file('main_image');
    $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
    $mainImage->move(public_path('uploads/product'), $mainImageName);
    $product->main_image = 'uploads/product/' . $mainImageName;
}
// Upload fully_qr_image
if ($request->hasFile('fully_qr_image')) {
    $mainImage = $request->file('fully_qr_image');
    $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
    $mainImage->move(public_path('uploads/product'), $mainImageName);
    $product->fully_qr_image = 'uploads/product/' . $mainImageName;
}
// Upload qr_image
if ($request->hasFile('qr_image')) {
    $mainImage = $request->file('qr_image');
    $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
    $mainImage->move(public_path('uploads/product'), $mainImageName);
    $product->qr_image = 'uploads/product/' . $mainImageName;
}

        $product->save();



        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        try {
            $product->delete();
            return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
        } catch (\Throwable $th) {
            $product->delete();
            return redirect()->route('admin.products.index')->with('flash_danger', 'Can’t delete this Product ');
        }

    }
}

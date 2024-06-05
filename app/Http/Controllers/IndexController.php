<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = Product::where('slider', true)->get();
        $features = Product::where('featured', true)->orderBy('created_at', 'desc')->take(3)->get();
        $best_sellings = Product::where('best_selling', true)->orderBy('created_at', 'desc')->take(5)->get();
        $categories = Category::where('active', true)->orderBy('rank', 'desc')->get();
        return view('index', get_defined_vars());
    } // ProductController.php

// ProductController.php

    public function productList(Request $request)
    {
        $query = Product::where('featured', 1);

        if ($request->filled('search_name')) {
            $searchTerm = $request->search_name;
            $query->where(function($q) use ($searchTerm) {
                $q->where('home_title->en', 'like', '%' . $searchTerm . '%')
                  ->orWhere('home_title->ar', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($request->filled('category_id') || ($request->filled('searchCategory') && $request->searchCategory != 'All')) {
            $categoryId = $request->filled('category_id') ? $request->category_id : $request->searchCategory;
            $query->where('category_id', $categoryId);
        }
        // Retrieve paginated products with applied filters
        $products = $query->orderBy('created_at', 'desc')->paginate(5);
        // If the request is AJAX, return JSON response
        if ($request->ajax()) {
            return response()->json([
                'products' => view('products.partials.products_list', compact('products'))->render(),
                'pagination' => $products->links('vendor.pagination.custom')->toHtml(),
            ]);
        }
        $countAll = Product::count();
        return view('products.index', compact('products','countAll'));
    }
    public function show($slug)
    {
        // Find the product by slug (either 'slug_en' or 'slug_ar')
        $product = Product::where('slug_en', $slug)->orWhere('slug_ar', $slug)->firstOrFail();

        // Return the view with the product data
        return view('products.show', compact('product'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\VarexMedia;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = Product::where('slider', true)->get();
        $features = Product::where('featured', true)->whereNotNull('featured_text_ar')->whereNotNull('featured_text_en')->orderBy('created_at', 'desc')->take(3)->get();
        $best_sellings = Product::where('best_selling', true)->orderBy('created_at', 'desc')->take(5)->get();
        $categories = Category::where('active', true)->orderBy('rank', 'desc')->get();
        $about = AboutUs::firstOrFail();
        return view('index', get_defined_vars());
    } // ProductController.php

// ProductController.php

    public function productList(Request $request)
    {
        $query = Product::where('featured', 1);
        \Log::info($request->all());
        //from search button
        // Name search filtering
        if (($request->filled('search_name') && !empty($request->search_name)) || ($request->filled('mobsearchQuery') && !empty($request->mobsearchQuery))) {
            $searchTerm = $request->filled('search_name') ? $request->search_name : $request->mobsearchQuery;
            \Log::info(["has name", $searchTerm]);
            $query->where('home_title->en', 'like', '%' . $searchTerm . '%')
                ->orWhere('home_title->ar', 'like', '%' . $searchTerm . '%');
            // ->orWhere('title->en', 'like', '%' . $searchTerm . '%')
            // ->orWhere('title->ar', 'like', '%' . $searchTerm . '%');

        } else {
            if ($request->filled('selectedSearchCategoryId') && $request->selectedSearchCategoryId) {
                $query->where('category_id', $request->input('selectedSearchCategoryId'));
                \Log::info("has category");
            }
        }

        if ($request->has('category_id')) {
            \Log::info("has categoryfilter");
            $query->where('category_id', $request->category_id);
        }
        if (($request->filled('searchQuery') && !empty($request->searchQuery))) {
            $searchTerm = $request->filled('searchQuery');
            \Log::info(["has name", $searchTerm]);
            $query->where('home_title->en', 'like', '%' . $searchTerm . '%')
                ->orWhere('home_title->ar', 'like', '%' . $searchTerm . '%');
            // ->orWhere('title->en', 'like', '%' . $searchTerm . '%')
            // ->orWhere('title->ar', 'like', '%' . $searchTerm . '%');

        }
        // Retrieve paginated products with applied filters
        $products = $query->orderBy('created_at', 'desc')->paginate(30);
        \Log::info(["has products", $products->count()]);
        // If the request is AJAX, return JSON response
        if ($request->filled('searchQuery') || $request->filled('category_id')) {
            \Log::info(["has ajax"]);
            return response()->json([
                'products' => view('products.partials.products_list', compact('products'))->render(),
                'pagination' => $products->links('vendor.pagination.custom')->toHtml(),
            ]);}
        \Log::info(["no ajax"]);
        $countAll = Product::count();
        $tags = ProductTag::all();
        $about = AboutUs::firstOrFail();
        return view('products.index', compact('products', 'countAll', 'tags', 'about'));
    }

    public function show($slug)
    {
        // Fetch the product using the provided slug
        $product = Product::where('slug->en', $slug)->orWhere('slug->ar', $slug)->firstOrFail();

        // Fetch related products from the same category, excluding the current product
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4) // Limit to 4 related products, adjust as needed
            ->get();

        // Return the view with the product and related products data
        $countAll = Product::count();
        $tags = ProductTag::all();
        $about = AboutUs::firstOrFail();
        return view('products.show', compact('product', 'relatedProducts', 'countAll', 'tags', 'about'));
    }

    public function mediaList()
    {
        $all_media = VarexMedia::orderBy('created_at', 'desc')->get();
        return view('media', compact('all_media'));
    }

    public function contact()
    {
        $all_media = VarexMedia::orderBy('created_at', 'desc')->get();
        return view('contact', compact('all_media'));
    }

    public function blogList(Request $request)
    {
        // Get the master blog
        $masterBlog = Blog::where('master', 1)->first();

        // Get paginated blogs excluding the master blog, assuming 10 blogs per page
        $blogs = Blog::where('master', '!=', 1)->where('active', true)->paginate(30);

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return view('blogs.partials.blogs', compact('blogs'))->render();
        }

        return view('blogs.index', compact('masterBlog', 'blogs'));
    }
    public function showBlog($slug)
    {
        // Fetch the blog using the provided slug
        $blog = Blog::where('slug->en', $slug)->orWhere('slug->ar', $slug)->firstOrFail();

        return view('blogs.show', compact('blog'));
    }

    public function distribute()
    {
        $about = AboutUs::first();
        return view('distribute', compact('about'));
    }

    public function terms()
    {
        return view('terms');
    }
}

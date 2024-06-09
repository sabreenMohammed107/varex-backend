<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $rows = Blog::with('category')->get();
        return view('admin.blogs.index', compact('rows'));
    }
    // Function to generate a slug from a string
    public function generateSlug($str)
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $str)));
        $slug = preg_replace('/-+/', '-', $slug);
        return $slug;
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create', compact('categories'));
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
        $blog = new Blog();
        $blog->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $blog->description = ['ar' => $request->description_ar, 'en' => $request->description_en];
        $blog->category_id = $request->category_id;
        $blog->master = $request->has('master');
        $blog->active = $request->has('active');
        $blog->featured = $request->has('featured');
        $blog->publish_date = Carbon::parse($request->publish_date);

        //Upload main image
        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('uploads/blog'), $mainImageName);
            $blog->main_image = 'uploads/blog/' . $mainImageName;
        }

        // Upload featured_image
        if ($request->hasFile('featured_image')) {
            $mainImage = $request->file('featured_image');
            $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('uploads/blog'), $mainImageName);
            $blog->featured_image = 'uploads/blog/' . $mainImageName;
        }
        $slugs = [];
        foreach ($blog->title as $lang => $title) {
            $slugs[$lang] = $this->generateSlug($title);
        }
        // Check if the slugs already exist and make them unique if necessary
        $uniqueSlugs = [];
        foreach ($slugs as $lang => $slug) {
            $uniqueSlug = $slug;
            $counter = 1;
            while (Blog::where('slug->' . $lang, $uniqueSlug)->exists()) {
                $uniqueSlug = $slug . '-' . $counter;
                $counter++;
            }
            $uniqueSlugs[$lang] = $uniqueSlug;
        }

        // Now $uniqueSlugs contains unique slugs for each language
        // You can store $uniqueSlugs along with the title in your database

        // Set the slug property
        $blog->slug = $uniqueSlugs;
        $blog->save();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully');
    }

    public function show($id)
    {
        $blog = Blog::with('category')->findOrFail($id);
        return view('admin.blogs.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
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

        $blog = Blog::findOrFail($id);
        $blog->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $blog->description = ['ar' => $request->description_ar, 'en' => $request->description_en];
        $blog->category_id = $request->category_id;
        $blog->master = $request->has('master');
        $blog->active = $request->has('active');
        $blog->featured = $request->has('featured');
        $blog->publish_date = Carbon::parse($request->publish_date);

        //Upload main image
        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('uploads/blog'), $mainImageName);
            $blog->main_image = 'uploads/blog/' . $mainImageName;
        }
// Upload featured_image
        if ($request->hasFile('featured_image')) {
            $mainImage = $request->file('featured_image');
            $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('uploads/blog'), $mainImageName);
            $blog->featured_image = 'uploads/blog/' . $mainImageName;
        }
        // Generate slugs for each language
        $slugs = [];
        foreach ($blog->title as $lang => $title) {
            $slugs[$lang] = $this->generateSlug($title);
        }

        // Check if the slugs already exist and make them unique if necessary
        $uniqueSlugs = [];
        foreach ($slugs as $lang => $slug) {
            $uniqueSlug = $slug;
            $counter = 1;
            while (Blog::where('slug->' . $lang, $uniqueSlug)->where('id', '!=', $blog->id)->exists()) {
                $uniqueSlug = $slug . '-' . $counter;
                $counter++;
            }
            $uniqueSlugs[$lang] = $uniqueSlug;
        }

        // Now $uniqueSlugs contains unique slugs for each language
        // You can store $uniqueSlugs along with the title in your database

        // Update the slug property
        $blog->slug = $uniqueSlugs;
        $blog->save();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        try {
            $blog->delete();
            return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully');
        } catch (\Throwable $th) {
            $blog->delete();
            return redirect()->route('admin.blogs.index')->with('flash_danger', 'Can’t delete this Blog ');
        }

    }
}

<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    public function index()
    {
        $rows = Category::all();
        return view('admin.categories.index', compact('rows'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rank' => 'required|integer',
        ]);

        $category = new Category();
        $category->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
        if ($request->hasFile('icon')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('icon')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('icon')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Move uploaded file to public/uploads/category folder
            $request->file('icon')->move(public_path('uploads/category'), $fileNameToStore);
            // Save file name to database
            $category->icon = 'uploads/category/'.$fileNameToStore;
        }

        $category->rank = $request->rank;

        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rank' => 'required|integer',
        ]);
            $category = Category::findOrFail($id);
            $category->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            // Delete the old icon if it exists
            if ($request->hasFile('icon')) {
                // Delete the old icon if it exists
            if ($category->icon && File::exists(public_path($category->icon))) {
                File::delete(public_path($category->icon));
            }
                // Get file name with extension
                $fileNameWithExt = $request->file('icon')->getClientOriginalName();
                // Get just file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just extension
                $extension = $request->file('icon')->getClientOriginalExtension();
                // File name to store
                $fileNameToStore = $fileName.'_'.time().'.'.$extension;
                // Move uploaded file to public/uploads/category folder
                $request->file('icon')->move(public_path('uploads/category'), $fileNameToStore);
                // Save file name to database
                $category->icon = 'uploads/category/'.$fileNameToStore;
            }
        $category->rank = $request->rank;
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Delete the category icon if it exists
        if ($category->icon && File::exists(public_path($category->icon))) {
            File::delete(public_path($category->icon));
        }

        // Delete the category
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}

<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductTag;
use Illuminate\Http\Request;

class ProductTagController extends Controller
{
    public function index()
    {
        $tags = ProductTag::get();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Store a newly created Tag .
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title_en' => 'required',
        ]);

        $tag = new ProductTag();
        $tag->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $tag->save();
        // Redirect back to the Tag with a success message
        return redirect()->route('admin.tags.index')
            ->with('success', 'Image uploaded successfully');
    }

    /**
     * Update the specified Tag.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'title_en' => 'required',
        ]);

        $tag = ProductTag::findOrFail($id);
        $tag->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $tag->save();
        return redirect()->route('admin.tags.index')
            ->with('success', 'Tag uploaded successfully');

    }

    /**
     * Remove the specified Tag .
     */
    public function destroy($id)
    {
        // Find the Tag by ID
        $tag = ProductTag::findOrFail($id);
        $tag->delete();
        // Redirect back to the Tag with a success message
        return redirect()->route('admin.tags.index')
            ->with('success', 'Tag deleted successfully');
    }

}

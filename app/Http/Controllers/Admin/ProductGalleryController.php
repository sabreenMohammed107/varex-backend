<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductGalleryController extends Controller
{
    public function index(Product $product)
    {
        $galleries = $product->imageGalleries()->get();
        return view('admin.gallery.index', compact('galleries', 'product'));
    }

    /**
     * Store a newly created gallery image in storage.
     */
    public function store(Request $request, Product $product)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Store the image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/gallery'), $imageName);
            $product->imageGalleries()->create(['image_path' => 'uploads/gallery/' . $imageName]);
        }

        // Redirect back to the product gallery with a success message
        return redirect()->route('admin.products.gallery', $product->id)
                         ->with('success', 'Image uploaded successfully');
    }


    /**
     * Update the specified gallery image in storage.
     */
    public function update(Request $request, Product $product, $id)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the gallery image by ID
        $gallery = $product->imageGalleries()->findOrFail($id);

        // Store the new image
        if ($request->hasFile('image')) {
            // Delete the old image
            if (file_exists(public_path($gallery->image_path))) {
                unlink(public_path($gallery->image_path));
            }

            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/gallery'), $imageName);
            $gallery->update(['image_path' => 'uploads/gallery/' . $imageName]);
        }

        // Redirect back to the product gallery with a success message
        return redirect()->route('admin.products.gallery', $product->id)
                         ->with('success', 'Image updated successfully');
    }


    /**
     * Remove the specified gallery image from storage.
     */
    public function destroy(Product $product, $id)
    {
        // Find the gallery image by ID
        $gallery = $product->imageGalleries()->findOrFail($id);

        // Delete the image file
        if (file_exists(public_path($gallery->image_path))) {
            unlink(public_path($gallery->image_path));
        }

        // Delete the gallery record
        $gallery->delete();

        // Redirect back to the product gallery with a success message
        return redirect()->route('admin.products.gallery', $product->id)
                         ->with('success', 'Image deleted successfully');
    }

}

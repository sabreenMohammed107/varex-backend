<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VarexMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VarexMediaController extends Controller
{
    public function index()
    {
        $rows = VarexMedia::all();
        return view('admin.varexMedia.index', compact('rows'));
    }

    public function create()
    {
        return view('admin.varexMedia.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vedio_link' => 'required',
         ]);

        $media = new VarexMedia();
        $media->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        // Delete the old icon if it exists
        if ($request->hasFile('image')) {
            // Delete the old icon if it exists
            if ($media->image && File::exists(public_path($media->image))) {
                File::delete(public_path($media->image));
            }
            // Get file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            // Move uploaded file to public/uploads/category folder
            $request->file('image')->move(public_path('uploads/media'), $fileNameToStore);
            // Save file name to database
            $media->image = 'uploads/media/' . $fileNameToStore;
        }
        $media->vedio_link = $request->vedio_link;
        $media->save();

        return redirect()->route('admin.varex-media.index')->with('success', 'Media created successfully.');
    }

    public function show(VarexMedia $media)
    {
        return view('admin.varexMedia.show', compact('media'));
    }

    public function edit(VarexMedia $media)
    {
        return view('admin.varexMedia.edit', compact('media'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vedio_link' => 'required',
        ]);
        $media = VarexMedia::findOrFail($id);
        $media->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        // Delete the old icon if it exists
        if ($request->hasFile('image')) {
            // Delete the old icon if it exists
            if ($media->image && File::exists(public_path($media->image))) {
                File::delete(public_path($media->image));
            }
            // Get file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            // Move uploaded file to public/uploads/category folder
            $request->file('image')->move(public_path('uploads/media'), $fileNameToStore);
            // Save file name to database
            $media->image = 'uploads/media/' . $fileNameToStore;
        }
        $media->vedio_link = $request->vedio_link;
        $media->save();

        return redirect()->route('admin.varex-media.index')->with('success', 'Media updated successfully.');
    }

    public function destroy($id)
    {
        $media = VarexMedia::findOrFail($id);

        // Delete the category icon if it exists
        if ($media->image && File::exists(public_path($media->image))) {
            File::delete(public_path($media->image));
        }

        // Delete the category
        $media->delete();

        return redirect()->route('varex-media.index')->with('success', 'Media deleted successfully.');
    }
}

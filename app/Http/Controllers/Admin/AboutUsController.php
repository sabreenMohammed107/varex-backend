<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{

    public function edit()
{
    // Retrieve the first entry in the about_us table
    $aboutUs = AboutUs::first();

    // Pass the about us information to the view
    return view('admin.about_us.edit', compact('aboutUs'));
}


public function update(Request $request)
{
    // Update the about_us table
    $aboutUs = AboutUs::first();
    $aboutUs->about_title = ['ar' => $request->about_title_ar, 'en' => $request->about_title_en];
    $aboutUs->about_sub_title = ['ar' => $request->about_sub_title_ar, 'en' => $request->about_sub_title_en];
    $aboutUs->about_description = ['ar' => $request->about_description_ar, 'en' => $request->about_description_en];
    $aboutUs->manager_name = ['ar' => $request->manager_name_ar, 'en' => $request->manager_name_en];
    $aboutUs->manager_position = ['ar' => $request->manager_position_ar, 'en' => $request->manager_position_en];
    $aboutUs->about_banner_text = ['ar' => $request->about_banner_text_ar, 'en' => $request->about_banner_text_en];
    $aboutUs->mission_title = ['ar' => $request->mission_title_ar, 'en' => $request->mission_title_en];
    $aboutUs->mission_sub_title = ['ar' => $request->mission_sub_title_ar, 'en' => $request->mission_sub_title_en];
    $aboutUs->mission_description = ['ar' => $request->mission_description_ar, 'en' => $request->mission_description_en];
    $aboutUs->vision_title = ['ar' => $request->vision_title_ar, 'en' => $request->vision_title_en];
    $aboutUs->vision_description = ['ar' => $request->vision_description_ar, 'en' => $request->vision_description_en];

    $aboutUs->quality_title = ['ar' => $request->quality_title_ar, 'en' => $request->quality_title_en];
    $aboutUs->quality_description = ['ar' => $request->quality_description_ar, 'en' => $request->quality_description_en];
    $aboutUs->seo_description = ['ar' => $request->seo_description_ar, 'en' => $request->seo_description_en];
     //Upload main image
     if ($request->hasFile('image')) {
        $mainImage = $request->file('image');
        $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
        $mainImage->move(public_path('uploads/about'), $mainImageName);
        $aboutUs->image = 'uploads/about/' . $mainImageName;
    }
     //Upload mission image
     if ($request->hasFile('mission_image')) {
        $mission_image = $request->file('mission_image');
        $main_mission_image = time() . '_' . $mission_image->getClientOriginalName();
        $mission_image->move(public_path('uploads/about'), $main_mission_image);
        $aboutUs->mission_image = 'uploads/about/' . $main_mission_image;
    }
      //Upload vision image
      if ($request->hasFile('vision_image')) {
        $vision_image = $request->file('vision_image');
        $main_vision_image = time() . '_' . $vision_image->getClientOriginalName();
        $vision_image->move(public_path('uploads/about'), $main_vision_image);
        $aboutUs->vision_image = 'uploads/about/' . $main_vision_image;
    }
     //Upload quality image
     if ($request->hasFile('quality_image')) {
        $quality_image = $request->file('quality_image');
        $main_quality_image = time() . '_' . $quality_image->getClientOriginalName();
        $quality_image->move(public_path('uploads/about'), $main_quality_image);
        $aboutUs->quality_image = 'uploads/about/' . $main_quality_image;
    }
    if ($request->hasFile('company_katalog')) {
        // Get file name with extension
        $fileNameWithExt = $request->file('company_katalog')->getClientOriginalName();
        // Get just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // Get just extension
        $extension = $request->file('company_katalog')->getClientOriginalExtension();
        // File name to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        // Move uploaded file to public/uploads/category folder
        $request->file('company_katalog')->move(public_path('uploads/katalog'), $fileNameToStore);
        // Save file name to database
        $aboutUs->company_katalog = 'uploads/katalog/'.$fileNameToStore;
    }
    $aboutUs->save();



    // Redirect back to the edit page with a success message
    return redirect()->route('admin.about.edit')->with('success', 'About Us information updated successfully.');
}

}

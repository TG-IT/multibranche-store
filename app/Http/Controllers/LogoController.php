<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    // Display the logo upload form
    public function showLogoForm()
    {
        return view('logo'); // Assuming logo.blade.php is in the "resources/views" directory
    }

    // Handle the logo upload process
    public function uploadLogo(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file type and size restrictions as needed
        ]);
    
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
    
            // Store the uploaded image in the "public/logos" directory
            $image->storeAs('public/logos', $imageName);
    
            // Get the URL of the stored image
            $uploadedLogoUrl = asset('storage/logos/' . $imageName);
    
            // Get the title entered by the user
            $title = $request->input('title');
    
            // Store the title in the session
            session(['uploaded_logo_title' => $title]);
    
            // Redirect back to the previous page with a success message
            return redirect()->back()
                ->with('success', 'Image uploaded successfully.')
                ->with('title', $title)
                ->with('logoUrl', $uploadedLogoUrl); // Pass the logo URL for display if needed
        }
    
        // Redirect back with an error message if the image was not uploaded
        return redirect()->back()->with('error', 'Failed to upload image.');
    }
}    

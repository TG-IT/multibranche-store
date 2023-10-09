<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteSetting;


public function displaySettings()
{
    $settings = SiteSetting::first();

    return view('settings', compact('settings'));
}


public function updateSettings(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file type and size restrictions as needed
    ]);

    $settings = SiteSetting::firstOrNew();

    if ($request->hasFile('logo')) {
        // Handle logo file upload and storage
        $logoPath = $request->file('logo')->store('logos', 'public');
        $settings->logo_path = $logoPath;
    }

    $settings->title = $request->input('title');
    $settings->save();

    return redirect()->route('settings')->with('success', 'Settings updated successfully.');
}

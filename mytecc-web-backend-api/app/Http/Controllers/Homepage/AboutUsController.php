<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\CMS\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['aboutUs'] = AboutUs::where('id', 1)->first();
        return view('website.about-us.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['aboutUs'] = AboutUs::findOrFail($id);
        return view('website.about-us.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image'=>'required|mimes:jpg,jpeg,png|max:500', // max 500kb
            'vision' => 'required|string|max:255',
            'mission' => 'required|string|max:255',
        ]);

        try {
            $imageName = date('ymd').'-about-us.'.$request->file('image')->guessExtension();
            $request->image->move(public_path('uploades/about-us'),$imageName);
            $imagePath = 'uploades/about-us/'.$imageName;

            $aboutUs->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imagePath,
                'vision' => $request->vision,
                'mission' => $request->mission,
            ]);

            return redirect()->route('website.aboutUs')->with('success', 'About Us updated successfully.');

        } catch (\Exception $e) {
            return redirect()->route('website.aboutUs')->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }
}

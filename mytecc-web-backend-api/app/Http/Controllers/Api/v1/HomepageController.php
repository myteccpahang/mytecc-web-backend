<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\CMS\AboutUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomepageController extends Controller
{
    public function index()
    {
        // Get the about us data
        $aboutUs = AboutUs::first();
        $imageFullPath = 'https://admin.myteccpahang.com/'.$aboutUs->image;
        $aboutUs->image = $imageFullPath;
        $data['about_us'] = $aboutUs;

        // Get the programs and activity data
        // Get the team members data

        $response = [
            'status' => 'success',
            'data' => $data,
        ];

        return response()->json($response, 200);
    }
}

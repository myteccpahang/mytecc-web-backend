<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\CMS\AboutUs;
use App\Models\CMS\Program;
use App\Http\Controllers\Controller;
use App\Models\CMS\TeamMembers;
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
        $program = Program::where('status', 'Enabled')->get();
        for($i=0; $i<count($program); $i++) {
            $imageProgramFullPath = 'https://admin.myteccpahang.com/'.$program[$i]->img;
            $program[$i]->img = $imageProgramFullPath;
        }
        $data['program_and_activity'] = $program;

        // Get the team members data
        $member = TeamMembers::where('status', 'Enabled')->get();
        for($i=0; $i<count($member); $i++) {
            $imageMemberFullPath = 'https://admin.myteccpahang.com/'.$member[$i]->img;
            $member[$i]->img = $imageMemberFullPath;
        }
        $data['team_members'] = $member;

        $response = [
            'status' => 'success',
            'count_program_and_activity' => count($program),
            'count_team_members' => count($member),
            'data' => $data,
        ];

        return response()->json($response, 200);
    }
}

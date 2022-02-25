<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\CMS\TeamMembers;
use Illuminate\Http\Request;

class TeamMembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = TeamMembers::paginate(10);
        return view('website.team-members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.team-members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'img'=>'required|mimes:jpg,jpeg,png|max:500', // max 500kb
            'status' => 'required|in:Enabled,Disabled',
            'index' => 'required|integer',
        ]);

        try {
            $imageTitle = str_replace(' ', '-', $request->name);
            $imageName = $imageTitle.'.'.$request->file('img')->guessExtension();
            $request->img->move(public_path('uploades/team-members'),$imageName);
            $imagePath = 'uploades/team-members/'.$imageName;

            TeamMembers::create([
                'name' => $request->name,
                'role' => $request->role,
                'phone' => $request->phone,
                'instagram' => $request->instagram,
                'img' => $imagePath,
                'status' => $request->status,
                'index' => $request->index,
            ]);

            return redirect()->route('website.teamMembers.index')->with('success', 'Team members created successfully.');

        } catch (\Exception $e) {
            return redirect()->route('website.teamMembers.index')->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['member'] = TeamMembers::findOrFail($id);
        return view('website.team-members.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['member'] = TeamMembers::findOrFail($id);
        return view('website.team-members.edit', $data);
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
        $program = TeamMembers::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'img'=>'required|mimes:jpg,jpeg,png|max:500', // max 500kb
            'status' => 'required|in:Enabled,Disabled',
            'index' => 'required|integer',
        ]);

        try {
            $imageTitle = str_replace(' ', '-', $request->name);
            $imageName = $imageTitle.'.'.$request->file('img')->guessExtension();
            $request->img->move(public_path('uploades/team-members'),$imageName);
            $imagePath = 'uploades/team-members/'.$imageName;

            $program->update([
                'name' => $request->name,
                'role' => $request->role,
                'phone' => $request->phone,
                'instagram' => $request->instagram,
                'img' => $imagePath,
                'status' => $request->status,
                'index' => $request->index,
            ]);

            return redirect()->route('website.teamMembers.index')->with('success', 'Team members updated successfully.');

        } catch (\Exception $e) {
            return redirect()->route('website.teamMembers.index')->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = TeamMembers::findOrFail($id);

        try {
            $member->delete();

            return redirect()->route('website.teamMembers.index')->with('success', 'Link deleted successfully.');

        } catch (\Exception $e) {
            return redirect()->route('website.teamMembers.index')->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }
}

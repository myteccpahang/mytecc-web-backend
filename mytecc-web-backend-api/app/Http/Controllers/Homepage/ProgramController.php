<?php

namespace App\Http\Controllers\Homepage;

use App\Models\CMS\Program;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramController extends Controller
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
        $programs = Program::paginate(10);
        return view('website.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.programs.create');
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'place' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'img'=>'required|mimes:jpg,jpeg,png|max:500', // max 500kb
            'program_director' => 'required|string|max:255',
            'status' => 'required|in:Enabled,Disabled',
            'future' => 'required',
        ]);

        try {
            $imageTitle = str_replace(' ', '-', $request->title);
            $imageName = date('ymd').'-'.$imageTitle.'.'.$request->file('img')->guessExtension();
            $request->img->move(public_path('uploades/program'),$imageName);
            $imagePath = 'uploades/program/'.$imageName;

            Program::create([
                'title' => $request->title,
                'description' => $request->description,
                'place' => $request->place,
                'date' => $request->date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'img' => $imagePath,
                'program_director' => $request->program_director,
                'status' => $request->status,
                'is_futures' => $request->future,
            ]);

            return redirect()->route('website.programAndActivity')->with('success', 'Program created successfully.');

        } catch (\Exception $e) {
            return redirect()->route('website.programAndActivity')->with('error', 'Something went wrong. ' .$e->getMessage());
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
        $data['program'] = Program::findOrFail($id);
        return view('website.programs.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['program'] = Program::findOrFail($id);
        return view('website.programs.edit', $data);
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
        $program = Program::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'place' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'img'=>'required|mimes:jpg,jpeg,png|max:500', // max 500kb
            'program_director' => 'required|string|max:255',
            'status' => 'required|in:Enabled,Disabled',
            'future' => 'required',
        ]);

        try {
            $imageTitle = str_replace(' ', '-', $request->title);
            $imageName = date('ymd').'-'.$imageTitle.'.'.$request->file('img')->guessExtension();
            $request->img->move(public_path('uploades/program'),$imageName);
            $imagePath = 'uploades/program/'.$imageName;

            $program->update([
                'title' => $request->title,
                'description' => $request->description,
                'place' => $request->place,
                'date' => $request->date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'img' => $imagePath,
                'program_director' => $request->program_director,
                'status' => $request->status,
                'is_futures' => $request->future,
            ]);

            return redirect()->route('website.programAndActivity')->with('success', 'Program updated successfully.');

        } catch (\Exception $e) {
            return redirect()->route('website.programAndActivity')->with('error', 'Something went wrong. ' .$e->getMessage());
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
        $program = Program::findOrFail($id);

        try {
            $program->delete();

            return redirect()->route('website.programAndActivity')->with('success', 'Link deleted successfully.');

        } catch (\Exception $e) {
            return redirect()->route('website.programAndActivity')->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }
}

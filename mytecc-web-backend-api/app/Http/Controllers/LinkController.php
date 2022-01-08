<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
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
        // $links = Link::sortable()->paginate(5);
        $links = Link::all();
        return view('links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('links.create');
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
            'link_name' => 'required|max:255',
            'link_url' => 'required|max:255',
            'index' => 'required|numeric',
            'status' => ['required','in:Enabled,Disabled'],
        ]);

        try {
            Link::create([
                'link_name' => $request->link_name,
                'link_url' => $request->link_url,
                'index' => $request->index,
                'status' => $request->status,
            ]);

            return redirect()->route('links.index')->with('success', 'Link created successfully.');

        } catch (\Exception $e) {
            return redirect()->route('links.index')->with('error', 'Something went wrong. ' .$e->getMessage());
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
        $data['link'] = Link::findOrFail($id);
        return view('links.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['link'] = Link::findOrFail($id);
        return view('links.edit', $data);
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
        $link = Link::findOrFail($id);
        $request->validate([
            'link_name' => 'required|max:255',
            'link_url' => 'required|max:255',
            'index' => 'required|numeric',
            'status' => ['required','in:Enabled,Disabled'],
        ]);

        try {
            $link->update([
                'link_name' => $request->link_name,
                'link_url' => $request->link_url,
                'index' => $request->index,
                'status' => $request->status,
            ]);

            return redirect()->route('links.index')->with('success', 'Link updated successfully.');

        } catch (\Exception $e) {
            return redirect()->route('links.index')->with('error', 'Something went wrong. ' .$e->getMessage());
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
        $link = Link::findOrFail($id);

        try {
            $link->delete();

            return redirect()->route('links.index')->with('success', 'Link deleted successfully.');

        } catch (\Exception $e) {
            return redirect()->route('links.index')->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }
}

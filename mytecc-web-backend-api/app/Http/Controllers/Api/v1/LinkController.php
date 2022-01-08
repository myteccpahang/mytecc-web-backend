<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    public function index() {
        $links = Link::where('status', 'Enabled')->orderBy('index', 'asc')->get();

        $response = [
            'status' => 'success',
            'data' => $links,
            'message' => 'Links is order by index asc.'
        ];

        return response()->json($response, 200);
    }
}

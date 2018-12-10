<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tags;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tags::selectRaw(
            'id, texto as name'
        )
        ->orderBy('name')
        ->get()
        ->pluck('name', 'id');

        return response()->json($tags);
    }
}

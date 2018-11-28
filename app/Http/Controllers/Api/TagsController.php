<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tags;

class TagsController extends Controller
{
    public function index()
    {
        return response()->json(Tags::pluck('texto', 'id'));
    }
}

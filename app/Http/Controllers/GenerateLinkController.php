<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenerateLinkController extends Controller
{

    public function index() {}

    public function store(Request $request)
    {
        $request->validate(
            [
                'url' => 'required|string|url|min:1|max:500',
            ]
        );

        dd($request->all());

    }
}

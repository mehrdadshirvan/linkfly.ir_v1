<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        $qrCodes = [];
        $qrCodes['simple'] = QrCode::size(150)->generate($request->input('url'));
        dd($qrCodes);

    }
}

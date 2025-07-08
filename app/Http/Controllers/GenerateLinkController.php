<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
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
        $url = $request->input('url');
        $qrCodes = [];
        $qrCodes['simple'] = QrCode::format('svg')->size(150)->generate($url);
        $qrCodes['changeColor'] = QrCode::format('svg')->size(150)->color(255, 0, 0)->generate($url);
        $qrCodes['changeBgColor'] = QrCode::format('svg')->size(150)->backgroundColor(255, 0, 0)->generate($url);
        $qrCodes['styleDot'] = QrCode::format('svg')->size(150)->style('dot')->generate($url);
        $qrCodes['styleSquare'] = QrCode::format('svg')->size(150)->style('square')->generate($url);
        $qrCodes['styleRound'] = QrCode::format('svg')->size(150)->style('round')->generate($url);

        return redirect()->route('welcome')->with([
                                                      'qrCodes' => $qrCodes,
                                                      'shortUrl' => $url,
                                                  ]);
    }
}

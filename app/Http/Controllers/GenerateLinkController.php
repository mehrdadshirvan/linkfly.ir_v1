<?php

namespace App\Http\Controllers;

use App\Models\Link;
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
        $short_url = trim(strip_tags(htmlspecialchars($url, ENT_QUOTES)));

        $link = new Link();
        $link->url = $request->input('url');
        $link->save();

        // تولید short code بر اساس ID ذخیره‌شده
        $link->short_code = $this->encodeIdToShortCode($link->id);
        $link->save();

        dd($short_url);
        $qrCodes = [];
        $qrCodes['simple'] = QrCode::format('svg')->size(150)->generate($url);
        $qrCodes['changeColor'] = QrCode::format('svg')->size(150)->color(255, 0, 0)->generate($url);
        $qrCodes['changeBgColor'] = QrCode::format('svg')->size(150)->backgroundColor(255, 0, 0)->generate($url);
        $qrCodes['styleDot'] = QrCode::format('svg')->size(150)->style('dot')->generate($url);
        $qrCodes['styleSquare'] = QrCode::format('svg')->size(150)->style('square')->generate($url);
        $qrCodes['styleRound'] = QrCode::format('svg')->size(150)->style('round')->generate($url);


        return back()->with([
                                                      'qrCodes' => $qrCodes,
                                                      'shortUrl' => $url,
                                                  ]);
    }
    private function encodeIdToShortCode($id)
    {
        return base_convert($id, 10, 36); // از 10 به 36 تبدیل می‌کنه (0-9a-z)
    }
}

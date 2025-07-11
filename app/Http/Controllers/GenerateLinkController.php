<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateLinkController extends Controller
{
    public function __construct() {
        //$this->middleware("auth");
    }

    public function index() {}

    public function store(Request $request)
    {
        $request->validate(
            [
                'url' => 'required|string|url|min:1|max:50000',
            ]
        );
        $url = $request->input('url');
//        $url = trim(strip_tags(htmlspecialchars($url, ENT_QUOTES)));

        $link = new Link();
        $link->uuid = uuid();
        $link->url = $request->input('url');
        $link->save();

        // تولید short code بر اساس ID ذخیره‌شده
        $link->code = $this->encodeIdToShortCode($link->id);
        $link->save();

        $qrCodes = [];
        $qrCodes['simple'] = 'data:image/svg+xml;base64,' . base64_encode(QrCode::format('svg')->size(1000)->generate($url));
//        $qrCodes['png'] = 'data:image/png;base64,' . base64_encode(
//                QrCode::format('png')->size(1000)->generate($url)
//            );
//        $qrCodes['changeColor'] = 'data:image/svg+xml;base64,' . base64_encode(QrCode::format('svg')->size(150)->color(255, 0, 0)->generate($url));
//        $qrCodes['changeBgColor'] = 'data:image/svg+xml;base64,' . base64_encode(QrCode::format('svg')->size(150)->backgroundColor(255, 0, 0)->generate($url));
//        $qrCodes['styleDot'] = 'data:image/svg+xml;base64,' . base64_encode(QrCode::format('svg')->size(150)->style('dot')->generate($url));
//        $qrCodes['styleSquare'] = 'data:image/svg+xml;base64,' . base64_encode(QrCode::format('svg')->size(150)->style('square')->generate($url));
//        $qrCodes['styleRound'] = 'data:image/svg+xml;base64,' . base64_encode(QrCode::format('svg')->size(150)->style('round')->generate($url));

        return [
            'qr_codes' => $qrCodes,
            'short_url' =>$link->short_url
        ];
    }

    private function encodeIdToShortCode($id)
    {

        do {
            $code = strtolower(Str::random(7) . rand(10, 99) . $id);
        } while (Link::where('code', $code)->exists());

        return $code;
    }
}

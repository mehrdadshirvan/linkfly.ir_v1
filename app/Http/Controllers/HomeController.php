<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Inertia\Inertia;

class HomeController extends Controller
{

    public function index(){
        return Inertia::render('Welcome', [ ]);
    }

    public function show($code)
    {
        $code = strtolower(strip_tags(htmlspecialchars(trim($code))));
        $check = Link::query()->where('code', $code)->first();
        if($check){
            return redirect($check->url);
        }
        return abort(404);
    }
}

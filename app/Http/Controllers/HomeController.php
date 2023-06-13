<?php

namespace App\Http\Controllers;

use App\Models\BiensImmo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        App::setLocale(session()->get('locale'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $biens=BiensImmo::paginate(10);
        return view('home',compact('biens'));
    }
}

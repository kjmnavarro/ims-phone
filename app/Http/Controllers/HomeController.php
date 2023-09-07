<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscriber;
use App\Models\Domain;
use App\Models\Feature;
use App\Models\Status;
use Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::id();
        $user = User::find($id);

        $domains = Domain::all();
        $features = Feature::all();
        $statuses = Status::all();
        $subs = Subscriber::all();


        return view('home', compact('user', 'domains', 'features', 'statuses', 'subs'));
    }
}

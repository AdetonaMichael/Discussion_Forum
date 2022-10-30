<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
use Illuminate\Support\Str;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function store_channel(Request $request){
        $request->validate([
            'name'=>'required',
        ]);

        $channel = new Channel();
        $channel->name = $request->name;
        $channel->slug = Str::slug($request->name);
        $channel->save();

        session()->flash('success', 'Channel Added Successfully...');
        return redirect()->back();
    }
}

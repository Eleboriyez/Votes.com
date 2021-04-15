<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;

class VoteController extends Controller
{
    public function showAll() {
        $votes = Vote::all();
        return view('index', ['votes' => $votes]);
    }
    public function create(Request $request){
        $vote = new Vote;
        $vote->title = $request->title;
        $vote->text = $request->text;
        $vote->positive = 0;
        $vote->negative = 0;
        $vote->save();

        return redirect('/');
    }
    public function show($id) {
        $vote = Vote::find($id);
        return view('show_vote', ['vote' => $vote]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Sportsground;
use Illuminate\Http\Request;

class SportsgroundController extends Controller
{

    public function index()
    {
        $sportsgrounds = Sportsground::paginate(5);
        return view('sportsgrounds.index', compact('sportsgrounds'));
    }

    public function create()
    {
        $sportsground = new Sportsground();
        return view('sportsgrounds.create_edit', compact('sportsground'));
    }

    public function store(Request $request)
    {
        Sportsground::create($request->all());
        return redirect()->route('sportsgrounds.index');
    }

    public function show(Sportsground $sportsground)
    {
        //
    }

    public function edit(Sportsground $sportsground)
    {
        return view('sportsgrounds.create_edit', compact('sportsground'));
        return redirect()->route('sportsgrounds.index');
    }

    public function update(Request $request, Sportsground $sportsground)
    {
        $sportsground->update($request->all());
        return redirect()->route('sportsgrounds.index');
    }

    public function destroy(Sportsground $sportsground)
    {
        $sportsground->delete();
        return redirect()->route('sportsgrounds.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Championship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class ChampionshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $championships = Championship::with('user')->paginate();

        return view('admin.championship.index')->with(compact('championships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->isAdmin()) {
            $modalities = Category::pluck('name', 'id');
        }

        if (auth()->user()->isAssociated()) {
            $modalities = Category::where('user_id', auth()->id())->pluck('name', 'id');
        }

        $fight_level = collect();
        $age_bracket = collect();

        return view('admin.championship.create')->with(compact('modalities', 'fight_level', 'age_bracket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function show(Championship $championship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function edit(Championship $championship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Championship $championship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Championship $championship)
    {
        //
    }
}

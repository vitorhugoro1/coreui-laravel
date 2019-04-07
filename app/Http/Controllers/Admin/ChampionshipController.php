<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Championship\Action\CreateChampionship;
use App\Http\Controllers\Controller;
use App\Models\AgeBracket;
use App\Models\Category;
use App\Models\Championship;
use App\Models\FighterLevel;
use App\Models\Organizer;
use Illuminate\Http\Request;

class ChampionshipController extends Controller
{
    /** @var \App\Domain\Championship\Action\CreateChampionship */
    private $createChampionship;

    public function __construct(CreateChampionship $createChampionship)
    {
        $this->createChampionship = $createChampionship;
    }

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
        $modalities = collect();
        $fight_level = FighterLevel::pluck('name');
        $age_bracket = AgeBracket::pluck('name');
        $organizers = Organizer::fromUser(auth()->user()->getKey())->get();

        if (auth()->user()->isAdmin()) {
            $modalities = Category::pluck('name', 'id');
        }

        if (auth()->user()->isAssociated()) {
            $modalities = Category::where('user_id', auth()->id())->pluck('name', 'id');
        }

        return view('admin.championship.create')->with(compact('modalities', 'fight_level', 'age_bracket', 'organizers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $championship = $this->createChampionship->create();

        return redirect(route('admin.championships.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function show(Championship $championship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Championship  $championship
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
     * @param  \App\Models\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Championship $championship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Championship $championship)
    {
        //
    }
}

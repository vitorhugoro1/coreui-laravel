<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organizer;

class OrganizerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $organizers = Organizer::fromUser(auth()->id())->get();

        return response()->json($organizers);
    }

    public function store()
    {
        $organizer = request()->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string|email|max:255',
        ]);

        $organizer = array_add($organizer, 'user_id', auth()->id());

        $organizer = Organizer::create($organizer);

        return response()->json([
            'status' => 'success',
            'data' => $organizer,
            'message' => 'Success',
        ]);
    }
}

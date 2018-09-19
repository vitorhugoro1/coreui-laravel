<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\User;
use App\Academy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academies = Academy::paginate();

        return view('admin.academies.index')->with(compact('academies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        $users = $users->transform(function ($user) {
            return [
                'label'  => $user->name,
                'value'    => $user->id
            ];
        });

        return view('admin.academies.create')->with(compact('users'));
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
            'name'  => 'required|string',
            'master_id' => 'nullable'
        ]);

        if ($request->filled('master_id')) {
            $master = User::findOrFail($request->master_id);
        }

        $academy = Academy::create($request->only(['name', 'master_id']));

        return redirect()->route('admin.academies.index')->with('message', 'Academy created successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Academy  $academy
     * @return \Illuminate\Http\Response
     */
    public function show(Academy $academy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Academy  $academy
     * @return \Illuminate\Http\Response
     */
    public function edit(Academy $academy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Academy  $academy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Academy $academy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Academy  $academy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academy $academy)
    {
        //
    }
}

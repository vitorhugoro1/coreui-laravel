<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserBankAccount;
use Illuminate\Http\Request;

class UserBankAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = UserBankAccount::where('user_id', auth()->id())->get();

        return response()->json($accounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'name' => 'required|string',
            'account_owner' => 'required|string',
            'owner_document' => 'string|nullable',
            'bank' => 'required|string',
            'agency' => 'required|string',
            'account_number' => 'required|string',
        ]);

        $data = array_add($data, 'user_id', auth()->id());

        $account = UserBankAccount::create($data);

        return response()->json([
            'status' => 'success',
            'data' => $account,
            'message' => 'Success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserBankAccount  $userBankAccount
     * @return \Illuminate\Http\Response
     */
    public function show(UserBankAccount $userBankAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserBankAccount  $userBankAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(UserBankAccount $userBankAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserBankAccount  $userBankAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserBankAccount $userBankAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserBankAccount  $userBankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserBankAccount $userBankAccount)
    {
        //
    }
}

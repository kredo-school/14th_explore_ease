<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{   
    private $profile;
    private $user;

    public function __construct(Profile $profile, User $user)
    {
        $this->profile = $profile;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    public function show($id)
    {   
        $user = $this->user->findOrFail($id);
        return view('users.profile')->with('user', $user);
        // $profile = $this->profile->findOrFail($user_id);
        // return view('users.profile')->with('profile', $profile);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function bookmark(Profile $profile){
        return view('users.bookmark');
    }
}

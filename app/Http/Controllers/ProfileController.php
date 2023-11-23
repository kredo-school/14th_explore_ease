<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Nationarity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{   
    private $profile;
    private $user;
    private $nationarity;

    public function __construct(Profile $profile, User $user, Nationarity $nationarity)
    {
        $this->profile = $profile;
        $this->user = $user;
        $this->nationarity = $nationarity;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:1|max:50',
            'last_name' => 'required|min:1|max:50',
            'name'=> 'required|min:1|max:50',
            'phone' => 'required|min:1|max:20',
            // 'nationarity' => 'required',
            'email' => 'required|email|max:50|unique:users,email,' . Auth::user()->id,
            'avatar' => 'mimes:jpg,jpeg,gif,png|max:1048',
        ]);

        $user = $this->user->findOrFail(Auth::user()->id);
        $user->profile->first_name = $request->first_name;
        $user->profile->last_name = $request->last_name;
        $user->profile->phone = $request->phone;
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->avatar){
            $user->profile->avatar = 'data:image/' . $request->avatar->extension() . ';base64,' . base64_encode(file_get_contents($request->avatar));
        }

        $user->profile->save();

        return redirect()->route('profile.show', Auth::user()->id);

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

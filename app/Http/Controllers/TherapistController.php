<?php

namespace App\Http\Controllers;

use App\Models\Therapist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TherapistController extends Controller
{
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Therapist $therapist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Therapist $therapist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Therapist $therapist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Therapist $therapist)
    {
        //
    }



    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'specialist' => 'required|string',
            'location' => 'required',
            'certification' => 'required',
        ]);

        $therapist = Therapist::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'location' => $fields['location'],
            'specialist' => $fields['specialist'],
            'certification' => $fields['certification'],
            'password' => bcrypt($fields['password'])
        ]);




        $token = $therapist->createToken('myapptoken')->plainTextToken;

        $response = [
            'therapist' => $therapist,
            'token' => $token
        ];

        return response($response,
            201,
            [
                'Accept' => 'application/json',
                'content-type' => 'application/json',
            ]);
    }


    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $therapist = Therapist::where('email', $fields['email'])->first();

        // Check password
        if(!$therapist || !Hash::check($fields['password'], $therapist->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $therapist->createToken('myapptoken')->plainTextToken;

        $response = [
            'therapist' => $therapist,
            'token' => $token
        ];

        return response(
            $response,
            201,
            [
                'Accept' => 'application/json',
                'content-type' => 'application/json',
                "ngrok-skip-browser-warning" => "69420",
            ]);
    }


}

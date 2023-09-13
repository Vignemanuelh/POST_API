<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reporter;
use Exception;
use Illuminate\Http\Request;

class ReporterController extends Controller
{
   


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // dd($request);
            $request->validate([
                'name' => ['required', 'string'],
                'firstname' => ['required', 'string'],
                'email' => ['required', 'string'],
                'password' => ['required', 'string']
            ]);
            $reporter = new Reporter();
            $reporter->name = $request->name;
            $reporter->firstname = $request->firstname;
            $reporter->email = $request->email;
            $reporter->password = $request->password;
            $reporter->save();

            return  response()->json([
                'status' => 'This post has been created succefully'
            ]);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}

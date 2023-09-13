<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\once;

class UserController extends Controller
{
   

    /**
     * Store a newly created resource in storage.
     */


     public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'string'],
                'password' => ['required', 'string']
            ]);
            $post = new User();
            $post->name = $request->name;
            $post->email = $request->email;
            $post->password = $request->password;
            $post->save();

            return  response()->json([
                'status' => 'This User has been created succefully'
            ]);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    // public function store(Request $request)
    // {
    //     dd($request->all);
    //    $validator = Validator::make($request->all(), [
    //         'name'=> 'required|string',
    //         'email'=> 'required|string|unique:users',
    //         'password'=> 'required|string'
    //     ]);
    //     if($validator->fails()){
    //         return $validator->errors();
    //     }
    //     try {
    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->save();
    //     return  response()->json([
    //         'status' => 'This user has been created succefully'
    //     ]);
    //    } catch (Exception $e) {
    //     return response()->json(['message' => $e->getMessage()]);

//     }
// }

   
    /**
     * Update the specified resource in storage.
     */
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'string'],
                'password' => ['required', 'string']
            ]);
            if(auth()->attempt($request->only(['email', 'password']))){

                $userConnect = auth()->user();
                $token = $userConnect->createToken('tokenConnection')->plainTextToken;
                return response()->json([
                    'status' => 'This User has been created succefully',
                    'token' => $token,
                    'userConnect' => $userConnect->name,
                    'userEmail' => $userConnect->email
                ]);
                
           
            } else {
                return  response()->json([
                    'status' => 'The email and password isn\'t invalid '
                ]);

            }
            $post = new User();
            $post->name = $request->name;
            $post->email = $request->email;
            $post->password = $request->password;
            $post->save();

            return  response()->json([
                'status' => 'This User has been created succefully'
            ]);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}

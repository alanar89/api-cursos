<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
  
    public function login(Request $request)
    {
       $validar=Validator::make($request->all(),[
        'email'=>'required|string|email',
        'password'=>'required|min:4',
       ]);

       if($validar->fails()){
        return response()->json($validar->errors());
       }

        $user=User::where('email',$request->email)->first();
        if ($user) {
            if(Hash::check($request->password,$user->password)){
            $token=$user->createToken("auth_token")->plainTextToken;
              return  response()->json([
                'mensaje'=>'bienvenido',
                  'data'=>$user,
                'token'=>$token,
                'type_token'=>'bearer',
                Response::HTTP_OK]);
            }
             else{
             return  response()->json('credenciales incorrectas',Response::HTTP_OK); 
            }
        }else{
             return  response()->json('usuario no encontrado',Response::HTTP_OK); 
        }
        
    }

 
    public function registro(Request $request)
    {
        $validar=Validator::make($request->all(),[
        'name'=>'required|string|max:255',   
        'email'=>'required|string|email|unique:users',
        'password'=>'required|min:4',
       ]);

       if($validar->fails()){
        return response()->json($validar->errors());
       }
         $user= User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        ]);
         
        // if(User::find($user->email)){
            if($user->save()){
            $token=$user->createToken("auth_token")->plainTextToken;    
             return  response()->json([
                'mensaje'=>'registro exitoso',
                'data'=>$user,
                'access_token'=>$token,
                'type_token'=>'bearer',
                Response::HTTP_OK]);
             }
             else{
                return  response()->json('error al registrar usuario');
             }
        // }else{
        // return  response()->json('el email ya existe');
        //  }
    
        
     }
   
    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json('sesion terminada');
    }

    
}

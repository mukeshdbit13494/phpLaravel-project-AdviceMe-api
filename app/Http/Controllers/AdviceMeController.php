<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Problem;
use App\Mail\SendEmail;
use App\Advice;
use App\User;
class AdviceMeController extends Controller
{
    public function create(Request $req)
    {
        $user=new User();
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password=Hash::make($req->input('password'));
        $user->email_confirmed=false;
        $user->remember_token=str_random(10);
        $data=['message'=>"Please continue the signup proccess to click the link for confirmation of email."];
        if($user->save())
        {
            Mail::to($user->email)->send(new SendEmail($data));
            return response()->json($user);
        } 
        else
        {
            return response()->json("Registration failed!");   
        }
       
    }
    public function login(Request $req)
    {
        $user=User::all();
        foreach($user as $data)
        {           
            if($data->email===$req->input('email') && Hash::check($req->Input('password'), $data->password) && $data->email_confirmed==true )
            {
                session_start();
                $req->session()->put('user_id',$data->id);
                return response()->json( $req->session()->get('user_id'));
                break;
            }
            else{
                print_r("error");
            }
        }
        
    }
    public function logout(Request $req)
    {
       session_start();
       session_destroy();
        return response()->json("successfuly logout !");
    }
    public function mainPage(Request $req)
    {
        $problems=Problem::all();
        $advice=Advice::where("user_id",$req->session()->get('user_id'))->get();
        return response()->json($problems);
    }
    public function problem(Request $req)
    {
        $problem=new Problem();
        $user_id=$req->session()->get('user_id');
        $problem->user_id=$user_id;
        $problem->contents=$req->input('contents');
        $problem->save();
        return response()->json($advice);
    }
    public function advice(Request $req)
    {
        $advice=new Advice();
        $advice->problem_id=$req->input('problem_id');
        $advice->advice=$req->input('advice');
        $advice->user_id=$req->session()->get('user_id');
        $advice->save();
        return response()->json($advice);
    }

}

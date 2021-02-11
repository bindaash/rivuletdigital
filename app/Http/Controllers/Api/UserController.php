<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { //echo "dnvrn"; exit;
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $name = request()->get('name');
        $email = request()->get('email');
        $password = request()->get('password');
        $rules = array(
            'name' => 'required',
            'email' => Rule::unique('users')->where(function($query) use ($email) {
                $query->where('email', $email);
            }),
            'password' => 'required',
        );

        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) { 
            // print_r("expressionhdgfsh634637547");exit();
            $messages = $validator->messages();
            if($messages->has('name'))
            {
                return response()->json(["statusCode"=>422,"status"=>false,"message"=>$messages->first('name')],422);
            }
            else if($messages->has('email'))
            {
                return response()->json(["statusCode"=>422,"status"=>false,"message"=>$messages->first('email')],422);
            }
            else if($messages->has('password'))
            {
                return response()->json(["statusCode"=>422,"status"=>false,"message"=>$messages->first('password')],422);
            }
        } else {
            
            $created_at = date('Y-m-d H:i:s', strtotime(Carbon::now()));
            $user_id = User::insertGetId([
                'name' => $name,
                'email' => $email,
                'password'  =>  Hash::make($password),
                'created_at'    =>  $created_at,
                'updated_at'    =>  $created_at
            ]);

            return response()->json(
                [
                    "statusCode"=>200,
                    "status"=>true,
                    "message"=>"Successfully Registered.",
                    "response"=>array(
                        "userId"=>(string) $user_id,
                        "name"=>$name,
                        "email"=>$email
                    )
                ],200);
            return $request;
        }    
        
    }


}

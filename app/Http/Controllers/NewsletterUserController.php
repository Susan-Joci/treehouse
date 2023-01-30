<?php

namespace App\Http\Controllers;

use App\Models\NewsletterUser;
use Illuminate\Http\Request;

class NewsletterUserController extends Controller
{
    protected $request; 

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = NewsletterUser::orderBy("created_at",'Desc')->get();
        return view('newsletter')->with('users', $users);
    }
    
    public function signupIndex() {
        return view('signup_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function signup()
    {
        if($this->validation()) {
            $validator = $this->request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:newsletter_users',
            ]);
            if (!is_array($validator) && $validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all()
                ]);
            }

            $name = $this->request->name;
            $email = $this->request->email;
        } else {
            $name = 'John Doe';
            $email = 'John_doe'.time().'@gmail.com';
        }
       
        $users = NewsletterUser::create([
            'name' => $name,
            'email' => $email 
        ]);
    }

    public function validation() {
        return true;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsletterUser  $newsletterUser
     * @return \Illuminate\Http\Response
     */
    public function usersUpdate()
    {
        $users = NewsletterUser::where('id',  $this->request['user_id'])
        ->update([
            'status' => $this->request['status']=='true' ? 1 :0
        ]);
    }
}

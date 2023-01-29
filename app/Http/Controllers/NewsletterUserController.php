<?php

namespace App\Http\Controllers;

use App\Models\NewsletterUser;
use Illuminate\Http\Request;

class NewsletterUserController extends Controller
{
    protected $request; 

    public function __construct(Request $request)
    {
        // $this->middleware('auth');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsletterUser  $newsletterUser
     * @return \Illuminate\Http\Response
     */
    public function show(NewsletterUser $newsletterUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsletterUser  $newsletterUser
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsletterUser $newsletterUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsletterUser  $newsletterUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsletterUser $newsletterUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsletterUser  $newsletterUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsletterUser $newsletterUser)
    {
        //
    }
}

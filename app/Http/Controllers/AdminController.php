<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use  App\Students;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function home(){
        return view('/home');
    }
    public function add_user(){
        return view('users.add_user');
    }


    public function index()
    {
        //
    }
    public function charts(){
        return view('charts');
    }

    public function view_users(){
        return view('users.view_user');
    }
    public function warn_users(){
        return view('users.warn_user');
    }

    public function feedback(){
        return view('users.feedback');
    }

    public function suggestion(){
        return view('users.suggestion');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validate($request,[
//            'reg' => 'required|unique:posts|max:255',
//            'password' => 'required',
//            'confirm' => 'required',
//
//        ]);
        //create a user
        $validatedData=$request->validate([
           'reg'=>'required|min:10|max:13|string|unique:students',
        ]);
        if ($validatedData){
            $student_save=Students::create([
                'reg'=>$request->input('reg'),
                'password'=>Hash::make($request->input('reg')),

            ]);
            if($student_save){
                flash('Student successfully added')->success()->important();
                return back();
            }
            flash('An error occurred while trying to add student! Please try again')->error()->important();
            return back();
        }


//        $student = new Students;
//        $student->reg = $request->input('reg');
//        $student->password = $request->input('password');
//        $student->confirm = $request->input('confirm');
//        $student->save();



        //return 123;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

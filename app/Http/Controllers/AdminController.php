<?php

namespace App\Http\Controllers;

use App\Mail\ReplyMail;
use App\Suggestion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use  App\Students;
use Illuminate\Support\Facades\Hash;
//use Knp\Snappy\Pdf;
use PDF;

class AdminController extends Controller
{

    public function home(){
        $users=Students::count();
        $suggestions=Suggestion::count();
        $feedback=Suggestion::whereNotNull('reply')->count();
        return view('/home',compact('users','suggestions','feedback'));
    }
    public function add_user(){
        return view('users.add_user');
    }

//for excel upload
    public function import_user()
    {
        return view('users.import-user');
    }

    public function handle_import(Request $request){


        $validator = Validator::make($request->all(), [
            'file' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        }

        $file = $request->file('file');
        $csvData = file_get_contents($file);

        $rows = array_map("str_getcsv", explode("\n", $csvData));
        $header = array_shift($rows);
        //dd($rows);
        foreach ($rows as $row) {
            $row = array_combine($header, $row);
            Students::create([
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'reg' => $row['reg'],
              'password' => bcrypt($row['password']),
               // 'password' =>$row['password'],


            ]);

        }
//        flash('Users imported');
//        return redirect()->back();

    }


    public function charts(){
        return view('charts');
    }

    public function view_users(){
        $users=Students::orderBY('created_at','desc')->paginate(5);
        $number=1;
        return view('users.view_user',compact('users','number'));
    }
    public function warn_users(){
        return view('users.warn_user');
    }

    public function feedback(){
        return view('users.feedback');
    }

    public function suggestion(){
        $number=1;
        $suggestion=Suggestion::orderBy('created_at','desc')->paginate(4);
        return view('users.suggestion',compact('suggestion','number'));
    }
    public function delete_user($id){
        $student_delete=Students::where('id',$id);
        if ($student_delete->delete()){
            flash('User successfully deleted')->success()->important();
            return back();
        }
        flash('An error occurred trying to delete user! Please try again')->error()->important();
        return back();
    }
    public  function edit_user($id){
        $student=Students::where('id',$id)->first();
        return view('users.edit',compact('student'));
    }

    public function update_user(Request $request,$id){
        $validatedData=$request->validate([
            'first_name'=>'string|required|min:4|max:10',
            'last_name'=>'string|required|min:4|max:10',
            'reg'=>'required|min:10|max:13|string',
        ]);
      if ($validatedData){
          $student_update=Students::where('id',$id)
              ->update([
                  'first_name'=>$request->input('first_name'),
                  'last_name'=>$request->input('last_name'),
                  'reg'=>$request->input('reg'),
              ]);
          if ($student_update){
              flash('User information updated successfully')->success()->important();
              return redirect('/view-user');
          }
          flash('An error occurred while trying to update user information! Please try again')->error()->important();
          return back();
      }
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

        $validatedData=$request->validate([
            'first_name'=>'string|required|min:4|max:10',
           'last_name'=>'string|required|min:4|max:10',
           'reg'=>'required|min:10|max:13|string|unique:students',
        ]);
        if ($validatedData){
            $student_save=Students::create([
                'first_name'=>$request->input('first_name'),
                'last_name'=>$request->input('last_name'),
                'reg'=>$request->input('reg'),
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('reg')),

            ]);
            if($student_save){
                flash('Student successfully added')->success()->important();
                return back();
            }
            flash('An error occurred while trying to add student! Please try again')->error()->important();
            return back();
        }




    }
    public function send_reply(Request $request,$id){
        if (strlen($request->input('reply'))<=4){
            flash('Response too short to be sent')->error();
            return back();
        }
        else{
            $suggestion=Suggestion::where('id',$id)->first();
            $response=Suggestion::where('id',$id)
                ->update([
                    'reply'=>$request->input('reply'),
                ]);
            $email=Suggestion::where('id',$id)->first();
            $stud_email=Students::where('id',$email->user_id)->first();
            $suggestions=Suggestion::where('id',$id)->first();
            Mail::to($stud_email->email)->send(new ReplyMail($suggestions));
            if ($response){
                flash('Feedback on '.$suggestion->title.' Successfully sent')->success()->important();
                return redirect()->back();
            }
            flash('An error occurred while trying to send the feedback! Please try again')->error()->important();
            return redirect()->back();
        }


    }
    public function print_suggestion(){
       $suggestion=Suggestion::orderBy('created_at','desc')->paginate(10);
        $number=1;
//        return view('users.print_suggestions',compact('suggestion','number'));
       $pdf = PDF::loadView('users.print_suggestions',compact('suggestion','number'));
       return $pdf->download('suggestion.pdf');

    }

    public function show($id)
    {
        //
    }
    public function view_feedbacks(){
        $suggestions=DB::table('suggestions')
            ->whereNotNull('reply')
            ->orderBy('created_at','desc')
            ->paginate(10);
        $number=1;
        return view('users.view_feedback',compact('suggestions','number'));
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
    public function check_admin(){

        return view('check');
    }
}

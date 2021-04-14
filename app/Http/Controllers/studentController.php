<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Student::get();
        return view('display',['student_data'=>$data]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$this->validate($request,[

            'name'=>'required|string|min:3|max:40',
            'email'=>'required|email',
            'password'=>'required|min:6',

       ]);
       $data['password']=bcrypt($data['password']);
       
       
       $query=Student::create($data);
       if($query){
        $message =  'Data insetred';
        }else{
        $message =  'Error in Insertion';
        }
   
        session()->flash('Message',$message);
        return  redirect(url('Student'));
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
        $data=Student::findOrFail($id);
        return view('edit',['student_data'=>$data]);
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
        $query=$this->validate($request,[

            'name'=>'required|string|min:3|max:40',
            'email'=>'required|email',
        

       ]);
       $data=Student::where('id',$id)->update($query);
       if($data){
        $message =  'Updated';
        }else{
        $message =  'Error in update';
        }
   
        session()->flash('Message',$message);
       return  redirect(url('Student'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data=Student::where('id',$id)->delete();
       if($data){
        $message =  'Deleted';
        }else{
        $message =  'Error in Delete';
        }
   
        session()->flash('Message',$message);
       return redirect(url('Student'));
    }


    public function loginForm()
    {
      
       return view('login');
    }

    public function  Login(Request $request)
    {
      
        $data=$this->validate($request,[
            
            'email'=>'required|email',
            'password'=>'required|min:6',

       ]);
        $remeberme=isset($data->rememberme);

        $check=auth()->guard('students')->attempt($data,$remeberme);
        

       
       if($check==true){
        return redirect(url('Student'));
       }else{
       
        session()->flash('Message','Password Or email Invalid');
           return redirect(url('Loginform'));
       }
   
}
    public function Logout(){
        auth()->logout();
     
        return redirect(url('Loginform'));
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    //
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){
                $doctors=Doctor::all();
                return view('user.home',compact('doctors'));
            }
            else{
                  return view('admin.home');
            }

        }
        else{
            return redirect()->back();
        }

    }

    public function index(){
        if(Auth::id()){
            return redirect('home');
        }
        else{
        $doctors=Doctor::all();
        return view('user.home',compact('doctors'));
        }
    }

    public function appointment(Request $request){
        $data=new Appointment;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->phone=$request->number;
        $data->message=$request->message;
        $data->doctor=$request->doctor;
        $data->status='In Progress';
        if(Auth::id()){
        $data->user_id=Auth::user()->id;
        }

        $data->save();
        return redirect()->back()->with('message','Appointment requested successfully. we will contact with you soon');
    }

    public function myappointment(){
        if(Auth::id()){
            $userid=Auth::user()->id;
            $appoints=Appointment::where('user_id',$userid)->get();
            return view('user.my_appointment',compact('appoints'));

        }
        else{
            return redirect()->back();
        }
    }
    public function cancelappoint($id){
        $data=Appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}

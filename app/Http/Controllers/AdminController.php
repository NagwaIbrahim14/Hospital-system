<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
class AdminController extends Controller
{
    //
    public function addview(){
        return view('admin.add_doctor');
    }

    public function upload(Request $request){
     $doctor=new doctor();
     $image=$request->file;
     $imagename=time(). ' . ' .$image->getClientoriginalExtension();
     $request->file->move('doctorimage',$imagename);
     $doctor->image=$imagename;

     $doctor->name=$request->name;
     $doctor->phone=$request->phone;
     $doctor->speciality=$request->speciality;
     $doctor->room=$request->room;
     $doctor->save();

     return redirect()->back()->with('message',"Doctor Added Successfully");
    }

    public function showappointment(){
        $datas=Appointment::all();
        return view('admin.showappointment',compact('datas'));
    }

    public function approved($id){
        $data=Appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }

    public function canceled($id){
        $data=Appointment::find($id);
        $data->status='canceled';
        $data->save();
        return redirect()->back();
    }

    public function showdoctor(){
        $datas=Doctor::all();

        return view('admin.showdoctor',compact('datas'));
    }

    public function deletedoctor($id){
        $data=Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatedoctor($id){
        $data=Doctor::find($id);
        return view('admin.updatedoctor',compact('data'));
    }

    public function editdoctor(Request $request,$id){
        $doctor=Doctor::find($id);
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;
        $image=$request->file;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('doctorimage',$imagename);
            $doctor->image=$imagename;
        }

        $doctor->save();
        return redirect()->back()->with('message','Doctor Details Updated Successfully');


    }
}

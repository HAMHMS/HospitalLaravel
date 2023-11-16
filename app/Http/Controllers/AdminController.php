<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Notifications\SendEmailNotification;
use Notification;


class AdminController extends Controller
{
    public function addview(){
        if (Auth::id()) {
            if (Auth::user()->usertype==1) {
                return view('admin.add_doctor');
            }else{
                return redirect()->back();
            }
        }else{
           return redirect('login');
        } 
    }

    public function upload(Request $request){

        $doctor = new Doctor;
        $image = $request->file;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimages',$imagename);
        $doctor->image = $imagename;

        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->room = $request->room;
        $doctor->specialty = $request->specialty;

        $doctor->save();
        return redirect()->back()->with('message','Doctor Added Successfully');
    }

    public function showAppointment(){
        $data = Appointment::all();
        return view('admin.showappointment',compact('data'));
    }

    public function approved($id){
        $data = Appointment::find($id);
        $data->status = 'approved';
        $data->save();
        return redirect()->back();
    }
    public function canceled($id){
        $data = Appointment::find($id);
        $data->status = 'canceled';
        $data->save();
        return redirect()->back();
    }

    public function showdoctor(){
        $data = Doctor::all();
        return view('admin.showdoctor',compact('data'));
    }

    public function deletedoctor($id){
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatedoctor($id){
        $data = Doctor::find($id);
        return view('admin.update_doctor',compact('data'));
    }

    public function editdoctor(Request $request , $id){
        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->specialty = $request->specialty;
        $doctor->room = $request->room;
        $image = $request->image;
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('doctorimages',$imagename);
            $doctor->image = $imagename;
        }
        $doctor->save();
        return redirect()->back()->with('message','Doctor Details Updated Successfully');
    }

    public function emailview($id){
        $data = Appointment::find($id);
        return view('admin.email_view',compact('data'));
    }

    public function sendemail(Request $request,$id){
        $data = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart,
        ];

        Notification::send($data,new SendEmailNotification($details));
        return redirect()->back()->with('message','Email Send Successfully');
    }
}

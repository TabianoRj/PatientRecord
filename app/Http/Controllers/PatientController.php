<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function patientRecord(){
        $patients = Patient::all();
        return view('admin.patient-record', ['patients' => $patients]);
        
    }

    public function create(){
        return view('admin.create');
    }

    public function home(){
        return view('admin.index');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email'  => 'required',
       
        ]);

        $newPatient = Patient::create($data);
      

        return redirect(route('patient.patient-record'));
    }

    public function edit(Patient $patient){
        return view('admin.edit', ['patient' => $patient]);

    }

    public function update(Patient $patient, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email'  => 'required',
        
        ]);

        $patient->update($data);

        return redirect(route('patient.patient-record'))->with('success', 'Updated Successfully');
    }

    public function delete(Patient $patient){
        $patient->delete();
        return redirect(route('patient.patient-record'))->with('success', 'Deleted Successfully');
    }
}

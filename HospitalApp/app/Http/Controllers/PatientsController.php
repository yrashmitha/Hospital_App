<?php

namespace App\Http\Controllers;

use App\Patient;
use App\MedicalRecords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $arr= Patient::all()->paginate(2);
        $arr=DB::table('patients')->orderByDesc('created_at')->paginate(10);
        return view('patients.allpatients')->with('patients',$arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.createpatient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'address'=>'required'
        ]);
        $patient=new Patient;
        $patient->p_name= $request->input('name');
        $patient->age= $request->input('age');
        $patient->address= $request->input('address');
        $patient->gender= $request->input('gender');
        $patient->save();
        return redirect('/patients')->with('success','Patient added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return $patient;
        try{
            $patient=Patient::findOrFail($id);
            return view('patients.show')->with('patient',$patient);
        }catch (\Exception $e){
            return "Some error occured";
        }

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
        $validatedData = $request->validate([
            'name'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'address'=>'required'
        ]);
        $patient=Patient::find($id);
        $p_id=$id;
        $patient->p_name= $request->input('name');
        $patient->age= $request->input('age');
        $patient->address= $request->input('address');
        $patient->gender= $request->input('gender');
        try{
            $patient->save();
            return redirect('/patients/'.$id)->with('success','Patient Updated');
        }catch (\Exception $e){
            return redirect('/patients')->with('error','Something went wrong.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pat=Patient::find($id);
        $pat->delete();
        return redirect('/patients')->with('success','Patient Deleted');
    }

    public function records($id){
        $reco=MedicalRecords::where('p_id',$id)->get();
        return $reco;
    }

    public function showRecords($id){
        $patient=Patient::find($id);
//        return $patient->medicalRecords;
        return view('patients.showrecords')->with('patient',$patient);
    }
}

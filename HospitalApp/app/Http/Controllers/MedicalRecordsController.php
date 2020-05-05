<?php

namespace App\Http\Controllers;
use App\Patient;
use Illuminate\Http\Request;
use App\MedicalRecords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MedicalRecordsController extends Controller
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

       $record=MedicalRecords::latest('updated_at')->paginate(10);
       return view('MedicalRecords.allrecords')->with('records',$record);
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
        $request->validate([
            'notes'=>'required',
            'drugs'=>'required'
        ]);
        $doctor_id=Auth::id();
        $record=new MedicalRecords();
        //return $request;
        $record->p_id=$request->id;
        $record->d_id=$doctor_id;
        $record->notes=$request->notes;
        $record->drugs=$request->drugs;
        try{
            $record->save();
            return redirect('/medicalrecords')->with('success','Record Added.');
        }catch (\Exception $e){
           return redirect('/medicalrecords')->with('error','System failed.Please check if patient in database.');
        }

       // return redirect('/medicalrecords')->with('success','Record added');
    }

//    coming from showpage


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showPage(Request $request)
    {
        $request->validate([
            'notes'=>'required',
            'drugs'=>'required'
        ]);
        $doctor_id=Auth::id();
        $record=new MedicalRecords();
        //return $request;
        $record->p_id=$request->id;
        $p=$request->id;
        $record->d_id=$doctor_id;
        $record->notes=$request->notes;
        $record->drugs=$request->drugs;
        $patient=Patient::find($p);
        try{
            $record->save();
            return redirect('/patients/'.$p)->with('success','Record Added.');
        }catch (\Exception $e){
            //return dd($e->getMessage());
            return redirect('/patients/'.$p)->with('error','System failed. Please check if patient in database first.');
        }

        // return redirect('/medicalrecords')->with('success','Record added');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record=MedicalRecords::find($id);
        return view('MedicalRecords.recordview')->with('record',$record);
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
        $request->validate([
            'drugs'=>'required',
            'notes'=>'required'
        ]);
        $record=MedicalRecords::find($id);
        $record->drugs= $request->input('drugs');
        $record->notes= $request->input('notes');
        try{
            $record->save();
            return redirect('/medicalrecords')->with('success','Record Updated');
        }
        catch (\Exception $e){
            return redirect('/medicalrecords')->with('error','Something went wrong!');
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
        return $id;
    }
}

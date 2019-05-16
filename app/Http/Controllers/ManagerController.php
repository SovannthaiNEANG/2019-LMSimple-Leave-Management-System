<?php

namespace App\Http\Controllers;
// use App\Employee;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //Only authenticated users may access to the pages of this controller
        $this->middleware('auth');
    }
    
    public function index()
    {
        $employees= \App\Employee::all();
        $position= \App\Position::all();
        $department= \App\Department::all();
        return view('pages.manager',compact('employees','position','department'));
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
        // $fileName="";
        // if( $request->hasFile('profile')){
        //     $fileName=$request->file('profile')->getClientOriginalName();
        //     $request->file('profile')->storeAs('/public/img',$fileName);
        // }
        $employee=\App\Employee::create($request->all());
        return redirect('manager');
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
        // $employ = \App\Employee::find($id);
        // return redirect('manager',compact('employ'));
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
        $employee = \App\Employee::find($id);
        $employee->update($request->all());
        return redirect('manager');
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

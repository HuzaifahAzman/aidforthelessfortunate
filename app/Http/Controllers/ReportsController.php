<?php

namespace App\Http\Controllers;

use App\Report;
use App\LessFortunate;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.index');
    }

    public function indexPublic()
    {
        return view('reports.indexPublic');
    }

    public function indexVolunteer()
    {
        return view('reports.indexVolunteer');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        $lessfortunate = LessFortunate::find($id);
        return view('/reports/show')->with('lessfortunate', $lessfortunate);
    }

    public function showPublic(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:less_fortunates',
        ]);

        $lessfortunate = LessFortunate::find($request->input('id'));
        return view('/reports/showPublic')->with('lessfortunate', $lessfortunate);
    }

    public function showVolunteer(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        $lessfortunate = LessFortunate::find($request->input('id'));
        return view('/reports/showVolunteer')->with('lessfortunate', $lessfortunate);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}

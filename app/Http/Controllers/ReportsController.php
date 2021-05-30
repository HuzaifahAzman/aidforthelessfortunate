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
        $reports =  Report::orderBy('id', 'asc')->paginate(2);

        return view('reports.index')->with('reports', $reports);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePublic(Request $request) // TODO public ngan volunteer je
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'reportType' => 'required',
        ]);

        $report = new Report;
        $report->lessFortunate_id = $request->input('id');
        $report->name = $request->input('name');
        $report->phone = $request->input('phone');
        $report->address = $request->input('address');
        $report->address2 = $request->input('address2');
        $report->city = $request->input('city');
        $report->state = $request->input('state');
        $report->postcode = $request->input('postcode');

        $report->reportType = $request->input('reportType');

        $report->save();

        return redirect('/reports')->with('success', 'Report Has Been Submitted');
    }

    public function storeVolunteer(Request $request) // TODO public ngan volunteer je
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'reportType' => 'required',
        ]);

        $report = new Report;
        $report->lessFortunate_id = $request->input('id');
        $report->name = $request->input('name');
        $report->phone = $request->input('phone');
        $report->address = $request->input('address');
        $report->address2 = $request->input('address2');
        $report->city = $request->input('city');
        $report->state = $request->input('state');
        $report->postcode = $request->input('postcode');

        $report->reportType = $request->input('reportType');

        $report->save();

        return redirect('/volunteer/reports')->with('success', 'Report Has Been Submitted');
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
    public function update(Request $request, Report $report) //TODO activation
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::find($id);
        $report->delete();
        return redirect('/admin/reports')->with('success', 'Report Data Removed');
    }
}

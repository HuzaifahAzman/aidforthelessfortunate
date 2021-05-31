<?php

namespace App\Http\Controllers;

use App\Report;
use App\LessFortunate;
use DB;
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
        // $reports =  Report::orderBy('id', 'asc')->paginate(4);
        $joinedreports =  DB::table('reports')
                    ->join('less_fortunates', 'less_fortunates.id', '=', 'reports.lessFortunate_id')
                    ->select('reports.*', 'less_fortunates.name as LF_name', 'less_fortunates.address as LF_address',
                    'less_fortunates.address2 as LF_address2', 'less_fortunates.city as LF_city', 'less_fortunates.state as LF_state',
                    'less_fortunates.postcode as LF_postcode', 'less_fortunates.phone as LF_phone', 'less_fortunates.postcode as postcode',
                    'less_fortunates.phone as LF_phone')
                    ->orderBy('lessFortunate_id', 'asc')
                    ->paginate(4);

        // dd($reports);

        return view('reports.index')->with('reports', $joinedreports);
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

        $lessfortunate = LessFortunate::find($request->input('id'));

        if ($lessfortunate->name == $request->input('name') &&
            $lessfortunate->phone == $request->input('phone') &&
            $lessfortunate->address == $request->input('address') &&
            $lessfortunate->address2 == $request->input('address2') &&
            $lessfortunate->city == $request->input('city') &&
            $lessfortunate->state == $request->input('state') &&
            $lessfortunate->postcode == $request->input('postcode')
            ) {
            return redirect('/reports')->withErrors('Report Has Been Rejected: No changes from the original data');
        }

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
    public function update(Request $request, $id) //TODO activation
    {
        $this->validate($request, [
            'action' => 'required',
        ]);

        $report = Report::find($id);
        
        if ($request->input('action') == 'approve'){
            $action = $request->input('action') . 'd';

            $report->status = $action;
    
            $report->save();

            $lessfortunate = LessFortunate::find($request->input('lf_id'));
            $lessfortunate->name = $request->input('name');
            $lessfortunate->phone = $request->input('phone');
            $lessfortunate->address = $request->input('address');
            $lessfortunate->address2 = $request->input('address2');
            $lessfortunate->city = $request->input('city');
            $lessfortunate->state = $request->input('state');
            $lessfortunate->postcode = $request->input('postcode');

            $lessfortunate->save();
        }
        else {
            $action = $request->input('action') . 'ed';

            $report->status = $action;
    
            $report->save();
        }
        
        return redirect('/admin/reports')->with('success', 'Report Has Been ' . ucfirst($action));
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AidAccomplishment;
use App\LessFortunate;
use App\Http\Controllers\DashboardController;
use DB;

class AidAccomplishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessfortunates =  DB::table('less_fortunates')
                         ->leftJoin('aid_accomplishments',function ($join) {
                            $join->on('aid_accomplishments.lessFortunate_id', '=', 'less_fortunates.id') ;
                            $join->where('aid_accomplishments.status','=', 1) ;
                        })
                        ->select('less_fortunates.id as id', 'aid_accomplishments.submitted_at as submitted_at', 'less_fortunates.name as name', 'less_fortunates.address as address',
                        'less_fortunates.address2 as address2', 'less_fortunates.city as city', 'less_fortunates.state as state',
                        'less_fortunates.postcode as postcode', 'less_fortunates.phone as phone', 'less_fortunates.postcode as postcode',
                        'less_fortunates.phone as phone', 'less_fortunates.created_at as created_at', 'aid_accomplishments.status as status')
                        ->orderBy('less_fortunates.id', 'asc')
                        ->paginate(7);

        return view('aidaccomplishment.index')->with('lessfortunates', $lessfortunates);
    }

    public function indexVolunteer()
    {
        return view('aidaccomplishment.indexVolunteer');
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

    public function storeVolunteer(Request $request)
    {
        $this->validate($request, [
            'lf_id' => 'required',
            'volunteer_id' => 'required',
            'submit_time' => 'required',
        ]);

        $aid = AidAccomplishment::where('lessFortunate_id', '=', $request->input('lf_id'))->where('status', '=', 1)->first();
        if ($aid === null) {
            $aid = new AidAccomplishment;
            $aid->lessFortunate_id = $request->input('lf_id');
            $aid->volunteer_id = $request->input('volunteer_id');
            $aid->status = 1;
            $aid->submitted_at = $request->input('submit_time');

            $aid->save();
            
            return redirect()->action('AidAccomplishmentController@indexVolunteer')->with('success', 'Aid Accomplishment Submitted');
        } else {
            return redirect()->action('AidAccomplishmentController@indexVolunteer')->withErrors('Aid Supply Record Existed');
        }

        
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
        //
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

    public function resetAidAccomplishment()
    {
        AidAccomplishment::query()->update(['status' => 0]);

        return redirect()->action('DashboardController@adminDashboard')->with('success', 'Successfully Reset Aid Accomplishment Status');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AidAccomplishment;
use App\LessFortunate;
use DB;

class LessFortunateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $lessfortunates =  LessFortunate::all();
        // $lessfortunates = LessFortunate::orderBy('name', 'asc')->get();
        // $lessfortunates = LessFortunate::where('name', 'Huzaifah Azman')->get();
        $lessfortunates =  LessFortunate::orderBy('id', 'asc')->paginate(7);

        return view('lessfortunates.index')->with('lessfortunates', $lessfortunates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lessfortunates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postcode' => 'required',
        ]);

        $lessfortunate = new LessFortunate;
        $lessfortunate->name = $request->input('name');
        $lessfortunate->phone = $request->input('phone');
        $lessfortunate->address = $request->input('address');
        $lessfortunate->address2 = $request->input('address2');
        $lessfortunate->city = $request->input('city');
        $lessfortunate->state = $request->input('state');
        $lessfortunate->postcode = $request->input('postcode');

        $lessfortunate->save();

        return redirect('/admin/lessfortunates')->with('success', 'New Less Fortunate Data Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lessfortunate = LessFortunate::find($id);
        return view('/lessfortunates/show')->with('lessfortunate', $lessfortunate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lessfortunate = LessFortunate::find($id);

        return view('/lessfortunates/edit')->with('lessfortunate', $lessfortunate);
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
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postcode' => 'required',
        ]);

        $lessfortunate = LessFortunate::find($id);
        $lessfortunate->name = $request->input('name');
        $lessfortunate->phone = $request->input('phone');
        $lessfortunate->address = $request->input('address');
        $lessfortunate->address2 = $request->input('address2');
        $lessfortunate->city = $request->input('city');
        $lessfortunate->state = $request->input('state');
        $lessfortunate->postcode = $request->input('postcode');

        $lessfortunate->save();

        return redirect('/admin/lessfortunates')->with('success', 'Less Fortunate Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lessfortunate = LessFortunate::find($id);
        $lessfortunate->delete();
        return redirect('/admin/lessfortunates')->with('success', 'Less Fortunate Data Removed');

    }    

    public function indexVolunteer(Request $request)
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
        ->orderBy('less_fortunates.name', 'asc')
        ->paginate(7);

        return view('lessfortunates.indexVolunteer')->with('lessfortunates', $lessfortunates);
    }

    public function showVolunteer($id)
    {
        $lessfortunate = DB::table('less_fortunates')
        ->leftJoin('aid_accomplishments',function ($join) {
            $join->on('aid_accomplishments.lessFortunate_id', '=', 'less_fortunates.id') ;
            $join->where('aid_accomplishments.status','=', 1) ;
        })
        ->select('less_fortunates.id as id', 'aid_accomplishments.submitted_at', 'less_fortunates.name as name', 'less_fortunates.address as address',
        'less_fortunates.address2 as address2', 'less_fortunates.city as city', 'less_fortunates.state as state',
        'less_fortunates.postcode as postcode', 'less_fortunates.phone as phone', 'less_fortunates.postcode as postcode',
        'less_fortunates.phone as phone', 'less_fortunates.created_at as created_at', 'aid_accomplishments.status as status')
        ->where('less_fortunates.id', $id)
        ->first();

        // dd($lessfortunate);

        return view('/lessfortunates/showVolunteer')->with('lessfortunate', $lessfortunate);
    }

    public function indexPublic(Request $request)
    {
        $lessfortunates =  LessFortunate::orderBy('name', 'asc')->paginate(7);
    
        return view('/lessfortunates/indexPublic')->with('lessfortunates', $lessfortunates);
    }
    
    public function showPublic($id)
    {
        $lessfortunate = LessFortunate::find($id);
        return view('/lessfortunates/showPublic')->with('lessfortunate', $lessfortunate);
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;

class CampaignController extends Controller
{
    public function updateCampaign(Request $request){
        $this->validate($request, [
            'begin' => 'required',
            'end' => 'required'
        ]);

        $campaign = new Campaign;
        $campaign->begin = $request->input('begin');
        $campaign->end = $request->input('end');

        $campaign->save();
        
        return redirect()->action('DashboardController@adminDashboard')->with('success', 'Campaign Data Updated');
    }
}

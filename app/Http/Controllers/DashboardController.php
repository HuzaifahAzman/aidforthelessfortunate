<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\LessFortunate;
use App\Campaign;

class DashboardController extends Controller
{
    public function publicDashboard(){
        $data = array(
            'title' => 'Bakul Kasih Ramadhan',
            'numLessFortunate' => DB::table('less_fortunates')->count(),
            'numVolunteer' => User::where('userType','Volunteer')->count(),
            'numAdmin' => User::where('userType','Admin')->count(),
            'aidAccomplished' => LessFortunate::where('state','Johor')->count(), //TODO status aid
            'beginCampaign' => Campaign::select('begin')->latest()->first(),
            'endCampaign' => Campaign::select('end')->latest()->first(),
            'random' => ['Docs', 'Programming', 'RTSE']
        );
        
        return view('dashboard.dashboardPublic')->with($data);
    }

    public function adminDashboard(){
        $data = array(
            'title' => 'Admin Dashboard',
            'numLessFortunate' => DB::table('less_fortunates')->count(),
            'numVolunteer' => User::where('userType','Volunteer')->count(),
            'numAdmin' => User::where('userType','Admin')->count(),
            'aidAccomplished' => LessFortunate::where('state','Johor')->count(), //TODO status aid
            'beginCampaign' => Campaign::select('begin')->latest()->first(),
            'endCampaign' => Campaign::select('end')->latest()->first(),
            'random' => ['Docs', 'Programming', 'RTSE']
        );
        
        return view('dashboard.dashboardAdmin')->with($data);
    }

    public function adminDashboardEditCampaign(){
        $data = array(
            'title' => 'Admin Dashboard',
            'numLessFortunate' => DB::table('less_fortunates')->count(),
            'numVolunteer' => User::where('userType','Volunteer')->count(),
            'numAdmin' => User::where('userType','Admin')->count(),
            'aidAccomplished' => LessFortunate::where('state','Johor')->count(), //TODO status aid
            'beginCampaign' => Campaign::select('begin')->latest()->first(),
            'endCampaign' => Campaign::select('end')->latest()->first(),
            'random' => ['Docs', 'Programming', 'RTSE']
        );
        
        return view('dashboard.dashboardAdminEditCampaign')->with($data);
    }

    public function volunteerDashboard(){
        $data = array(
            'title' => 'Volunteer Dashboard',
            'numLessFortunate' => DB::table('less_fortunates')->count(),
            'numVolunteer' => User::where('userType','Volunteer')->count(),
            'numAdmin' => User::where('userType','Admin')->count(),
            'aidAccomplished' => LessFortunate::where('state','Johor')->count(), //TODO status aid
            'beginCampaign' => Campaign::select('begin')->latest()->first(),
            'endCampaign' => Campaign::select('end')->latest()->first(),
            'random' => ['Docs', 'Programming', 'RTSE']
        );
        
        return view('dashboard.dashboardVolunteer')->with($data);
    }

    public function about(){
        $data = array(
            'title' => 'This is about!',
            'services' => ['Docs', 'Programming', 'RTSE']
        );
        return view('pages.about')->with($data);
    }
}

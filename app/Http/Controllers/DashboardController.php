<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\LessFortunate;

class DashboardController extends Controller
{
    public function publicDashboard(){
        $title = 3;
        
        return view('dashboard.dashboardPublic')->with('title', $title);
    }

    public function adminDashboard(){
        $data = array(
            'title' => 'Admin Dashboard',
            'numLessFortunate' => DB::table('less_fortunates')->count(),
            'numVolunteer' => User::where('userType','Volunteer')->count(),
            'numAdmin' => User::where('userType','Admin')->count(),
            'aidAccomplished' => LessFortunate::where('state','Johor')->count(), //TODO status aid
            'random' => ['Docs', 'Programming', 'RTSE']
        );
        
        return view('dashboard.dashboardAdmin')->with($data);
    }

    public function volunteerDashboard(){
        $data = array(
            'title' => 'Volunteer Dashboard',
            'numLessFortunate' => 24,
            'numVolunteer' => 4,
            'numAdmin' => 2,
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

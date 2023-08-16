<?php

namespace App\Providers;

use App\Models\User;
use App\Notifications\AcceptedRequestNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $userid = auth()->user()->emp_id_fk;
        // $users = DB::table('users')
        // ->join('personal_informations','personal_informations.emp_id','=','users.emp_id_fk')
        // ->join('bureau_structures','bureau_structures.id','=','personal_informations.dep_id_fk')
        // ->join('jobs','jobs.id','=','personal_informations.job_id_fk')
        // // ->where('emp_id_fk','=',$userid)
        // ->get();
        // view()->composer('layouts.header',function($view){
        //     $view->with(['users',$users]);
        // });
        View::composer('layouts.header', function ($view) {
            $user = Auth::user();  
            $user2 = User::first(); 
            // dd($user2->notifications);
            $userWithJoinedTablesData =  User::join('personal_informations','personal_informations.emp_id','=','users.emp_id_fk')
        ->join('bureau_structures','bureau_structures.id','=','personal_informations.dep_id_fk')
        ->join('jobs','jobs.id','=','personal_informations.job_id_fk')
        ->join('leaders','leaders.id','=','jobs.leader_id')
        ->where('emp_id_fk','=',$user->emp_id_fk)
                // ->where('users.emp_id_fk', $user->emp_id_fk)
        ->first();
                // dd( $userWithJoinedTablesData);
            $view->with('user_data', $userWithJoinedTablesData)->with('users', $user2);
        });
        // $userid = auth()->user()->emp_id_fk;
        // $users = DB::table('users')
        // ->join('personal_informations','personal_informations.emp_id','=','users.emp_id_fk')
        // ->join('bureau_structures','bureau_structures.id','=','personal_informations.dep_id_fk')
        // ->join('jobs','jobs.id','=','personal_informations.job_id_fk')
        // ->where('emp_id_fk','=',$userid)
        // ->get();
    }
}

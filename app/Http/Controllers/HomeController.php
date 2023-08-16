<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:Bureau_Structure access', ['only' => ['bureau_structure']]);
        $this->middleware('role_or_permission:Dashboard access', ['only' => ['index']]);
        $this->middleware('role_or_permission:job_title access', ['only' => ['job_title']]);
        // $this->middleware('role_or_permission:Structure access', ['only' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function blank(){
        return "Blank Page-- Page has Not been created Yet";
     }
     public function hh(){
        return view('welcome');
     }
     public function index()
     {
         $user = User::first();
         $notifications = $user->notifications;
         // dd($user->notifications);
         $posts = Post::orderBy('updated_at', 'desc')->get();
         $jobs = DB::table('jobs')->count();
         $total_emp = DB::table('personal_informations')->count();
         $male = DB::table('personal_informations')
             ->where('sex', '=', 'male')
             ->count();
         $female = DB::table('personal_informations')
             ->where('sex', '=', 'female')
             ->count();
 
             $limited = DB::table('equipment')
             ->where('type_id_fk', '=', '1')
             ->count();
             $fixed = DB::table('equipment')
             ->where('type_id_fk', '=', '2')
             ->count();
         $total_equip = DB::table('equipment')->count();
         return view('body.dashboard', [
             'posts' => $posts,
             'jobs' => $jobs,
             'total_emp' => $total_emp,
             'male' => $male,
             'female' => $female,
             'limited' => $limited,
             'fixed' => $fixed,
             'total_equip' => $total_equip,
         ]);
     }
    public function bureau_structure()
    {

        $datas = DB::table('bureau_structures')
        ->select('leader',DB::raw("GROUP_CONCAT(department_name SEPARATOR ',')as jobs"))
        ->groupBy('leader')->orderBy('id', 'asc')
        ->get();
        return view('body.bureau_structure',compact('datas'));
     
    }

    public function job_title(){

        $user = DB::table('users')->get();
        $jobs = DB::table('jobs')
        ->join('bureau_structures', 'bureau_structures.id', '=', 'jobs.dep_id_fk')
        ->join('leaders', 'leaders.id', '=', 'jobs.leader_id')
        ->get();
        return view('body.job_title',['jobs'=>$jobs]);
        
    }
    public function markasread($id){
        if($id){
            Auth::user()->unreadNotifications->where('id',$id)->markAsRead();
        }
        return back();
    }
    // public function role(){
      
    //     return view('body.role',[
    //         'roles' =>DB::table('roles')->get(),
    //     ]);
    // }
    public function fetch(Request $request){
        // $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('jobs')
       ->where('dep_id_fk', $value)
       ->groupBy($dependent)
       ->get();
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->id.'">'.$row->$dependent.'</option>';
     }
     echo $output;
    }

    public function viewProfile(){
        $user= User::latest()->get();
        $userid = auth()->user()->emp_id_fk;
        $users = DB::table('users')
        ->join('personal_informations','personal_informations.emp_id','=','users.emp_id_fk')
        ->join('bureau_structures','bureau_structures.id','=','personal_informations.dep_id_fk')
        ->join('jobs','jobs.id','=','personal_informations.job_id_fk')
        ->where('emp_id_fk','=',$userid)
        ->first();
        // dd($users);
        return view('body.profile',[
            'users'=> $users
        ]);
    }
}

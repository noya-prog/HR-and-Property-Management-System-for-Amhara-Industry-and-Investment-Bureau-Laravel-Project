<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:User access|User Grant_Role', ['only' => ['index','show']]);
        // $this->middleware('role_or_permission:User Grant_Role', ['only' => ['create','store','giverole']]);
        $this->middleware('role_or_permission:User Grant_Role', ['only' => ['edit','update']]);
        // $this->middleware('role_or_permission:User delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user= User::latest()->get();
        $userid = auth()->user()->emp_id_fk;
        $users = DB::table('users')
        ->join('personal_informations','personal_informations.emp_id','=','users.emp_id_fk')
        ->join('bureau_structures','bureau_structures.id','=','personal_informations.dep_id_fk')
        ->join('jobs','jobs.id','=','personal_informations.job_id_fk')
        ->where('emp_id_fk','=',$userid)
        ->get();
        return view('body.authorization.user.users',[
            'test'=> $user , 'test2'=>$users
        ]);
    }
    // public function userview(){
    //     $user= User::latest()->get();
    //     // $users = User::join('personal_informations','personal_informations.userID','=','users.id')
    //     // ->orderBy('users.id')
    //     // ->get();
    //     // dd($user);        // $users = User::get();
    //     // ->select('users.*', 'personal_information.fname', 'personal_information.lname', 'personal_information.email')
    //     // dd($users);
    //     return view('body.authorization.user.users',[
    //         'test'=> $user
    //     ]);
    // }
    public function giverole(User $user){
        $roles = Role::get();
        return view('body.authorization.user.adduser',['roles'=>$roles,'users'=>$user]);
    }
    public function declineRole(User $user){
        $roleName = $user->getRoleNames()->first();
        $user->removeRole($roleName);
        User::where('id','=',$user->id)->update([
            'status'=>'declined',
        ]);
        $user->save();
        return redirect(route('users'));
    }
    public function saverole(Request $request, User $user){
        // dd($user);
        User::where('id','=',$user->id)->update([
            'status'=>$request->status,
        ]);
        // $val['status'] = $request->status;
        // $user->update($val);
        // dd($request->status);
        // $user->update(['status'=>$request->status]);
        $user->syncRoles($request->roles);
        // $users = User::get();
        // $use2= User::where('id','=',$user->id)->update([
        //      'status'=>'approved',
        // ]);
        // dd($user->status);
        return redirect(route('users'));
    } 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('body.authorization.user.adduser',['roles'=>$roles,'users'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
         // dd($user);
       
         User::where('id','=',$user->id)->update([
            'status'=>'approved',
        ]);
        // $val['status'] = $request->status;
        // $user->update($val);
        // dd($request->status);
        // $user->update(['status'=>$request->status]);
        $user->syncRoles($request->roles);
        // $users = User::get();
        // $use2= User::where('id','=',$user->id)->update([
        //      'status'=>'approved',
        // ]);
        // dd($user->status);
        return redirect(route('users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

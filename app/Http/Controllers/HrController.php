<?php

namespace App\Http\Controllers;

use App\Models\Dependent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HrController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:personal_information access|Employee edit|', ['only' => ['dependents','emergency','expereince','education','are_colateral','have_colateral']]);
        // $this->middleware('role_or_permission:Employee create', ['only' => ['create','store']]);
        // $this->middleware('role_or_permission:Employee edit', ['only' => ['edit','update']]);
        // $this->middleware('role_or_permission:Employee delete', ['only' => ['destroy']]);
    }
    public function dependents(){
        $data = DB::table('personal_informations')
        ->join('dependents','dependents.D_emp_id_fk','=','personal_informations.emp_id')
        ->get();
        return view('body.employee.dependents',['test'=>$data]);
    }
    // public function dep_delete(string $id){
    //     Dependent::where('D_emp_id_fk','=',$id)->delete();
    //     return redirect(route('dependents'))->with('success', 'Delete successfull');
    // }
    public function emergency(){
        $data = DB::table('personal_informations')
        ->join('emergency_contacts','emergency_contacts.EM_emp_id_fk','=','personal_informations.emp_id')
        ->get();
        return view('body.employee.emergency',['test'=>$data]);
    }
    public function expereince(){
        $data = DB::table('personal_informations')
        ->join('emp__experiences','emp__experiences.EX_emp_id_fk','=','personal_informations.emp_id')
        ->get();
        return view('body.employee.experience',['test'=>$data]);
    }
    public function education(){
        $data = DB::table('personal_informations')
        ->join('emp__education','emp__education.ED_emp_id_fk','=','personal_informations.emp_id')
        ->get();
        return view('body.employee.education',['test'=>$data]);
    }
    public function are_colateral(){
        $data = DB::table('personal_informations')
        ->join('are__colaterals','are__colaterals.AC_emp_id_fk','=','personal_informations.emp_id')
        ->get();
        return view('body.employee.are_colateral',['test'=>$data]);
    }
    public function have_colateral(){
        $data = DB::table('personal_informations')
        ->join('have__colaterals','have__colaterals.HC_emp_id_fk','=','personal_informations.emp_id')
        ->get();
        return view('body.employee.have_colateral',['test'=>$data]);
    }
}

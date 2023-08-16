<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\job;
use App\Models\User;
use App\Models\address;
use App\Models\Dependent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Are_Colateral;
use App\Models\Emp_Education;
use App\Models\Emp_Experience;
use App\Models\Have_Colateral;
use App\Models\EmergencyContact;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\personal_information;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\Notification;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('role_or_permission:personal_information access|Employee detail|Employee create|Employee edit|Employee delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Employee create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Employee edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Employee delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $data = DB::table('personal_informations')
        ->join('bureau_structures','bureau_structures.id','=','personal_informations.dep_id_fk')
        ->join('jobs','jobs.id','=','personal_informations.job_id_fk')
        ->join('leaders','leaders.id','=','jobs.leader_id')
        ->orderBy('personal_informations.updated_at','desc')
        ->get();
        return view('body.employee.personal_info',[
            'test'=> $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department = DB::table('jobs')
            ->join('bureau_structures', 'bureau_structures.id', '=', 'jobs.dep_id_fk')
            ->groupBy('dep_id_fk')
            ->get();
        return view('body.employee.create_emp')->with('dep', $department);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

      
        $request->validate([
            'email' => 'required|email|unique:personal_informations,email|max:50',
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'department' => 'required',
            'job_title' => 'required',
            'sex' => 'required',
            'dob' => 'required',
            'martial' => 'required',
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:18'],
            'employeed_at' => 'required',

            'state' => 'required',
            'city' => 'required',
            'kebele' => 'required',
            'house_num' => 'required',

            'd_mother_name' => 'required',
            'd_father_name' => 'required',
            'spouse_name' => 'required',
            'num_of_children' => 'required',

            'elementary_school' => 'required',
            'high_school' => 'required',
            'prep_school' => 'required',
            'higher_commission' => 'required',
            'education_level' => 'required',

            'prev_company' => 'required',
            'period_of_service' => 'required',
            'relevant_experience' => 'required',

            'ac_full_name' => 'required',
            'ac_relationship' => 'required',
            'ac_state' => 'required',
            'ac_city' => 'required',
            'ac_kebele' => 'required',

            'co_full_name' => 'required',
            'co_email' => 'required|email|unique:have__colaterals,co_email|max:50',
            'co_company_name' => 'required',
            'co_state' => 'required',
            'co_city' => 'required',
            'co_kebele' => 'required',
            'co_relationship' => 'required',
            'co_salary' => 'required',

            'EC_name' => 'required',
            'EC_relation' => 'required',
            'EC_email' => 'required|email|unique:emergency_contacts,EC_email|max:50',
            'EC_phone' => 'required',
            'EC_age' => 'required',
            'EC_sex' => 'required',
        ]);
        //calculate how long employee worked for
        $emp_start_date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->employeed_at);
        $now = \Carbon\Carbon::now();
        $emp_work_period = $emp_start_date->diffForHumans($now, ['parts' => 3]);
        // Remove the "before" and "after" suffixes from the output
        $emp_work_period = preg_replace('/\b(before|after)\b/', '', $emp_work_period);
        // Remove any extra whitespace from the output
        $emp_work_period = trim(preg_replace('/\s+/', ' ', $emp_work_period));

        $data = DB::table('jobs')
            ->where('id', $request->job_title)
            ->get();
        foreach ($data as $row) {
            if ($row->max_Emp_Limit > $row->Hired_Emp) {
                $personalInformation = personal_information::create([
                    'emp_id' => 'EMP-' . Str::random(5),
                    'email' => $request->email,
                    'fname' => $request->first_name,
                    'mname' => $request->middle_name,
                    'lname' => $request->last_name,
                    'dep_id_fk' => $request->department,
                    'job_id_fk' => $request->job_title,
                    'sex' => $request->sex,
                    'dob' => $request->dob,
                    'martial' => $request->martial,
                    'phone' => $request->phone,
                    'employeed_at' => $request->employeed_at,
                    'password' => bcrypt($request->email . '12345+'),
                    'age' => Carbon::parse($request->dob)->age,
                    'worked_for' => $emp_work_period,
                ]);

                
                $row->Hired_Emp = $row->Hired_Emp + 1;
                $new_val = $row->Hired_Emp;
                job::where('id', '=', $request->job_title)->update([
                    'Hired_Emp' => $new_val,
                ]);

                $user = new User();
                $user->emp_id_fk = $personalInformation->emp_id;
                $user->name = $request->first_name;
                $user->mname = $request->middle_name;
                $user->lname = $request->last_name;
                $user->email = $request->email;
                $user->password = bcrypt($request->middle_name . '12345+');
                $user->status = 'pending';
                $user->save();
                // $user = User::first();
                // $user = User::create([
                //     'emp_id_fk' => $personalInformation->emp_id,
                //     'name'=> $request->first_name,
                //     'mname'=> $request->middle_name,
                //     'lname'=> $request->last_name,
                //     'email'=> $request->email,
                //     'password' => bcrypt($request->middle_name . '12345+'),
                //     'status' => 'pending',
                // ]);

                $user2 = User::role('admin')->get();
                Notification::send($user2, new NewUserNotification($request->first_name,$request->middle_name,$request->last_name));
                $address = address::create([
                    'state' => $request->state,
                    'city' => $request->city,
                    'kebele' => $request->kebele,
                    'house_num' => $request->house_num,
                    'AD_emp_id_fk' => $personalInformation->emp_id,
                ]);

                $dependent = Dependent::create([
                    'd_mother_name' => $request->d_mother_name,
                    'd_father_name' => $request->d_father_name,
                    'spouse_name' => $request->spouse_name,
                    'num_of_children' => $request->num_of_children,
                    'D_emp_id_fk' => $personalInformation->emp_id,
                ]);
                $education = Emp_Education::create([
                    'elementary_school' => $request->elementary_school,
                    'high_school' => $request->high_school,
                    'prep_school' => $request->prep_school,
                    'higher_commission' => $request->higher_commission,
                    'education_level' => $request->education_level,
                    'ED_emp_id_fk' => $personalInformation->emp_id,
                ]);

                $work_exp = Emp_Experience::create([
                    'prev_company' => $request->prev_company,
                    'period_of_service' => $request->period_of_service,
                    'relevant_experience' => $request->relevant_experience,
                    'EX_emp_id_fk' => $personalInformation->emp_id,
                    'job_id_fk' => $request->job_title,
                ]);


                $are_colaterals = Are_Colateral::create([
                    'ac_full_name' => $request->ac_full_name,
                    'ac_relationship' => $request->ac_relationship,
                    'ac_state' => $request->ac_state,
                    'ac_city' => $request->ac_city,
                    'ac_kebele' => $request->ac_kebele,
                    'AC_emp_id_fk' => $personalInformation->emp_id,
                ]);
      

                $have_colaterals = new Have_Colateral();
                $have_colaterals->co_full_name = $request->co_full_name;
                $have_colaterals->co_email = $request->co_email;
                $have_colaterals->co_company_name = $request->co_company_name;
                $have_colaterals->co_state = $request->co_state;
                $have_colaterals->co_city = $request->co_city;
                $have_colaterals->co_kebele = $request->co_kebele;
                $have_colaterals->co_relationship = $request->co_relationship;
                $have_colaterals->co_salary = $request->co_salary;
                $have_colaterals->HC_emp_id_fk = $personalInformation->emp_id;
                $have_colaterals->save();

                $EMG = new EmergencyContact();
                $EMG->EC_name = $request->EC_name;
                $EMG->EC_relation = $request->EC_relation;
                $EMG->EC_email = $request->EC_email;
                $EMG->EC_phone = $request->EC_phone;
                $EMG->EC_age = $request->EC_age;
                $EMG->EC_sex = $request->EC_sex;
                $EMG->EM_emp_id_fk = $personalInformation->emp_id;
                $EMG->save();

                return redirect(route('personal_information'))->with('success', 'Registration successfull');
            } else {
                return back()->with('error', 'Maximum job limit Reached, Please select Another Job');
            }
            
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('personal_informations')
        ->join('bureau_structures','bureau_structures.id','=','personal_informations.dep_id_fk')
        ->join('jobs','jobs.id','=','personal_informations.job_id_fk')
        ->join('addresses','addresses.AD_emp_id_fk','=','personal_informations.emp_id')
        ->join('dependents','dependents.D_emp_id_fk','=','personal_informations.emp_id')
        ->join('emergency_contacts','emergency_contacts.EM_emp_id_fk','=','personal_informations.emp_id')
        ->join('emp__education','emp__education.ED_emp_id_fk','=','personal_informations.emp_id')
        ->join('emp__experiences','emp__experiences.EX_emp_id_fk','=','personal_informations.emp_id')
        ->join('are__colaterals','are__colaterals.AC_emp_id_fk','=','personal_informations.emp_id')
        ->join('have__colaterals','have__colaterals.HC_emp_id_fk','=','personal_informations.emp_id')
        ->where('emp_id','=',$id)
        ->first();
        return view('body.employee.viewEmp',[
            'user'=> $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('body.employee.editEmp', [
            'personal' => personal_information::where('emp_id', $id)->first(),
            'address' => address::where('AD_emp_id_fk', $id)->first(),
            'dependent' => Dependent::where('D_emp_id_fk', $id)->first(),
            'education' => Emp_Education::where('ED_emp_id_fk', $id)->first(),
            'work_exp' => Emp_Experience::where('Ex_emp_id_fk', $id)->first(),
            'colateral' => Are_Colateral::where('AC_emp_id_fk', $id)->first(),
            'have_colateral' => Have_Colateral::where('HC_emp_id_fk', $id)->first(),
            'EMG' => EmergencyContact::where('EM_emp_id_fk', $id)->first(),
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            // 'email' => 'required|email|unique:personal_informations,email,'.$pi->emp_id.'|max:50',

            // 'email' => 'required|email|unique:personal_informations,email|max:50',
            // 'department' => 'required',
            // 'job_title' => 'required',
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'sex' => 'required',
            'dob' => 'required',
            'martial' => 'required',
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:18'],
            'employeed_at' => 'required',
            'state' => 'required',
            'city' => 'required',
            'kebele' => 'required',
            'house_num' => 'required',

            'd_mother_name' => 'required',
            'd_father_name' => 'required',
            'spouse_name' => 'required',
            'num_of_children' => 'required',

            'elementary_school' => 'required',
            'high_school' => 'required',
            'prep_school' => 'required',
            'higher_commission' => 'required',
            'education_level' => 'required',

            'prev_company' => 'required',
            'period_of_service' => 'required',
            'relevant_experience' => 'required',

            'ac_full_name' => 'required',
            'ac_relationship' => 'required',
            'ac_state' => 'required',
            'ac_city' => 'required',
            'ac_kebele' => 'required',

            'co_full_name' => 'required',
            // 'email' => 'required|email|unique:have__colaterals,email|max:50',
            'co_company_name' => 'required',
            'co_state' => 'required',
            'co_city' => 'required',
            'co_kebele' => 'required',
            'co_relationship' => 'required',
            'co_salary' => 'required',

            'EC_name' => 'required',
            'EC_relation' => 'required',
            // 'EC_email' => 'required|email|unique:emergency_contacts,EC_email|max:50',
            'EC_phone' => 'required',
            'EC_age' => 'required',
            'EC_sex' => 'required',
        ]);

           //calculate how long employee worked for
           $emp_start_date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->employeed_at);
           $now = \Carbon\Carbon::now();
           $emp_work_period = $emp_start_date->diffForHumans($now, ['parts' => 3]);
           // Remove the "before" and "after" suffixes from the output
           $emp_work_period = preg_replace('/\b(before|after)\b/', '', $emp_work_period);
           // Remove any extra whitespace from the output
           $emp_work_period = trim(preg_replace('/\s+/', ' ', $emp_work_period));

        personal_information::where('emp_id', $id)->update([
            // 'dep_id_fk' => $request->department,
            // 'job_id_fk' => $request->job_title,
            'fname' => $request->first_name,
            'mname' => $request->middle_name,
            'lname' => $request->last_name,
            'sex' => $request->sex,
            'dob' => $request->dob,
            'martial' => $request->martial,
            'phone' => $request->phone,
            'employeed_at' => $request->employeed_at,
            'password' => bcrypt($request->email . '12345+'),
            'age' => Carbon::parse($request->dob)->age,
            'worked_for' => $emp_work_period,

              
        ]);

         address::where('AD_emp_id_fk', $id)->update([
            'state' => $request->state,
            'city' => $request->city,
            'kebele' => $request->kebele,
            'house_num' => $request->house_num,   
        ]);


        
        Dependent::where('D_emp_id_fk', $id)->update([
            'd_mother_name' => $request->d_mother_name,
            'd_father_name' => $request->d_father_name,
            'spouse_name' => $request->spouse_name,
            'num_of_children' => $request->num_of_children,
            // 'D_emp_id_fk' => $personalInformation->emp_id,
        ]);

        Emp_Education::where('ED_emp_id_fk', $id)->update([
            'elementary_school' => $request->elementary_school,
            'high_school' => $request->high_school,
            'prep_school' => $request->prep_school,
            'higher_commission' => $request->higher_commission,
            'education_level' => $request->education_level,
            // 'ED_emp_id_fk' => $personalInformation->emp_id,
        ]);

        Emp_Experience::where('EX_emp_id_fk', $id)->update([
            'prev_company' => $request->prev_company,
            'period_of_service' => $request->period_of_service,
            'relevant_experience' => $request->relevant_experience,
            // 'job_id_fk' => $request->job_title,
            // 'EX_emp_id_fk' => $personalInformation->emp_id,
        ]);


        Are_Colateral::where('AC_emp_id_fk', $id)->update([
            'ac_full_name' => $request->ac_full_name,
            'ac_relationship' => $request->ac_relationship,
            'ac_state' => $request->ac_state,
            'ac_city' => $request->ac_city,
            'ac_kebele' => $request->ac_kebele,
            // 'AC_emp_id_fk' => $personalInformation->emp_id,
        ]);


        $have_colaterals = Have_Colateral::where('HC_emp_id_fk', $id)->first();
        $have_colaterals->co_full_name = $request->co_full_name;
        $have_colaterals->co_company_name = $request->co_company_name;
        $have_colaterals->co_state = $request->co_state;
        $have_colaterals->co_city = $request->co_city;
        $have_colaterals->co_kebele = $request->co_kebele;
        $have_colaterals->co_relationship = $request->co_relationship;
        $have_colaterals->co_salary = $request->co_salary;
        // $have_colaterals->HC_emp_id_fk = $personalInformation->emp_id;
        $have_colaterals->save();

        $EMG = EmergencyContact::where('EM_emp_id_fk', $id)->first();
        $EMG->EC_name = $request->EC_name;
        $EMG->EC_relation = $request->EC_relation;
        $EMG->EC_phone = $request->EC_phone;
        $EMG->EC_age = $request->EC_age;
        $EMG->EC_sex = $request->EC_sex;
        // $EMG->EM_emp_id_fk = $personalInformation->emp_id;
        $EMG->save();

       return redirect(route('personal_information'))->with('success','Data Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table('personal_informations')->where('emp_id',$id)->first();

        // dd($data);
        $data2 = DB::table('jobs')->where('id',$data->job_id_fk)->get();
        foreach($data2 as $row){
            //     dd($row->Hired_Emp);
                $row->Hired_Emp = $row->Hired_Emp-1;
                $new_val = $row->Hired_Emp;
                // dd($row->id);
                job::where('id','=',$row->id)->update([
                'Hired_Emp' => $new_val
            ]);
        }
        // $data->delete();
        // tbl_emp_personal_info::where('empid','=',$id)->delete();
        // return redirect()->back();
        personal_information::where('emp_id','=',$id)->delete();
     return redirect(route('personal_information'))->with('success', 'Delete successfull');
    }
}

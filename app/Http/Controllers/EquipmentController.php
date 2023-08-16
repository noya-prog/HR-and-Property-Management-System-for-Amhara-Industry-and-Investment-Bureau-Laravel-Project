<?php

namespace App\Http\Controllers;

use App\Models\equType;
use App\Models\equipment;
use App\Models\item_request;
use App\Models\User;
use App\Notifications\AcceptedRequestNotification;
use App\Notifications\DeclinedRequestNotification;
use App\Notifications\ItemRequestNotificaton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;


class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Property_Management access|Register_item access|Item view|Item edit|Item add|Item delete|Request_item access|Requested_items access|Requested_items approve|My_items access|Approved_requests access|give item', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Item view', ['only' => ['show']]);
        $this->middleware('role_or_permission:Item edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Item add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Item delete', ['only' => ['destroy']]);
        $this->middleware('role_or_permission:Register_item access', ['only' => ['index']]);
        $this->middleware('role_or_permission:Requested_items approve', ['only' => ['accept_request','accept_request_per','decline_request','decline_request_per']]);
        $this->middleware('role_or_permission:give item', ['only' => ['give_lim_Item','give_per_item','return_per_item']]);
        $this->middleware('role_or_permission:Approved_requests access', ['only' => ['approved_lim_requests','approved_per_requests']]);
        $this->middleware('role_or_permission:Requested_items access', ['only' => ['managerRequested_lim_item','managerRequested_per_item']]);
        $this->middleware('role_or_permission:Request_item access', ['only' => ['limitedItem','permanentItem']]);
    }
    public function index()
    {
        $data = DB::table('equipment')
        ->join('equ_types','equ_types.id','=','equipment.type_id_fk')
        ->join('bureau_structures','bureau_structures.id','=','equipment.equ_dep_id_fk')
        ->get();
        return view('body.property.register',[
            'test'=> $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department = DB::table('bureau_structures')->get();
        $item_reqType = DB::table('equ_types')->get();
        return view('body.property.createItem',[
            'dep'=> $department,
            'item' => $item_reqType,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
public function req_store(Request $request, String $id)  {

    $validator=$request->validate([
            'item_name' => 'required|max:255',
            'item_description' => 'required|max:255',
            'item_measurement' => 'required|max:255',
            'in_stock' => 'required',
            'item_amount' => ['required', 'numeric', 'min:1', 'lte:in_stock'],
            'reason' => 'required',
        ], [
            'item_amount.lte' => 'The item amount must be less than or equal to the available stock.',
        ]);

        $item_req= new item_request();
        $item_req->r_equ_name = $request->item_name;
        $item_req->r_emp_id_fk = Auth::user()->emp_id_fk;
        $item_req->r_equ_measurement = $request->item_measurement;
        $item_req->r_amount = $request->item_amount;
        $item_req->r_equ_description = $request->item_description;
        $item_req->r_inStock = $request->in_stock;
        $item_req->r_reason = $request->reason;
        $item_req->r_status = 'pending';
        $item_req->out_of_store = 'Not Received';
        $item_req->r_type_id_fk = $request->r_type_id_fk;
        $item_req->r_item_id = $id;
        $item_req->save();
        $user_id = Auth::user()->emp_id_fk;
        $username = DB::table('personal_informations')->where('emp_id','=',$user_id)->first();
        $user2 = User::role('store manager')->get();
        Notification::send($user2, new ItemRequestNotificaton($username->fname,$username->mname,$username->lname));
    return back()->with('success', 'Request Successfull');
}

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|max:255',
            'item_description' => 'required|max:255',
            'item_measurement' => 'required|max:255',
            'in_stock' => 'required',
            'single_price' => 'required',
            'store_name' => 'required', 
            'item_status' => 'required',
            'department' => 'required',
            'item_type' => 'required',
        ]);

        $item_req = new equipment();
        $item_req->item_name = $request->item_name;
        $item_req->item_description = $request->item_description;
        $item_req->item_measurement = $request->item_measurement;
        $item_req->in_stock = $request->in_stock;
        $item_req->single_price = $request->single_price;
        $item_req->store_name = $request->store_name;
        $item_req->item_status = $request->item_status;
        $item_req->equ_dep_id_fk = $request->department;
        $item_req->type_id_fk = $request->item_type;
        $item_req->save();
        return redirect(route('register.index'))->with('success', 'Registration successfull');
    }
    public function limitedItem(){
        $data = DB::table('equipment')
        // ->join('equipment','equipment.emp_id','=','equipment.r_emp_id_fk')
        ->join('equ_types','equ_types.id','=','equipment.type_id_fk')
        ->join('bureau_structures','bureau_structures.id','=','equipment.equ_dep_id_fk')
        ->where('equ_types.id','=',1)
        ->get();
        return view('body.property.limitedItem',['test'=>$data]);
    }
    public function permanentItem(){
        $data = DB::table('equipment')
        ->join('equ_types','equ_types.id','=','equipment.type_id_fk')
        ->join('bureau_structures','bureau_structures.id','=','equipment.equ_dep_id_fk')
        ->where('equ_types.id','=',2)
        ->get();
    
        return view('body.property.permanentItem',['test'=>$data]);
    }
   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('equipment')
        ->join('equ_types','equ_types.id','=','equipment.type_id_fk')
        ->join('bureau_structures','bureau_structures.id','=','equipment.equ_dep_id_fk')
        ->where('item_id','=',$id)
        ->first();
        return view('body.property.detail',[
            'item'=> $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department=DB::table('bureau_structures')->get();
        return view('body.property.editItem', [
            'item' => equipment::where('item_id', $id)->first(),
            'itemType'=>equType::all(),
            'department'=>$department
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'item_name' => 'required|max:255',
            'item_description' => 'required|max:255',
            'item_measurement' => 'required|max:255',
            'in_stock' => 'required',
            'single_price' => 'required',
            'store_name' => 'required',
            'item_status' => 'required',
            'department' => 'required',
            'item_type' => 'required',
        ]);
        equipment::where('item_id', $id)->update([
            'item_name' => $request->item_name,
            'item_description' => $request->item_description,
            'item_measurement' => $request->item_measurement,
            'in_stock' => $request->in_stock,
            'single_price' => $request->single_price,
            'store_name' => $request->store_name,
            'item_status' => $request->item_status,
            'equ_dep_id_fk' => $request->department,
            'type_id_fk' => $request->item_type,
        ]);
        return redirect(route('register.index'))->with('success','Data Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        equipment::where('item_id','=',$id)->delete();
        return redirect(route('register.index'))->with('success', 'Delete successfull');//
    }


    public function received_items(){
        $userId = Auth::user()->emp_id_fk;
        $data = item_request::where('r_emp_id_fk', $userId)
        ->where('out_of_store' , 'Received' )
        ->get();
        // $data = DB::table('item_requests')
        // ->join('equipment','equipment.item_id','=','item_requests.r_item_id')
        // ->where('r_emp_id_fk', $userId)
        // ->where('out_of_store' , 'Received')
        // ->orderBy('item_requests.updated_at')
        // ->get();
        return view('body.property.received_items',[
            'data' =>$data,
        ]);
       
    }
    public function requested_items(){

        $userId = Auth::user()->emp_id_fk;
        // $data = item_request::where('r_emp_id_fk', $userId)
        //     ->whereIn('r_status', ['pending', 'approved'])
        //     ->get();
            $data = DB::table('item_requests')
            ->join('equipment','equipment.item_id','=','item_requests.r_item_id')
            ->where('r_emp_id_fk', $userId)
            ->whereIn('r_status', ['pending', 'approved'])
            ->select('item_requests.*','item_requests.created_at AS item_requests_created_at','equipment.*')
        ->orderBy('item_requests.updated_at')
            ->get();
            // dd($data->item_requests_created_at);
        return view('body.property.requested_items',[
            'data' =>$data,
        ]);
    }
    public function managerRequested_lim_item(){
        $data = DB::table('item_requests')
        // ->join('equipment','equipment.emp_id','=','equipment.r_emp_id_fk')
        ->join('personal_informations','personal_informations.emp_id','=','item_requests.r_emp_id_fk')
        ->join('equipment','equipment.item_id','=','item_requests.r_item_id')
        ->where('item_requests.r_type_id_fk','=',1)
        ->get();
        return view('body.property.limitedRequestManager',['test'=>$data]);
    }
    public function managerRequested_per_item(){
        $data = DB::table('item_requests')
        // ->join('equipment','equipment.emp_id','=','equipment.r_emp_id_fk')
        ->join('personal_informations','personal_informations.emp_id','=','item_requests.r_emp_id_fk')
        ->join('equipment','equipment.item_id','=','item_requests.r_item_id')
        ->where('item_requests.r_type_id_fk','=',2)
        ->get();
        return view('body.property.permanentRequestManager',['test'=>$data]);
    }
    public function accept_request(String $id){
        // $user_id = Auth::user()->emp_id_fk;
        // $user_data = User::where('emp_id_fk','=',$user->r_emp_id_fk)->get();
        $user = item_request::where('r_id','=',$id)->first();
        $user2 = User::where('emp_id_fk','=',$user->r_emp_id_fk)->first();
        $username = DB::table('personal_informations')->where('emp_id','=',$user->r_emp_id_fk)->first();
        item_request::where('r_id','=',$id)->update([
            'r_status'=>'approved',
        ]);
        Notification::send($user2, new AcceptedRequestNotification($username->fname,$username->mname,$username->lname,$user->r_equ_name,$user->r_amount));
        return redirect(route('manager_requested_lim'));
    }
    public function decline_request(String $id){
        $user = item_request::where('r_id','=',$id)->first();
        $user2 = User::where('emp_id_fk','=',$user->r_emp_id_fk)->first();
        $username = DB::table('personal_informations')->where('emp_id','=',$user->r_emp_id_fk)->first();
        item_request::where('r_id','=',$id)->update([
            'r_status'=>'declined',
        ]);
        Notification::send($user2, new DeclinedRequestNotification($username->fname,$username->mname,$username->lname,$user->r_equ_name,$user->r_amount));
        return redirect(route('manager_requested_lim'));
    }
    public function accept_request_per(String $id){
        $user = item_request::where('r_id','=',$id)->first();
        $user2 = User::where('emp_id_fk','=',$user->r_emp_id_fk)->first();
        $username = DB::table('personal_informations')->where('emp_id','=',$user->r_emp_id_fk)->first();
        item_request::where('r_id','=',$id)->update([
            'r_status'=>'approved',
        ]);
        Notification::send($user2, new AcceptedRequestNotification($username->fname,$username->mname,$username->lname,$user->r_equ_name,$user->r_amount));
        return redirect(route('manager_requested_per'));
    }
    public function decline_request_per(String $id){
        $user = item_request::where('r_id','=',$id)->first();
        $user2 = User::where('emp_id_fk','=',$user->r_emp_id_fk)->first();
        $username = DB::table('personal_informations')->where('emp_id','=',$user->r_emp_id_fk)->first();
        item_request::where('r_id','=',$id)->update([
            'r_status'=>'declined',
        ]);
        Notification::send($user2, new DeclinedRequestNotification($username->fname,$username->mname,$username->lname,$user->r_equ_name,$user->r_amount));
        return redirect(route('manager_requested_per'));
    }
    public function approved_lim_requests(){
        $data = DB::table('item_requests')
        ->join('equipment','equipment.item_id','=','item_requests.r_item_id')
        ->join('personal_informations','personal_informations.emp_id','=','item_requests.r_emp_id_fk')
        ->where('item_requests.r_status','=','approved')
        ->where('item_requests.r_type_id_fk','=',1)
        ->get();
        return view('body.property.approved_lim_requests',['test'=>$data]);
    }
    public function approved_per_requests(){
        $data = DB::table('item_requests')
        ->join('equipment','equipment.item_id','=','item_requests.r_item_id')
        ->join('personal_informations','personal_informations.emp_id','=','item_requests.r_emp_id_fk')
        ->where('item_requests.r_status','=','approved')
        ->where('item_requests.r_type_id_fk','=',2)
        ->get();
        return view('body.property.approved_per_requests',['test'=>$data]);
    }
    public function give_lim_Item(String $r_id, String $item_id){
        $item_data = equipment::where('item_id','=',$item_id)->first();
        $req_data = item_request::where('r_id','=',$r_id)->first();
        if($item_data->in_stock >= $req_data->r_amount){
            $item_data->in_stock = $item_data->in_stock - $req_data->r_amount;
            equipment::where('item_id','=',$item_id)->update([
                'in_stock' => $item_data->in_stock

            ]);
        $req_data = item_request::where('r_id','=',$r_id)->update([
            'out_of_store'=>'Received',
            'r_inStock'=>$item_data->in_stock
        ]);
            return redirect(route('approved_lim_requests'))->with('success', 'Item given successfully');  
        }
        else
        return redirect(route('approved_lim_requests'))->with('error', 'There is no enough amount in stock');
    }
    public function give_per_item(String $r_id, String $item_id){
        $item_data = equipment::where('item_id','=',$item_id)->first();
        $req_data = item_request::where('r_id','=',$r_id)->first();
        if($item_data->in_stock >= $req_data->r_amount){
            $item_data->in_stock = $item_data->in_stock - $req_data->r_amount;
            equipment::where('item_id','=',$item_id)->update([
                'in_stock' => $item_data->in_stock

            ]);
        $req_data = item_request::where('r_id','=',$r_id)->update([
            'out_of_store'=>'Received',
            'r_inStock'=>$item_data->in_stock
        ]);
            return redirect(route('approved_per_requests'))->with('success', 'Item given successfully');  
        }
        else
        return redirect(route('approved_per_requests'))->with('error', 'There is no enough amount in stock');
    }
    public function return_per_item(String $r_id, String $item_id){
        $item_data = equipment::where('item_id','=',$item_id)->first();
        $req_data = item_request::where('r_id','=',$r_id)->first();
            $item_data->in_stock = $item_data->in_stock + $req_data->r_amount;
            equipment::where('item_id','=',$item_id)->update([
                'in_stock' => $item_data->in_stock

            ]);
        $req_data = item_request::where('r_id','=',$r_id)->update([
            'out_of_store'=>'Returned',
            'r_inStock'=>$item_data->in_stock
        ]);
            return redirect(route('approved_per_requests'))->with('success', 'Item returned successfully');  
        
       
    }
}

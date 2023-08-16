<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:Permission access', ['only' => ['index','show']]);
        // $this->middleware('role_or_permission:Permission create', ['only' => ['create','store']]);
        // $this->middleware('role_or_permission:Permission edit', ['only' => ['edit','update']]);
        // $this->middleware('role_or_permission:Permission delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permission= Permission::latest()->get();
        return view('body.authorization.permission.index',['permissions'=>$permission]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

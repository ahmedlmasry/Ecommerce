<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $records = Role::where(function ($query) use ($request) {
            if ($request->search) {
                $query->where('name', 'like', '%' . $request->search . '%');
            }
        })->latest()->paginate(8);
        return view('roles.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $records = Role::all();
        return view('roles.create', compact('records'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions_list' => 'required|array'
        ]);
        $record = Role::create($request->all());
        $record->permissions()->attach($request->permissions_list);
        session()->flash('success', 'Role Created Successfully');
        return redirect()->route('roles.index');
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
        $model = Role::findOrfail($id);
        return view('roles.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id,
            'permissions_list' => 'required|array'
        ]);
        $record = Role::findOrfail($id);
        $record->update($request->all());
        $record->permissions()->sync($request->permissions_list);
        session()->flash('success', 'Role Edited Successfully');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Role::findorfail($id);
        $record->delete();
        session()->flash('error', 'Role Deleted Successfully');
        return back();
    }
}

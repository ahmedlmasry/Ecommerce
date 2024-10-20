<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $records = Client::where(function ($query) use ($request) {
            if ($request->search) {
                $query->where('name', 'like', '%' . $request->search . '%');
            }
        })->latest()->paginate(3);
        return view('clients.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Client::findorfail($id);
//        if ($record->image) {
//            // Delete the image from storage
//            Storage::disk('public')->delete($record->image);
//        }
        $record->delete();
        session()->flash('error','Client Deleted successfully!');
        return back();
    }
    public function activate($id)
    {
        $client = Client::findorfail($id);
            $client->status = '1';
            $client->save();
            session()->flash('success', 'Client activated successfully.');
            return redirect()->back();
    }
    public function deActivate($id)
    {
        $client = Client::find($id);
            $client->status = '0';
            $client->save();
            session()->flash('success', 'Client deactivated successfully.');
            return redirect()->back();
    }
}

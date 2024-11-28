<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\ClientInfo;
use App\Models\ClientData;

class ClientDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $user = Auth::user();
        if ($request->hasFile('documents')) {
            $documents = $request->file('documents');
        
            foreach ($documents as $document) {
                $clientData = new ClientData;
                $clientData->client_info_id = $request->client_info_id;
                $extension = strtolower($document->getClientOriginalExtension());
                $randomFileName = 'clientData' . date('Y_m_d_his') . '_' . rand(10000000, 99999999) . '.' . $extension;
                Storage::disk('public')->put('clientData/' . $randomFileName, File::get($document));
                $clientData->name = $randomFileName;
                $clientData->display_name = $randomFileName;
                $clientData->status = 1;
                $clientData->created_by = $user->id;
                $clientData->save();
            }
            
        }
        return redirect()->back()->with('success', 'New documents added successfully..!');
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

        $clientData = ClientData::find($id);

        if ($clientData) {
            // Check if the file exists in storage and delete it
            if ($clientData->name && Storage::disk('public')->exists('clientData/' . $clientData->name)) {
                Storage::disk('public')->delete('clientData/' . $clientData->name);
            }

            // Delete the record from the database
            $clientData->delete();

            return redirect()->back()->with('success', 'Client data deleted successfully and file removed from storage.');
        } else {
            return redirect()->back()->with('error', 'Client data not found.');
        }

    }

    public function rename(Request $request)
    {
        $client_Data_id = $request->client_Data_id;
        $clientData = ClientData::find($client_Data_id);
        $clientData->display_name = $request->display_name;
        $clientData->save();
        return redirect()->back();
    }

    public function note(Request $request)
    {
        $client_Data_id = $request->client_Data_id;
        $clientData = ClientData::find($client_Data_id);
        $clientData->note = $request->note;
        $clientData->save();
        return redirect()->back();
    }
}

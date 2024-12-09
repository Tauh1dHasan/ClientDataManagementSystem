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

class ClientInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('manage_client_info', $user)){
            
            menuSubmenu('manage_client_info', 'client_list');

            if(($request->name) && ($request->name != '')){
                $clientInfos = ClientInfo::withCount('clientData')
                                ->where('first_name', 'LIKE', '%'.$request->name.'%')
                                ->orWhere('last_name', 'LIKE', '%'.$request->name.'%')
                                ->orWhere('email', 'LIKE', '%'.$request->name.'%')
                                ->orWhere('mobile', 'LIKE', '%'.$request->name.'%')
                                ->orWhere('nid', 'LIKE', '%'.$request->name.'%')->latest()->paginate(20);
            }else{
                $clientInfos = ClientInfo::withCount('clientData')->latest()->paginate(20);
            }

            return view('backend.admin.clientInfo.index', compact('clientInfos'));

        }else{
            return abort(403, "You don't have permission.");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        menuSubmenu('manage_client_info', 'add_client');
        
        return view('backend.admin.clientInfo.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Validate the main form fields
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'mobile' => 'nullable|string|max:15',
            'date_of_birth' => 'nullable|date',
            'nid' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:255',
        ]);

        // Save client info
        $clientInfo = new ClientInfo();
        $clientInfo->first_name = $request->first_name;
        $clientInfo->last_name = $request->last_name;
        $clientInfo->email = $request->email;
        $clientInfo->mobile = $request->mobile;
        $clientInfo->birth_place = $request->birth_place;
        $clientInfo->date_of_birth = $request->date_of_birth;
        $clientInfo->nid = $request->nid;
        $clientInfo->address = $request->address;
        $clientInfo->notes = $request->notes;
        $clientInfo->status = 1;
        $clientInfo->created_by = $user->id;

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = 'clientImages_' . time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
            Storage::disk('public')->put('clientImages/' . $photoName, File::get($photo));
            $clientInfo->photo = $photoName;
        }

        $clientInfo->save();

        // Handle uploaded documents (stored temporarily during drag-and-drop)
        $tempDocumentPaths = $request->input('temp_documents', []); // Array of uploaded file paths

        foreach ($tempDocumentPaths as $tempPath) {
            $documentName = basename($tempPath);
            $newPath = 'clientData/' . $documentName;

            // Move file from temporary to permanent storage
            if (Storage::disk('public')->exists($tempPath)) {
                Storage::disk('public')->move($tempPath, $newPath);

                // Save document details in the database
                $clientData = new ClientData();
                $clientData->client_info_id = $clientInfo->id;
                $clientData->name = $documentName;
                $clientData->display_name = $documentName;
                $clientData->status = 1;
                $clientData->created_by = $user->id;
                $clientData->save();
            }
        }

        return redirect()->route('admin.clientInfo.index')->with('success', 'New Client Info added successfully!');
    }

    public function uploadTempDocument(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);
    
        $file = $request->file('file');
        $fileName = 'temp_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $tempPath = 'tempDocuments/' . $fileName;
    
        // Store the file temporarily
        Storage::disk('public')->put($tempPath, File::get($file));
    
        return response()->json([
            'path' => $tempPath, // Temporary file path
            'name' => $file->getClientOriginalName(),
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        menuSubmenu('manage_client_info', 'client_list');

        $clientInfo = ClientInfo::where('id', $id)->first();
        $clientDatas = ClientData::where('client_info_id', $id)->latest()->get();

        return view('backend.admin.clientInfo.show', compact('clientInfo', 'clientDatas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        menuSubmenu('manage_client_info', 'client_list');
        $clientInfo = ClientInfo::where('id', $id)->first();

        return view('backend.admin.clientInfo.edit', compact('clientInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();

        $clientInfo = ClientInfo::where('id', $id)->first();
        $clientInfo->first_name = $request->first_name;
        $clientInfo->last_name = $request->last_name;
        $clientInfo->email = $request->email;
        $clientInfo->mobile = $request->mobile;
        $clientInfo->birth_place = $request->birth_place;
        if ($request->date_of_birth != NULL) {
            $clientInfo->date_of_birth = $request->date_of_birth;
        }
        $clientInfo->nid = $request->nid;
        $clientInfo->address = $request->address;
        $clientInfo->notes = $request->notes;
        $clientInfo->status = 1;
        $clientInfo->updated_by = $user->id;
        // if client photo is attached
        if($request->photo){
            $cp = $request->file('photo');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = 'clientImages'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;
            Storage::disk('public')->put('clientImages/'.$randomFileName, File::get($cp));
            $clientInfo->photo = $randomFileName;
        }
        $clientInfo->save();

        return redirect()->back()->with('success', 'Client Info updated successfully..!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clientInfo = ClientInfo::find($id);
        $clientDatas = ClientData::where('client_info_id', $id)->get();
        if($clientDatas){
            foreach ($clientDatas as $clientData) {
                if ($clientData->name && Storage::disk('public')->exists('clientData/' . $clientData->name)) {
                    Storage::disk('public')->delete('clientData/' . $clientData->name);
                }
    
                // Delete the record from the database
                $clientData->delete();
            }
        }

        $clientInfo->delete();
        return redirect()->back()->with('success', 'Client Removed successfully and file removed from storage.');
    }
}

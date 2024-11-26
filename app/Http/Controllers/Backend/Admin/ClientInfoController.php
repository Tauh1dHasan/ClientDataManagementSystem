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
                $clientInfos = ClientInfo::where('name', 'LIKE', '%'.$request->name.'%')
                                ->orWhere('email', 'LIKE', '%'.$request->name.'%')
                                ->orWhere('mobile', 'LIKE', '%'.$request->name.'%')
                                ->orWhere('nid', 'LIKE', '%'.$request->name.'%')->latest()->paginate(20);
            }else{
                $clientInfos = ClientInfo::latest()->paginate(20);
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
        $request->validate([
            'name' => 'required',
        ]);

        $clientInfo = new ClientInfo;
        $clientInfo->name = $request->name;
        $clientInfo->email = $request->email;
        $clientInfo->mobile = $request->mobile;
        $clientInfo->nid = $request->nid;
        $clientInfo->address = $request->address;
        $clientInfo->notes = $request->notes;
        $clientInfo->status = 1;
        $clientInfo->created_by = $user->id;
        // if client photo is attached
        if($request->photo){
            $cp = $request->file('photo');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = 'clientImages'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;
            Storage::disk('public')->put('clientImages/'.$randomFileName, File::get($cp));
            $clientInfo->photo = $randomFileName;
        }
        $clientInfo->save();

        // if client documents are attached
        if ($request->hasFile('documents')) {
            $documents = $request->file('documents');
        
            foreach ($documents as $document) {
                $clientData = new ClientData;
                $clientData->client_info_id = $clientInfo->id;
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

        return redirect()->route('admin.clientInfo.index')->with('success', 'New Client Info addedd successfully..!');

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
        $clientInfo->name = $request->name;
        $clientInfo->email = $request->email;
        $clientInfo->mobile = $request->mobile;
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
        //
    }
}

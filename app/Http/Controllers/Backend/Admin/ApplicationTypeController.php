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
use App\Models\ApplicationType;
use App\Models\Application;

class ApplicationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if(Gate::allows('manage_application_type', $user)){

            $applicationTypes = ApplicationType::with('applications')->get();
            return view('backend.admin.applicationType.index', compact('applicationTypes'));

        }else{

            return abort(403, "You don't have permission.");

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('manage_application_type', $user)){

            $request->validate([
                'applicationTypeName' => 'required|string|max:255',
            ]);

            ApplicationType::create([
                'name' => $request->applicationTypeName,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ]);

            return redirect()->back()->with('success', 'Application Type created successfully.');

        }else{

            return abort(403, "You don't have permission.");

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function applicationStore(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('manage_application_type', $user)){

            $request->validate([
                'applicationTypeId' => 'required',
                'applicationName' => 'required',
            ]);

            Application::create([
                'application_type_id' => $request->applicationTypeId,
                'name' => $request->applicationName,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ]);

            return redirect()->back()->with('success', 'Application Name created successfully.');

        }else{

            return abort(403, "You don't have permission.");

        }
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

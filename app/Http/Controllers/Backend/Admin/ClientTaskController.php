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
use App\Models\ClientTask;
use App\Models\Application;

class ClientTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getApplications($typeId)
    {
        $applications = Application::where('application_type_id', $typeId)->get();
        return response()->json($applications);
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
        $request->validate([
            'client_info_id' => 'required|integer|exists:client_infos,id',
            'applicationTypeId' => 'required|integer|exists:application_types,id',
            'applicationId' => 'required|integer|exists:applications,id',
            'estimated_end_date' => 'required|date',
            'note' => 'nullable|string',
        ]);
    
        $task = new ClientTask();
        $task->client_info_id = $request->client_info_id;
        $task->application_id = $request->applicationId;
        $task->start_date = now()->toDateString(); // Or let user choose later if needed
        $task->estimated_end_date = $request->estimated_end_date;
        $task->note = $request->note;
        $task->status = 1;
        $task->created_by = Auth::id();
        $task->save();
    
        return redirect()->back()->with('success', 'Task added successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $task = ClientTask::findOrFail($id);

        // Toggle between 1 (In Progress) and 2 (Complete)
        $task->status = $task->status == 2 ? 1 : 2;
        $task->actual_end_date = now()->toDateString();
        $task->updated_by = auth()->id();
        $task->save();

        return redirect()->back()->with('success', 'Task status updated successfully.');
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

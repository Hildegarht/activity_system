<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityHistory;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User();
        $activity = new Activity([
            "task_name" => $request->task_name,
            "task_description" => $request->task_description,
            "user_id" => $request->task_assignee,
            "task_status" => $request->task_status
        ]);

        if ($activity->save()) {
            return redirect()->back()->with([
                "status" => "TASK_CREATE",
                "title" => "Success",
                "text" => "Activity added successfully!!",
                "users" => $users->all()
            ]);
        }

        return redirect()->back()->with([
            "status" => "TASK_CREATE",
            "title" => "Error",
            "text" => "Activity was not added successfully!!",
            "users" => $users->all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::find($id);

        return view("/task", [
            "activity" => $activity
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $from = $request->get("date_from");
        $to = $request->get("date_to");

        $activities = DB::table('activities')
            ->whereBetween('created_at', [$from, $to])
            ->get();

        return redirect()->back()->with([
            "status" => "TASK_SEARCH",
            "response" => $activities
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = new User();
        $activity = Activity::find($id);
        $history = new ActivityHistory();

        $history->prev_task_name = $activity->task_name;
        $history->task_name = $request->task_name;

        $history->prev_task_description = $activity->task_description;
        $history->task_description = $request->task_description;

        $history->prev_assigned_to = $activity->user_id;
        $history->assigned_to = $request->task_assignee;

        $history->prev_task_status = $activity->task_status;
        $history->task_status = $request->task_status;

        $activity->task_name = $request->task_name;
        $activity->task_description = $request->task_description;
        $activity->user_id = $request->task_assignee;
        $activity->task_status = $request->task_status;

        $history->user_id = Auth::id();
        $history->activity_id = $id;

        if ($activity->save() && $history->save()) {
            return redirect()->back()->with([
                "status" => "TASK_UPDATE",
                "title" => "Success",
                "text" => "Activity updated successfully!!",
                "users" => $users->all()
            ]);
        }

        return redirect()->back()->with([
            "status" => "TASK_UPDATE",
            "title" => "Error",
            "text" => "Activity was not updated successfully!!",
            "users" => $users->all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = new User();

        $activity = Activity::find($id);
        if ($activity->delete()) {
            return redirect()->route("dashboard");
        }

        return redirect()->back()->with([
            "status" => "TASK_DELETE",
            "title" => "Error",
            "text" => "Activity was not deleted successfully!!",
            "users" => $users->all()
        ]);
    }
}

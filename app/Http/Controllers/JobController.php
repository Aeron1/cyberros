<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jobs = Jobs::when($request->search, function($query, $search){
            return $query->where('title', 'LIKE','%'.$search.'%')->orwhere('type','LIKE','%'.$search.'%')->orwhere('company','LIKE','%'.$search.'%');
        })->get();
        $data = compact('jobs');
        return view('job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = new Jobs();
        $job->title = $request->title;
        $job->content = $request->content;
        $job->type = $request->type;
        $job->company = $request->company;
        $job->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Jobs::findOrFail($id);
        return view('job.edit', compact('job'));
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
        $job = Jobs::findOrFail($id);
        $job->title = $request->title;
        $job->content = $request->content;
        $job->type = $request->type;
        $job->company = $request->company;
        $job->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(!Gate::allows('isadmin')){
            abort(405,"Sorry You are Not Authorized to Perform this Action");
        }
        $job = Jobs::findOrFail($id);
        $job->delete();
        return redirect()->back();
    }
}

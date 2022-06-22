<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Project;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Auth;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');

        $this->middleware('permission:projects|addProject|viewProject|editProject|deleteProject', ['only' => ['index', 'show']]);
        $this->middleware('permission:addProject', ['only' => ['create', 'store']]);
        $this->middleware('permission:editProject', ['only' => ['edit', 'update']]);
        $this->middleware('permission:deleteProject', ['only' => ['destroy']]);
    }
   
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('updated_at', 'DESC')->get();
        return view('backend.projects.list', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::where('status', '1')->orderBy('updated_at', 'DESC')->get();
        return view('backend.projects.add', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description'      => 'required',
            'duration'   => 'required',
            'proj_url'   => 'required',
            'proj_skill_id'   => 'required',
        ]);

        if ($validator->fails())
        {
             return view('backend.projects.list')->with('status', $validator->errors()->first());
        }
        else
        {
            $newProject = New Project();
            $newProject->title = $request->title;
            $newProject->description = $request->description;
            $newProject->slug = Str::slug($request->title);
            $newProject->duration = $request->duration;
            $newProject->proj_url = $request->proj_url;
            $newProject->proj_skill_id = implode(',', $request->proj_skill_id);
            $newProject->client_reference = $request->client_reference;
            $newProject->status = $request->status;
            $newProject->created_by = Auth::user()->id;
         
            if($newProject -> save())
            {
                return redirect()->route('projects')->with('success','Project has been created successfully.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $project = Project::where('slug', '=', $slug)->firstOrFail();
        $reviews = Review::where('projid', '=', $project->id)->paginate('4');
        return view('backend.projects.view', compact('project', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $reviews = Review::where('projid', '=', $id)->paginate('4');
        $tags = Tag::where('status', '1')->orderBy('updated_at', 'DESC')->get();
        return view('backend.projects.edit', compact('project', 'tags', 'reviews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'proj_url' => 'required',
            'proj_skill_id' => 'required'
        ]);

        $project = Project::find($id);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->slug = Str::slug($request->title);
        $project->duration = $request->duration;
        $project->proj_url = $request->proj_url;
        $project->proj_skill_id = implode(',', $request->proj_skill_id);
        $project->client_reference = $request->client_reference;
        $project->status = $request->status;
        $project->updated_by = Auth::user()->id;
   
        if($project -> save())
        {
            return redirect()->route('projects')->with('success', 'Project has been updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projects = Project::find($id);
        if($projects -> delete()){
            return back();
        }
    }

    

}

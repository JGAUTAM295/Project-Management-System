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

class TagController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('permission:tags|addTag|viewTag|editTag|deleteTag', ['only' => ['index', 'show']]);
        $this->middleware('permission:addTag', ['only' => ['create', 'store']]);
        $this->middleware('permission:editTag', ['only' => ['edit', 'update']]);
        $this->middleware('permission:deleteTag', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('updated_at', 'DESC')->get();
        return view('backend.projects.tags.list', compact('tags'));
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
        $validator = Validator::make($request->all(), [
            'title'  => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails())
        {
            return response() -> json(['status' => 401, 'data' => $validator->errors()->first()]);
        }
        else
        {
            $newTag = New Tag();
            $newTag->title = $request->title;
            $newTag->slug = Str::slug($request->title);
            $newTag->status = $request->status;
            $newTag->created_by = Auth::user()->id;
            
            if($newTag->save())
            {
                return response() -> json(['status' => 200, 'data' => 'Tag Submitted Successfully!']);
                //return redirect()->route('tags')->with('success','Tag has been created successfully.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $tag = Tag::find($request->id);
        if(!empty($tag))
        {
            if($tag->status == 'Active') { $st = '1'; }
            if($tag->status == 'Deactive') { $st = '2'; }

            $data = array(
                'id'     => $tag->id,
                'title'  => $tag->title,
                'status' => $st,
            );
            return response() -> json(['status' => 200, 'data' => $data]);
        }
        else
        {
            return response() -> json(['status' => 401, 'data' => []]); 
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'title' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails())
        {
            return response() -> json(['status' => 401, 'data' => $validator->errors()->first()]);
        }
        else
         {
            $tag = Tag::find($request->id);
            $tag->title = $request->title;
            $tag->slug = Str::slug($request->title);
            $tag->status = $request->status;
            $tag->updated_by = Auth::user()->id;
             
            if($tag->save())
            {
                return response() -> json(['status' => 200, 'data' => 'Tag has been updated successfully!']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        if($tag -> delete()){
            return back();
        }
    }
}

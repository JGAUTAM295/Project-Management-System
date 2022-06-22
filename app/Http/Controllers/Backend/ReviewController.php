<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Review;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Auth;

class ReviewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('permission:review-list|review-create|review-edit|review-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:review-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:review-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:review-delete', ['only' => ['destroy']]);
    }

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
        $validator = Validator::make($request->all(), [
            'message' => 'required',
            'projid'  => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->with('status', $validator->errors()->first());
        }
        else
        {
            
            $project = Project::find($request->projid);

            if($project)
            {
                $newReview = New Review();
                $newReview->userid = Auth::user()->id;
                $newReview->projid = $request->projid;
                $newReview->review = $request->message;
                $newReview->status = $request->status ?? '1';
                 
                if($newReview->save())
                {
                    return response() -> json(['status' => 200, 'data' => 'Review Submitted Successfully!']);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}

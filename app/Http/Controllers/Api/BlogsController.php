<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Repository\Blog\BlogRepositoryInterface;
use App\Service\Blog\BlogService;
use App\Service\Blog\BlogServiceInterface;
use Exception;

class BlogsController extends Controller
{

    private $blogRepo, $blogService;
    public function __construct(BlogServiceInterface $blogService, BlogRepositoryInterface $blogRepo)
    {
        $this->blogService = $blogService;
        $this->blogRepo = $blogRepo;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try
        {
            $data = Blog::all();
            return response()->json([
                'status' => 'success',
                'message' => 'Blog List All',
                'data' => $data
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => $data
            ], 500);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        try{
            $data = $this->blogService->store($request->validated());

            return response()->json([
                'status' => 'success',
                'message' => 'Blog Created Success',
                'data' => $data,
            ], 200);

        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => $data,
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $result = $this->blogRepo->show($id);
            return response()->json([
                'status' => 'success',
                'message' => 'Blog Show Success',
                'data' => $result
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => $result,
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        try{
            $data = $this->blogService->update($id, $request->validated());

            return response()->json([
                'status' => 'success',
                'message' => 'Blog Edited Success',
                'data' => $data
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => $data,
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data = Blog::where('id', $id)->first();
            $data->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Blog Delete Success',
                'data' => $data
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => $data,
            ], 500);
        }
    }
}

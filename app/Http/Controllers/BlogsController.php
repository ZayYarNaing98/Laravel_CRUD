<?php

namespace App\Http\Controllers;


use App\Models\Blog;
use App\Models\Author;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Repository\Blog\BlogRepositoryInterface;
use App\Service\Blog\BlogServiceInterface;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $blogRepo,$blogService;

    public function __construct( BlogRepositoryInterface $blogRepo, BlogServiceInterface $blogService )
    {
        $this->blogRepo = $blogRepo;
        $this->blogService = $blogService;
        $this->middleware('permission:blogList', ['only' => ['index']]);
        $this->middleware('permission:blogCreate', ['only' => ['create', 'store']]);
        $this->middleware('permission:blogEdit', ['only' => ['edit']]);
        $this->middleware('permission:blogDelete', ['only' => ['destroy']]);
        $this->middleware('permission:blogShow', ['only' => ['show']]);
        $this->middleware('auth');
    }

    public function index()
    {
        $data = $this->blogRepo->get();
        return view('backend.blog.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Author::all();
        return view('backend.blog.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        // $data = $request->validated();
        // if($request->hasFile('image'))
        // {
        //  $imageName = time().'.'.$request->image->extension();
        //  $request->image->move(public_path('blog_image'), $imageName);
        //  $data = array_merge($data,['image' => $imageName]);
        // }

        // Blog::create($data);

        $data = $request->validated();
        $this->blogService->store($data);

        return redirect()->route('blog.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->blogRepo->show($id);
        return view('backend.blog.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Blog::where('id',$id)->first();
        // dd($result);
        return view('backend.blog.edit',compact('result'));

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

        $data = Blog::where('id', $id)->first();

        $data->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('blog.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Blog::where('id', $id)->first();
        $data->delete();
        return redirect()->route('blog.index');
    }
}

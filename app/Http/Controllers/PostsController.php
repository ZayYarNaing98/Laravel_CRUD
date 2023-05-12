<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Repository\Post\PostRepositoryInterface;
use App\Service\Post\PostServiceInterface;

class PostsController extends Controller
{
    private $postRepo, $postService;

    public function __construct( PostRepositoryInterface $postRepo, PostServiceInterface $postService )
    {
        $this->postRepo = $postRepo;
        $this->postService = $postService;
    }

    public function index()
    {
        // $data = Post::all();
        // return view('backend.post.index', compact('data'));

        $data = $this->postRepo->get();

        return view('backend.post.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        if($request->hasFile('image'))
        {
         $imageName = time().'.'.$request->image->extension();
         $request->image->storeAs('public/post_image/', $imageName);
         $data = array_merge($data,['image' => $imageName]);
        }

        if ($request->has('is_active')) {
            $data['is_active'] = true;
        } else {
            $data['is_active'] = false;
        }
        Post::create($data);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $result = post::where('id', $id)->first();
        // return view('backend.post.show', compact('result'));

        $result = $this->postRepo->show($id);

        return view('backend.post.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Post::where('id', $id)->first();

        return view('backend.post.edit', compact('result'));
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
        $data = Post::where('id', $id)->first();

        $data->update([
            'title' => $request->title,
            'description' => $request->description,
            // 'image' => $request->image,
            'is_active' => $request->has('is_active') ? 1:0,
        ]);

        // $data = Post::where('id', $id)->first();

        // return $data = update($id, $request->validate());

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::where('id', $id)->first();
        $data->delete();
        return redirect()->route('post.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('blog.index')
        ->with('posts', Post::orderBy('updated_at', 'DESC')->paginate(12));
    }


    public function manage()
    {
      

        return view('manage.index')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->paginate(5));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::orderBy('updated_at', 'DESC')->get();

        return view('blog.create', [

            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'category_id' => 'required|array|min:1',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $post = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->slug),
            'category_id' => implode(',', $request->input('category_id')),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        $post->categories()->attach($request->input('category_id'));


        return redirect('/manage')
            ->with('message', 'Your post has been added!');
    }


    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::with('categories', 'user')->where('slug', $slug)->firstOrFail();

        return view('blog.show', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $categories = Category::orderBy('updated_at', 'DESC')->get();

        return view('blog.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'category_id' => 'required|array|min:1',
            'image' => 'required'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $post->image_path = $newImageName;
        } else {
            $newImageName = $request->input('image');
        }

        // Update post
        $post->title = $request->input('title');
        $post->image_path = $newImageName;
        $post->description = $request->input('description');
        $post->slug = SlugService::createSlug(Post::class, 'slug', $request->slug);
        $post->category_id = implode(',', $request->input('category_id'));
        $post->user_id = auth()->user()->id;
        $post->save();

        // Update post categories
        $post->categories()->detach();
        $post->categories()->attach($request->input('category_id'));

        return redirect('/manage')
            ->with('message', 'Your post has been updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/manage')
            ->with('message', 'Your post has been deleted!');
    }
}

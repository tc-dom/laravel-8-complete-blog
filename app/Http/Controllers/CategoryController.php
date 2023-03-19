<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all categories with their related posts count
        $categories = Category::withCount('posts')->orderBy('updated_at', 'DESC')->paginate(20);

        // Pass the categories to the view
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'name' => 'required',
        ]);

        Category::create([
            'name' => $request->input('name'),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/category')
            ->with('message', 'Your post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {

    
        $category = Category::where('name', $name)->firstOrFail();
        $posts = $category->posts()->paginate(12); 
        return view('category.show', compact('category', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)

        {

            $request->validate([
                'name' => 'required',
    
            ]);
    
            Category::where('id', $category)
                ->update([
                    'name' => $request->input('name'),
                      'user_id' => auth()->user()->id
                ]);
    
            return redirect('/category')
                ->with('message', 'Your Category has been updated!');
        }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}

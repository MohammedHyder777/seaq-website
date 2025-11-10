<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('order_at_home')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'body' => 'nullable|string',
            'body_en' => 'nullable|string',
            'is_shown' => 'boolean',
            'order_at_home' => 'integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        // The checkbox is not delivered proberly without this
        $data['is_shown'] = $request->boolean('is_shown');
        
        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'أنشئ المنشور بحمد الله.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'body' => 'nullable|string',
            'body_en' => 'nullable|string',
            'is_shown' => 'boolean',
            'order_at_home' => 'integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/posts', 'public');
        } elseif ($request->filled("remove_image")) { // If the post has an image already and the (removImage) button clicked
            Storage::disk('public')->delete($post->image);
            $post->update(['image' => null]);
        } 

        // The checkbox is not delivered proberly without this
        $data['is_shown'] = $request->boolean('is_shown');

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'عُدِّل المنشور بحمد الله.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'حُذف المنشور.');
    }

    public function destroyImage(string $id)
    {
        $post = Post::find($id);
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
            $post->update(['image' => null]);
        }
        
        if($post->image){
            return response()->json(['success' => false, 'message' => 'لم ينجح الحذف']);
        }
        else {
            return response()->json(['success' => true]);
        }
        // return redirect()->back()->withInput()->with('success', 'حُذِفت الصورة.');
    }
}

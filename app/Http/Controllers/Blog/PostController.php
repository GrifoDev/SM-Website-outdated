<?php

namespace App\Http\Controllers\Blog;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Number of item on one page.
     *
     * @var int
     */
    private $per_page = 5;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'user')->paginate($this->per_page);

        return view('blog.posts.index', compact('posts'));
    }

    /**
     * Get post from a category.
     *
     * @param  string  $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::with('category', 'user')->where('category_id', $category->id)->paginate($this->per_page);

        return view('blog.posts.index', compact('posts', 'category'));
    }

    /**
     * Get post from a user.
     *
     * @param  integer  $user_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function user($user_id)
    {
        $user = User::find($user_id);
        $posts = Post::with('category', 'user')->where('user_id', $user->id)->paginate($this->per_page);

        return view('blog.posts.index', compact('posts', 'user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('blog.posts.show', compact('post', 'comment'));
    }
}

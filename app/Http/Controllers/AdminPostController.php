<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        Post::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')],
            (request()->is_published ? ['published_at' => now()] : []),
        ));

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        // get the name,
        // perform a database query to find the user id with that name
        // then worry about what if there is no user with that name in the database.

        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        if (is_null($post->published_at) && isset($attributes['is_published']) && $attributes['is_published'] == 1) {
            $attributes['published_at'] = now();
        }

        // When firstOrFail() fails, it throws a ModelNotFoundException.
        // That leads to a 404 page, but we want something like a validation error to provide users feedback.
        try {
            $newAuthor = User::where('username', request()->author)->firstOrFail();
            $attributes['user_id'] = $newAuthor->id;
        } catch (\Throwable $e) {
            // Session works, but should look into matching validation errors
            return back()->with('author username error', 'Author must be a registered username');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'is_published' => !$post->is_published ? 'required' : '',
        ]);
    }
}

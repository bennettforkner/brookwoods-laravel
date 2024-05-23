<?php

declare(strict_types=1);

namespace App\Http\Controllers\Pages\Blog;

use App\Models\Post;
use Illuminate\Http\Request;

final class ShowController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Post $post)
    {
        return view('pages.blog.show', [
            'post' => $post,
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Post;

class HomeController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {

        return view('pages.home', [
            'message' => 'I do stuff with PHP and APIs!',
            'posts' => Post::query()
                ->latest()
                ->limit(6)
                ->get(),
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
// use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(Post $post, UpdateRequest $request){
        // Logic for updating the post
        $data = $request->validated();
        $post = $this->service->update($data, $post);        
        return redirect()->route('admin.posts.show', compact('post'))->with('success', 'Post updated successfully.');
    }
}

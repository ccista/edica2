<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;

class DeleteController extends Controller
{
    public function __invoke(Tag $tag){
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('success', 'Тег успешно удален.');
    }
}

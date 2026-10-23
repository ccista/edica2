<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends Controller
{
    public function __invoke(Category $category, UpdateRequest $request){
        // Logic for updating the category
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('admin.categories.show', compact('category'))->with('success', 'Category updated successfully.');
    }
}

<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostService
{
    
public function store($data)
{
    if (isset($data['preview_image'])) {
        $data['preview_image'] = Storage::disk('public')->put(
            'images',
            $data['preview_image']
        );
    }

    if (isset($data['main_image'])) {
        $data['main_image'] = Storage::disk('public')->put(
            'images',
            $data['main_image']
        );
    }

    // Получаем теги
    $tagIds = $data['tag_ids'] ?? [];
    unset($data['tag_ids']);

    try {
        DB::beginTransaction();

        $post = Post::create($data);

        // Присоединяем теги
        if (!empty($tagIds)) {
            $post->tags()->attach($tagIds);
        }

        // Сначала сохраняем транзакцию
        DB::commit();

        // Затем возвращаем ответ
        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post created successfully.');

    } catch (\Throwable $e) {
        DB::rollBack();

        report($e);

        return redirect()
            ->back()
            ->with('error', 'Не удалось создать запись.');
    }
}


   public function update($data, Post $post)
{
    try {
        DB::beginTransaction();
        // Preview image
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put(
                'images',
                $data['preview_image']
            );
        }

        // Main image
        if (isset($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put(
                'images',
                $data['main_image']
            );
        }

        // Теги
        $tagIds = $data['tag_ids'] ?? [];
        unset($data['tag_ids']);

        $post->update($data);
        $post->tags()->sync($tagIds);        
        DB::commit();
        return $post;
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()
            ->back()
            ->with('error', 'Не удалось обновить запись.');
    }
}
}

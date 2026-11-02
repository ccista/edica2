<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;

use App\Http\Controllers\Admin\Main\IndexController as AdminIndexController;

use App\Http\Controllers\Admin\Category\IndexController as AdminCategoryIndexController;
use App\Http\Controllers\Admin\Category\CreateController as AdminCategoryCreateController;
use App\Http\Controllers\Admin\Category\StoreController as AdminCategoryStoreController;
use App\Http\Controllers\Admin\Category\ShowController as AdminCategoryShowController;
use App\Http\Controllers\Admin\Category\EditController as AdminCategoryEditController;
use App\Http\Controllers\Admin\Category\UpdateController as AdminCategoryUpdateController;
use App\Http\Controllers\Admin\Category\DeleteController as AdminCategoryDeleteController;

use App\Http\Controllers\Admin\Tag\IndexController as AdminTagIndexController;
use App\Http\Controllers\Admin\Tag\CreateController as AdminTagCreateController;
use App\Http\Controllers\Admin\Tag\StoreController as AdminTagStoreController;
use App\Http\Controllers\Admin\Tag\ShowController as AdminTagShowController;
use App\Http\Controllers\Admin\Tag\EditController as AdminTagEditController;
use App\Http\Controllers\Admin\Tag\UpdateController as AdminTagUpdateController;
use App\Http\Controllers\Admin\Tag\DeleteController as AdminTagDeleteController;

use App\Http\Controllers\Admin\Post\IndexController as AdminPostIndexController;
use App\Http\Controllers\Admin\Post\CreateController as AdminPostCreateController;
use App\Http\Controllers\Admin\Post\StoreController as AdminPostStoreController;
use App\Http\Controllers\Admin\Post\ShowController as AdminPostShowController;
use App\Http\Controllers\Admin\Post\EditController as AdminPostEditController;
use App\Http\Controllers\Admin\Post\UpdateController as AdminPostUpdateController;
use App\Http\Controllers\Admin\Post\DeleteController as AdminPostDeleteController;

use App\Http\Controllers\Admin\User\IndexController as AdminUserIndexController;
use App\Http\Controllers\Admin\User\CreateController as AdminUserCreateController;
use App\Http\Controllers\Admin\User\StoreController as AdminUserStoreController;
use App\Http\Controllers\Admin\User\ShowController as AdminUserShowController;
use App\Http\Controllers\Admin\User\EditController as AdminUserEditController;
use App\Http\Controllers\Admin\User\UpdateController as AdminUserUpdateController;
use App\Http\Controllers\Admin\User\DeleteController as AdminUserDeleteController;

use App\Http\Controllers\Personal\Main\IndexController as PersonalIndexController;
use App\Http\Controllers\Personal\Liked\IndexController as PersonalLikedIndexController;
use App\Http\Controllers\Personal\Comment\IndexController as PersonalCommentIndexController;

// Личный кабинет
Route::prefix('personal')
    ->name('personal.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', PersonalIndexController::class)->name('index');

        Route::prefix('liked')
            ->name('liked.')
            ->group(function () {
                Route::get('/', PersonalLikedIndexController::class)->name('index');
            });
        
            Route::prefix('comment')
            ->name('comment.')
            ->group(function () {
                Route::get('/', PersonalCommentIndexController::class)->name('index');
            });
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Публичные маршруты
Route::name('main.')->group(function () {
    Route::get('/', IndexController::class)->name('index');
});



Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth', 'admin')
    ->group(function () {
        
    Route::get('/', AdminIndexController::class)->name('index');

    // Категории
    Route::prefix('categories')
            ->name('categories.')
            ->group(function () {
                Route::get('/', AdminCategoryIndexController::class)->name('index');

                Route::get('/create', AdminCategoryCreateController::class)
                    ->name('create');

                Route::post('/', AdminCategoryStoreController::class)
                     ->name('store');
                
                Route::get('/{category}', AdminCategoryShowController::class)
                     ->name('show');
                /* 
                    можно и так, то есть без разницы с верхними
                    но это если контролеер обычный, а не одноконтроллерный, то есть с методом __invoke
                */
                Route::get('/{category}/edit', [AdminCategoryEditController::class, '__invoke']) 
                     ->name('edit');

                Route::put('/{category}', [AdminCategoryUpdateController::class, '__invoke'])
                     ->name('update');

                Route::delete('/{category}', [AdminCategoryDeleteController::class, '__invoke'])
                    ->name('delete');
            });
    // End Категории
    /****** Теги *******/        
            Route::prefix('tags')
                ->name('tags.')
                ->group(function () {
                    Route::get('/', AdminTagIndexController::class)->name('index');

                    Route::get('/create', AdminTagCreateController::class)
                        ->name('create');

                    Route::post('/', AdminTagStoreController::class)
                        ->name('store');
                    
                    Route::get('/{tag}', AdminTagShowController::class)
                        ->name('show');
                    /* 
                        можно и так, то есть без разницы с верхними
                        но это если контролеер обычный, а не одноконтроллерный, то есть с методом __invoke
                    */
                    Route::get('/{tag}/edit', [AdminTagEditController::class, '__invoke']) 
                        ->name('edit');

                    Route::put('/{tag}', [AdminTagUpdateController::class, '__invoke'])
                        ->name('update');

                    Route::delete('/{tag}', [AdminTagDeleteController::class, '__invoke'])
                        ->name('delete');
                });
    /****** End Теги *******/
    /****** Posts *******/        
        Route::prefix('posts')
            ->name('posts.')
            ->group(function () {
                Route::get('/', AdminPostIndexController::class)->name('index');

                Route::get('/create', AdminPostCreateController::class)
                    ->name('create');

                Route::post('/', AdminPostStoreController::class)
                     ->name('store');
                
                Route::get('/{post}', AdminPostShowController::class)
                     ->name('show');
                /* 
                    можно и так, то есть без разницы с верхними
                    но это если контролеер обычный, а не одноконтроллерный, то есть с методом __invoke
                */
                Route::get('/{post}/edit', [AdminPostEditController::class, '__invoke']) 
                     ->name('edit');

                Route::put('/{post}', [AdminPostUpdateController::class, '__invoke'])
                     ->name('update');

                Route::delete('/{post}', [AdminPostDeleteController::class, '__invoke'])
                    ->name('delete');
            });
        /****** End Posts *******/
        
        /****** Пользователи *******/        
        Route::prefix('users')
            ->name('users.')
            ->group(function () {
                Route::get('/', AdminUserIndexController::class)->name('index');

                Route::get('/create', AdminUserCreateController::class)
                    ->name('create');

                Route::post('/', AdminUserStoreController::class)
                     ->name('store');
                
                Route::get('/{user}', AdminUserShowController::class)
                     ->name('show');
                /* 
                    можно и так, то есть без разницы с верхними
                    но это если контролеер обычный, а не одноконтроллерный, то есть с методом __invoke
                */
                Route::get('/{user}/edit', [AdminUserEditController::class, '__invoke']) 
                     ->name('edit');

                Route::put('/{user}', [AdminUserUpdateController::class, '__invoke'])
                     ->name('update');

                Route::delete('/{user}', [AdminUserDeleteController::class, '__invoke'])
                    ->name('delete');
            });
            /****** End Пользователи *******/
});


<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UpdateController extends Controller
{
    public function __invoke(User $user, UpdateRequest $request)
{
    try {
            $data = $request->validated();
            $user->update($data);
            return redirect()
                ->route('admin.users.show', compact('user'))
                ->with('success', 'User updated successfully.');

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with('error', 'Ошибка при обновлении пользователя: ' . $e->getMessage());
        }
    }
}
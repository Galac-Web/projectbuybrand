<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('dashboard.users.index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        $form = \App\Services\Form::method('POST')
            ->text('first_name', __('First Name'), __('First Name'));

        return view('dashboard.users.create', [
            'form' => $form->render(),
        ]);
    }

    public function store(Request $request)
    {

    }

    public function edit(User $user)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', trans('messages.crud.delete', ['how' => trans('User')]));
    }
}

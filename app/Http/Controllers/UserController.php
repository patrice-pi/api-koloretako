<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Listing of the users in admin.
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function getUsers()
    {
        $users = User::all();
        return view('admin.listing.users', ['users' => $users]);
    }

    /**
     * Detail of the user in admin.
     *
     * @param User $user
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function getOneUser(User $user)
    {
        return view('admin.detail.user', ['user' => $user]);
    }

    /**
     * Send the user to his profil
     *
     * @param Request $request
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function getUser(Request $request)
    {
        return view('profil', ['user' => $request->user()]);
    }

    /**
     * Update the current user.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUser(Request $request)
    {
        $user = $request->user();
        $validator = $user->validator($request->all());

        if ($validator->fails()) {
            return redirect()->route('user')
                ->withErrors($validator)
                ->withInput();
        }

        $user->firstname = $request->name;

        // If the password exist hash, or ignore.
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $request->session()->flash('success', 'Vos modifications ont bien été prises en compte.');

        return redirect()->route('user');
    }

    /**
     * Update the user in admin.
     *
     * @param Request $request
     * @param User    $user
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function adminUpdateUser(Request $request, User $user)
    {
        $validator = $user->validator($request->all());

        if ($validator->fails()) {
            return redirect('user')
                ->withErrors($validator)
                ->withInput();
        }

        $user->firstname = $request->name;

        if ($request->admin) {
            $user->admin = true;
        } else {
            $user->admin = false;
        }

        // If the password exist hash, or ignore.
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $request->session()->flash('success', 'Vos modifications ont bien été prises en compte.');

        return redirect()->route('admin_user', ['user' => $user]);
    }

    /**
     * Delete user
     *
     * @param Request $request
     * @param User    $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyUser(Request $request, User $user)
    {
        if ($request->user()->id === $user->id) {
            $request->session()->flash('error', 'Vous ne pouvez pas supprimer votre compte.');
            return back();
        }

        $request->session()->flash('success', sprintf('L\'utilisateur %s %s a bien été supprimé', $user->firstname, $user->lastname));

        User::destroy($user->id);

        return back();
    }

    public function create()
    {
        return view('admin.create.user');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'admin' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin_user_create')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->fill($request->all());

        if ($request->admin) {
            $user->admin = true;
        } else {
            $user->admin = false;
        }

        $user->password = Hash::make($request->password);

        $user->save();

        $request->session()->flash('success', sprintf('L\'utilisateur %s %s a bien été créé', $user->firstname, $user->lastname));

        return redirect()->route('admin_user', ['user' => $user]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends Controller
{
    public function profile() {

        $loans = Loan::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
        return view('profile', compact('loans'));
    }

    public function index() 
    {
        $userList = User::where('role_id', 2)->where('status', 'active')->get();
        return view('user', compact('userList'));
    }

    public function registeredUser() 
    {
        $registeredUsers = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('registered-user', compact('registeredUsers'));
    }

    public function show($slug)
    {
        $userDetail = User::where('slug', $slug)->first();
        $loans = Loan::with(['user', 'book'])->where('user_id', $userDetail->id)->get();
        return view('user-detail', compact('userDetail', 'loans'));
    }

    public function approve($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('user-detail/'.$slug)->with('status', 'User Approved Successfully');
    }

    public function delete($slug): RedirectResponse
    {
        $users = User::where('slug', $slug)->firstOrFail();
        $users->delete();

        return redirect('users')->with('danger-status', 'users Deleted Successfully');
    }

    public function trashedUsers(): View
    {
        $deletedUsers = User::onlyTrashed()->get();

        return view('user-banned-list', compact('deletedUsers'));
    }

    public function restoreUser(string $slug): RedirectResponse
    {
        $users = User::withTrashed()->where('slug', $slug)->firstOrFail();
        $users->restore();

        return redirect('users')->with('success-status', 'Users Restored Successfully');
    }
}

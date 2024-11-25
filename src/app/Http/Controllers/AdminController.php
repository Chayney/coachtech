<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;
use App\Models\Comment;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            return view('admin.index');
        } else {
            return view('index');
        }
    }

    public function edit()
    {
        $users = User::with('userProfile', 'roles')->paginate(5);
        $roles = Role::all();
        
        return view('admin.user', compact('users', 'roles'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $role = $request->input('role');
        $users = User::with('userProfile', 'roles')
               ->when($keyword || $role, function ($query) use ($keyword, $role) {
                    if ($keyword && $role) {
                        return $query->keywordSearch($keyword)->roleSearch($role);
                    } elseif ($keyword) {
                        return $query->keywordSearch($keyword);
                    } elseif ($role) {
                        return $query->roleSearch($role);
                    }                     
               })->paginate(5);
        $roles = Role::all();

        return view('admin.user', compact('keyword', 'role', 'users', 'roles'));
    }

    public function destroy(Request $request)
    {
        User::find($request->id)->delete();

        return redirect()->back();
    }

    public function show()
    {
        $comments = Comment::with('commentProfile')->paginate(5);
        
        return view('admin.comment', compact('comments'));
    }

    public function look(Request $request)
    {
        $comments = Comment::with('commentProfile')
                  ->FreewordSearch($request->freeword)->paginate(5);

        return view('admin.comment', compact('comments'));
    }

    public function remove(Request $request)
    {
        Comment::find($request->id)->delete();

        return redirect()->back();
    }

    public function mail()
    {
        return view('admin.mail');
    }
}

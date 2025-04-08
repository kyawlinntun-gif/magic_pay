<?php

namespace App\Http\Controllers\Backend;

use App\AdminUser;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminUserController extends Controller
{
    /**
     * Go the admin main page
     *
     * @return View
     */
    public function index(): View
    {
        return view('backend.admin_user.index');
    }

    /**
     * Get server-side data for DataTables.
     *
     * @return JsonResponse
     */
    public function ssd(): JsonResponse
    {
        $data = AdminUser::query();
        return DataTables::of($data)->make(true);
    }
    
    /**
     * Go to the create admin user page
     *
     * @return View
     */
    public function create(): View
    {
        return view('backend.admin_user.create');
    }

    /**
     * Store the new admin user to the database.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $adminUser = new AdminUser();
        $adminUser->name = $request->name;
        $adminUser->email = $request->email;
        $adminUser->phone = $request->phone;
        $adminUser->password = Hash::make($request->password);
        $adminUser->save();

        return redirect()->route('admin-user.index')->with('create', 'Created successfully!');
    }
}

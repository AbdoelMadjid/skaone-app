<?php

namespace App\Http\Controllers\ManajemenPengguna;

use App\DataTables\ManajemenPengguna\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenPengguna\UserRequest;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $userDataTable)
    {
        $users = User::all();
        $roles = Role::all();
        return $userDataTable->render('pages.manajemenpengguna.user', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.manajemenpengguna.user-form', [
            'data' => new User(),
            'action' => route('manajemenpengguna.users.store'),
            'roles' => Role::get()->pluck('name', 'name')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request, User $user)
    {
        $user->fill($request->only(['email', 'name', 'personal_id', 'nis'])); // Tambahkan personal_id dan nis
        $user->password = bcrypt($request->password);

        $user->markEmailAsVerified();
        $user->save();
        $user->assignRole($request->roles);

        return responseSuccess(true);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.manajemenpengguna.user-form', [
            'data' => $user,
            'action' => route('manajemenpengguna.users.update', $user->id),
            'roles' => Role::get()->pluck('name', 'name')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->only(['email', 'name', 'personal_id', 'nis'])); // Tambahkan personal_id dan nis
        if ($request->password) {
            $user->password = bcrypt($request->password); // Hanya memperbarui password jika diberikan
        }

        $user->save();
        $user->syncRoles($request->roles);

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Remove the user's roles
        $user->syncRoles([]); // Detach all roles

        // Delete the user
        $user->delete();

        return responseSuccessDelete();
    }

    public function addRole(Request $request, User $user)
    {
        $roleId = $request->input('role_id');

        // Fetch the role by ID
        $role = \Spatie\Permission\Models\Role::find($roleId);

        if ($role) {
            // Assign the selected role to the user
            $user->assignRole($role->name);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }


    // Logika untuk melakukan switch akun
    public function switchAccount(Request $request)
    {
        // Cari user berdasarkan ID yang dikirim dari AJAX
        $user = User::find($request->user_id);

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'User not found.'], 404);
        }

        // Cek apakah user target memiliki lebih dari 1 role
        /* if ($user->roles->count() >= 1) {
            return response()->json(['status' => 'error', 'message' => 'User ini tidak memiliki lebih dari 1 role.']);
        } */

        // Simpan user yang sekarang di session untuk nanti bisa kembali
        session(['original_user' => auth()->id()]);

        // Lakukan switch akun
        auth()->login($user);

        return response()->json(['status' => 'success', 'message' => 'Anda sekarang login sebagai ' . $user->name]);
    }

    // Kembalikan ke akun asal
    public function returnToOriginalAccount()
    {
        $originalUserId = session('original_user');

        // Kembalikan ke akun asal
        if ($originalUserId) {
            $originalUser = User::findOrFail($originalUserId);
            auth()->login($originalUser);

            session()->forget('original_user');

            return redirect()->route('manajemenpengguna.users.index')->with('info', 'Anda sudah kembali ke akun asli.')->with('notify_via', 'toast');
        }

        return redirect()->route('dashboard')->with('error', 'Tidak ada akun asal ditemukan.');
    }


    public function directResetPassword($id)
    {
        $user = User::findOrFail($id);

        // Tetapkan password baru
        $newPassword = 'Siliwangi30'; // Sesuaikan sesuai kebutuhan
        $user->password = bcrypt($newPassword);
        $user->save();

        // Mengembalikan pesan sukses dalam format JSON
        return response()->json([
            'message' => "Password berhasil direset untuk pengguna {$user->name}."
        ]);
    }


    public function hapusRoleMassalAjax(Request $request)
    {
        $request->validate([
            'role' => 'required|string',
        ]);

        $role = $request->input('role');
        $users = \App\Models\User::role($role)->get();

        foreach ($users as $user) {
            $user->removeRole($role);
        }

        return response()->json([
            'message' => "Role '$role' berhasil dihapus dari semua user.",
            'total_removed' => $users->count()
        ]);
    }

    public function assignRole(Request $request)
    {
        $request->validate([
            'users' => 'required|array',
            'role' => 'required|string|exists:roles,name',
        ]);

        foreach ($request->users as $userId) {
            $user = User::findOrFail($userId);
            $user->assignRole($request->role);
        }

        return response()->json(['message' => "Role '$request->role' berhasil ditambahkan ke user terpilih."]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    private function aturan($user = null)
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user?->id)],
            'password' => $user ? 'nullable|string|min:8' : 'required|string|min:8',
            'level'    => 'required|in:admin,user',
        ];
    }

    public function index()
    {
        $data_user = User::orderBy('name')->paginate(5);
        $jumlah_user = User::count();
        $no = ($data_user->currentPage() - 1) * $data_user->perPage();

        return view('users.index', compact('data_user', 'no', 'jumlah_user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->aturan());

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();

        return redirect()->route('users.index')->with('pesan', 'Data user berhasil disimpan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ((int) $user->id === (int) Auth::id()) {
            $request->merge(['level' => $user->level]);
        }

        $this->validate($request, $this->aturan($user));

        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->update();

        return redirect()->route('users.index')->with('pesan', 'Data user berhasil diubah');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ((int) $user->id === (int) Auth::id()) {
            return redirect()->route('users.index')
                ->with('error', 'Anda tidak dapat menghapus akun yang sedang dipakai.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('pesan', 'Data user berhasil dihapus');
    }
}
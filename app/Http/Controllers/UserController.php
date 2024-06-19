<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data User";
        $breadcrumb = "User";
        $users = User::with('divisi')->get();
        $divisis = Divisi::all();
        return view('page.user.index', compact('title', 'breadcrumb', 'users', 'divisis'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'password' => 'required',
                'role' => 'required',
                'no_karyawan' => 'required|unique:users|numeric',
                'divisi_id' => 'required|exists:divisis,id',
            ]);

            $validatedData['password'] = bcrypt($validatedData['password']);

            User::create($validatedData);

            return redirect('/dashboard/user')->with('success', 'User baru berhasil dibuat!');
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('failed', 'Gagal menambahkan user: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'role' => 'required',
                'no_karyawan' => 'required|unique:users,no_karyawan,' . $id,
                'divisi_id' => 'required|exists:divisis,id',
            ]);

            $user = User::findOrFail($id);

            if ($request->has('password') && $request->password) {
                $validatedData['password'] = bcrypt($validatedData['password']);
            } else {
                unset($validatedData['password']);
            }

            $user->update($validatedData);

            return redirect('/dashboard/user')->with('success', 'User baru berhasil dibuat!');
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('user.index')->with('failed', 'Data gagal diperbarui! ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect('/dashboard/user')->with('success', 'User berhasil dihapus!');
        } catch (\Exception $exception) {
            return redirect()->route('user.index')->with('failed', 'Data gagal dihapus! ' . $exception->getMessage());
        }
    }


    public function resetPasswordAdmin(Request $request)
    {
        try {
            $rules = [
                'password' => 'required',
            ];

            if ($request->password == $request->password2) {
                $validatedData = $request->validate($rules);
                $validatedData['password'] = Hash::make($validatedData['password']);

                User::where('id', $request->id)->update($validatedData);
            } else {
                return back()->with('failed', 'Konfirmasi password tidak sesuai');
            }

            return redirect('/dashboard/user')->with('success', 'Password berhasil direset!');
        } catch (ValidationException $e) {
            // Tangani kesalahan validasi
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Tangani kesalahan umum lainnya
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }
}

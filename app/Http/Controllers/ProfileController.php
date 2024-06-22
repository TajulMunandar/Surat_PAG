<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function index()
    {
        $title = "My Profile";
        $breadcrumb = "My Profile";
        $users = User::all();
        return view('page.myprofile', compact('title', 'breadcrumb', 'users'));
    }

    public function update(Request $request)
    {
        try {
            $rules = [
                'password' => 'required|confirmed',
            ];

            $validatedData = $request->validate($rules);
            $validatedData['password'] = Hash::make($validatedData['password']);

            User::where('id', $request->id)->update($validatedData);

            return redirect()->route('profile')->with('success', 'Password berhasil diperbarui!');
        } catch (ValidationException $e) {
            // Tangani kesalahan validasi
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Tangani kesalahan umum lainnya
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }
}

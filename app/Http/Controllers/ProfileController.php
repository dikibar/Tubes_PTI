<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function userProfile()
    {
        $user = User::with('profile')->find(Auth::id());
        return view('profile', compact('user'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'full_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:500',
        ]);

        $user = Auth::user();
        
        // Upload dan update foto profil
        if ($request->hasFile('profile_picture')) {
            // Hapus foto lama jika ada
            if ($user->profile->profile_picture) {
                Storage::disk('public')->delete($user->profile->profile_picture);
            }

            // Upload foto baru
            $path = $request->file('profile_picture')->store('profiles', 'public');
            $user->profile->profile_picture = $path;
        }

        // Update data profile
        $user->profile->update([
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'bio' => $request->bio,
        ]);

        return redirect()->route('profile')
            ->with('success', 'Profil berhasil diperbarui!');
    }

}

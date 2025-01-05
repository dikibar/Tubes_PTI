@extends('layouts.fiture')

@section('content')
<div class="max-w-4xl p-8 mx-auto my-10 mt-20 bg-white rounded-lg shadow-lg">
    @if(session('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tampilan Profil -->
    <div id="profile-view" class="space-y-6">
        <!-- Foto dan Info Utama -->
        <div class="flex items-center space-x-6">
            <div class="relative w-28 h-28">
                <img 
                    src="{{ $user->profile && $user->profile->profile_picture ? 
                        Storage::url($user->profile->profile_picture) : 
                        asset('images/default-profile.png') }}"
                    alt="Profile Picture" 
                    class="object-cover border-4 border-blue-500 rounded-full w-28 h-28"
                >
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    {{ $user->profile->full_name ?? $user->name }}
                </h1>
                <p class="text-sm text-gray-500">{{ $user->email }}</p>
                <p class="mt-2 text-sm text-gray-600">{{ $user->profile->bio ?? 'Belum ada bio.' }}</p>
            </div>
        </div>

        <!-- Detail Informasi -->
        <div class="space-y-2 text-sm">
            <p><strong>Alamat:</strong> {{ $user->profile->address ?? 'Belum diisi.' }}</p>
            <p><strong>Telepon:</strong> {{ $user->profile->phone ?? 'Belum diisi.' }}</p>
        </div>

        <!-- Tombol Edit -->
        <div class="flex justify-end">
            <button 
                id="edit-profile-btn" 
                class="px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Edit Profil
            </button>
        </div>
    </div>

    <!-- Formulir Edit Profil -->
    <div id="profile-edit" class="hidden">
        <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Foto Profil -->
            <div class="flex items-center space-x-4">
                <div class="relative w-20 h-20">
                    <img 
                        src="{{ $user->profile && $user->profile->profile_picture ? 
                            Storage::url($user->profile->profile_picture) : 
                            asset('images/default-profile.png') }}"
                        alt="Current Profile Picture" 
                        class="object-cover w-20 h-20 border-2 border-gray-300 rounded-full"
                    >
                </div>
                <div>
                    <label for="profile_picture" class="block text-sm font-medium text-gray-700">Ganti Foto Profil</label>
                    <input 
                        type="file" 
                        id="profile_picture" 
                        name="profile_picture" 
                        accept="image/*"
                        class="mt-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100"
                    >
                    @error('profile_picture')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Nama Lengkap -->
            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input 
                    type="text" 
                    id="full_name" 
                    name="full_name" 
                    value="{{ old('full_name', $user->profile->full_name ?? $user->name) }}" 
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('full_name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Alamat -->
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input 
                    type="text" 
                    id="address" 
                    name="address" 
                    value="{{ old('address', $user->profile->address ?? '') }}" 
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Telepon -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Telepon</label>
                <input 
                    type="text" 
                    id="phone" 
                    name="phone" 
                    value="{{ old('phone', $user->profile->phone ?? '') }}" 
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Bio -->
            <div>
                <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                <textarea 
                    id="bio" 
                    name="bio" 
                    rows="3" 
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('bio', $user->profile->bio ?? '') }}</textarea>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end space-x-4">
                <button type="button" id="cancel-edit-btn" class="px-4 py-2 text-gray-600 border rounded-lg hover:bg-gray-100">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('edit-profile-btn').addEventListener('click', function() {
        document.getElementById('profile-view').classList.add('hidden');
        document.getElementById('profile-edit').classList.remove('hidden');
    });

    document.getElementById('cancel-edit-btn').addEventListener('click', function() {
        document.getElementById('profile-edit').classList.add('hidden');
        document.getElementById('profile-view').classList.remove('hidden');
    });
</script>
@endsection

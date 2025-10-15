@extends('layout.app')

@section('page-content')

<div class="max-w-5xl mx-auto mt-12 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">

    <div class="bg-gradient-to-r from-yellow-500 via-orange-500 to-red-500 text-white py-6 text-center shadow-sm">
        <h1 class="text-3xl font-bold">Edit Faculty</h1>
        <p class="text-sm opacity-90">Update faculty information</p>
    </div>

    <div class="p-8">
        @include('components.alert-error')

        <form action="{{ route('faculty.update', $user->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                <input type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        placeholder="Enter faculty name"
                        {{-- required --}}
                        class="w-full px-4 py-2 border border-amber-400 rounded-lg focus:ring-2 focus:ring-orange-400 focus:outline-none transition">
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                <input type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        placeholder="Enter faculty email"
                        {{-- required --}}
                        class="w-full px-4 py-2 border border-amber-400 rounded-lg focus:ring-2 focus:ring-orange-400 focus:outline-none transition">
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('faculty.index') }}"
                    class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
                    Cancel
                </a>

                <button type="submit"
                        name="update"
                        class="px-6 py-2 rounded-lg text-white font-semibold shadow-md bg-gradient-to-r from-yellow-500 via-orange-500 to-red-500 hover:opacity-90 transition">
                    Update Faculty
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

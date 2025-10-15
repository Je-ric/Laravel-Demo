@extends('layout.app')

@section('page-content')

<div class="bg-gradient-to-r from-red-500 via-orange-400 to-yellow-400 text-white px-14 py-6 shadow-md">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold">Faculty Portal</h1>
                <p class="text-sm opacity-90">Welcome back, {{ Auth::user()->name ?? 'Faculty' }}</p>
            </div>
            <a href="{{ route('faculty.create') }}"
                class="bg-white text-yellow-700 font-semibold px-4 py-2 rounded-lg shadow hover:bg-yellow-50 transition">
                + Add Faculty
            </a>
        </div>
    </div>

    <div class="mx-4 md:mx-8 lg:mx-16 my-10">
        <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Faculty List</h2>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b hover:bg-amber-50 transition">
                                <td class="px-6 py-4 flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-500 via-orange-500 to-red-500 flex items-center justify-center text-white font-bold shadow-sm">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <span class="font-medium text-gray-900">{{ $user->name }}</span>
                                </td>
                                {{-- <td class="px-6 py-4 font-medium text-gray-900">{{ $user->name }}</td> --}}
                                <td class="px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="{{ route('faculty.edit', $user->id) }}"
                                        class="bg-gradient-to-r from-yellow-400 to-amber-500 text-white px-4 py-2 rounded-lg hover:opacity-90 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('faculty.destroy', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete"
                                            class="bg-gradient-to-r from-red-500 to-rose-600 text-white px-4 py-2 rounded-lg hover:opacity-90 transition cursor-pointer">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

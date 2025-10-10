@extends('layout.app')

@section('page-content')
    <div class="mx-4 md:mx-8 lg:mx-16 flex justify-between items-center py-8">
        <h1 class="text-2xl font-semibold pb-2">Faculty Page</h1>
        <a href="{{ route('faculty.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            + Add Faculty
        </a>
    </div>

    <div class="mx-4 md:mx-8 lg:mx-16 mb-8">

        <div class="overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Faculty name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td>
                                <a href="{{ route('faculty.edit', $user->id) }}" 
                                    class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                                    Edit
                                </a>

                                <form action="{{ route('faculty.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete"
                                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition cursor-pointer">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

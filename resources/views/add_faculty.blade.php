@extends('layout.app')

@section('page-content')

<div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-center text-2xl font-bold py-6">Add Faculty</h1>

    @include('components.alert-error')

    <form action="{{ route('faculty.store') }}" method="POST">
        @csrf
        <div class="mb-4 flex">
            <input type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter Name"
                    {{-- required --}}
                    class="w-full px-3 py-2 border border-blue-300 rounded">
        </div>

        <div class="mb-4 flex">
            <input type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter Email"
                    {{-- required --}}
                    class="w-full  px-3 py-2 border border-blue-300 rounded">
        </div>

        <div class="mb-4 flex">
            <input type="password"
                    id="password"
                    name="password"
                    placeholder="Enter Password"
                    {{-- required --}}
                    class="w-full px-3 py-2 border border-blue-300 rounded">
        </div>

        <div class="mb-4 flex">
            <input type="password"
                    id="confirm_password"
                    name="confirm_password"
                    placeholder="Confirm Password"
                    {{-- required --}}
                    class="w-full px-3 py-2 border border-blue-300 rounded">
        </div>

        <input type="submit"
                name="add"
                value="ADD"
                class="bg-gradient-to-r from-blue-400 to-pink-600 text-white px-4 py-2 rounded hover:from-orange-600 hover:to-pink-700 transition">
        </input>

    </form>
</div>

@endsection

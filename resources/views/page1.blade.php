@extends('layout.app')

@section('page-content')
    <div class="text-center py-8">
        <h1 class="text-2xl font-semibold text-red-500 border-b pb-2 mb-4">This is Page 1</h1>

        <a href="/page2" class="text-blue-500 hover:underline">Go to Page 2</a>

        <section class="mt-6 space-y-2">
            <p><span class="font-medium">Name:</span> {{ $name }}</p>
            <p><span class="font-medium">Section:</span> {{ $section }}</p>
            <p><span class="font-medium">Age:</span> {{ $age }}</p>
        </section>
    </div>
@endsection

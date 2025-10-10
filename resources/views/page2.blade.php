@extends('layout.app')

@section('page-content')
<div class="text-center py-8">
    <h1 class="text-2xl font-semibold text-red-500 border-b pb-2 mb-4">
        This is Page 2
    </h1>

    <a href="/page1" class="text-blue-500 hover:underline">
        Go to Page 1
    </a>

    <section class="mt-6 space-y-2">
        <p>{{ $word }}</p>
        <p>{{ $word1 }}</p>
        <p>{{ $word2 }}</p>
    </section>
</div>
@endsection

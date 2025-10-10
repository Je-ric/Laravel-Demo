@if($errors->any())
    <div class="flex bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

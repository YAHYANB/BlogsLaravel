@extends('layout.master')
@section('title','Show Page')
@section('content')
<div class="mx-4">
    <div
        class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
    >
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit a Blog
            </h2>
        </header><br>

        <form action="/edit/{{ $blog->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label
                    for="blog"
                    class="inline-block text-lg mb-2"
                    >Title</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title" value="{{ $blog->title }}"
                />
            </div>
            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc" value="{{ $blog->tags }}"
                />
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Image
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="image" 
                />
            </div>

            <div class="mb-6">
                <label
                    for="content"
                    class="inline-block text-lg mb-2"
                >
                    Content
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="content"
                    rows="10" 
                >{{ $blog->content }}</textarea>
            </div>


            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
            

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Edit Blog
                </button>
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</div>
@endsection
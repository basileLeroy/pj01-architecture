@extends('layout')

@section('seo')
    belderbos, marc, architecturer, home, architecture
@endsection

@section('title')
    {{$page->title}}
@endsection

@section('content')
    <div class="w-full mx-12 flex flex-col items-center ">
        <h1 class="text-3xl font-bold my-12">Mots - {{ $page->title }}</h1>

        <form enctype="multipart/form-data" action="{{ route('admin.words.others.update') }}" method="POST" class="w-full">
            @csrf
            <input type="hidden" name="is_primary" value="0">
            <input type="hidden" name="author" value="{{$page->author}}">

            <div id="accordion-collapse" class="w-full" data-accordion="collapse">
                <h2 class="text-2xl mb-6 font-bold">Mettre a jour "{{ $page->title }}"</h2>
                <h2 id="accordion-collapse-heading-cover">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                        data-accordion-target="#accordion-collapse-body-cover" aria-expanded="false"
                        aria-controls="accordion-collapse-body-cover">
                        <span>IMAGES</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-cover" class="hidden" aria-labelledby="accordion-collapse-heading-cover">

                    <div class="flex items-center gap-6 p-5 border border-b-0 border-gray-200 dark:border-gray-700 w-full">
                        <img id="cover-display" class="max-h-28 w-auto mx-5 rounded-lg" src="{{ asset($page->cover) }}"
                            alt="Cover image for {{ $page->title }}">
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="cover-image">Changer l'image de couverture</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="cover-image" name="cover" type="file">
                        </div>
                    </div>
                </div>
                @foreach ($articles as $article)
                    <h2 id="accordion-collapse-heading-{{ $article->language }}">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-{{ $article->language }}" aria-expanded="false"
                            aria-controls="accordion-collapse-body-{{ $article->language }}">
                            <span>{{ strtoupper($article->language) }}</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-{{ $article->language }}" class="hidden"
                        aria-labelledby="accordion-collapse-heading-{{ $article->language }}">
                        <input type="hidden" name="{{ $article->language }}[slug]" value="{{ $article->slug }}">

                        <div class="flex flex-col gap-6 p-5 border border-b-0 border-gray-200 dark:border-gray-700 w-full">
                            <div class="w-1/2">
                                <label for="title-{{ $article->language }}"
                                    class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Title</label>
                                <input type="text" value="{{ $article->title }}" name="{{ $article->language }}[title]"
                                    id="title-{{ $article->language }}"
                                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <textarea class="w-full" name="{{ $article->language }}[content]" id="tinyMCETextArea" rows="10">{!! $article->content !!}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex mt-20 w-full justify-center gap-16">
                <button type="submit"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-md px-14 py-2.5 me-2 mb-2  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                <a href="{{ route('admin.home.edit') }}"
                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Cancel</a>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
    <script>
        // interactive update of image on upload
        const fileInput = document.getElementById("cover-image");

        fileInput.addEventListener('change', e => {
            const image = document.getElementById("cover-display");
            const file = e.target.files[0];
            const reader = new FileReader();

            reader.onload = function(event) {
                image.src = event.target.result;
            };

            reader.readAsDataURL(file);
        });
    </script>
@endsection

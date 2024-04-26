@extends('layout')

@section('seo')
    belderbos, marc, architecturer, home, architecture
@endsection

@section('title')
    Intentions
@endsection

@section('content')
    <div class="w-full mx-12 flex flex-col items-center ">
        <h1 class="text-3xl font-bold my-12">Page d'accueil</h1>

        <form action="{{ route('admin.home.update') }}" method="POST" class="w-full">
            @csrf
            <div id="accordion-collapse" class="w-full" data-accordion="collapse">
                @if ($articles->isEmpty())
                    <input type="hidden" name="no_article" value="1">

                    <h2 id="accordion-collapse-heading-fr">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-fr" aria-expanded="false"
                            aria-controls="accordion-collapse-body-fr">
                            <span>FR</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-fr" class="hidden w-full"
                        aria-labelledby="accordion-collapse-heading-fr">

                        <div class="flex flex-col gap-6 p-5 border border-b-0 border-gray-200 dark:border-gray-700 w-full">
                            <div class="w-1/2">
                                <label for="title-fr"
                                    class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Title</label>
                                <input type="text" name="fr[title]" id="title-fr"
                                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <textarea class="w-full" name="fr[content]" id="tinyMCETextArea" rows="10">{!! __('error.no_content') !!}</textarea>
                        </div>
                    </div>
                    <h2 id="accordion-collapse-heading-en">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-en" aria-expanded="false"
                            aria-controls="accordion-collapse-body-en">
                            <span>EN</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-en" class="hidden" aria-labelledby="accordion-collapse-heading-en">
                        <div class="flex flex-col gap-6 p-5 border border-b-0 border-gray-200 dark:border-gray-700 w-full">
                            <div class="w-1/2">
                                <label for="title-en"
                                    class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Title</label>
                                <input type="text" name="en[title]" id="title-en"
                                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <textarea class="w-full" name="en[content]" id="tinyMCETextArea" rows="10">{!! __('error.no_content') !!}</textarea>
                        </div>
                    </div>
                    <h2 id="accordion-collapse-heading-nl">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-nl" aria-expanded="false"
                            aria-controls="accordion-collapse-body-nl">
                            <span>NL</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-nl" class="hidden" aria-labelledby="accordion-collapse-heading-nl">
                        <div class="flex flex-col gap-6 p-5 border border-b-0 border-gray-200 dark:border-gray-700 w-full">
                            <div class="w-1/2">
                                <label for="title-nl"
                                    class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Title</label>
                                <input type="text" name="nl[title]" id="title-nl"
                                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <textarea class="w-full" name="nl[content]" id="tinyMCETextArea" rows="10">{!! __('error.no_content') !!}</textarea>
                        </div>
                    </div>
                @endif
                @foreach ($articles as $article)
                    <h2 id="accordion-collapse-heading-{{ $article->language }}">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-{{ $article->language }}"
                            aria-expanded="false" aria-controls="accordion-collapse-body-{{ $article->language }}">
                            <span>{{ strtoupper($article->language) }}</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-{{ $article->language }}" class="hidden"
                        aria-labelledby="accordion-collapse-heading-{{ $article->language }}">
                        <div class="flex flex-col gap-6 p-5 border border-b-0 border-gray-200 dark:border-gray-700 w-full">
                            <div class="w-1/2">
                                <label for="title-{{ $article->language }}"
                                    class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Title</label>
                                <input type="text" value="{{ $article->title }}"
                                    name="{{ $article->language }}[title]" id="title-{{ $article->language }}"
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
@endsection

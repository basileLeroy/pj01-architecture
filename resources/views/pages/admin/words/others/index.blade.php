@extends('layout')

@section('seo')
    belderbos, marc, architecturer, home, architecture
@endsection

@section('title')
    Intentions
@endsection

@section('content')
    @vite(['resources/js/admin.js'])

    <div class="w-full mx-12 flex flex-col items-center ">
        <h1 class="text-3xl font-bold my-12">Mots - Autres</h1>

        <form action="{{ route('admin.words.others.update') }}" method="POST" class="w-full">
            @csrf
            <input type="hidden" name="is_primary" value="1">
            <input type="hidden" name="author" value="Other">
            <input type="hidden" name="slug" value="words-by-others">

            <div id="accordion-collapse" class="w-full" data-accordion="collapse">
                <h2 class="text-2xl mb-6 font-bold">Mettre a jour l'article d'introduction</h2>

                @if ($primary->isEmpty())
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
                        <input type="hidden" name="fr[title]" value="Words by others">

                        <div class="flex flex-col gap-6 p-5 border border-b-0 border-gray-200 dark:border-gray-700 w-full">
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
                        <input type="hidden" name="en[title]" value="Words by others">

                        <div class="flex flex-col gap-6 p-5 border border-b-0 border-gray-200 dark:border-gray-700 w-full">
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
                        <input type="hidden" name="nl[title]" value="Words by others">

                        <div class="flex flex-col gap-6 p-5 border border-b-0 border-gray-200 dark:border-gray-700 w-full">
                            <textarea class="w-full" name="nl[content]" id="tinyMCETextArea" rows="10">{!! __('error.no_content') !!}</textarea>
                        </div>
                    </div>
                @endif
                @foreach ($primary as $article)
                    <h2 id="accordion-collapse-heading-{{ $article->language }}">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-{{ $article->language }}" aria-expanded="false"
                            aria-controls="accordion-collapse-body-{{ $article->language }}">
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
                        <input type="hidden" name="{{ $article->language }}[title]" value="Words by others">

                        <div class="flex flex-col gap-6 p-5 border border-b-0 border-gray-200 dark:border-gray-700 w-full">
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

        <hr class="w-1/2 h-1 mx-auto my-4 bg-gray-300 border-0 rounded md:my-10 dark:bg-gray-700">

        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.words.others.store') }}"
            class="w-full bg-slate-100 p-12 rounded-md">
            @csrf
            <input type="hidden" name="is_primary" value="0">
            <input type="hidden" name="author" value="Others">

            <h2 class="text-2xl font-bold">Creer un article</h2>

            <div class="my-5">
                <label for="title-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre du
                    projet *</label>
                <input type="text" name="title" id="title-input"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="author">Auteur(e)
                    *</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="author" name="author" type="text">
            </div>

            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="cover-image">Ajouter une
                    image de couverture</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="cover-image" name="cover" type="file">
            </div>

            <div class="flex mt-20 w-full justify-center gap-16">
                <button type="submit"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-md px-14 py-2.5 me-2 mb-2  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                <a href="{{ route('admin.projects.create') }}"
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

        <hr class="w-1/2 h-1 mx-auto my-4 bg-gray-300 border-0 rounded md:my-10 dark:bg-gray-700">

        <div class="w-full flex flex-wrap gap-7 justify-around bg-slate-100 p-12 mb-12 rounded-md">
            <h2 class="text-2xl font-bold w-full self-center">Les mots de Marc</h2>

            <form id="words-list" action="{{ route('admin.words.others.update-order') }}" method="post"
                id="articles-list" class="w-full flex flex-wrap gap-7 justify-around bg-slate-100 p-12 mb-12 rounded-md">
                @csrf
                @foreach ($articles as $article)
                    <div id="article-item-{{ $article->id }}" draggable="true"
                        class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <input type="hidden" name="articles[]" value="{{ $article->slug }}">
                        <div class="flex justify-end px-4 pt-4">
                            <button id="{{ $article->slug }}" data-dropdown-toggle="dropdown-{{ $article->id }}"
                                class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                                type="button">
                                <span class="sr-only">Open dropdown</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 16 3">
                                    <path
                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdown-{{ $article->id }}"
                                class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2" aria-labelledby="{{ $article->slug }}">
                                    <li>
                                        <a href="{{ route('admin.words.others.editDetail', ['Word' => $article->slug]) }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                    </li>
                                    <li>
                                        <a href="#" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="cursor-move flex flex-col items-center justify-center pb-10">
                            <img class="h-36 w-auto mb-3 rounded-md shadow-lg" src="{{ asset($article->cover) }}"
                                alt="Bonnie image" />
                            <h5 class="mb-1 text-center mx-6 text-xl font-medium text-gray-900 dark:text-white">{{ $article->title }}</h5>
                        </div>
                    </div>
                @endforeach
                <div class="flex mt-20 w-full justify-center gap-16">
                    <button type="submit"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-md px-14 py-2.5 me-2 mb-2  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                    <a href="{{ route('admin.projects.create') }}"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <div id="popup-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
                        this project?</h3>
                    <a data-modal-hide="popup-modal" href="{{ route('admin.words.delete', ['Word' => $article->slug]) }}"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </a>
                    <button data-modal-hide="popup-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection

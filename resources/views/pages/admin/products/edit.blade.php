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
        <h1 class="text-3xl font-bold my-12">Editions - {{ $firstProduct->title }}</h1>

        <form enctype="multipart/form-data" action="{{ route('admin.products.update', ['Product' => $firstProduct->slug]) }}"
            method="POST" class="w-full">
            @csrf
            <div id="accordion-collapse" class="w-full" data-accordion="collapse">
                <h2 id="accordion-collapse-general-info">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                        data-accordion-target="#accordion-collapse-body-info" aria-expanded="false"
                        aria-controls="accordion-collapse-body-info">
                        <span>{{ strtoupper('Infos General') }}</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-info" class="hidden"
                    aria-labelledby="accordion-collapse-heading-{{ $firstProduct->language }}">
                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 w-full">

                        {{-- add new cover image --}}
                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="cover-image">Mettre a jour votre image de couverture *</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="cover-image" name="cover" type="file">
                        </div>

                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="link">
                                Mettre a jour votre lien d'achat
                            </label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="link" name="link" type="text" value="{{$firstProduct->link}}">
                        </div>
                    </div>
                </div>
                @foreach ($products as $product)
                    <h2 id="accordion-collapse-heading-{{ $product->language }}">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-{{ $product->language }}" aria-expanded="false"
                            aria-controls="accordion-collapse-body-{{ $product->language }}">
                            <span>{{ strtoupper($product->language) }}</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-{{ $product->language }}" class="hidden"
                        aria-labelledby="accordion-collapse-heading-{{ $product->language }}">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 w-full">
                            <h2 class="text-2xl my-6 font-bold">Mettre a jour votre projet</h2>
                            {{-- Product title --}}
                            <div class="my-5">
                                <label for="title-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre du projet
                                    *</label>
                                <input type="text" value="{{ $product->title }}" name="{{ $product->language }}[title]"
                                    id="title-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>

                            <textarea class="w-full" name="{{ $product->language }}[content]" id="tinyMCETextArea" rows="10">{!! $product->description !!}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex mt-20 w-full justify-center gap-16">
                <button type="submit"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-md px-14 py-2.5 me-2 mb-2  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                <a href="{{ route('admin.products.create') }}"
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

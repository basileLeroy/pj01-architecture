@extends("layout")

@section('seo')
    belderbos, marc, architecturer, home, architecture
@endsection

@section('title')
    Intentions
@endsection

@section("content")
<div class="w-full mx-12 flex flex-col items-center ">
    <h1 class="text-3xl font-bold my-12">Intensions du site</h1>

    <form action="{{ route("admin.intentions-website.update")}}" method="POST" class="w-full">
        @csrf
        <div id="accordion-collapse" class="w-full" data-accordion="collapse">
        @if ($articles->isEmpty())
        <h2 id="accordion-collapse-heading-fr">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-fr" aria-expanded="false" aria-controls="accordion-collapse-body-fr">
                <span>FR</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-fr" class="hidden w-full" aria-labelledby="accordion-collapse-heading-fr">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 w-full">
                <textarea class="w-full" name="content[fr]" id="tinyMCETextArea" rows="10">{!! __("error.no_content") !!}</textarea>
            </div>
        </div>
        <h2 id="accordion-collapse-heading-en">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-en" aria-expanded="false" aria-controls="accordion-collapse-body-en">
                <span>EN</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-en" class="hidden" aria-labelledby="accordion-collapse-heading-en">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 w-full">
                <textarea class="w-full" name="content[en]" id="tinyMCETextArea" rows="10">{!! __("error.no_content") !!}</textarea>
            </div>
        </div>
        <h2 id="accordion-collapse-heading-nl">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-nl" aria-expanded="false" aria-controls="accordion-collapse-body-nl">
                <span>NL</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-nl" class="hidden" aria-labelledby="accordion-collapse-heading-nl">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 w-full">
                <textarea class="w-full" name="content[nl]" id="tinyMCETextArea" rows="10">{!! __("error.no_content") !!}</textarea>
            </div>
        </div>
        @endif
        @foreach ($articles as $article)
            <h2 id="accordion-collapse-heading-{{$article->language}}">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-{{$article->language}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{$article->language}}">
                    <span>{{strtoupper($article->language)}}</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-{{$article->language}}" class="hidden" aria-labelledby="accordion-collapse-heading-{{$article->language}}">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 w-full">
                    <textarea class="w-full" name="content[{{$article->language}}]" id="tinyMCETextArea" rows="10">{!!$article->content!!}</textarea>
                </div>
            </div>
        @endforeach
        </div>

        <div class="flex mt-20 w-full justify-center gap-16">
            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 me-2 mb-2 w-32 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
            <a href="{{ route("admin.intentions-website.edit")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Cancel</a>
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


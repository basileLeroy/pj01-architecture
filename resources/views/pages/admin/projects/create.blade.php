@extends("layout")

@section('seo')
    belderbos, marc, architecturer, home, architecture
@endsection

@section('title')
    Projects
@endsection

@section("content")
<div class="w-full mx-12 flex flex-col items-center ">
    <h1 class="text-3xl font-bold my-12">Architecturer - Projets</h1>
    
    <form enctype="multipart/form-data" method="POST" action="{{route("admin.projects.store")}}" class="w-full bg-slate-100 p-12 rounded-md">
        @csrf
        <h2 class="text-2xl font-bold">Creer un nouveau projet</h2>

        <div class="my-5">
            <label for="title-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre du projet *</label>
            <input type="text" name="title" id="title-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="cover-image">Ajouter une image de couverture *</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="cover-image" name="cover" type="file">
        </div>

        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="gallery-images">Ajouter des images de gallerie</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="gallery-images" name="gallery[]" type="file" multiple>
        </div>
        <div class="flex mt-20 w-full justify-center gap-16">
            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-md px-14 py-2.5 me-2 mb-2  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
            <a href="{{ route("admin.projects.create")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Cancel</a>
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

    <div class="w-full bg-slate-100 p-12 mb-12 rounded-md">

    </div>
</div>
@endsection


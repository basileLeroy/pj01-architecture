<body class="relative">
    <header class=" ">
        @include("components.admin.header")
    </header>


    <main class="flex row">
        @include("components.admin.sidebar")

        @yield("content")
    </main>
</body>
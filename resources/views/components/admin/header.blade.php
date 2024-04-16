<nav class="bg-gray-50 shadow-md border-gray-200 dark:bg-gray-900 relative">
    <div class="flex flex-wrap justify-between items-center mx-auto p-4">
        <a href="{{route("admin.dashboard")}}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">B-Dash</span>
        </a>
        <div class="flex items-center space-x-6 rtl:space-x-reverse gap-12">
            <a href="#" class="text-sm  text-gray-500 dark:text-white hover:underline">{{ Auth::user()->name}}</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-logout-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-logout-link>
            </form>
        </div>
    </div>
</nav>



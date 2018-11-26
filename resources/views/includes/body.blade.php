<main class="py-4 container " {{ Request::path() == 'login' ? 'background-image' : '' }}>
    @yield('content')
</main>
<main class="py-4 container @if(url()->current() === 'login') login @endif  {{ Request::path() == 'login' ? 'background-image' : '' }}">
    @yield('content')
</main>
@php $url = url()->full();$base_url = url('/');@endphp
<nav class="navbar navbar-expand-md navbar-light bg-primary navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'ROC Friese Drones') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('navigation.toggle') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @guest

                @else
                    <li class="nav-item">
                        <a class="nav-link" id="home" href="{{route('home')}}">{{__('home.home')}}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="formDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__('Forms')}} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu bg-primary" aria-labelledby="formDropdown">
                            <a class="dropdown-item" href="{{ url('forms/overview') }}">
                                {{ __('Overview') }}
                            </a>
                            <a class="dropdown-item" href="{{ url('forms/submit/progress') }}">
                                {{ __('Submit') }}
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('auth.login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('register.register') }}</a>
                    </li>
                @else
                    @if(Auth::user()->role_id == 1)
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('admin/users') }}">
                               All users
                            </a>
                        </div>
                    </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('contact') }}">
                            Contact
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<!-- Adds dynamic active classes -->
<script>
    url = '{{$url}}'; //Gets url from php variable
    base_url = '{{$base_url}}'; //Gets base url from php variable (/)
    $('.nav-item .nav-link').each(function(){
            link = $('.nav-item a').attr('href');
            if(url === link){
                $(this).addClass('active'); //Adds the 'active' class to the current link in the navbar
            }
            if($('.nav-item a').parents('.dropdown-menu').length || $('.nav-item a').parents('nav-item.dropdown').length){
                $(this).parents('.nav-item .dropdown').addClass('active');
            }
        }
    );
    if(url === base_url){
        $('#home').addClass('active'); //This adds the active class to the 'home' href if the user is on the / directory
    }
</script>
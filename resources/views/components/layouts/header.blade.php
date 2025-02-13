{{--Header para móvil--}}
<header class="md:h-15v bg-cyan-900
    flex flex-col md:flex-row justify-between px-3 items-center">
    <img class="w-6/12 h-4/5 md:w-1/12 md:max-h-full" src="{{asset("images/logo.png")}}" alt="logo">
    <h1 class = "hidden md:block text-white text-5xl">COMPRA+</h1>
    <div class="flex items-center">
        @auth
            <span class="text-white mr-4">{{ auth()->user()->name }}</span>
            <form action="{{route("logout")}}" method="POST">
                @csrf
                <input class="btn  btn-glass" type="submit" value="Logout">
            </form>

        @endauth
        @guest
                <a class="btn  btn-glass mr-2" href="{{route("login")}}">Login</a>
                <a class="btn  btn-glass" href="{{route("register")}}">Register</a>
        @endguest

    </div>

</header>
{{--Header para desktop--}}

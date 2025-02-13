<header class="md:h-15v bg-cyan-900
    flex flex-col md:flex-row justify-between px-3 items-center">
    <img class="w-6/12 h-4/5 md:w-1/12 md:max-h-full" src="{{asset("images/logo.png")}}" alt="logo">
    <h1 class = "hidden md:block text-white text-5xl">COMPRA+</h1>
    {{--Laptop--}}
    <div class="hidden md:flex md:items-center">
        @auth
            <span class="text-white mr-4">{{ auth()->user()->name }}</span>
            <form action="{{route("logout")}}" method="POST">
                @csrf
                <input class="btn  btn-glass mr-2" type="submit" value="{{__("Logout")}}">
            </form>

        @endauth
        @guest
                <a class="btn  btn-glass mr-2" href="{{route("login")}}">Login</a>
                <a class="btn  btn-glass mr-2" href="{{route("register")}}">Register</a>
        @endguest
            <x-layouts.lang/>
    </div>
    {{--Mobile--}}
    <div class="block md:hidden">
        <input type="checkbox" name="" id="menu-toggle" class="peer hidden">
        <label class="text-2xl hover:cursor-pointer text-white" for="menu-toggle">
            &#9778
        </label>
        <div class="absolute hidden peer-checked:block bg-gray-300 p-3 rounded-xl flex-col">
            @auth
                <span class="text-white mr-4">{{ auth()->user()->name }}</span>
                <form action="{{route("logout")}}" method="POST">
                    @csrf
                    <input class="btn  btn-glass" type="submit" value="{{__("Logout")}}">
                </form>
            @endauth
            @guest
                <a class="btn  btn-glass" href="{{route("login")}}">{{__("Login")}}</a>
                <a class="btn  btn-glass" href="{{route("register")}}">{{__("Register")}}</a>
            @endguest
        </div>
    </div>
</header>
{{--Header para desktop--}}

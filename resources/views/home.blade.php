<x-layouts.layout titulo="Home">
    @guest
        <div
            class="hero min-h-screen"
            style="background-image: url(https://png.pngtree.com/background/20230519/original/pngtree-an-asian-shop-in-a-city-at-night-picture-image_2663090.jpg);">
            <div class="hero-overlay bg-opacity-60"></div>
            <div class="hero-content text-neutral-content text-center">
                <div class="max-w-md">
                    <h1 class="mb-5 text-5xl font-bold">Tienda</h1>
                    <p class="mb-5">
                        Aqui podras encontrar productos</p>
                    <hr/><br/>
                    <p class="mb-5">
                    Registrate para acceder a las opciones de gestión
                    </p>
                    <a href="{{route("login")}}"><button class="btn btn-primary">{{__("Login")}}</button></a>
                </div>
            </div>
        </div>
    @endguest
    @auth
        <div class="hero min-h-screen bg-sky-500">
        <div class="p-4 card card-compact bg-base-100 w-96 shadow-xl">
            <figure>
                <img class="w-1/2 h-1/2"
                    src="{{asset("/images/administrar.png")}}"
                    alt="Productos" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">Administrar tienda</h2>
                <p>Gestionamos altas, bajas, actualizaciones y borrado de una tabla de productos</p>
                <div class="card-actions justify-end">
                    <a class="btn btn-primary" href="{{route("productos.index")}}">Ver Productos</a>
                </div>
            </div>
        </div>
        </div>
    @endauth
</x-layouts.layout>

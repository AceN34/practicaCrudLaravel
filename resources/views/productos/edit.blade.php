<x-layouts.layout>
    <div class="flex flex-row justify-center items-center min-h-full bg-gray-300">
        <!-- Session Status -->
        <form action="{{route("productos.update", $producto->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="bg-white rounded-2xl p-5">
                <div>
                    <x-input-label for="nombre" value="Nombre"/>
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                  value="{{$producto->nombre}}"/>
                    @error("nombre")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror


                </div>
                <div>
                    <x-input-label for="codigo" value="Codigo"/>
                    <x-text-input id="codigo" class="block mt-1 w-full"
                                  type="number" name="codigo"
                                  value="{{$producto->codigo}}"
                                  required autofocus autocomplete="codigo" />
                    @error("codigo")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                <div>
                    <x-input-label for="unidades" value="Unidades" />

                    <x-text-input id="unidades" class="block mt-1 w-full"
                                  type="number" name="unidades"
                                  value="{{$producto->unidades}}"
                                  required autofocus autocomplete="Unidades" />
                    @error("unidades")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                <div>
                    <x-input-label for="familia" value="Familia" />
                    <x-text-input id="familia" class="block mt-1 w-full"
                                  type="text" name="familia"
                                  value="{{$producto->familia}}"
                                  required autofocus autocomplete="Familia"/>
                    @error("familia")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                <div class="p-2">
                    <button class= "btn btn-sm btn-success"  type="submit">Guardar </button>
                    <a class= "btn btn-sm btn-success" href="{{route("productos.index")}}">Cancelar</a>
                </div>
            </div>

        </form>
    </div>
</x-layouts.layout>

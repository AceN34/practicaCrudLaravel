<x-layouts.layout>
    <div class="flex flex-row justify-center items-center min-h-full bg-gray-300">
        <!-- Session Status -->
        <form action="{{route("productos.store")}}" method="POST">
            @csrf
            <div class="bg-white rounded-2xl p-5">
                <div>
                    <x-input-label for="nombre" value="Nombre"/>
                    <x-text-input id="nombre" class="block mt-1 w-full"
                                  type="text" name="nombre"
                                  value="{{old('nombre')}}"
                                  required autofocus autocomplete="Nombre"/>
                    @error("nombre")
                        <div class="text sm text-red-600">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div>
                    <x-input-label for="codigo" value="Codigo"/>
                    <x-text-input id="codigo" class="block mt-1 w-full"
                                  type="number" name="codigo"
                                  value="{{old('codigo')}}"
                                  required autofocus autocomplete="Codigo"/>
                </div>
                @error("codigo")
                    <div class="text sm text-red-600">
                        {{$message}}
                    </div>
                @enderror
                <div>
                    <x-input-label for="unidades" value="Unidades"/>
                    <x-text-input id="unidades" class="block mt-1 w-full"
                                  type="number" name="unidades"
                                  value="{{old('unidades')}}"
                                  required autofocus autocomplete="Unidades"/>
                </div>
                @error("unidades")
                    <div class="text sm text-red-600">
                        {{$message}}
                    </div>
                @enderror
                <div>
                    <x-input-label for="familia" value="Familia"/>
                    <x-text-input id="familia" class="block mt-1 w-full"
                                  type="text" name="familia"
                                  value="{{old('familia')}}"
                                  required autofocus autocomplete="Familia"/>
                </div>
                @error("familia")
                    <div class="text sm text-red-600">
                        {{$message}}
                    </div>
                @enderror
                <!-- Proveedor -->
                <div>
                    <x-input-label for="proveedor_id" value="Proveedor"/>
                    <select name="proveedor_id" id="proveedor_id" class="block mt-1 w-full">
                        <option value="">Selecciona un proveedor</option>
                        @foreach($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}"
                                {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}>
                                {{ $proveedor->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error("proveedor_id")
                    <div class="text sm text-red-600">
                        {{ $message }}
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

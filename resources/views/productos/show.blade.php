<x-layouts.layout>
    <div class="flex flex-row justify-center items-center min-h-full bg-gray-300">
        <div class="bg-white rounded-2xl p-5 mt-20 mb-20">
        <table class="table-auto bg-white rounded-2xl p-5 divide-y divide-gray-500 border-2 border-black mt-2 mb-2">
            <thead>
            <tr class="divide-x divide-black">
                <th class="px-4 py-2 text-3xl bg-sky-700">Producto: {{$producto->nombre}}</th>
                <th class="px-4 py-2 text-3xl bg-gray-600">Proveedor: {{$proveedor->nombre}}</th>
            </tr>
            </thead>
            <tbody>
            <tr class="divide-x divide-black">
                <td class="px-4 py-2 text-black text-2xl"><span class="font-bold">Código: </span>{{$producto->codigo}}</td>
                <td class="px-4 pt-6 text-black text-2xl"><span class="font-bold">Email: </span>{{$proveedor->email}}</td>
            </tr>
            <tr class="divide-x divide-black">
                <td class="px-4 py-2 text-black text-2xl"><span class="font-bold">Unidades: </span>{{$producto->unidades}}</td>
                <td rowspan="2" class="px-4 py-2 text-black text-2xl"><span class="font-bold">Teléfono: </span>{{$proveedor->telefono}}</td>
            </tr>
            <tr class="divide-x divide-black">
                <td class="px-4 py-2 text-black text-2xl"><span class="font-bold">Familia: </span>{{$producto->familia}}</td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
</x-layouts.layout>

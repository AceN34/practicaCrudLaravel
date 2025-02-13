<x-dropdown>
    <x-slot name="trigger">
        <div>
            <span class="btn flex flex-row space-x-2 bg-sky-950 p-4">
                {{config("languages")[App::getLocale()]["name"]}} {{--Para llamar al archivo languages.php en config--}}
                {{config("languages")[App::getLocale()]["flag"]}}
            </span>
        </div>
    </x-slot>
    <x-slot name="content">
        @foreach(config("languages") as $code => $lang)
            <div class="flex flex-row space-x-2 hover:bg-gray-400 bg-white text-black">
              <a href="{{route("language",$code)}}">
                {{$lang["name"]}}
                {{$lang["flag"]}}
              </a>
            </div>
        @endforeach
    </x-slot>
</x-dropdown>

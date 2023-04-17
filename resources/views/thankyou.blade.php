<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:max-w-7xl">
                <h1 class="text-center text-lg sm:text-2xl">Köszönjük megrendelését!</h1>
                <h3 class="text-center text-base sm:text-lg">Megrendelt tételek:</h3>
                @foreach($cart as $pizza)
                <div class="p-3 sm:p-6 text-gray-900 shadow-lg flex flex-wrap gap-x-2 justify-between">
                    <img src="{{asset($pizza->img)}}" alt="pizza" class="w-4/12 relative row-start-4 row-end-7">
                    <div class="text-sm sm:text-lg flex-1">
                        {{$pizza->name}} <br> {{$pizza->price}} Ft. <br> <span class="text-xs md:text-base">{{$pizza->category}}</span>
                    </div>
                        <div class="text-sm sm:text-lg">
                                {{$pizza->amount}} db
                        </div>
                </div>    
                @endforeach
                <span>Végösszeg: {{$total}}</span>

                <a href="{{route('dashboard')}}"><button>Vissza a főoldalra</button></a>
            </div>
        </div>
    </div>
</x-app-layout>

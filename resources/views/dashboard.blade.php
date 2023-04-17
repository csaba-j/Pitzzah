<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex overflow-hidden flex-wrap justify-center gap-5 shadow-sm sm:rounded-lg">
                @foreach($pizzas as $pizza)
                <div class="p-6 text-gray-900 shadow-lg grid grid-rows-18 grid-columns-1 grid-flow-row">
                    <div class="bg-pizzaname rounded text-right w-3/5 row-span-1 row-start-1 row-end-3 justify-self-end">{{$pizza->name}}</div>
                    <div class="bg-pizzaname rounded text-right w-3/5 row-span-1 row-start-3 row-end-4 justify-self-end">{{$pizza->price}} Ft.</div>
                    <img src="{{asset($pizza->img)}}" alt="pizza" class="w-60 z-0 relative row-start-4 row-end-7">
                </div>    
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

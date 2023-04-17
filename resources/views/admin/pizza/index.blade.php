<x-admin-layout>
    <a href="{{route('pizza.create')}}"><button class="border border-solid p-4 rounded">Új pizza hozzáadása</button></a>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:max-w-7xl">
                @foreach($pizzas as $pizza)
                <div class="p-3 sm:p-6 text-gray-900 shadow-lg flex flex-row flex-wrap gap-x-2 items-center">
                    <img src="{{asset($pizza->img)}}" alt="pizza" class="w-40 lg:w-60 relative row-start-4 row-end-7">
                    <div class="text-sm sm:text-lg flex-1">
                        {{$pizza->name}} <br> {{$pizza->price}} Ft. <br> <span class="text-xs md:text-base">{{$pizza->category}}</span>
                    </div>
                        <a href="{{ route('pizza.edit', ['pizza' => $pizza]) }}">
                            <button class="rounded bg-pizzared mt-4 md:mt-6 p-2 md:px-6 md:py-4">
                                Szerkesztés
                            </button>
                        </a>
                        <form method="POST" name="removeForm" action="{{ route('cart.remove') }}">
                        @csrf
                            <input type="number" name="id" value="{{$pizza->id}}" hidden>
                            <button type="submit" class=" rounded bg-pizzared mt-4 md:mt-6 p-2 md:px-6 md:py-4">Eltávolít</button>
                        </form>
                </div>    
                @endforeach
            </div>
        </div>
    </div>
</x-admin-layout>
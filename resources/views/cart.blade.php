<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:max-w-7xl">
                <form method="POST" name="deleteForm" action="{{ route('cart.delete') }}">
                @csrf
                    <button type="submit" class="rounded bg-pizzared mx-16 mb-4 p-2 md:px-6 md:py-4">Kosár törlése</button>
                </form>
                @foreach($cart as $pizza)
                <div class="p-3 sm:p-6 text-gray-900 shadow-lg flex flex-wrap gap-x-2 justify-between">
                    <img src="{{asset($pizza->img)}}" alt="pizza" class="w-4/12 relative row-start-4 row-end-7">
                    <div class="text-sm sm:text-lg flex-1">
                        {{$pizza->name}} <br> {{$pizza->price}} Ft. <br> <span class="text-xs md:text-base">{{$pizza->category}}</span>
                    </div>
                    <form method="POST" name="orderForm" action="{{ route('cart.add') }}">
                    @csrf
                        <div class="text-sm sm:text-lg">
                                <input type="number" name="id" value="{{$pizza->id}}" hidden>
                                <input type="number" name="amount" step="1" min="0" value="{{$pizza->amount}}" class="w-20 md:w-60">
                                <label for="amount">db</label>
                        </div>
                    </form>
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
</x-app-layout>

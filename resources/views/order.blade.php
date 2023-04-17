<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-4 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg max-w-xl">
                @foreach($pizzas as $pizza)
                <div class="p-3 sm:p-6 text-gray-900 shadow-lg flex flex-wrap gap-x-2 justify-between">
                    <img src="{{asset($pizza->img)}}" alt="pizza" class="w-4/12 relative row-start-4 row-end-7">
                    <div class="text-sm sm:text-lg flex-1">{{$pizza->name}} <br> {{$pizza->price}} Ft.</div>
                    <div class="text-sm sm:text-lg">
                        <form method="POST" name="orderForm">
                            <input type="number" name="{{$pizza->id}}-amount" step="1" min="0" class="w-20">
                            <label for="{{$pizza->id}}-amount">db</label>
                        </form>
                    </div>
                </div>    
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

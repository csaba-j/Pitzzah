<x-admin-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:max-w-7xl">
                <div class="p-3 sm:p-6 text-gray-900 shadow-lg">
                    <form method="POST" name="confirmOrder" action="{{ route('pizza.update', ['pizza' => $pizza]) }}" enctype="multipart/form-data"
                        class="flex flex-col flex-wrap gap-y-2"
                    >
                    @csrf
                        <div class="flex flex-row flex-wrap gap-y-2 gap-x-4 justify-center">
                            <img src="{{asset($pizza->img)}}" alt="pizza" class="h-4/12">
                            <label for="img" class="basis-full text-center">Kép feltöltése</label>
                            <input type="file" name="img">
                        </div>

                        <div class="flex flex-col flew-wrap gap-y-2">
                            <label for="name">Név</label>
                            <input type="text" name="name" value="{{$pizza->name}}">
                            <label for="name">Kategória</label>
                            <input type="text" name="category" value="{{$pizza->category}}">
                            <label for="name">Ár (Forint)</label>
                            <input type="number" name="price" value="{{$pizza->price}}">
                        </div>

                        <a href="{{ route('pizza.edit', ['pizza' => $pizza]) }}">
                            <button class="rounded bg-pizzaname basis-full w-full mt-4 md:mt-6 p-2 md:px-6 md:py-4">
                                Mentés
                            </button>
                        </a>
                    </form>
                        <form method="POST" name="removeForm" action="{{ route('cart.remove') }}">
                        @csrf
                            <input type="number" name="id" value="{{$pizza->id}}" hidden>
                            <button type="submit" class=" rounded bg-pizzared mt-4 md:mt-6 py-2 px-4 md:px-6 md:py-4">Eltávolít</button>
                        </form>
                </div>    
            </div>
        </div>
    </div>
</x-admin-layout>
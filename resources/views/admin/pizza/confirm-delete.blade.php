<x-admin-layout>
    <div class="max-w-7xl mx-2 sm:mx-auto border border-solid rounded gap-y-8 p-8 lg:p-16 my-16 flex flex-col">
        <span class="basis-full text-center">Biztosan törlöd a(z) {{$pizza->name}} nevű pizzát?</span>
        <div class="flex flex-row justify-around">
            <a href="{{url()->previous()}}"><button class="border border-solid rounded bg-lime-500 py-2 px-4">Mégse</button></a>
            <form method="POST" action="{{route('pizza.destroy', ['pizza' => $pizza])}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="border border-solid rounded bg-pizzared py-2 px-4">Megerősítés</button>
            </form>
        </div>
    </div>
</x-admin-layout>
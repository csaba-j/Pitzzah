<x-admin-layout>
    <span>Biztosan törlöd a(z) {{$pizza->name}} nevű pizzát?</span>
    <div>
        <form method="POST" action="{{route('pizza.destroy', ['pizza' => $pizza])}}">
            @csrf
            @method('DELETE')
            <button type="submit">Igen</button>
        </form>
    </div>
</x-admin-layout>
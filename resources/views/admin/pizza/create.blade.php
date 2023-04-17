<x-admin-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:max-w-7xl">
                <div class="p-3 sm:p-6 text-gray-900 shadow-lg">
                <x-back-button></x-back-button>
                    <form method="POST" name="addPizza" action="{{ route('pizza.store') }}" enctype="multipart/form-data"
                        class="flex flex-col flex-wrap gap-y-2"
                    >
                        @csrf
                        <div class="flex flex-row flex-wrap gap-y-2 gap-x-4 justify-center">
                            <label for="img" class="basis-full text-center">Kép feltöltése</label>
                            <input type="file" name="img" required>
                        </div>

                        <div class="flex flex-col flew-wrap gap-y-2">
                            <label for="name">Név</label>
                            <input type="text" name="name" required>
                            <label for="name">Kategória</label>
                            <input type="text" name="category" required>
                            <label for="name">Ár (Forint)</label>
                            <input type="number" name="price" required>
                        </div>
                        <button type="submit" class="rounded bg-lime-500 basis-full w-full mt-4 md:mt-6 p-2 md:px-6 md:py-4">
                            Mentés
                        </button>
                    </form>
                </div>    
            </div>
        </div>
    </div>
</x-admin-layout>
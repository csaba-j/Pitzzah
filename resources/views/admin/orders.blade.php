<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:max-w-7xl">
            <div class="p-2 sm:p-6 text-gray-900 shadow-lg flex flex-row flex-wrap gap-x-2 gap-y-4 justify-between">
                @foreach($orders as $order)
                <div class="border border-solid rounded p-4 basis-full">
                    <div class="flex flex-column flex-wrap gap-x-4">
                        <span class="basis-full font-bold">Megrendelő: {{$order->user_name}}</span>
                        <span class="basis-full font-bold">Telefon: {{$order->user_phone}}</span>
                        <span class="basis-full font-bold">Végösszeg: {{$order->total}} Ft</span>
                    </div>
                    <div class="flex flex-column flex-wrap gap-x-2">
                        <span class="basis-full font-bold">Tételek:</span>
                        @foreach($order->items as $item)
                        <span>{{$item['name']}} ({{$item['price']}} Ft/db, {{$item['amount']}} db)</span>
                        @endforeach
                    </div>
                    <div class="flex flex-column flex-wrap gap-x-2">
                        <span class="basis-full font-bold">Rendelési idő:</span> 
                        <span>{{$order->created_at}}</span>
                    </div>
                </div>
                @endforeach
                </div>    
            </div>
        </div>
    </div>
</x-admin-layout>
<x-layout>
    <x-slot:title>Homepage</x-slot:title>

    <section id="home" class="bg-blue-800 pt-28 px-44 flex justify-between py-12 items-center">
        <div>
            <h1 class="font-bold text-4xl text-white">Selamat datang di CarRent</h1>
        </div>
        <div>
            asdas
        </div>
    </section>
    <section id="mobil" class="flex flex-col gap-12 justify-center items-center py-5">
        <h1 class="font-bold text-3xl text-blue-800">MOBIL RENTAL</h1>
        <div class="grid grid-cols-3 gap-5 items-center justify-center ">
            @foreach ($cars as $item)
            <div class="bg-white flex flex-col justify-center items-center gap-4 py-4 rounded-md">
                <img src="{{asset('storage/' . $item->gambar)}}" alt="">
                <div class="flex flex-col justify-center gap-1 items-center">
                    <h1 class="text-2xl font-bold">{{ $item->model }}</h1>
                    <p class="text-sm font-semibold text-zinc-400">Tahun: {{$item->tahun}}</p>
                </div>
                <p class="font-semibold">Harga/2D: Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                <button class="bg-blue-500 px-4 py-1 rounded-md font-semibold text-white text-lg">
                    <a href="/home/booking">Booking sekarang</a>
                </button>
            </div>
            @endforeach
        </div>
    </section>
</x-layout>
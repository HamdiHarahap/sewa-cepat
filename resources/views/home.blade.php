<x-layout>
    <x-slot:title>Homepage</x-slot:title>

    <section id="home" class="bg-blue-800 pt-36 px-44 flex justify-between py-32 items-center text-white">
        <div>
            <h1 class="font-bold text-4xl">Selamat datang di SewaCepat</h1>
            <p class="text-lg font-semibold text-zinc-400">Menyediakan Mobil berkualitas dengan harga terjangkau <br> untuk semua kebutuhan perjalanan Anda.</p>
        </div>
        <img src="{{asset('assets/images/hero.png')}}" alt="" class="w-[30rem]">
    </section>
    <section id="tentang" class="bg-white px-44 py-20 flex flex-col items-center gap-10">
        <h1 class="font-bold text-3xl text-blue-800">TENTANG KAMI</h1>
        <div class="flex justify-between items-start gap-16 text-lg">
            <p class="font-semibold w-[55rem]">SewaCepat adalah layanan rental mobil andalan di Medan, Sumatera Utara. Kami menyediakan beragam kendaraan berkualitas untuk mendukung segala kebutuhan perjalanan Anda. Dengan tim layanan pelanggan yang profesional dan bersahabat, SewaCepat siap memberikan pengalaman sewa mobil yang praktis, nyaman, dan memuaskan bagi setiap pelanggan.</p>
            <div>
                <p class="mb-3">Kenapa Memilih Kami</p>
                <ul>
                    <li class="flex items-start gap-2">
                        <img src="{{asset('assets/icons/checklist.svg')}}" class="w-6">
                        <div><span class="font-bold">Harga Murah</span>: Kami menawarkan mobil dengan harga yang relatif murah, dan berbagai penawaran untuk pelanggan</div>
                    </li>
                    <li class="flex items-start gap-2">
                        <img src="{{asset('assets/icons/checklist.svg')}}" class="w-6">
                        <div><span class="font-bold">Kendaraan Bersih</span>: Kami selalu menjaga kebersihan mobil agar anda merasa nyaman</div>
                    </li>
                    <li class="flex items-start gap-2">
                        <img src="{{asset('assets/icons/checklist.svg')}}" class="w-6">
                        <div><span class="font-bold">Pemesanan Mudah</span>: Proses pemesanan yang mudah melalui form di website kami</div>
                    </li>
                    <li class="flex items-start gap-2">
                        <img src="{{asset('assets/icons/checklist.svg')}}" class="w-6">
                        <div><span class="font-bold">Pelayanan 24/7</span>: Kami siap melayani anda sepanjang waktu</div>
                    </li>
                </ul>
            </div>
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
    <section id="kontak" class="bg-white py-14 px-44 flex flex-col items-center gap-4">
        <h1 class="font-bold text-3xl text-blue-800">KONTAK KAMI</h1>
        <p class="text-center mb-7">Jika Anda memiliki pertanyaan umum atau membutuhkan informasi tambahan tentang layanan kami, silakan hubungi kami melalui email atau nomor telepon yang tercantum di atas. Kami akan dengan senang hati membantu Anda.</p>
        <form action="" class="flex flex-col gap-5 w-[45rem] shadow-2xl px-6 py-8 border-t-2 border-b-2 border-blue-800">
            <div class="flex justify-between items-center gap-10">
                <div class="flex flex-col w-full">
                    <label for="nama" class="font-bold">Nama</label>
                    <input type="text" name="nama" id="nama" class="border-2 border-zinc-400 outline-black px-3 py-2 rounded-md w-full">
                </div>
                <div class="flex flex-col w-full">
                    <label for="email" class="font-bold">Email</label>
                    <input type="email" name="email" id="email" class="border-2 border-zinc-400 outline-black px-3 py-2 rounded-md w-full">
                </div>
            </div>
            <div class="flex flex-col">
                <label for="subject" class="font-bold">Subject</label>
                <input type="text" name="subject" id="subject" class="border-2 border-zinc-400 outline-black px-3 py-2 rounded-md w-full">
            </div>
            <div class="flex flex-col">
                <label for="pesan" class="font-bold">Pesan</label>
                <textarea name="pesan" id="pesan" class="border-2 border-zinc-400 outline-black px-3 py-2 rounded-md w-full h-52"></textarea>
            </div>
            <button class="bg-blue-800 px-7 py-2 rounded-md w-fit text-white m-auto font-semibold">Kirim Pesan</button>
        </form>
    </section>
</x-layout>
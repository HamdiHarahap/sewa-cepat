<x-layout>
    <x-slot:title>ads</x-slot:title>
    
    <div class="px-44 py-20 flex flex-col justify-center items-center gap-8">
        <h1 class="font-bold text-3xl">FORM DATA PEMBOOKINGAN</h1>
        <form action="{{route('booking.post')}}" method="POST" class="flex flex-col items-center gap-5">
            @csrf
            <div class="grid grid-cols-2 gap-20">
                <div class="flex flex-col items-center gap-4 w-[30rem] border-2 border-black rounded-md px-4 py-5 bg-white">
                    <h3 class="font-semibold text-xl">Data Diri</h3>
                    <div class="w-full flex flex-col gap-2">
                        <div class="flex flex-col">
                            <label for="nama" class="font-semibold text-sm">Nama</label>
                            <input type="text" name="nama" id="nama" placeholder="Nama" class="outline-black border-2 bg-transparent px-2 py-1 rounded-md">
                        </div>
                        <div class="flex flex-col">
                            <label for="no_hp" class="font-semibold text-sm">No Hp</label>
                            <input type="text" name="no_hp" id="no_hp" placeholder="081234567890" class="outline-black border-2 bg-transparent px-2 py-1 rounded-md">
                        </div>
                        <div class="flex flex-col">
                            <label for="alamat" class="font-semibold text-sm">Alamat</label>
                            <textarea name="alamat" id="alamat" placeholder="Jl. Indonesia" class="outline-black border-2 bg-transparent px-2 py-1 rounded-md w-full h-24"></textarea>
                        </div>
                        <div class="flex flex-col">
                            <label for="no_ktp" class="font-semibold text-sm">No KTP</label>
                            <input type="number" name="no_ktp" id="no_ktp" placeholder="No KTP" class="outline-black border-2 bg-transparent px-2 py-1 rounded-md">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center gap-4 w-[30rem] border-2 border-black rounded-md px-4 py-5 bg-white">
                    <h3 class="font-semibold text-xl">Data Sewa</h3>
                    <div class="w-full flex flex-col gap-2">
                        <div class="flex flex-col">
                            <label for="model" class="font-semibold text-sm">Mobil Tersedia</label>
                            <select name="model" id="model" class="outline-black border-2 bg-transparent px-2 py-1 rounded-md">
                                @foreach ($cars as $item)
                                    <option value="{{$item->model}}">{{$item->model}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="tanggal_sewa" class="font-semibold text-sm">Tanggal Sewa</label>
                            <input type="date" name="tanggal_sewa" id="tanggal_sewa" placeholder="ads" class="outline-black border-2 bg-transparent px-2 py-1 rounded-md">
                        </div>
                        <div class="flex flex-col">
                            <label for="metode" class="font-semibold text-sm">Metode Pembayaran</label>
                            <select name="metode" id="metode" class="outline-black border-2 bg-transparent px-2 py-1 rounded-md">
                                <option value="debit">Debit</option>
                                <option value="cash">Cash</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button class="px-4 py-1 font-semibold text-lg rounded-md w-fit bg-blue-500 text-white">Submit Data</button>
        </form>
    </div>
</x-layout>
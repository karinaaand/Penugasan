@extends('layouts.main')
@section('container')
    <div class="shadow-lg rounded-lg p-6">
        <div class="flex justify-between">
            <h1>Discount <span class="italic text-xs">(opsional)</span></h1>
            <div class="w-1/2 flex justify-end gap-10">
                <div class="flex justify-between gap-3 items-center">
                    <input type="radio" name="type_discount" id="persen" checked>
                    <label class="font-bold text-xl" for="persen">%</label>
                    <input type="radio" name="type_discount" id="erpe">
                    <label class="font-bold text-xl" for="erpe">Rp</label>

                </div>
                <input type="text" name="discount" placeholder="Discount"
                    class="ring-1 ring-black rounded-md w-3/4 px-4 py-2" id="">
            </div>
        </div>
        <div class="flex justify-between gap-4 mt-6">
            <select class="w-4/5 ring-1 ring-black rounded-md px-4" name="" id="">
                <option value="">Obat1</option>
                <option value="">Obat1</option>
                <option value="">Obat1</option>
            </select>
            <input type="number" name="discount" placeholder="Jumlah" class="ring-1 ring-black rounded-md w-1/5 px-4 py-2"
                id="">
        </div>
        <div class="flex justify-center mt-6">
            <button class="hover:bg-indigo ring-1 ring-gray-400 py-2 px-64 w-max rounded-md">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2 14V2H0V0H3C3.26522 0 3.51957 0.105357 3.70711 0.292893C3.89464 0.48043 4 0.734784 4 1V13H16.438L18.438 5H6V3H19.72C19.872 3 20.022 3.03466 20.1586 3.10134C20.2952 3.16801 20.4148 3.26495 20.5083 3.38479C20.6019 3.50462 20.6668 3.6442 20.6983 3.79291C20.7298 3.94162 20.7269 4.09555 20.69 4.243L18.19 14.243C18.1358 14.4592 18.011 14.6512 17.8352 14.7883C17.6595 14.9255 17.4429 15 17.22 15H3C2.73478 15 2.48043 14.8946 2.29289 14.7071C2.10536 14.5196 2 14.2652 2 14ZM4 21C3.46957 21 2.96086 20.7893 2.58579 20.4142C2.21071 20.0391 2 19.5304 2 19C2 18.4696 2.21071 17.9609 2.58579 17.5858C2.96086 17.2107 3.46957 17 4 17C4.53043 17 5.03914 17.2107 5.41421 17.5858C5.78929 17.9609 6 18.4696 6 19C6 19.5304 5.78929 20.0391 5.41421 20.4142C5.03914 20.7893 4.53043 21 4 21ZM16 21C15.4696 21 14.9609 20.7893 14.5858 20.4142C14.2107 20.0391 14 19.5304 14 19C14 18.4696 14.2107 17.9609 14.5858 17.5858C14.9609 17.2107 15.4696 17 16 17C16.5304 17 17.0391 17.2107 17.4142 17.5858C17.7893 17.9609 18 18.4696 18 19C18 19.5304 17.7893 20.0391 17.4142 20.4142C17.0391 20.7893 16.5304 21 16 21Z"
                        fill="#262B43" fill-opacity="0.9" />
                </svg>
            </button>

        </div>
        <div class="w-full p-6">


            <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <th class="py-2">NO</th>
                    <th class="py-2">NAMA BARANG</th>
                    <th class="py-2">JUMLAH</th>
                    <th class="py-2">HARGA SATUAN</th>
                    <th class="py-2">SUBTOTAL</th>
                    <th class="py-2">ACTION</th>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 10; $i++)
                    <tr>
                        <td class="text-center">1</td>
                        <td>Gatau Obat Apa</td>
                        <td class="text-center">Rp 10.000</td>
                        <td class="text-center">Rp 10.000</td>
                        <td class="text-center">Rp 10.000</td>
                        <td class="flex justify-center py-3"><a href="{{ route('transaction.show', 1) }}"
                                class="bg-pink-500 hover:bg-pink-700 p-1 rounded-md"><svg width="17" height="17" viewBox="0 0 17 17" fill="white" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.792 3.50008H16.9587V5.16675H15.292V16.0001C15.292 16.2211 15.2042 16.4331 15.0479 16.5893C14.8916 16.7456 14.6797 16.8334 14.4587 16.8334H2.79199C2.57098 16.8334 2.35902 16.7456 2.20274 16.5893C2.04646 16.4331 1.95866 16.2211 1.95866 16.0001V5.16675H0.291992V3.50008H4.45866V1.00008C4.45866 0.779068 4.54646 0.567106 4.70274 0.410826C4.85902 0.254545 5.07098 0.166748 5.29199 0.166748H11.9587C12.1797 0.166748 12.3916 0.254545 12.5479 0.410826C12.7042 0.567106 12.792 0.779068 12.792 1.00008V3.50008ZM13.6253 5.16675H3.62533V15.1667H13.6253V5.16675ZM6.12533 1.83341V3.50008H11.1253V1.83341H6.12533Z" fill="white"/>
                                    </svg>

                            </a></td>
                    </tr>

                    @endfor
                </tbody>
            </table>
            <h1 class="text-end mt-6">Total Harga : 99.000</h1>
            <a href="{{ route('transaction.show', 1) }}"
                class="bg-lavender rounded-xl hover:bg-lavender-700 py-2 w-full text-white font-bold mt-6 text-center inline-block">
                Checkout
            </a>

        </div>
    </div>
@endsection

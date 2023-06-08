@foreach ($bookings as $item)
    <!-- Modal -->
    <div class="modal fade" id="modalEdit{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" role="dialog" style="overflow-y: auto;">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="staticBackdropLabel">Edit Transaksi Booking Cuci</h3>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('transaction-customer.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="kategori_mobil_id" class="form-label">Kategori Mobil ID</label>
                            <select class="custom-select kategori-mobil" id="kategori_mobil_id"
                                name="kategori_mobil_id">
                                @foreach ($kategori_mobils as $kategori_mobil)
                                    <option value="{{ $kategori_mobil->id }}"
                                        {{ $item->kategori_mobil_id == $kategori_mobil->id ? 'selected' : '' }}>
                                        {{ $kategori_mobil->kategori_mobil }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="produk_id" class="form-label">Produk ID</label>
                            <select class="custom-select produk-id" id="produk_id" name="produk_id">
                                @foreach ($produks as $produk)
                                    <option value="{{ $produk->id }}"
                                        {{ $item->produk_id == $produk->id ? 'selected' : '' }}>
                                        {{ $produk->kategoriMobil->kategori_mobil }} || {{ $produk->nama_produk }} ||
                                        Rp.
                                        {{ number_format($produk->harga_produk) }}
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Nama Pemesan</label>
                            <select class="custom-select" id="user_id" name="user_id">
                                <option value="{{ $item->user->id }}">
                                    {{ $item->user->name }}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="no_telp_pemesan" class="form-label">Nomor Telepon Pemesan</label>
                            <input type="text" class="form-control" id="no_telp_pemesan" name="no_telp_pemesan"
                                value="{{ $item->no_telp_pemesan }}">
                        </div>

                        <div class="mb-3">
                            <label for="nama_mobil" class="form-label">Nama Mobil</label>
                            <input type="text" class="form-control" id="nama_mobil" name="nama_mobil"
                                value="{{ $item->nama_mobil }}">
                        </div>

                        <div class="mb-3">
                            <label for="no_plat_mobil" class="form-label">Nomor Plat Mobil</label>
                            <input type="text" class="form-control" id="no_plat_mobil" name="no_plat_mobil"
                                value="{{ $item->no_plat_mobil }}">
                        </div>

                        {{-- <div class="mb-3">
                            <label for="tanggal_pesan" class="form-label">Tanggal Pesan</label>
                            <input type="date" class="form-control" id="tanggal_pesan" name="tanggal_pesan"
                                value="{{ $item->tanggal_pesan }}">
                        </div>

                        <div class="mb-3">
                            <label for="jam_pesan" class="form-label">Jam Pesan</label>
                            <input type="time" class="form-control" id="jam_pesan" name="jam_pesan"
                                value="{{ $item->jam_pesan }}">
                        </div>
                        <div class="mb-3">
                            <label for="status_bayar" class="form-label">Status Bayar</label>
                            <select class="custom-select" id="status_bayar" name="status_bayar">
                                <option value="UNPAID" @if ($item->status_bayar == 'UNPAID') selected @endif>
                                    Menunggu Pembayaran</option>
                                <option value="PAID" @if ($item->status_bayar == 'PAID') selected @endif>
                                    Sudah Dibayar</option>
                            </select>
                        </div> --}}

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach



@push('style')
    {{-- <style>
        .modal-dialog-scrollable {
            max-height: 70vh;
            /* Atur tinggi maksimal modal di sini */
            overflow-y: auto;
            /* Aktifkan overflow-y untuk memunculkan scrollbar jika konten melampaui tinggi maksimal */
        }
    </style> --}}

    <style>
        .custom-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.375rem 1.75rem 0.375rem 0.75rem;
        }

        .custom-select:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }

        .custom-select:disabled {
            background-color: #e9ecef;
            opacity: 1;
        }
    </style>
@endpush

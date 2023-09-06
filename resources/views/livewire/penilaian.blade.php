<div class="container">
    <div class="columns my-0">
        <div class="column my-0">
            <a href="{{ route('penilaian.create') }}"
                class="button is-primary is-fullwidth has-text-weight-bold is-small">
                Tambah Data Penilaian
            </a>
        </div>
        <div class="column my-0">
            <button data-target="modal" aria-haspopup="true" id="modalCetakButton"
                class="button is-info is-fullwidth has-text-weight-bold is-small modal-button">
                Cetak Data Penilaian
            </button>
            <div class="modal" id="modalCetak" wire:ignore>
                <div class="modal-background"></div>
                <form action="{{ route('penilaian.cetak.date') }}" method="post">
                    @csrf
                    <div class="modal-content">
                        <header class="modal-card-head">
                            <p class="modal-card-title has-text-weight-bold">Cetak Laporan Penilaian</p>
                            <button type="button" class="delete" aria-label="Tutup"></button>
                        </header>
                        <section class="modal-card-body">
                            <div class="field">
                                <label for="dari" class="label has-text-weight-bold">Dari</label>
                                <div class="control @error('dari') has-icons-left @enderror">
                                    <input type="date" class="input @error('dari') is-danger @enderror"
                                        id="dari" name="dari">
                                    @error('dari')
                                        <span class="icon is-small is-right has-text-danger">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                        <span class="has-text-weight-bold has-text-danger">
                                            * {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label for="sampai" class="label has-text-weight-bold">Sampai</label>
                                <div class="control @error('sampai') has-icons-left @enderror">
                                    <input type="date" class="input @error('sampai') is-danger @enderror"
                                        id="sampai" name="sampai">
                                    @error('sampai')
                                        <span class="icon is-small is-right has-text-danger">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                        <span class="has-text-weight-bold has-text-danger">
                                            * {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </section>
                        <footer class="modal-card-foot">
                            <button type="submit" class="button is-success">Cetak</button>
                        </footer>
                    </div>
                </form>
                <button class="modal-close is-large" aria-label="close"></button>
            </div>
        </div>
        <div class="column my-0">
            <input class="input is-default is-small" type="text" placeholder="Pencarian" wire:model='search'>
        </div>
    </div>
    <div class="columns">
        <div class="column">
            @if (session()->has('message'))
                <div class="notification is-{{ session('color') }} has-text-weight-bold peringatan">
                    {{ session('message') }}
                </div>
            @endif
            <table class="table is-fullwidth is-bordered">
                <thead>
                    <tr>
                        <th class="is-dark">#</th>
                        <th class="is-dark">Nama Nasabah</th>
                        <th class="is-dark">Kode Rumah</th>
                        <th class="is-dark">Hasil Penilaian</th>
                        <th class="is-dark">Status</th>
                        <th class="is-dark">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penilaian as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->nasabah->nama }}</td>
                            <td>{{ $item->rumah->rumah_code }}</td>
                            <td>WP : {{ $item->nilai_wp }}
                                | MFEP : {{ $item->nilai_mfep }}
                                | Result : {{ 0.6 * $item->nilai_wp + 0.4 * $item->nilai_mfep }}
                            </td>
                            <td>{{ $item->status ? 'Lolos Kelayakan' : 'Tidak Lolos Kelayakan' }}</td>
                            <td class="has-text-centered">
                                <a class="button is-warning is-small has-text-weight-bold"
                                    href="{{ route('penilaian.show', ['penilaian' => $item->id]) }}">
                                    Lihat
                                </a>
                                <a href="{{ route('penilaian.cetak', ['id' => $item->id]) }}" target="__blank"
                                    class="button is-info is-small has-text-weight-bold">
                                    Cetak
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="has-text-centered">
                                <h1 class="has-text-weight-bold is-size-3">Data Kosong</h1>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="columns">
        <div class="column is-desktop-12">
            {{ $penilaian->links('layouts.pagination_livewire') }}
        </div>
    </div>
    @push('custom-js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Ambil elemen modal dan tombol untuk membukanya
                var modal = document.getElementById('modalCetak');
                var openModalButton = document.getElementById('modalCetakButton');

                // Fungsi untuk membuka modal
                function openModal() {
                    modal.classList.add('is-active');
                }

                // Fungsi untuk menutup modal
                function closeModal() {
                    modal.classList.remove('is-active');
                }

                // Mengaitkan fungsi dengan tombol dan elemen modal
                openModalButton.addEventListener('click', openModal);
                modal.querySelector('.delete').addEventListener('click', closeModal);
            });
        </script>
    @endpush
</div>

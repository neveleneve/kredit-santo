<div class="container">
    <div class="columns my-0">
        <div class="column my-0">
            <a href="{{ route('penilaian.create') }}"
                class="button is-primary is-fullwidth has-text-weight-bold is-small">
                Tambah Data Penilaian
            </a>
        </div>
        <div class="column is-4-desktop is-offset-4-desktop is-12-mobile my-0">
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
</div>

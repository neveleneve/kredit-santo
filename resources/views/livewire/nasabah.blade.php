<div class="container">
    <div class="columns is-4-desktop is-12-mobile">
        <div class="column is-4-desktop is-12-mobile">
            <a href="{{ route('nasabah.create') }}" class="button is-primary is-fullwidth has-text-weight-bold is-small">
                Tambah Data Nasabah
            </a>
        </div>
        <div class="column is-4-desktop is-offset-4-desktop is-12-mobile">
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
            <table class="table is-fullwidth is-bordered has-text-centered">
                <thead>
                    <tr>
                        <th class="is-dark has-text-centered">#</th>
                        <th class="is-dark has-text-centered">Nama</th>
                        <th class="is-dark has-text-centered">NIK</th>
                        <th class="is-dark has-text-centered">Alamat</th>
                        <th class="is-dark has-text-centered">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($nasabah as $item)
                        <tr>
                            <td>{{ ($nasabah->currentPage() - 1) * $nasabah->perPage() + $loop->index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->detailNasabah->nik }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td class="has-text-centered">
                                <a class="button is-primary is-small has-text-weight-bold"
                                    href="{{ route('nasabah.edit', ['nasabah' => $item->id]) }}">
                                    Edit
                                </a>
                                <a class="button is-danger is-small has-text-weight-bold">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="has-text-centered">
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
            {{ $nasabah->links('layouts.pagination_livewire') }}
        </div>
    </div>
</div>

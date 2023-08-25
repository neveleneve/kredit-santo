<div class="container">
    <div class="columns my-0">
        <div class="column my-0">
            <a href="{{ route('nasabah.create') }}" class="button is-primary is-fullwidth has-text-weight-bold is-small">
                Tambah Data Nasabah
            </a>
        </div>
        <div class="column is-4-desktop is-offset-4-desktop is-12-mobile my-0">
            <input class="input is-default is-small" type="text" placeholder="Pencarian" wire:model='search'>
        </div>
    </div>
    <div class="columns">
        <div class="column">
            @if (session()->has('message'))
                <div class="notification is-{{ session('color') }} has-text-weight-bold">
                    {{ session('message') }}
                </div>
            @endif
            <table class="table is-fullwidth is-bordered has-text-centered">
                <thead>
                    <tr>
                        <th class="is-dark has-text-centered">#</th>
                        <th class="is-dark has-text-centered">Nama</th>
                        <th class="is-dark has-text-centered">No. KK</th>
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
                            <td>{{ $item->detailNasabah->no_kk }}</td>
                            <td>{{ $item->detailNasabah->nik }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td class="has-text-centered">
                                <form action="{{ route('nasabah.destroy', ['nasabah' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="button is-primary is-small has-text-weight-bold"
                                        href="{{ route('nasabah.edit', ['nasabah' => $item->id]) }}">
                                        Edit
                                    </a>
                                    <button type="submit" class="button is-danger is-small has-text-weight-bold"
                                        onclick="return confirm('Hapus data nasabah {{ $item->nama }}?')">
                                        Hapus
                                    </button>
                                </form>
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
            {{ $nasabah->links('layouts.pagination_livewire') }}
        </div>
    </div>
</div>

<div class="container">
    <div class="columns my-0">
        <div class="column is-4-desktop is-12-mobile my-0">
            <a class="button is-primary is-fullwidth has-text-weight-bold is-small" href="{{ route('rumah.create') }}">
                Tambah Data Rumah
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
            <div class="table-container">
                <table class="table is-fullwidth is-bordered has-text-centered">
                    <thead>
                        <tr>
                            <th class="is-dark has-text-centered">#</th>
                            <th class="is-dark has-text-centered">Nama</th>
                            <th class="is-dark has-text-centered">Kode Rumah</th>
                            <th class="is-dark has-text-centered">Tipe</th>
                            <th class="is-dark has-text-centered">Harga</th>
                            <th class="is-dark has-text-centered">Status</th>
                            <th class="is-dark has-text-centered">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rumah as $item)
                            <tr>
                                <td>{{ ($rumah->currentPage() - 1) * $rumah->perPage() + $loop->index + 1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->rumah_code }}</td>
                                <td>{{ $item->tipe_rumah }}</td>
                                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        Terjual
                                    @elseif ($item->status == 1)
                                        Dalam Penawaran
                                    @elseif ($item->status == 2)
                                        Tersedia
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('rumah.destroy', ['rumah' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="button is-info is-small has-text-weight-bold"
                                            href="{{ route('rumah.edit', ['rumah' => $item->id]) }}">
                                            Edit
                                        </a>
                                        <button type="submit" class="button is-danger is-small has-text-weight-bold"
                                            onclick="return confirm('Hapus data rumah \'{{ $item->rumah_code }}\'?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="has-text-centered">
                                    <h1 class="has-text-weight-bold is-size-3">Data Kosong</h1>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="columns">
        <div class="column is-desktop-12">
            {{ $rumah->links('layouts.pagination_livewire') }}
        </div>
    </div>
</div>

<div>
    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label" for="nama">Nama Nasabah</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Nama Nasabah" id="nama" name="nama">
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="kelamin">Jenis Kelamin</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select id="kelamin" name="kelamin">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="kawin">Status Pernikahan</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select id="kawin" name="kawin" wire:model='statusnikah'>
                            <option value="">Pilih Status Pernikahan</option>
                            <option value="belum kawin">Belum Kawin</option>
                            <option value="kawin">Kawin</option>
                            <option value="cerai hidup">Cerai Hidup</option>
                            <option value="cerai mati">Cerai Mati</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- nik, ktp, kk --}}
    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label" for="nik">Nomor NIK</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Nomor NIK" id="nik" name="nik">
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="ktp">Gambar Kartu Tanda Penduduk</label>
                <div class="control">
                    <div class="file is-primary">
                        <label class="file-label">
                            <input class="file-input" type="file" name="ktp" id="ktp">
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Pilih file…
                                </span>
                            </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="kk">Gambar Kartu Keluarga</label>
                <div class="control">
                    <div class="file is-primary">
                        <label class="file-label">
                            <input class="file-input" type="file" name="kk" id="kk">
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Pilih file…
                                </span>
                            </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- tempat, tanggal lahir, usia, no hp --}}
    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label" for="tempat_lahir">Tempat Lahir</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Tempat Lahir" id="tempat_lahir"
                        name="tempat_lahir">
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="tanggal_lahir">Tanggal Lahir</label>
                <div class="control">
                    <input class="input" type="date" placeholder="Tanggal Lahir" id="tanggal_lahir"
                        name="tanggal_lahir">
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="usia">Usia</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Usia" id="usia" name="usia" readonly>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="kontak">Kontak</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Kontak" id="kontak" name="kontak">
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h3 class="has-text-weight-bold has-text-centered">Alamat Nasabah</h3>
    <hr>
    {{-- alamat --}}
    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label" for="alamat">Alamat</label>
                <div class="control">
                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="textarea"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label" for="kecamatan">Kecamatan</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select id="kecamatan" name="kecamatan" wire:model='kecamatan'>
                            <option value="">Pilih Kecamatan</option>
                            @foreach ($datakecamatan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="kelurahan">Kelurahan</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select id="kelurahan" name="kelurahan" wire:model='kelurahan'
                            {{ $kecamatan == '' || $kecamatan == null ? 'disabled' : null }}>
                            <option value="">
                                Pilih Kelurahan
                            </option>
                            @foreach ($datakelurahan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

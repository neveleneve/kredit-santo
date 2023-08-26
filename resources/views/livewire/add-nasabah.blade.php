<div>
    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label" for="nama">Nama Nasabah <span class="has-text-danger">*</span></label>
                <div class="control @error('nama') has-icons-left @enderror">
                    <input class="input @error('nama') is-danger @enderror" type="text" placeholder="Nama Nasabah"
                        id="nama" name="nama" value="{{ old('nama') }}">
                    @error('nama')
                        <span class="icon is-small is-right has-text-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="has-text-weight-bold has-text-danger">
                            * {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="kelamin">Jenis Kelamin <span class="has-text-danger">*</span></label>
                <div class="control @error('kelamin') has-icons-left @enderror">
                    <div class="select is-fullwidth @error('kelamin') is-danger @enderror">
                        <select id="kelamin" name="kelamin">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="laki-laki" {{ old('kelamin') == 'laki-laki' ? 'selected' : null }}>
                                Laki-laki
                            </option>
                            <option value="perempuan" {{ old('kelamin') == 'perempuan' ? 'selected' : null }}>
                                Perempuan
                            </option>
                        </select>
                        @error('kelamin')
                            <span class="icon is-small is-right has-text-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <span class="has-text-weight-bold has-text-danger">
                                * {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="kawin">Status Pernikahan <span class="has-text-danger">*</span></label>
                <div class="control @error('kawin') has-icons-left @enderror">
                    <div class="select is-fullwidth @error('kawin') is-danger @enderror">
                        <select id="kawin" name="kawin" wire:model='statusnikah'>
                            <option value="">Pilih Status Pernikahan</option>
                            <option value="belum kawin" {{ old('kawin') == 'belum kawin' ? 'selected' : null }}>
                                Belum Kawin
                            </option>
                            <option value="kawin" {{ old('kawin') == 'kawin' ? 'selected' : null }}>
                                Kawin
                            </option>
                            <option value="cerai hidup" {{ old('kawin') == 'cerai hidup' ? 'selected' : null }}>
                                Cerai Hidup
                            </option>
                            <option value="cerai mati" {{ old('kawin') == 'cerai mati' ? 'selected' : null }}>
                                Cerai Mati
                            </option>
                        </select>
                        @error('kawin')
                            <span class="icon is-small is-right has-text-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <span class="has-text-weight-bold has-text-danger">
                                * {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- nik, no_kk, ktp, kk --}}
    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label" for="nik">Nomor NIK <span class="has-text-danger">*</span></label>
                <div class="control @error('nik') has-icons-left @enderror">
                    <input class="input @error('nik') is-danger @enderror" type="text" placeholder="Nomor NIK"
                        id="nik" name="nik" value="{{ old('nik') }}">
                    @error('nik')
                        <span class="icon is-small is-right has-text-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="has-text-weight-bold has-text-danger">
                            * {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="ktp">Gambar Kartu Tanda Penduduk <span
                        class="has-text-danger">*</span></label>
                <div class="control">
                    <div class="file @error('ktp') is-danger @else is-primary @enderror">
                        <label class="file-label">
                            <input class="file-input" type="file" name="ktp" id="ktp"
                                accept="image/png, image/jpeg">
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Pilih file… (Maks. 1 MB)
                                </span>
                            </span>
                        </label>
                    </div>
                    @error('ktp')
                        <span class="has-text-weight-bold has-text-danger">
                            * {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="no_kk">Nomor KK <span class="has-text-danger">*</span></label>
                <div class="control @error('no_kk') has-icons-left @enderror">
                    <input class="input @error('no_kk') is-danger @enderror" type="text" placeholder="Nomor KK"
                        id="no_kk" name="no_kk" value="{{ old('no_kk') }}">
                    @error('no_kk')
                        <span class="icon is-small is-right has-text-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="has-text-weight-bold has-text-danger">
                            * {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="kk">Gambar Kartu Keluarga <span
                        class="has-text-danger">*</span></label>
                <div class="control">
                    <div class="file @error('kk') is-danger @else is-primary @enderror">
                        <label class="file-label">
                            <input class="file-input" type="file" name="kk" id="kk"
                                accept="image/png, image/jpeg">
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Pilih file… (Maks. 1 MB)
                                </span>
                            </span>
                        </label>
                    </div>
                    @error('kk')
                        <span class="has-text-weight-bold has-text-danger">
                            * {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    {{-- tempat, tanggal lahir, usia, no hp --}}
    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label" for="tempat_lahir">Tempat Lahir <span class="has-text-danger">*</span></label>
                <div class="control @error('tempat_lahir') has-icons-left @enderror">
                    <input class="input @error('tempat_lahir') is-danger @enderror" type="text"
                        placeholder="Tempat Lahir" id="tempat_lahir" name="tempat_lahir"
                        value="{{ old('tempat_lahir') }}">
                    @error('tempat_lahir')
                        <span class="icon is-small is-right has-text-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="has-text-weight-bold has-text-danger">
                            * {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="tanggal_lahir">Tanggal Lahir <span
                        class="has-text-danger">*</span></label>
                <div class="control @error('tanggal_lahir') has-icons-left @enderror">
                    <input class="input @error('tanggal_lahir') is-danger @enderror" type="date"
                        placeholder="Tanggal Lahir" id="tanggal_lahir" name="tanggal_lahir"
                        wire:model='tanggallahir' wire:change='usiaCount'>
                    @error('tanggal_lahir')
                        <span class="icon is-small is-right has-text-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="has-text-weight-bold has-text-danger">
                            * {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="usia">Usia <span class="has-text-danger">*</span></label>
                <div class="control @error('usia') has-icons-left @enderror">
                    <input class="input @error('usia') is-danger @enderror" type="text" placeholder="Usia"
                        id="usia" name="usia" wire:model='usia' readonly>
                    @error('usia')
                        <span class="icon is-small is-right has-text-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="has-text-weight-bold has-text-danger">
                            * {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="kontak">Kontak <span class="has-text-danger">*</span></label>
                <div class="control @error('kontak') has-icons-left @enderror">
                    <input class="input @error('kontak') is-danger @enderror" type="text" placeholder="Kontak"
                        id="kontak" name="kontak" value="{{ old('kontak') }}">
                    @error('kontak')
                        <span class="icon is-small is-right has-text-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="has-text-weight-bold has-text-danger">
                            * {{ $message }}
                        </span>
                    @enderror
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
                <label class="label" for="alamat">Alamat <span class="has-text-danger">*</span></label>
                <div class="control">
                    <textarea name="alamat" id="alamat" cols="30" rows="10"
                        class="textarea @error('alamat') is-danger @enderror" placeholder="Alamat">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <span class="has-text-weight-bold has-text-danger">
                            * {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label" for="kecamatan">Kecamatan <span class="has-text-danger">*</span></label>
                <div class="control @error('kecamatan') has-icons-left @enderror">
                    <div class="select is-fullwidth @error('kecamatan') is-danger @enderror">
                        <select id="kecamatan" name="kecamatan" wire:model='kecamatan'>
                            <option value=""
                                {{ old('kecamatan') == '' || old('kecamatan') == null ? 'selected' : null }}>
                                Pilih Kecamatan
                            </option>
                            @foreach ($datakecamatan as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('kecamatan') == $item->id ? 'selected' : null }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('kecamatan')
                        <span class="icon is-small is-right has-text-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="has-text-weight-bold has-text-danger">
                            * {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="kelurahan">Kelurahan <span class="has-text-danger">*</span></label>
                <div class="control @error('kelurahan') has-icons-left @enderror">
                    <div class="select is-fullwidth  @error('kelurahan') is-danger @enderror">
                        <select id="kelurahan" name="kelurahan" wire:model='kelurahan'
                            {{ $kecamatan == '' || $kecamatan == null ? 'disabled' : null }}>
                            <option value=""
                                {{ old('kelurahan') == '' || old('kelurahan') == null ? 'selected' : null }}>
                                Pilih Kelurahan
                            </option>
                            @foreach ($datakelurahan as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('kelurahan') == $item->id ? 'selected' : null }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('kelurahan')
                        <span class="icon is-small is-right has-text-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="has-text-weight-bold has-text-danger">
                            * {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h3 class="has-text-weight-bold has-text-centered">Data Pekerjaan</h3>
    <hr>
    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label" for="pekerjaan">Pekerjaan <span class="has-text-danger">*</span></label>
                <div class="control @error('pekerjaan') has-icons-left @enderror">
                    <div class="select is-fullwidth @error('pekerjaan') is-danger @enderror">
                        {{-- jaminan (c4 wp) --}}
                        <select id="pekerjaan" name="pekerjaan">
                            <option value=""
                                {{ old('pekerjaan') == '' || old('pekerjaan') == null ? 'selected' : null }}>
                                Pilih Pekerjaan
                            </option>
                            <option value="100" {{ old('pekerjaan') == 100 ? 'selected' : null }}>
                                Aparatur Sipil Negara / Tentara
                            </option>
                            <option value="75" {{ old('pekerjaan') == 75 ? 'selected' : null }}>
                                Pengusaha / Wiraswasta
                            </option>
                            <option value="50" {{ old('pekerjaan') == 50 ? 'selected' : null }}>
                                Karyawan Swasta (Tetap)
                            </option>
                            <option value="20" {{ old('pekerjaan') == 20 ? 'selected' : null }}>
                                Karyawan Swasta (Lepas)
                            </option>
                            <option value="0" {{ old('pekerjaan') == 0 ? 'selected' : null }}>
                                Tidak Bekerja
                            </option>
                        </select>
                    </div>
                    @error('pekerjaan')
                        <span class="icon is-small is-right has-text-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="has-text-weight-bold has-text-danger">
                            * {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="gaji">Rentang Gaji / Pemasukan <span
                        class="has-text-danger">*</span></label>
                <div class="control @error('gaji') has-icons-left @enderror">
                    <div class="select is-fullwidth @error('gaji') is-danger @enderror">
                        {{-- kemampuan (c3 wp) --}}
                        <select id="gaji" name="gaji">
                            <option value="" {{ old('gaji') == '' || old('gaji') == null ? 'selected' : null }}>
                                Pilih Rentang Gaji / Pemasukan
                            </option>
                            <option value="30" {{ old('gaji') == 30 ? 'selected' : null }}>
                                Dibawah Rp 2.000.000
                            </option>
                            <option value="50" {{ old('gaji') == 50 ? 'selected' : null }}>
                                Rp 2.000.000 - Rp 3.499.000
                            </option>
                            <option value="60" {{ old('gaji') == 60 ? 'selected' : null }}>
                                Rp 3.500.000 - Rp 4.999.000
                            </option>
                            <option value="80" {{ old('gaji') == 80 ? 'selected' : null }}>
                                Rp 5.000.000 - Rp 7.000.000
                            </option>
                            <option value="100" {{ old('gaji') == 100 ? 'selected' : null }}>
                                Diatas Rp 7.000.000
                            </option>
                        </select>
                    </div>
                    @error('gaji')
                        <span class="icon is-small is-right has-text-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="has-text-weight-bold has-text-danger">
                            * {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="tanggungan">Jumlah Tanggungan <span
                        class="has-text-danger">*</span></label>
                <div class="control @error('tanggungan') has-icons-left @enderror">
                    <div class="select is-fullwidth @error('tanggungan') is-danger @enderror">
                        {{-- kondisi (c5 wp) --}}
                        <select id="tanggungan" name="tanggungan">
                            <option value=""
                                {{ old('tanggungan') == '' || old('tanggungan') == null ? 'selected' : null }}>
                                Pilih Jumlah Tanggungan
                            </option>
                            <option value="100" {{ old('tanggungan') == 100 ? 'selected' : null }}>
                                Tidak ada tanggungan
                            </option>
                            <option value="80" {{ old('tanggungan') == 80 ? 'selected' : null }}>1 Orang</option>
                            <option value="60" {{ old('tanggungan') == 60 ? 'selected' : null }}>2 Orang</option>
                            <option value="40" {{ old('tanggungan') == 40 ? 'selected' : null }}>3 Orang</option>
                            <option value="20" {{ old('tanggungan') == 20 ? 'selected' : null }}>
                                Lebih dari 3 Orang
                            </option>
                        </select>
                    </div>
                    @error('tanggungan')
                        <span class="icon is-small is-right has-text-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="has-text-weight-bold has-text-danger">
                            * {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <hr>
    @if ($statusnikah == 'kawin' && $statusnikah != '')
        {{-- data pasangan --}}
        <h3 class="has-text-weight-bold has-text-centered">Data Pasangan</h3>
        <hr>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label" for="nama_pasangan">Nama Pasangan <span
                            class="has-text-danger">*</span></label>
                    <div class="control @error('nama_pasangan') has-icons-left @enderror">
                        <input class="input @error('nama_pasangan') is-danger @enderror" type="text"
                            placeholder="Nama Pasangan" id="nama_pasangan" name="nama_pasangan"
                            value="{{ old('nama_pasangan') }}">
                        @error('nama_pasangan')
                            <span class="icon is-small is-right has-text-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <span class="has-text-weight-bold has-text-danger">
                                * {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label" for="nik_pasangan">NIK Pasangan <span
                            class="has-text-danger">*</span></label>
                    <div class="control @error('nik_pasangan') has-icons-left @enderror">
                        <input class="input @error('nik_pasangan') is-danger @enderror" type="text"
                            placeholder="NIK Pasangan" id="nik_pasangan" name="nik_pasangan"
                            value="{{ old('nik_pasangan') }}">
                        @error('nik_pasangan')
                            <span class="icon is-small is-right has-text-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <span class="has-text-weight-bold has-text-danger">
                                * {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label" for="pekerjaan_pasangan">Pekerjaan Pasangan <span
                            class="has-text-danger">*</span></label>
                    <div class="control @error('pekerjaan_pasangan') has-icons-left @enderror">
                        <input class="input @error('pekerjaan_pasangan') is-danger @enderror" type="text"
                            placeholder="Pekerjaan Pasangan" id="pekerjaan_pasangan" name="pekerjaan_pasangan"
                            value="{{ old('pekerjaan_pasangan') }}">
                        @error('pekerjaan_pasangan')
                            <span class="icon is-small is-right has-text-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <span class="has-text-weight-bold has-text-danger">
                                * {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label" for="kontak_pasangan">Kontak <span class="has-text-danger">*</span></label>
                    <div class="control @error('kontak_pasangan') has-icons-left @enderror">
                        <input class="input @error('kontak_pasangan') is-danger @enderror" type="text"
                            placeholder="Kontak Pasangan" id="kontak_pasangan" name="kontak_pasangan"
                            value="{{ old('kontak_pasangan') }}">
                        @error('kontak_pasangan')
                            <span class="icon is-small is-right has-text-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <span class="has-text-weight-bold has-text-danger">
                                * {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @elseif ($statusnikah != 'kawin' && $statusnikah != '')
        {{-- data penjamin --}}
        <h3 class="has-text-weight-bold has-text-centered">Data Penjamin</h3>
        <hr>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label" for="hubungan_penjamin">Hubungan Penjamin <span
                            class="has-text-danger">*</span></label>
                    <div class="control @error('hubungan_penjamin') has-icons-left @enderror">
                        <div class="select is-fullwidth @error('hubungan_penjamin') is-danger @enderror">
                            <select id="hubungan_penjamin" name="hubungan_penjamin">
                                <option value=""
                                    {{ old('hubungan_penjamin') == '' || old('hubungan_penjamin') == null ? 'selected' : null }}>
                                    Pilih Hubungan Penjamin
                                </option>
                                <option value="ayah" {{ old('hubungan_penjamin') == 'ayah' ? 'selected' : null }}>
                                    Ayah
                                </option>
                                <option value="ibu" {{ old('hubungan_penjamin') == 'ibu' ? 'selected' : null }}>
                                    Ibu
                                </option>
                                <option value="saudara"
                                    {{ old('hubungan_penjamin') == 'saudara' ? 'selected' : null }}>
                                    Saudara
                                </option>
                                <option value="lainnya"
                                    {{ old('hubungan_penjamin') == 'lainnya' ? 'selected' : null }}>
                                    Lainnya
                                </option>
                            </select>
                        </div>
                        @error('hubungan_penjamin')
                            <span class="icon is-small is-right has-text-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <span class="has-text-weight-bold has-text-danger">
                                * {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label" for="nama_penjamin">Nama Penjamin <span
                            class="has-text-danger">*</span></label>
                    <div class="control @error('nama_penjamin') has-icons-left @enderror">
                        <input class="input @error('nama_penjamin') is-danger @enderror" type="text"
                            placeholder="Nama Penjamin" id="nama_penjamin" name="nama_penjamin"
                            value="{{ old('nama_penjamin') }}">
                        @error('nama_penjamin')
                            <span class="icon is-small is-right has-text-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <span class="has-text-weight-bold has-text-danger">
                                * {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label" for="kontak_penjamin">Kontak <span class="has-text-danger">*</span></label>
                    <div class="control @error('kontak_penjamin') has-icons-left @enderror">
                        <input class="input @error('kontak_penjamin') is-danger @enderror" type="text"
                            placeholder="Kontak Penjamin" id="kontak_penjamin" name="kontak_penjamin"
                            value="{{ old('kontak_penjamin') }}">
                        @error('kontak_penjamin')
                            <span class="icon is-small is-right has-text-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <span class="has-text-weight-bold has-text-danger">
                                * {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label" for="alamat_penjamin">Alamat <span class="has-text-danger">*</span></label>
                    <div class="control">
                        <textarea name="alamat_penjamin" id="alamat_penjamin" cols="30" rows="10"
                            class="textarea @error('alamat_penjamin') is-danger @enderror" placeholder="Alamat Penjamin Nasabah">{{ old('alamat_penjamin') }}</textarea>
                        @error('alamat_penjamin')
                            <span class="has-text-weight-bold has-text-danger">
                                * {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @endif
</div>

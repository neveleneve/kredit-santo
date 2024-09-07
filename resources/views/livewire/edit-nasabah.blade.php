<div>
    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label" for="nama">Nama Nasabah <span class="has-text-danger">*</span></label>
                <div class="control @error('nama') has-icons-left @enderror">
                    <input class="input @error('nama') is-danger @enderror" type="text" placeholder="Nama Nasabah"
                        id="nama" name="nama" value="{{ $datanasabah->nama }}">
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
                            <option value="laki-laki"
                                {{ $datanasabah->detailNasabah->jenis_kelamin == 'laki-laki' ? 'selected' : null }}>
                                Laki-laki
                            </option>
                            <option value="perempuan"
                                {{ $datanasabah->jenis_kelamin == 'perempuan' ? 'selected' : null }}>
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
                            <option value="1" {{ old('kawin') == '1' ? 'selected' : null }}>
                                Belum Menikah
                            </option>
                            <option value="2" {{ old('kawin') == '2' ? 'selected' : null }}>
                                Menikah
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
                        id="nik" name="nik" value="{{ $datanasabah->detailNasabah->nik }}">
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
                <label class="label">Foto KTP</label>
                <div class="control">
                    <img src="{{ asset('storage/images/ktp/' . $datanasabah->id . '_KTP_' . $datanasabah->detailNasabah->nik . '.png') }}"
                        alt="Uploaded Image">
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label class="label" for="no_kk">Nomor KK <span class="has-text-danger">*</span></label>
                <div class="control @error('no_kk') has-icons-left @enderror">
                    <input class="input @error('no_kk') is-danger @enderror" type="text" placeholder="Nomor KK"
                        id="no_kk" name="no_kk" value="{{ $datanasabah->detailNasabah->no_kk }}">
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
                <label class="label">Foto KTP</label>
                <div class="control">
                    <img src="{{ asset('storage/images/kk/' . $datanasabah->id . '_KK_' . $datanasabah->detailNasabah->no_kk . '.png') }}"
                        alt="Uploaded Image">
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
                        value="{{ $datanasabah->detailNasabah->tempat_lahir }}">
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
                        id="kontak" name="kontak" value="{{ $datanasabah->detailNasabah->kontak }}">
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
                        class="textarea @error('alamat') is-danger @enderror" placeholder="Alamat">{{ $datanasabah->alamat }}</textarea>
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
                <label class="label" for="provinsi">Provinsi <span class="has-text-danger">*</span></label>
                <div class="control @error('provinsi') has-icons-left @enderror">
                    <div class="select is-fullwidth @error('provinsi') is-danger @enderror">
                        <select id="provinsi" name="provinsi" wire:model='provinsi'>
                            <option value="" hidden
                                {{ old('provinsi') == '' || old('provinsi') == null ? 'selected' : null }}>
                                Pilih Provinsi
                            </option>
                            @foreach ($dataprovinsi as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('provinsi') == $item->id ? 'selected' : null }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('provinsi')
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
                <label class="label" for="kotakab">Kota / Kabupaten <span class="has-text-danger">*</span></label>
                <div class="control @error('kotakab') has-icons-left @enderror">
                    <div class="select is-fullwidth  @error('kotakab') is-danger @enderror">
                        <select id="kotakab" name="kotakab" wire:model='kotakab'
                            {{ $provinsi == '' || $provinsi == null ? 'disabled' : null }}>
                            <option value="" hidden
                                {{ old('kotakab') == '' || old('kotakab') == null ? 'selected' : null }}>
                                Pilih Kota / Kabupaten
                            </option>
                            @foreach ($datakotakab as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('kotakab') == $item->id ? 'selected' : null }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('kotakab')
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
                <label class="label" for="kecamatan">Kecamatan <span class="has-text-danger">*</span></label>
                <div class="control @error('kecamatan') has-icons-left @enderror">
                    <div class="select is-fullwidth @error('kecamatan') is-danger @enderror">
                        <select id="kecamatan" name="kecamatan" wire:model='kecamatan'
                            {{ $kotakab == '' || $kotakab == null ? 'disabled' : null }}>
                            <option value="" hidden
                                {{ old('kecamatan') == '' || old('kecamatan') == null ? 'selected' : null }}>
                                Pilih Kecamatan
                            </option>
                            @foreach ($datakecamatan as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('kecamatan') == $item->id ? 'selected' : null }}>
                                    {{ $item->name }}
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
                            <option value="" hidden
                                {{ old('kelurahan') == '' || old('kelurahan') == null ? 'selected' : null }}>
                                Pilih Kelurahan
                            </option>
                            @foreach ($datakelurahan as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('kelurahan') == $item->id ? 'selected' : null }}>
                                    {{ $item->name }}
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
                        <select id="pekerjaan" name="pekerjaan">
                            <option value="" hidden
                                {{ $datanasabah->detailNasabah->pekerjaan == '' || $datanasabah->detailNasabah->pekerjaan == null ? 'selected' : null }}>
                                Pilih Pekerjaan
                            </option>
                            <option value="2"
                                {{ $datanasabah->detailNasabah->pekerjaan == 2 ? 'selected' : null }}>
                                Tetap
                            </option>
                            <option value="1"
                                {{ $datanasabah->detailNasabah->pekerjaan == 1 ? 'selected' : null }}>
                                Tidak Tetap
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
                        <select id="gaji" name="gaji">
                            <option value="" hidden
                                {{ $datanasabah->detailNasabah->gaji == '' || $datanasabah->detailNasabah->gaji == null ? 'selected' : null }}>
                                Pilih Rentang Gaji / Pemasukan
                            </option>
                            <option value="3" {{ $datanasabah->detailNasabah->gaji == 3 ? 'selected' : null }}>
                                Rp 1.000.000 - Rp 3.000.000
                            </option>
                            <option value="2" {{ $datanasabah->detailNasabah->gaji == 2 ? 'selected' : null }}>
                                Diatas Rp 3.000.000 - Rp 7.000.000
                            </option>
                            <option value="1" {{ $datanasabah->detailNasabah->gaji == 1 ? 'selected' : null }}>
                                Diatas Rp 7.000.000 - Rp 9.000.000
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
    </div>
    <hr>
    <h3 class="has-text-weight-bold has-text-centered">Data Aset</h3>
    <hr>
    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label" for="rumah">Kepemilikan Rumah <span class="has-text-danger">*</span></label>
                <div class="control @error('rumah') has-icons-left @enderror">
                    <div class="select is-fullwidth @error('rumah') is-danger @enderror">
                        {{-- jaminan (c4 wp) --}}
                        <select id="rumah" name="rumah">
                            <option value="" hidden
                                {{ old('rumah') == '' || old('rumah') == null ? 'selected' : null }}>
                                Pilih Kepemilikan Rumah
                            </option>
                            <option value="4"
                                {{ $datanasabah->detailNasabah->aset_rumah == 4 ? 'selected' : null }}>
                                Belum Punya
                            </option>
                            <option value="3"
                                {{ $datanasabah->detailNasabah->aset_rumah == 3 ? 'selected' : null }}>
                                Mengontrak
                            </option>
                            <option value="2"
                                {{ $datanasabah->detailNasabah->aset_rumah == 2 ? 'selected' : null }}>
                                Punya Rumah
                            </option>
                            <option value="1"
                                {{ $datanasabah->detailNasabah->aset_rumah == 1 ? 'selected' : null }}>
                                Punya Rumah Lebih Dari 1
                            </option>
                        </select>
                    </div>
                    @error('rumah')
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
                <label class="label" for="kendaraan">Kepemilikan Kendaraan <span
                        class="has-text-danger">*</span></label>
                <div class="control @error('kendaraan') has-icons-left @enderror">
                    <div class="select is-fullwidth @error('kendaraan') is-danger @enderror">
                        <select id="kendaraan" name="kendaraan">
                            <option value="" hidden
                                {{ old('kendaraan') == '' || old('kendaraan') == null ? 'selected' : null }}>
                                Pilih Kepemilikan Kendaraan
                            </option>
                            <option value="4"
                                {{ $datanasabah->detailNasabah->aset_kendaraan == 4 ? 'selected' : null }}>
                                Belum Punya
                            </option>
                            <option value="3"
                                {{ $datanasabah->detailNasabah->aset_kendaraan == 3 ? 'selected' : null }}>
                                Sepeda
                            </option>
                            <option value="2"
                                {{ $datanasabah->detailNasabah->aset_kendaraan == 2 ? 'selected' : null }}>
                                Sepeda Motor
                            </option>
                            <option value="1"
                                {{ $datanasabah->detailNasabah->aset_kendaraan == 1 ? 'selected' : null }}>
                                Mobil
                            </option>
                        </select>
                    </div>
                    @error('kendaraan')
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

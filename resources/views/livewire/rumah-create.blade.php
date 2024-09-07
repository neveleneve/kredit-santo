<div class="mb-3">
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
</div>

<div class="columns is-centered mb-0 mt-5" wire:ignore.self>
    <div class="column">
        <div class="tabs is-centered container">
            <ul>
                <li class="{{ Request::is('dashboard*') ? 'is-active' : null }}">
                    <a {{ Request::is('dashboard') ? null : 'href=' . route('dashboard') }}>
                        Dashboard
                    </a>
                </li>
                <li class="{{ Request::is('rumah*') ? 'is-active' : null }}">
                    <a {{ Request::is('rumah') ? null : 'href=' . route('rumah.index') }}>
                        Data Rumah
                    </a>
                </li>
                <li class="{{ Request::is('nasabah*') ? 'is-active' : null }}">
                    <a {{ Request::is('nasabah') ? null : 'href=' . route('nasabah.index') }}>
                        Data Nasabah
                    </a>
                </li>
                <li class="{{ Request::is('penilaian*') ? 'is-active' : null }}">
                    <a {{ Request::is('penilaian') ? null : 'href=' . route('penilaian.index') }}>
                        Penilaian
                    </a>
                </li>
                <li class="{{ Request::is('kriteria-bobot*') ? 'is-active' : null }}">
                    <a {{ Request::is('kriteria-bobot') ? null : 'href=' . route('kriteria-bobot.index') }}>
                        Kriteria Bobot
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>

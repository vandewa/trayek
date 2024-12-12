<div class="sidebar-nav" data-simplebar="true">
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ url('/') }}">
                <div class="parent-icon"><span class="material-symbols-outlined">home</span></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        {{-- <li>
            <a href="{{ route('sk') }}">
                <div class="parent-icon"><span class="material-symbols-outlined">book</span></div>
                <div class="menu-title">SK</div>
            </a>
        </li> --}}
        <li>
            <a href="{{ route('kendaraan') }}">
                <div class="parent-icon"><span class="material-symbols-outlined">book</span></div>
                <div class="menu-title">Kendaraan</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><span class="material-symbols-outlined">database</span>
                </div>
                <div class="menu-title">Master</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('master.perusahaan') }}"><span
                            class="material-symbols-outlined">arrow_right</span>
                        Perusahaan
                    </a>
                </li>
                <li>
                    <a href="{{ route('master.kendaraan') }}"><span class="material-symbols-outlined">arrow_right</span>
                        Kendaraan
                    </a>
                </li>
                <li>
                    <a href="{{ route('master.trayek') }}"><span class="material-symbols-outlined">arrow_right</span>
                        Trayek
                    </a>
                </li>
                <li>
                    <a href="{{ route('master.kepala') }}"><span class="material-symbols-outlined">arrow_right</span>
                        Kepala Dinas
                    </a>
                </li>
                <li>
                    <a href="{{ route('master.user-index') }}"><span
                            class="material-symbols-outlined">arrow_right</span>
                        User
                    </a>
                </li>
                <li>
                    <a href="{{ route('master.list-role') }}"><span class="material-symbols-outlined">arrow_right</span>
                        Role
                    </a>
                </li>

            </ul>
        </li>
        <!-- Add more menu items as needed -->
    </ul>
</div>

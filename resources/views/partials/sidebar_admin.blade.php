<ul class="nav sidebar-menu">
    <li>
        <a href="{{ route('admin./') }}">
            <div class="fas fa-tachometer-alt" style="padding-left: 7px; width: 30px"></div>
            <span class="menu-text"> Dashboard </span>
        </a>    
    </li>

    <li>
        <a href="#" class="menu-dropdown">
            <div class="fas fa-th-large" style="padding-left: 7px; width: 30px"></div>
            <span class="menu-text"> Master </span>
            <i class="menu-expand"></i>
        </a>
        <ul class="submenu">
            <li>
                <a href="{{ route('admin.jabatan') }}">
                    <div class="fas fa-level-up-alt" style="width: 25px"></div>
                    <span class="menu-text"> Jabatan </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.bidang_keahlian') }}">
                    <div class="fas fa-level-up-alt" style="width: 25px"></div>
                    <span class="menu-text"> Bidang Keahlian </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.golongan') }}">
                    <div class="fas fa-level-up-alt" style="width: 25px"></div>
                    <span class="menu-text"> Golongan </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.unit_kerja') }}">
                    <div class="fas fa-level-up-alt" style="width: 25px"></div>
                    <span class="menu-text"> Unit Kerja </span>
                </a>
            </li>
        </ul>
    </li>

    <li>
        <a href="{{ route('admin.pendaftar') }}">
            <div class="fas fa-users" style="padding-left: 7px; width: 30px"></div>
            <span class="menu-text"> Pendaftar </span>
        </a>
    </li>

    <li>
        <a href="{{ route('admin.pendaftar_ba') }}">
            <div class="fas fa-broadcast-tower" style="padding-left: 7px; width: 30px"></div>
            <span class="menu-text"> Berita Acara </span>
        </a>
    </li>

    <li>
        <a href="#" class="menu-dropdown">
            <div class="fas fa-th-list" style="padding-left: 7px; width: 30px"></div>
            <span class="menu-text"> Rombongan </span>
            <i class="menu-expand"></i>
        </a>
        <ul class="submenu">
            <li>
                <a href="{{ route('admin.pembelajaran') }}">
                    <div class="fas fa-level-up-alt" style="width: 25px"></div>
                    <span class="menu-text"> Pembelajaran </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.tim') }}">
                    <div class="fas fa-level-up-alt" style="width: 25px"></div>
                    <span class="menu-text"> Tim </span>
                </a>
            </li>
        </ul>
    </li>

    
</ul>

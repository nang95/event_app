<ul class="nav sidebar-menu">
    <li>
        <a href="{{ route('admin./') }}">
            <div class="fas fa-tachometer-alt" style="padding-left: 7px; width: 30px"></div>
            <span class="menu-text"> Dashboard </span>
        </a>    
    </li>

    <li>
        <a href="{{ route('admin.carousel') }}">
            <div class="fas fa-image" style="padding-left: 7px; width: 30px"></div>
            <span class="menu-text"> Carousel </span>
        </a>
    </li>

    <li>
        <a href="#" class="menu-dropdown">
            <div class="fas fa-box" style="padding-left: 7px; width: 30px"></div>
            <span class="menu-text"> Product </span>
            <i class="menu-expand"></i>
        </a>
        <ul class="submenu">
            <li>
                <a href="{{ route('admin.type') }}">
                    <div class="fas fa-level-up-alt" style="width: 25px"></div>
                    <span class="menu-text"> Type </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.category') }}">
                    <div class="fas fa-level-up-alt" style="width: 25px"></div>
                    <span class="menu-text"> Category </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.product') }}">
                    <div class="fas fa-box" style="width: 25px"></div>
                    <span class="menu-text"> Product </span>
                </a>
            </li>
        </ul>
    </li>

    <li>
        <a href="{{ route('admin.contact') }}">
            <div class="fas fa-phone" style="padding-left: 7px; width: 30px"></div>
            <span class="menu-text"> Contact </span>
        </a>
    </li>
    
    <li>
        <a href="{{ route('admin.gallery') }}">
            <div class="fas fa-images" style="padding-left: 7px; width: 30px"></div>
            <span class="menu-text"> Gallery </span>
        </a>
    </li>

    <li>
        <a href="{{ route('admin.about_us') }}">
            <div class="fas fa-building" style="padding-left: 7px; width: 30px"></div>
            <span class="menu-text"> About Us </span>
        </a>
    </li>

    <li>
        <a href="{{ route('admin.order') }}">
            <div class="fas fa-hands" style="padding-left: 7px; width: 30px"></div>
            <span class="menu-text"> Order </span>
        </a>
    </li>
</ul>

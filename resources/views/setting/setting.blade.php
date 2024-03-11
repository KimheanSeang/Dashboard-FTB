<nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted mb-2">Sidebar:</h6>
        <div class="mb-3 pb-3 border-bottom">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                        value="sidebar-light" checked>
                    Light
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                        value="sidebar-dark">
                    Dark
                </label>
            </div>
        </div>
        <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Light Theme:</h6>
            <a class="theme-item" href="#" onclick="setTheme('demo1', this)">
                <img src="{{ asset('backend/assets/images/screenshots/light.jpg') }}" alt="light theme">
            </a>
            <h6 class="text-muted mb-2">Dark Theme:</h6>
            <a class="theme-item" href="#" onclick="setTheme('demo1', this)">
                <img src="{{ asset('backend/assets/images/screenshots/dark.jpg') }}" alt="dark theme">
            </a>
        </div>
    </div>
</nav>
<script>
    function setTheme(themeName, element) {
        var themeItems = document.querySelectorAll('.theme-item');
        themeItems.forEach(item => {
            item.classList.remove('active');
        });
        element.classList.add('active');
        var styleLink = document.getElementById('theme-style');
        styleLink.setAttribute('href', '{{ asset('backend/assets/css/') }}' + '/' + themeName + '/style.css');
    }
</script>
<style>
    .sidebar-body {
        transition: margin-left 0.3s ease-in-out;
    }

    .sidebar-body.dark {
        background-color: #333;
        color: #fff;
    }

    .theme-item img {
        transition: transform 0.3s ease-in-out;
    }

    .theme-item.active img {
        transform: scale(1.1);
    }
</style>

{{-- <div class="theme-wrapper">
    <h6 class="text-muted mb-2">Light Theme:</h6>
    <a class="theme-item" href="#" onclick="setTheme('demo1', this)">
        <img src="{{ asset('backend/assets/images/screenshots/light.jpg') }}" alt="light theme">
    </a>
    <h6 class="text-muted mb-2">Dark Theme:</h6>
    <a class="theme-item" href="#" onclick="setTheme('demo2', this)">
        <img src="{{ asset('backend/assets/images/screenshots/dark.jpg') }}" alt="dark theme">
    </a>
</div> --}}

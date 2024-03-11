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

        <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
            <h5 class="mb-1 text-base leading-none dark:text-white">Router Transition</h5>
            <p class="text-xs text-white-dark">Animation of main content.</p>
            <div class="mt-3">
                <select x-model="$store.app.animation" class="form-select border-primary text-primary"
                    @change="$store.app.toggleAnimation()">
                    <option value="">None</option>
                    <option value="animate__fadeIn">Fade</option>
                    <option value="animate__fadeInDown">Fade Down</option>
                    <option value="animate__fadeInUp">Fade Up</option>
                    <option value="animate__fadeInLeft">Fade Left</option>
                    <option value="animate__fadeInRight">Fade Right</option>
                    <option value="animate__slideInDown">Slide Down</option>
                    <option value="animate__slideInLeft">Slide Left</option>
                    <option value="animate__slideInRight">Slide Right</option>
                    <option value="animate__zoomIn">Zoom In</option>
                </select>
            </div>
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

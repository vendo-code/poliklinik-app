<!DOCTYPE html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Poliklinik' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- CSS Paksa (Memastikan Layout Berjajar Samping Tanpa Bergantung Vite) -->
    <style>
        * { box-sizing: border-box; }
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
        }
        .forced-wrapper {
            display: flex !important;
            width: 100vw !important;
            height: 100vh !important;
            overflow: hidden !important;
        }
        .forced-sidebar {
            width: 260px !important;
            height: 100vh !important;
            flex-shrink: 0 !important;
            background: linear-gradient(160deg, #1e2d6b 0%, #2d4499 60%, #1a2d7a 100%) !important;
            color: white !important;
            overflow-y: auto !important;
            z-index: 50;
        }
        .forced-main {
            flex: 1 !important;
            display: flex !important;
            flex-direction: column !important;
            height: 100vh !important;
            overflow: hidden !important;
            min-width: 0;
        }
        .forced-scroll {
            flex: 1 !important;
            overflow-y: auto !important;
            padding: 24px !important;
        }
    </style>
</head>

<body>

    <div class="forced-wrapper">

        <!-- SIDEBAR -->
        <div id="appSidebar" class="forced-sidebar">
            @include('components.partials.sidebar')
        </div>

        <!-- OVERLAY (Responsive Mobile) -->
        <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.45); z-index:40;"></div>

        <!-- MAIN CONTENT -->
        <div class="forced-main">

            <!-- HEADER -->
            @include('components.partials.header')

            <!-- KONTEN UTAMA -->
            <div class="forced-scroll">

                @if(session('success'))
                <div class="alert alert-success mb-4 rounded-xl shadow-sm p-4 bg-green-100 text-green-800 flex items-center gap-2">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-error mb-4 rounded-xl shadow-sm p-4 bg-red-100 text-red-800 flex items-center gap-2">
                    <i class="fas fa-circle-xmark"></i>
                    <span>{{ session('error') }}</span>
                </div>
                @endif

                @yield('content')

            </div>

            <!-- FOOTER -->
            @include('components.partials.footer')

        </div>

    </div>

    <script>
        function toggleSidebar(){
            const sidebar = document.getElementById('appSidebar')
            const overlay = document.getElementById('sidebarOverlay')
            sidebar.classList.toggle('open')
            overlay.style.display = sidebar.classList.contains('open') ? 'block' : 'none'
        }

        function toggleFullscreen(){
            const icon = document.getElementById('fsIcon')
            if(!document.fullscreenElement){
                document.documentElement.requestFullscreen()
                icon.className = 'fas fa-compress'
            } else {
                document.exitFullscreen()
                icon.className = 'fas fa-expand'
            }
        }
    </script>

    @stack('scripts')

</body>

</html>
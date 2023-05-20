<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script> 
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> [x-cloak] { display: none !important; } </style>
    @livewireStyles
    @stack('css')
  </head>
  <body class="font-sans text-[#212529] antialiased">
    @php
      $links =  [
        [
          'id' => 'panel-avanzado',
          'title' => 'Panel avanzado',
          'url' => route('home.dashboard'),
          'active' => request()->routeIs('home.dashboard'),
          'icon' => 'aperture',
        ],
        [
          'id' => 'tramites',
          'title' => 'Trámites',
          'url' => route('home.procedures.index'),
          'active' => request()->routeIs('home.procedures.index') or request()->routeIs('home.procedures.edit'),
          'icon' => 'file-text',
        ]
      ];
    @endphp
    <div>
      <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
        <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50" style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)" > 
          <img src="https://datalicencias.limacap.org/static/img/logo_cap.png" class="w-64" alt="">
        </div>
        @include('layouts.partials.home.sidebar')
        <div class="flex flex-col flex-1 h-full overflow-hidden">
          @include('layouts.partials.home.navigation')
          <div class="max-h-full overflow-y-scroll scrollbar flex-1 bg-[#ebeff3]">
            @stack('header-menu')
            <main class="p-3">
              <!-- Content -->
              {{ $slot }}
            </main>
          </div>
          @include('layouts.partials.home.setting')
        </div>
      </div>
    </div>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
      const setup = () => {
        return {
          loading: true,
          isSidebarOpen: false,
          toggleSidbarMenu() {
            this.isSidebarOpen = !this.isSidebarOpen
          },
          isSettingsPanelOpen: false,
          isSearchBoxOpen: false,
        }
      }
      feather.replace({class: 'foo bar', 'stroke-width': 1, 'width': 16, 'heigth': 16})
    </script>
    @livewire('notifications')
    @stack('modals')
    @livewireScripts
    @stack('js')
  </body>
</html>

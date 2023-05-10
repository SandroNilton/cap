<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> [x-cloak] { display: none !important; } </style>
    @livewireStyles
    @stack('css')
  </head>
  <body class="font-sans text-[#212529] antialiased">
    @php
      $links =  [
        [
          'title' => 'Panel avanzado',
          'url' => route('admin.dashboard'),
          'active' => request()->routeIs('admin.dashboard'),
          'icon' => 'aperture',
          'can' => 'admin.dashboard.index'
        ],
        [
          'title' => 'Trámites',
          'url' => route('admin.procedures.index'),
          'active' => request()->routeIs('admin.procedures.index') or request()->routeIs('admin.procedures.edit'),
          'icon' => 'file-text',
          'can' => 'admin.procedures.index'
        ],
        [
          'title' => 'Usuarios',
          'url' => route('admin.users.index'),
          'active' => request()->routeIs('admin.users.index'),
          'icon' => 'users',
          'can' => 'admin.users.index' 
        ],
        [
          'title' => 'Clientes',
          'url' => route('admin.customers.index'),
          'active' => request()->routeIs('admin.customers.index'),
          'icon' => 'thumbs-up',
          'can' => 'admin.customers.index'
        ],
        [
          'title' => 'Roles',
          'url' => route('admin.roles.index'),
          'active' => request()->routeIs('admin.roles.index'),
          'icon' => 'shield',
          'can' => 'admin.roles.index' 
        ],
        [
          'title' => 'Categorias',
          'url' => route('admin.categories.index'),
          'active' => request()->routeIs('admin.categories.index'),
          'icon' => 'folder',
          'can' => 'admin.categories.index'
        ],
        [
          'title' => 'Areas',
          'url' => route('admin.areas.index'),
          'active' => request()->routeIs('admin.areas.index'),
          'icon' => 'archive',
          'can' => 'admin.areas.index'
        ],
        [
          'title' => 'Requisitos',
          'url' => route('admin.requirements.index'),
          'active' => request()->routeIs('admin.requirements.index'),
          'icon' => 'paperclip',
          'can' => 'admin.requirements.index'
        ],
        [
          'title' => 'Tipos de tramite',
          'url' => route('admin.typeprocedures.index'),
          'active' => request()->routeIs('admin.typeprocedures.index'),
          'icon' => 'clipboard',
          'can' => 'admin.typeprocedures.index'
        ]
      ];
    @endphp
    <div>
      <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
        <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50" style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)" > 
          <img src="https://datalicencias.limacap.org/static/img/logo_cap.png" class="w-64" alt="">
        </div>
        @include('layouts.partials.admin.sidebar')
        <div class="flex flex-col flex-1 h-full overflow-hidden">
          @include('layouts.partials.admin.navigation')
          <div class="max-h-full overflow-hidden overflow-y-scroll flex-1 bg-[#ebeff3]">
            @stack('header-menu')
            <main class="p-3">
              <!-- Content -->
              {{ $slot }}
            </main>
          </div>
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


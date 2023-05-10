<header class="flex-shrink-0 border-b border-[#ebeff3] bg-white">
  <div class="flex items-center justify-between p-1 px-3  py-1.5">
    <div class="flex items-center space-x-3">
      <button @click="toggleSidbarMenu()" class="p-2">
        <svg class="w-4 h-4" :class="{'transform transition-transform -rotate-180': isSidebarOpen}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
        </svg>
      </button>
    </div>
    <div class="flex items-center space-x-3">
      <span class="p-1.5 text-xl font-semibold tracking-wider uppercase lg:hidden">
        <img src="https://limacap.org/wp-content/uploads/2020/09/LOGO-CAPRL-HORIZONTAL-COLOR.png" class="w-28 flex"/>
      </span>
    </div>
    <div class="relative flex items-center space-x-3">
      <div class="items-center hidden space-x-3 md:flex">
        <x-nav-link href="{{ route('home.dashboard') }}" class="px-2 text-[#183247] text-xs font-medium rounded bg-[#f3f5f7] border border-[#cfd7df] bg-gradient-to-b from-[#fff]">
          <ion-icon name="accessibility-outline"></ion-icon>
        </x-nav-link>  
      </div>
      @auth
        <div class="ml-3 relative">
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <button class="flex text-[#183247] text-sm font-medium rounded bg-[#f3f5f7] border border-[#cfd7df] bg-gradient-to-b from-[#fff]">
                  <img class="h-7 w-7 object-cover rounded" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </button>
              @else
                <span class="inline-flex rounded-md">
                  <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                    {{ Auth::user()->name }}
                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                  </button>
                </span>
              @endif
            </x-slot>
            <x-slot name="content"> 
              <div class="block px-4 py-2 text-xs font-poppins text-gray-600">{{ __('Administrar cuenta') }}</div>
              <x-dropdown-link href="{{ route('profile.show') }}">
                <x-label class="font-poppins">{{ __('Perfil') }}</x-jet-label> 
              </x-dropdown-link>
              @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                  {{ __('API Tokens') }}
                </x-dropdown-link>
              @endif
              <div class="border-t border-gray-100"></div>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="font-poppins text-xs px-4 py-1 text-red-600">{{ __('Cerrar sesión') }}</button>
              </form>
            </x-slot>
          </x-dropdown>
        </div>
      @else
        @if (Route::has('login'))
          <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
              <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
              <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
              @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
              @endif
            @endauth
          </div>
        @endif    
      @endauth
    </div>
  </div>
</header>
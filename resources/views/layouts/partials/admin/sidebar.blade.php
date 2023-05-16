<div x-on:click="toggleSidbarMenu()" x-show.in.out.opacity="isSidebarOpen" class="fixed inset-0 z-10 bg-black bg-opacity-10 lg:hidden" style="backdrop-filter: blur(2px);">
</div>
<aside x-transition:enter="transition transform duration-300" x-transition:enter-start="-translate-x-full opacity-30 ease-in" x-transition:enter-end="translate-x-0 opacity-100 ease-out" x-transition:leave="transition transform duration-300" x-transition:leave-start="translate-x-0 opacity-100 ease-out" x-transition:leave-end="-translate-x-full opacity-0 ease-in" class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-52 max-h-screen  overflow-hidden transition-all transform bg-white shadow-lg lg:z-auto lg:static lg:shadow-none" :class="{'-translate-x-full lg:translate-x-0 lg:w-12': !isSidebarOpen}">
  <div class="flex items-center justify-between flex-shrink-0 p-2 bg-[#212529]" :class="{'lg:justify-center': !isSidebarOpen}">
    <span class="p-1 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap ">
      <a>
        <span :class="{'lg:hidden': isSidebarOpen}">
          <img src="https://i.postimg.cc/pX6Jgxnw/images-removebg-preview.png" class="hidden lg:flex lg:visible" loading="lazy"/>
        </span>
        <span :class="{'lg:hidden': !isSidebarOpen}">
          <img src="https://datalicencias.limacap.org/static/img/logo_cap.png" class="" loading="lazy"/>
          <!--<img src="https://cap.org.pe/wp-content/uploads/2022/08/logo-en-blanco.png" class="" loading="lazy"/>-->
        </span>
      </a>
    </span>
  </div>
  <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
    <ul class="overflow-hidden px-1 mt-1">
      @foreach ($links as $link)
        @can($link['can'])
          <li class="p-1">
            <a href="{{ $link['url'] }}" class="flex items-center text-sm font-poppins px-1.5 py-1 space-x-2 px-2 rounded-sm {{ $link['active'] ? 'text-white bg-[#42a692] hover:bg-[#2c6f62] transition duration-300' : 'text-[#212529]' }}" :class="{'justify-center': !isSidebarOpen}" title="{{ $link['title'] }}">
              <span>
                <i data-feather="{{ $link['icon'] }}" ></i>
              </span>
              <span :class="{ 'lg:hidden': !isSidebarOpen }">{{ $link['title'] }} </span>
            </a>
          </li>
        @endcan
      @endforeach
    </ul>
  </nav>
</aside>
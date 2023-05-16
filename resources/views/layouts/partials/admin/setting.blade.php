<!-- Setting panel button -->
<div>
  <button @click="isSettingsPanelOpen = true" class="fixed right-0 px-4 text-sm py-1 text-white uppercase transform rotate-90 translate-x-9 bg-[#212529] top-1/2 rounded-b">
    @stack('name')
  </button>
</div>

<!-- Settings panel -->
<div x-show="isSettingsPanelOpen" @click.away="isSettingsPanelOpen = false" x-transition:enter="transition transform duration-500" x-transition:enter-start="translate-x-full opacity-30  ease-in" x-transition:enter-end="translate-x-0 opacity-100 ease-out" x-transition:leave="transition transform duration-300" x-transition:leave-start="translate-x-0 opacity-100 ease-out" x-transition:leave-end="translate-x-full opacity-0 ease-in" class="fixed inset-y-0 right-0 flex flex-col shadow-lg bg-[#ffffff] w-64" style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
  <div class="flex items-center justify-between flex-shrink-0 p-1 bg-[#212529]">
    <h6 class="p-2 text-sm text-white bg-[#212529] uppercase px-3">@stack('name')</h6>
    <button @click="isSettingsPanelOpen = false" class="p-1 rounded focus:outline-none focus:ring transition duration-300">
      <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>
  <div class="flex-1 max-h-full p-4 overflow-y-auto">
    @stack('content')
  </div>
</div>
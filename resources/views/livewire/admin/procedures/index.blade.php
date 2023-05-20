<div>
  @push('options')
  @endpush
  @if (session('notification'))
    <div class="@if(session('notification.type') == 'success') bg-[#20a849] @elseif (session('notification.type') == 'alert') bg-[#e67300] @elseif (session('notification.type') == 'danger') bg-[#d72d30] @elseif (session('notification.type') == 'info') bg-[#148fcc]  @endif text-center py-1 rounded mb-2" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)">
      <div class="pt-0.5 px-4 items-center leading-none flex lg:inline-flex" role="alert">
        <span class="flex text-sm font-bold mr-3 text-white">
          <ion-icon name="information-circle-outline"></ion-icon>
        </span>
        <span class="font-normal text-left flex-auto text-white text-xs">{{ session('notification.content') }}</span>
      </div>
    </div>
  @endif
  <div class="space-x-2 flex items-center">
  </div>
  <div class="flex-col space-y-4">
    <livewire:admin.procedures.procedure-table />
  </div>
</div>

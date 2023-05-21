<div>
  @push('header-menu')
    <div class="bg-[#f5f7f9] p-1.5 border-b border-[#cfd7df] px-3">
      <a href="{{ route('home.procedures.create') }}" class="w-fit items-center inline-flex justify-center px-3 py-1.5 text-sm font-normal bg-white rounded border border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 shadow-sm hover:bg-gray-50">
        <ion-icon name="add-outline" class="pr-2"></ion-icon> Nuevo trámite
      </a>
    </div>
  @endpush
  <div class="flex-col space-y-4">
    <livewire:home.procedures.procedure-table />
  </div>
</div>

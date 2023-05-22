<div>
  @push('header-menu')
    <div class="bg-[#f5f7f9] p-1.5 border-b border-[#cfd7df] px-3">
      <a href="{{ route('admin.areas.index') }}" class="w-fit items-center inline-flex justify-center px-3 py-1.5 text-sm font-normal bg-white rounded border border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 shadow-sm hover:bg-gray-50">
        <ion-icon name="list-outline" class="pr-2"></ion-icon> Lista de áreas
      </a>
    </div>
  @endpush
  <div class="flex items-center justify-center">
    <section class="container max-w-full rounded-sm bg-white p-4">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-5">
          <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-5 text-[#183247]">
            <form action="{{ route('admin.areas.update', $area_data[0]->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-4">
                <input type="text" name="name" id="name" value="{{ old('name', $area_data[0]->name) }}" autofocus placeholder="Nombre" class="text-[#183247] rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 @if($errors->has('name')) border-[#d72d30] @endif"/>
                @error('name')
                  <span class="px-3 text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
                @enderror
              </div>
              <div class="mb-4">
                <textarea type="text" maxlength="255" name="description" id="description" placeholder="Descripción" class="text-[#183247] rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0">{{ old('description', $area_data[0]->description) }}</textarea>
              </div>
              <div class="mb-4">
                <select id="state" name="state"  class="text-[#183247] rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0">
                  <option value="1" @if($area_data[0]->state == true) @selected(true) @else @selected(false) @endif >Activo</option>
                  <option value="0" @if($area_data[0]->state == false) @selected(true) @else @selected(false) @endif >Inactivo</option>
                </select>
              </div>
              <div class="mb-3">
                <button class="bg-[#42a692] px-2 rounded text-white text-sm py-1.5 hover:bg-[#2c6f62] transition duration-300">Actualizar área</button>
              </div>
            </form>
            @can('admin.areas.destroy')
              <button wire:click="deleteArea({{ $area_data[0]->id }})"  class="bg-[#C83232] px-2 rounded text-white text-sm py-1.5 transition duration-300"> Eliminar área</button>
            @endcan
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

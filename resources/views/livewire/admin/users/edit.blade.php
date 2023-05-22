<div>
  @push('header-menu')
    <div class="bg-[#f5f7f9] p-1.5 border-b border-[#cfd7df] px-3">
      <a href="{{ route('admin.users.index') }}" class="w-fit items-center inline-flex justify-center px-3 py-1.5 text-sm font-normal bg-white rounded border border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 shadow-sm hover:bg-gray-50">
        <ion-icon name="list-outline" class="pr-2"></ion-icon> Lista de usuarios
      </a>
    </div>
  @endpush
  <div class="flex items-center justify-center">
    <section class="container max-w-full rounded-sm bg-white p-4">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-5">
          <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-5 text-[#183247]">
            <form action="{{ route('admin.users.update', $user_data[0]->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-4">
                <input type="text" name="name" id="name" value="{{ old('name', $user_data[0]->name) }}" autofocus placeholder="Nombre" class="text-[#183247] rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 @if($errors->has('name')) border-[#d72d30] @endif"/>
                @error('name')
                  <span class="px-3 text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
                @enderror
              </div>
              <div class="mb-4">
                <input type="email" name="email" id="email" value="{{ old('email', $user_data[0]->email) }}" placeholder="Correo electronico" class="text-[#183247] rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 @if($errors->has('email')) border-[#d72d30] @endif"/>
                @error('email')
                  <span class="px-3 text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
                @enderror
              </div>
              <div class="mb-4">
                <select name="area_id" id="area_id" class="text-[#183247] cursor-pointer rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 @if($errors->has('area_id')) border-[#d72d30] @endif">
                  <option value=""> Seleccione el área </option>
                  @foreach ($areas as $area)
                    <option value="{{ $area->id }}" selected>{{ $area->name }}</option>
                  @endforeach
                </select>
                @error('area_id')
                  <span class="px-3 text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
                @enderror
              </div>
              <div class="mb-4">
                <select id="state" name="state"  class="text-[#183247] rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0">
                  <option value="1" @if($user_data[0]->state == true) @selected(true) @else @selected(false) @endif >Activo</option>
                  <option value="0" @if($user_data[0]->state == false) @selected(true) @else @selected(false) @endif >Inactivo</option>
                </select>
              </div>
              <div class="mb-3">
                <button class="bg-[#42a692] px-2 rounded text-white text-sm py-1.5 hover:bg-[#2c6f62] transition duration-300">Actualizar usuario</button>
              </div> 
            </form>
            @can('admin.users.destroy')
              <button wire:click="deleteUser({{ $user_data[0]->id }})"  class="bg-[#C83232] px-2 rounded text-white text-sm py-1.5 transition duration-300"> Eliminar usuario</button>
            @endcan
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
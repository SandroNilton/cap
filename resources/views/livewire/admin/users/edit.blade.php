<div>
  @push('header-menu')
    <div class="bg-[#f5f7f9] p-1.5 border-b border-[#cfd7df] px-3">
      <a href="{{ route('admin.users.index') }}" class="w-fit items-center inline-flex justify-center px-3 py-1.5 text-sm font-normal bg-white rounded border border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 shadow-sm hover:bg-gray-50">
        <ion-icon name="list-outline" class="pr-2"></ion-icon> Lista de usuarios
      </a>
      
    </div>
  @endpush
  <div class="flex items-center justify-center">
    <section class="container max-w-full">
      <div>
        {!! Form::model($user_data[0], ['route' => ['admin.users.update', $user_data[0]], 'method' => 'put', 'class' => 'flex flex-col md:flex-row gap-3']) !!}
          <div class="md:w-9/12 xl:w-9/12 sm:mb-4 md:mb-0 rounded-sm bg-white p-4">
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
              {!! Form::submit('Actualizar usuario', ['class' => 'cursor-pointer bg-[#42a692] px-2 rounded text-white text-sm py-1.5 hover:bg-[#2c6f62] transition duration-300']) !!}
              @can('admin.users.destroy')
                <button wire:click="deleteUser({{ $user_data[0]->id }})" class="bg-[#C83232] px-2 rounded text-white text-sm py-1.5 transition duration-300">
                  Eliminar usuario
                </button>
              @endcan
            </div>
          </div>
          <div class="md:max-w-md lg:max-w-full md:mw-auto md:mx-0 md:w-3/12 xl:w-3/12 rounded-sm bg-white p-4">
            @foreach ($roles as $role)
              <div class="flex border border-[#cfd7df] hover:border-[#475867] transition duration-300 rounded py-1 justify-between items-center mb-3">
                <div class="flex justify-start gap-3 items-center px-3">
                  {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'w-4 h-4 rounded cursor-pointer border border-[#12344d] accent-[#12344d] focus:accent-[#12344d]']) !!}
                  <span class="font-medium text-xxs text-gray-700">{{ $role->name }}</span>
                </div>
              </div>
            @endforeach
          </div>
        {!! Form::close() !!}
      </div>
    </section>
  </div>
</div>


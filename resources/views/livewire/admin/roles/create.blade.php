<div>
  @push('header-menu')
    <div class="bg-[#f5f7f9] p-1.5 border-b border-[#cfd7df] px-3">
      <a href="{{ route('admin.roles.index') }}" class="w-fit items-center inline-flex justify-center px-3 py-1.5 text-sm font-normal bg-white rounded border border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 shadow-sm hover:bg-gray-50">
        <ion-icon name="list-outline" class="pr-2"></ion-icon> Lista de roles
      </a>
    </div>
  @endpush
  <div class="flex items-center justify-center">
    <section class="container max-w-full rounded-sm bg-white p-4">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-5">
          <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-5 text-[#183247]">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
              <div class="mb-4">
                <input type="text" name="name" id="name" value="{{ old('name') }}" autofocus placeholder="Nombre" class="text-[#183247] rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 @if($errors->has('name')) border-[#d72d30] @endif"/>
                @error('name')
                  <span class="text-xxxs text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
                @enderror
              </div>
              <div class="mb-4">
                <label class="block text-sm">Permisos</label>
                @foreach ($permissions as $permission)
                  <div class="flex my-1 border border-[#cfd7df] hover:border-[#475867] transition duration-300 rounded py-1 justify-between items-center">
                    <div class="flex justify-start gap-3 items-center px-3">
                      {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'w-4 h-4 rounded cursor-pointer border border-[#12344d] accent-[#12344d] focus:accent-[#12344d]']) !!}
                      <span class="font-medium text-xxs text-gray-700">{{ $permission->description }}</span>
                    </div>
                  </div>
                @endforeach
              </div>
              {!! Form::submit('Registrar rol', ['class' => 'bg-[#42a692] px-2 mb-3 rounded text-white text-sm py-1.5 hover:bg-[#2c6f62] transition duration-300']) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
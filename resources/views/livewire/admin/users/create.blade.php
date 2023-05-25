<div>
  <div class="flex items-center justify-center">
    <section class="container max-w-full">
      <div>
        <form action="{{ route('admin.users.store') }}" method="POST" class="flex flex-col md:flex-row gap-3">
          @csrf
          <div class="md:w-9/12 xl:w-9/12 sm:mb-4 md:mb-0 rounded-sm bg-white p-4">
            <div class="mb-4">
              <input type="text" name="name" id="name" value="{{ old('name') }}" autofocus placeholder="Nombre" class="text-[#183247] rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 @if($errors->has('name')) border-[#d72d30] @endif"/>
              @error('name')
                <span class="px-3 text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
              @enderror
            </div>
            <div class="mb-4">
              <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Correo electronico" class="text-[#183247] rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 @if($errors->has('email')) border-[#d72d30] @endif"/>
              @error('email')
                <span class="px-3 text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
              @enderror
            </div>
            <div class="mb-4">
              <select name="area_id" id="area_id" class="text-[#183247] cursor-pointer rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 @if($errors->has('area_id')) border-[#d72d30] @endif">
                <option value=""> Seleccione el área </option>
                @foreach ($areas as $area)
                  <option value="{{ $area->id }}">{{ $area->name }}</option>
                @endforeach
              </select>
              @error('area_id')
                <span class="px-3 text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
              @enderror
            </div>
            <div class="mb-4">
              <input type="password" name="password" id="password" value="{{ old('password') }}" pattern="^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" placeholder="Contraseña" class="text-[#183247] rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 @if($errors->has('password')) border-[#d72d30] @endif"/>
              @error('password')
                <span class="px-3 text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
              @enderror
            </div>
            <div class="mb-4">
              <input type="password" name="password_confirmation" id="password_confirmation" pattern="^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" value="{{ old('password_confirmation') }}" placeholder="Confirma contraseña" class="text-[#183247] rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 @if($errors->has('password_confirmation')) border-[#d72d30] @endif"/>
              @error('password_confirmation')
                <span class="px-3 text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
              @enderror
            </div>
            <div class="mb-4">
              <select id="state" name="state"  class="text-[#183247] rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
            </div>
            <div class="mb-3">
              <button class="bg-[#42a692] px-2 rounded text-white text-sm py-1.5 hover:bg-[#2c6f62] transition duration-300">Registrar usuario</button>
            </div> 
            <div class="flex space-x-1">
              <span class="text-red-500 text-xs">Nota:</span>
              <span class="text-xs">La contraseña debe contener de 8 a más carácteres con una combinación de letras, números, mayúsculas y símbolos.</span>
            </div>
          </div>
          <div class="md:max-w-md lg:max-w-full md:mw-auto md:mx-0 md:w-3/12 xl:w-3/12 rounded-sm bg-white p-4">
            @foreach ($roles as $rol)
              <div class="flex border border-[#cfd7df] hover:border-[#475867] transition duration-300 rounded py-1 justify-between items-center mb-3">
                <div class="flex justify-start gap-3 items-center px-3">
                  {!! Form::checkbox('roles[]', $rol->id, null, ['class' => 'w-4 h-4 rounded cursor-pointer border border-[#12344d] accent-[#12344d] focus:accent-[#12344d]']) !!}
                  <span class="font-medium text-xxs text-gray-700">{{ $rol->name }}</span>
                </div>
              </div>
            @endforeach
          </div>
        </form>
      </div>
    </section>
  </div>
</div>
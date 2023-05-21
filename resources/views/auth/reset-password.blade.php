<x-guest-layout>
  <section class="flex flex-col md:flex-row h-screen items-center">
    <div class="hidden md:block w-full md:w-1/2 xl:w-2/3 h-screen">
      @include('layouts.partials.guest.slide')
    </div>
    <div class="bg-white w-full h-screen md:max-w-md lg:max-w-full md:mw-auto md:mx-0 md:w-1/2 xl:w-1/3 px-6 lg:px-16 xl:px-12 flex items-center justify-center overflow-y-scroll scrollbar">
      <div class="w-full">
        <div class="justify-center flex mb-4">
          <img src="https://i.postimg.cc/PqDTPv8d/logo-niubiz-removebg-preview-3.png" width=200" alt="">
          <!--<img src="https://cap.org.pe/wp-content/uploads/2022/12/Logo-clasico-2022-Curvas.png" width="240" alt="">-->
        </div>
        <section class="flex flex-col items-center justify-center space-y-6 py-6 w-full">
          @if ($errors->any())
            <div class="mb-2">
                <div class="font-medium text-red-600">{{ __('¡Vaya! Algo salió mal.') }}</div>

                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          <form method="POST" action="{{ route('password.update') }}" class="w-full">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="block">
                <input type="email" id="email" name="email" :value="old('email', $request->email)" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" required autofocus autocomplete="username" placeholder="Correo"> 
            </div>
            <div class="mt-4">
                <input type="password" id="password" name="password" wire:model="password" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" required autocomplete="new-password" placeholder="Nueva contraseña">
            </div>
            <div class="mt-4">
              <input type="password" id="password_confirmation" name="password_confirmation" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" required autocomplete="new-password" placeholder="Confirmar contraseña">
            </div>
            <div class="flex items-center justify-end mt-4">
              <button type="submit" class="w-full font-extrabold bg-[#42a692] rounded text-white text-sm py-1.5 hover:bg-[#2c6f62] transition duration-300">Restablecer contraseña</button>
            </div>
          </form>
        </section>
      </div>
    </div>
  </section>
</x-guest-layout>

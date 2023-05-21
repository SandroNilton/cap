<x-guest-layout>
  <div>
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
            <div class="mb-2 text-sm">
              <span>¿Olvidaste tu contraseña? No hay problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.</span>
            </div>
            @if (session('status'))
              <div class="mb-4 text-sm font-normal text-[#42a692]">
                {{ session('status') }}
              </div>
            @endif
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
            <form method="POST" action="{{ route('password.email') }}" class="w-full">
              @csrf
              <div class="relative mt-1">
                <input type="email" id="email" name="email" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" value="{{ old('email') }}" placeholder="Email" required autofocus>
              </div>
              <div class="mt-4">
                <button type="submit" class="w-full font-extrabold bg-[#42a692] rounded text-white text-sm py-1.5 hover:bg-[#2c6f62] transition duration-300">Restablecer contraseña</button>
              </div>
            </form>
            <div class="flex flex-col items-center justify-center space-y-2">
              <div class="flex justify-between space-x-2">
                <span class="text-sm">¿No tienes una cuenta?</span> 
                <a href="{{ route('register') }}" class="text-sm font-normal text-[#42a692] hover:text-[#2c6f62] transition duration-300">Registrarte aquí</a>
              </div>
              <div class="space-x-1">
                <span class="text-sm">Ya tengo una cuenta,</span> 
                <a class="text-sm text-[#42a692] hover:text-[#2c6f62] transition duration-300" href="{{ route('login') }}">Iniciar sesión</a>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>
</x-guest-layout>
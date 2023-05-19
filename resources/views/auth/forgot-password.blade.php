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
        <section class="flex flex-col items-center justify-center space-y-6 py-6">
          <div class="mb-2 text-xs text-gray-600 w-80">
            <span class="font-poppins">¿Olvidaste tu contraseña? No hay problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.</span>
          </div>
          @if (session('status'))
            <div class="mb-2 font-medium text-xs text-green-600 font-poppins">
              {{ session('status') }}
            </div>
          @endif
          <x-jet-validation-errors class="mb-2" />
          <form method="POST" action="{{ route('password.email') }}" class="space-y-2">
            @csrf
            <div class="pb-2 block">
              <label for="email" class="text-[#373435] text-xs font-poppins">Correo</label>
              <div class="relative mt-1">
                <input type="email" id="email" name="email" class="block p-4 w-80 py-1.5 rounded-sm text-xs border-gray-200 text-[#373435] focus:border-gray-200 font-poppins focus:ring-[#e0e0e0] focus:ring-opacity-0 value="{{ old('email') }}" placeholder="Email" required autofocus>
              </div>
            </div>
            <button type="submit" class="bg-[#0978be] font-semibold w-80 text-white py-2 rounded-sm text-xs font-poppins">Restablecer contraseña</button>
          </form>
        </section>
        <section class="flex flex-col items-center justify-center space-y-2">
          <div class="space-x-1">
            <span class="text-xs font-poppins">¿No tienes una cuenta?</span> 
            <a class="no-underline text-[#0978be] text-xs font-poppins" href="{{ route('register') }}">Registrate</a>
          </div>
          <div class="space-x-1">
            @if (Route::has('password.request'))
              <a class="no-underline text-[#0978be] text-xs font-poppins" href="{{ route('login') }}">Iniciar sesión</a>
            @endif
          </div>
        </section>
      </div>
    </div>
  </section>
</div>

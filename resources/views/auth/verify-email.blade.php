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
        <section class="w-full flex flex-col items-center justify-center space-y-6 py-6">
          <div class="text-sm">
            Antes de continuar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no recibiste el correo electrónico, con gusto te enviaremos otro.
          </div>
          @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-sm text-sm font-normal text-[#42a692]">
              Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó en la configuración de su perfil.
            </div>
          @endif
          <form method="POST" action="{{ route('verification.send') }}" class="w-full">
            @csrf
            <button type="submit" class="w-full font-extrabold bg-[#42a692] rounded text-white text-sm py-1.5 hover:bg-[#2c6f62] transition duration-300">Reenviar correo electrónico de verificación</button>
          </form>
          <div class="flex-wrap-reverse">
            <a href="{{ route('profile.show') }}" class="text-sm font-normal text-[#42a692] hover:text-[#2c6f62] transition duration-300">Editar Perfil</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
              @csrf
              <button type="submit" class="text-sm text-red-600 ml-8 font-poppins">Cerrar sesión</button>
            </form>
          </div>
        </section>
      </div>
    </div>
  </section>
</x-guest-layout>
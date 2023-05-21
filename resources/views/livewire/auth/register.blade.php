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
        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
        <div class="items-center py-2 mb-2">
          <div class="text-sm">
            <select wire:model="selectTypeuser" name="type" id="type" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0">
              <option value="">Seleccione tipo de usuario</option>
              <option value="1">Persona Natural</option>
              <option value="2">Persona Juridica</option>
              <option value="3">Agremiados</option>
            </select>
          </div>
          @if ($optionSelected == 1)
            <form method="POST" action="{{ route('register') }}" class="w-full">
              @csrf
              <div class="mb-3 mt-3">
                <select wire:model="selectTypeCode" name="natural_type" id="natural_type" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" required>
                  <option value="">Seleccione tipo de documento</option>
                  <option value="1">DNI</option>
                  <option value="2">Carne de Extranjeria</option>
                </select>
              </div>
              @if($selectTypeCode == 1)
                <div class="mb-3">
                  <div class="flex gap-x-2">
                    <input type="hidden" id="type" name="type" value="{{ $selectTypeCode }}">
                    <input wire:model="code" id="code" name="code" type="text" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" x-mask="999999999999" x-prod placeholder="Número de documento" @required(true)>
                    <a x-on:click="searchDNI" class="px-1.5 py-1.5 cursor-pointer bg-red-600 text-white self-center rounded">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" width="32px" height="32px" viewBox="0 0 32 32" version="1.1">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                          <g id="icon-111-search" sketch:type="MSArtboardGroup" fill="#FFFFFF">
                            <path d="M19.4271164,20.4271164 C18.0372495,21.4174803 16.3366522,22 14.5,22 C9.80557939,22 6,18.1944206 6,13.5 C6,8.80557939 9.80557939,5 14.5,5 C19.1944206,5 23,8.80557939 23,13.5 C23,15.8472103 22.0486052,17.9722103 20.5104077,19.5104077 L26.5077736,25.5077736 C26.782828,25.782828 26.7761424,26.2238576 26.5,26.5 C26.2219324,26.7780676 25.7796227,26.7796227 25.5077736,26.5077736 L19.4271164,20.4271164 L19.4271164,20.4271164 Z M14.5,21 C18.6421358,21 22,17.6421358 22,13.5 C22,9.35786417 18.6421358,6 14.5,6 C10.3578642,6 7,9.35786417 7,13.5 C7,17.6421358 10.3578642,21 14.5,21 L14.5,21 Z" id="search" sketch:type="MSShapeGroup"/>
                          </g>
                        </g>
                      </svg>
                    </a>
                  </div>
                </div>
                <div class="mb-3">
                  <input type="text" id="name" name="name" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" placeholder="Nombre completo" @required(true)>
                </div>
              @elseif ($selectTypeCode == 2)
                <div class="mb-3">
                  <input type="hidden" id="code_type" name="code_type" value="{{ $selectTypeCode }}">
                  <input type="text" id="code" name="code" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" x-mask="999999999999" placeholder="Número de documento" @required(true)>
                </div>
                <div class="mb-3">
                  <input type="text" id="name" name="name" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" placeholder="Nombre completo" @required(true)>
                </div>
              @endif
              <div class="mb-3">
                <input type="hidden" id="address" name="address">
                <input type="text" id="phone" name="phone" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" x-mask="999-999-999" placeholder="Número de teléfono" @required(true)>
              </div>
              <div class="mb-3">
                <input type="email" id="email" name="email" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" placeholder="Correo electronico" @required(true)>
              </div>
              <div class="mb-3">
                <input type="password" id="password" name="password" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" placeholder="Contraseña" @required(true)>
              </div>
              <div class="mb-3">
                <input type="password" id="password_confirmation" name="password_confirmation" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" placeholder="Confirmar contraseña" @required(true)>
              </div>
              <button type="submit" class="w-full font-extrabold bg-[#42a692] rounded text-white text-sm py-1.5 hover:bg-[#2c6f62] transition duration-300">Registrarse</button>
            </form>
          @elseif ($optionSelected == 2)
            <form method="POST" action="{{ route('register') }}" class="w-full">
              @csrf
              <div class="mb-3 mt-3">
                <div class="flex gap-x-2">
                  <input type="hidden" id="type" name="type" value="{{ $optionSelected }}">
                  <input type="hidden" id="code_type" name="code_type">
                  <input wire:model="code" id="code" name="code" type="text" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" x-mask="99999999999" placeholder="Número de ruc" @required(true)>
                  <a x-on:click="searchRUC" class="px-1.5 py-1.5 cursor-pointer bg-blue-600 text-white self-center rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" width="32px" height="32px" viewBox="0 0 32 32" version="1.1">
                      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <g id="icon-111-search" sketch:type="MSArtboardGroup" fill="#FFFFFF">
                          <path d="M19.4271164,20.4271164 C18.0372495,21.4174803 16.3366522,22 14.5,22 C9.80557939,22 6,18.1944206 6,13.5 C6,8.80557939 9.80557939,5 14.5,5 C19.1944206,5 23,8.80557939 23,13.5 C23,15.8472103 22.0486052,17.9722103 20.5104077,19.5104077 L26.5077736,25.5077736 C26.782828,25.782828 26.7761424,26.2238576 26.5,26.5 C26.2219324,26.7780676 25.7796227,26.7796227 25.5077736,26.5077736 L19.4271164,20.4271164 L19.4271164,20.4271164 Z M14.5,21 C18.6421358,21 22,17.6421358 22,13.5 C22,9.35786417 18.6421358,6 14.5,6 C10.3578642,6 7,9.35786417 7,13.5 C7,17.6421358 10.3578642,21 14.5,21 L14.5,21 Z" id="search" sketch:type="MSShapeGroup"/>
                        </g>
                      </g>
                    </svg>
                  </a>
                </div>
              </div>
              <div class="mb-3">
                <input type="text" id="name" name="name" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" placeholder="Razon social" @required(true)>
              </div>
              <div class="mb-3">
                <input type="text" id="address" name="address" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" placeholder="Dirección" @required(true)>
              </div>
              <div class="mb-3">
                <input type="text" id="phone" name="phone" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" x-mask="999-999-999" placeholder="Número de teléfono" @required(true)>
              </div>
              <div class="mb-3">
                <input type="email" id="email" name="email" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" placeholder="Correo electronico" @required(true)>
              </div>
              <div class="mb-3">
                <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" placeholder="Contraseña" @required(true)>
              </div>
              <div class="mb-3">
                <input type="password" id="password_confirmation" pattern="^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" name="password_confirmation" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0" placeholder="Confirmar contraseña" @required(true)>
              </div>
              <div class="mb-3">
                <button type="submit" class="w-full font-extrabold bg-[#42a692] rounded text-white text-sm py-1.5 hover:bg-[#2c6f62] transition duration-300">Registrarse</button>
              </div>
              <div class="flex space-x-1">
                <span class="text-red-500 text-xs">Nota:</span>
                <span class="text-xs">La contraseña debe contener de 8 a más carácteres con una combinación de letras, números, mayúsculas y símbolos.</span>
              </div>
            </form>
          @elseif ($optionSelected == 3)    
          @else 
          @endif
        </div>
        <div class="flex flex-col items-center justify-center space-y-2">
          <div class="space-x-1">
            @if (Route::has('password.request'))
              <a class="text-sm font-normal text-[#42a692] hover:text-[#2c6f62] transition duration-300" href="{{ route('password.request') }}">¿Has olvidado tu contraseña?</a>
            @endif
          </div>
          <div class="space-x-1">
            <span class="text-sm font-poppins">Ya tengo una cuenta,</span> 
            <a class="text-sm font-normal text-[#42a692] hover:text-[#2c6f62] transition duration-300" href="{{ route('login') }}">Iniciar sesión</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@push('js')
  <script>

    function searchDNI(e) {
      var documentsearch = document.getElementById('code').value;
      if (documentsearch.length > 0 && documentsearch.length == 8) {
        fetch(`https://dniruc.apisperu.com/api/v1/dni/${documentsearch}?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InNhbmRybzkxMTExQGdtYWlsLmNvbSJ9.GYhpk3JfM4vjTzv5PNEGxiZFKEwZLV6keYlvvrgX_s4`).then(function(response) {
          // The API call was successful!
          if (response.ok) {
            return response.json();
          } else {
            return Promise.reject(response);
          }
        }).then(function(data) {
          // This is the JSON from our response
          document.getElementById("name").value = data.nombres + " " + data.apellidoPaterno + " " + data.apellidoMaterno;
        }).catch(function(err) {
          // There was an error
          console.warn('Something went wrong.', err);
        });
      } else {
        document.getElementById("code").focus();
      }
    }

    function searchRUC(e) {
      var documentsearch = document.getElementById('code').value;
      if (documentsearch.length > 0 && documentsearch.length == 11) {
        fetch(`https://dniruc.apisperu.com/api/v1/ruc/${documentsearch}?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InNhbmRybzkxMTExQGdtYWlsLmNvbSJ9.GYhpk3JfM4vjTzv5PNEGxiZFKEwZLV6keYlvvrgX_s4`).then(function(response) {
          // The API call was successful!
          if (response.ok) {
            return response.json();
          } else {
            return Promise.reject(response);
          }
        }).then(function(data) {
          // This is the JSON from our response
          document.getElementById("name").value = data.razonSocial;
          document.getElementById("address").value = data.direccion;
        }).catch(function(err) {
          // There was an error
          console.warn('Something went wrong.', err);
        });
      } else {
        document.getElementById("code").focus();
      }
    }

  </script>
@endpush
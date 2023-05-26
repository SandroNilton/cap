<div>
  <div class="flex flex-wrap -mx-2">
    <div class="w-full md:w-1/2 lg:w-1/3 px-2 mb-4">
      <div class="bg-white rounded p-4 mb-4">
        <div class="flex items-center gap-x-3 mb-2">
          <p class="text-sm font-poppins text-gray-600">Trámite:</p>
          <span class="px-3 py-1 text-xs text-white bg-[#42a692] rounded-sm">N° {{ $procedure_data[0]->id }}</span>
          @if ($procedure_data[0]->administrator_id == "" || $procedure_data[0]->administrator_id == NULL)  
            @if (Auth::user()->can('admin.procedures.assign_me'))
              @can('admin.procedures.assign_me')
                <a class="rounded-sm text-sm py-0.5 cursor-pointer" wire:click="assignme({{ $procedure->id }})" title="Tomar trámite">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 43 42" fill="none">
                    <rect x="0.333496" width="42" height="42" rx="21" fill="#42a692"/>
                    <path d="M21.3335 33.1579C15.5861 33.1579 10.8335 28.5158 10.8335 22.8789V20.4474C10.8335 18.7895 12.1598 17.4632 13.8177 17.4632C14.0388 17.4632 14.3703 17.4632 14.5914 17.5737V13.0421C14.5914 11.3842 15.9177 10.0579 17.5756 10.0579C18.0177 10.0579 18.3493 10.1684 18.7914 10.2789C19.2335 9.39473 20.2282 8.8421 21.3335 8.8421C22.4388 8.8421 23.4335 9.39473 23.8756 10.2789C24.2072 10.1684 24.6493 10.0579 25.0914 10.0579C26.7493 10.0579 28.0756 11.3842 28.0756 13.0421V13.9263C28.2967 13.8158 28.6282 13.8158 28.8493 13.8158C30.5072 13.8158 31.8335 15.1421 31.8335 16.8V22.9895C31.8335 28.5158 27.0809 33.1579 21.3335 33.1579ZM13.8177 19.6737C13.3756 19.6737 13.044 20.0053 13.044 20.4474V22.8789C13.044 27.3 16.8019 30.9474 21.3335 30.9474C25.8651 30.9474 29.623 27.3 29.623 22.8789V16.6895C29.623 16.2474 29.2914 15.9158 28.8493 15.9158C28.4072 15.9158 28.0756 16.2474 28.0756 16.6895V19.7842C28.0756 20.4474 27.6335 20.8895 26.9703 20.8895C26.3072 20.8895 25.8651 20.4474 25.8651 19.7842V13.0421C25.8651 12.6 25.5335 12.2684 25.0914 12.2684C24.6493 12.2684 24.3177 12.6 24.3177 13.0421V19.7842C24.3177 20.4474 23.8756 20.8895 23.2124 20.8895C22.5493 20.8895 22.1072 20.4474 22.1072 19.7842V11.8263C22.1072 11.3842 21.7756 11.0526 21.3335 11.0526C20.8914 11.0526 20.5598 11.3842 20.5598 11.8263V19.7842C20.5598 20.4474 20.1177 20.8895 19.4545 20.8895C18.7914 20.8895 18.3493 20.4474 18.3493 19.7842V13.0421C18.3493 12.6 18.0177 12.2684 17.5756 12.2684C17.1335 12.2684 16.8019 12.6 16.8019 13.0421V23.4316C16.8019 24.0947 16.3598 24.5368 15.6967 24.5368C15.0335 24.5368 14.5914 24.0947 14.5914 23.4316V20.3368C14.5914 20.0053 14.2598 19.6737 13.8177 19.6737Z" fill="white"/>
                  </svg>
                </a>
              @endcan
            @else 
              <div>sin asignar</div>
            @endif
          @else
            <div>{{ $procedure_data[0]->administrator->name }}</div>
          @endif
        </div>
        <div class="py-2">
          <div class="mb-3 text-sm flex gap-x-3">
            <span>Fecha de creación:</span>
            <span>{{ $procedure_data[0]->created_at->format('d/m/Y h:i') }}</span>
          </div>
          <div class="mb-3 text-sm flex gap-x-3">
            <span>Tipo de trámite:</span>
            <span>{{ $procedure_data[0]->typeprocedure->name }}</span>
          </div>
          <div class="mb-3 text-sm flex gap-x-3">
            <span>Área:</span>
            <span>{{ $procedure_data[0]->area->name }}</span>
          </div>
          <div class="mb-3 text-sm flex gap-x-3">
            <span>Tipo usuario:</span>
            <span>
              @switch($procedure_data[0]->user->type)
                @case(1)
                    Natural
                  @break
                @case(2)
                    Juridica
                  @break
                @case(3)
                    Agremiado
                  @break
                @case(10)
                    Administrativo
                  @break
              @endswitch
            </span>
          </div>
          <div class="mb-3 text-sm flex gap-x-3">
            <span>Nombre usuario:</span>
            <span>{{ $procedure_data[0]->user->name }}</span>
          </div>
          <div class="text-sm flex gap-x-3">
            <span>Detalle:</span>
            <span>
              @if (!empty($procedure_data[0]->description))
                <p>{{ $procedure_data[0]->description }}</p>
              @else
                <p> -- </p>
              @endif
            </span>
          </div>
       </div>
      </div>
      <div class="bg-white rounded p-4 mb-4">
        <div class="items-center">
          <p class="text-sm font-poppins text-gray-600 mb-3">Agregar comentarios: @error('message') <span class="px-3 text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</span> @enderror</p>
          <div class="flex text-sm mb-3">
            <form wire:submit.prevent="addMessage" class="flex w-full gap-x-3">
              <div wire:loading wire:target="addMessage">
                <div class="flex justify-center items-center h-full">
                  <svg class="h-6 w-6 animate-spin" viewBox="3 3 18 18">
                    <path class="fill-gray-200" d="M12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5ZM3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12Z"></path>
                    <path class="fill-[#42a692]" d="M16.9497 7.05015C14.2161 4.31648 9.78392 4.31648 7.05025 7.05015C6.65973 7.44067 6.02656 7.44067 5.63604 7.05015C5.24551 6.65962 5.24551 6.02646 5.63604 5.63593C9.15076 2.12121 14.8492 2.12121 18.364 5.63593C18.7545 6.02646 18.7545 6.65962 18.364 7.05015C17.9734 7.44067 17.3403 7.44067 16.9497 7.05015Z"></path>
                  </svg>
                </div>
              </div>
              <input type="text" wire:model="message" name="message" class="rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 @if($errors->has('message')) border-[#d72d30] @endif" placeholder="Ingrese un mensaje"/>
              <button type="submit" class="bg-[#42a692] px-2 rounded text-white text-sm py-1 hover:bg-[#2c6f62] transition duration-300"">Enviar</button>
            </form>
          </div>
          <hr>
          <div class="mt-3 overflow-y-scroll scrollbar h-48">
            @forelse ($procedure_messages as $procedure_message)
              <div class="group flex items-center gap-x-3 mb-2">                
                <div class="transform relative flex items-center p-3 bg-[#42a692] text-white rounded flex-col md:flex-row space-y-4 md:space-y-0">
                  <div class="flex-auto">
                    <h1 class="text-xs">{{ $procedure_message->created_at->format('d/m/Y h:i') }}</h1>
                    <h1 class="text-sm font-bold">{{ $procedure_message->description }}</h1>
                  </div>
                </div>
              </div>
            @empty
              <li class="w-full border border-dashed border-[#2c6f62] transition duration-300 flex flex-row rounded-md">
                <div class="rounded-sm w-full flex p-2.5 justify-center">
                  <span class="text-xs ">Sin mensajes</span>
                </div>
              </li>
            @endforelse
          </div>
        </div>
      </div>
    </div>
    <div class="w-full md:w-1/2 lg:w-1/3 px-2 mb-4">
      @can('admin.procedures.assign_area')
        <div class="bg-white rounded p-4 mb-4">
          <div class="items-center">
            <p class="text-sm font-poppins text-gray-600 mb-3">Asignar trámite a otra área: @error('area_id') <span class="px-3 text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</span> @enderror</p>
            <div class="flex text-sm gap-x-3">
              <form wire:submit.prevent="changeArea" class="flex w-full gap-x-3">
                <div wire:loading wire:target="changeArea">
                  <div class="flex justify-center items-center h-full">
                    <svg class="h-6 w-6 animate-spin" viewBox="3 3 18 18">
                      <path class="fill-gray-200" d="M12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5ZM3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12Z"></path>
                      <path class="fill-[#42a692]" d="M16.9497 7.05015C14.2161 4.31648 9.78392 4.31648 7.05025 7.05015C6.65973 7.44067 6.02656 7.44067 5.63604 7.05015C5.24551 6.65962 5.24551 6.02646 5.63604 5.63593C9.15076 2.12121 14.8492 2.12121 18.364 5.63593C18.7545 6.02646 18.7545 6.65962 18.364 7.05015C17.9734 7.44067 17.3403 7.44067 16.9497 7.05015Z"></path>
                    </svg>
                  </div>
                </div>
                <select wire:model="area_id" class="text-[#183247] rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 @if($errors->has('area_id')) border-[#d72d30] @endif">
                  <option value="">Seleccione el area</option>
                  @foreach ($areas as $area)
                    <option value="{{ $area->id }}" selected>{{ $area->name }}</option>
                  @endforeach
                </select>
                <button class="bg-[#42a692] px-2 rounded text-white text-sm py-1 hover:bg-[#2c6f62] transition duration-300">Asignar</button>
              </form>
            </div>
          </div>
        </div>
      @endcan
      @can('admin.procedures.assign_user')
        <div class="bg-white rounded p-4 mb-4">
          <div class="items-center">
            <p class="text-sm font-poppins text-gray-600 mb-3">Asignar trámite a usuario: @error('user_id') <span class="px-3 text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</span> @enderror</p>
            <div class="flex text-sm gap-x-3">
              <form wire:submit.prevent="assignUser" class="flex w-full gap-x-3">
                <div wire:loading wire:target="assignUser">
                  <div class="flex justify-center items-center h-full">
                    <svg class="h-6 w-6 animate-spin" viewBox="3 3 18 18">
                      <path class="fill-gray-200" d="M12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5ZM3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12Z"></path>
                      <path class="fill-[#42a692]" d="M16.9497 7.05015C14.2161 4.31648 9.78392 4.31648 7.05025 7.05015C6.65973 7.44067 6.02656 7.44067 5.63604 7.05015C5.24551 6.65962 5.24551 6.02646 5.63604 5.63593C9.15076 2.12121 14.8492 2.12121 18.364 5.63593C18.7545 6.02646 18.7545 6.65962 18.364 7.05015C17.9734 7.44067 17.3403 7.44067 16.9497 7.05015Z"></path>
                    </svg>
                  </div>
                </div>
                <select wire:model="user_id" class="text-[#183247] rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 @if($errors->has('user_id')) border-[#d72d30] @endif">
                  <option value="">Seleccione el usuario</option>
                  @foreach ($users as $user)
                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                  @endforeach
                </select>
                <button class="bg-[#42a692] px-2 rounded text-white text-sm py-1 hover:bg-[#2c6f62] transition duration-300">Asignar</button>
              </form>
            </div>
          </div>
        </div>
      @endcan
      <div class="bg-white rounded p-4 mb-4">
        <div class="items-center">
          <p class="text-sm font-poppins text-gray-600 mb-3">Requisitos:  @error('state_id') <span class="px-3 text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</span> @enderror</p>
          <div class="flex flex-col columns-1 grid-cols-1 text-sm gap-x-3">
            @forelse ($procedure_files as $procedure_file)  
              <li class="min-w-full border border-dashed border-[#2c6f62] transition duration-300 flex mb-2 rounded-md">
                <div class="rounded-sm flex flex-1 items-center p-2.5 gap-x-3">

                  <button wire:click="downloadFile({{ $procedure_file->id }}, '{{ $procedure_file->name }}', '{{ $procedure_file->file }}')" class="flex flex-col rounded-sm w-8 h-11 bg-[#42a692] justify-center items-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                  </button>

                  <div class="flex-1">
                    <div class="text-xs mb-0.5 w-44 truncate" title="{{ $procedure_file->name }}">{{ $procedure_file->name }}</div>
                    <div class="flex gap-x-3">
                      <form wire:submit.prevent="changeStateFile({{ $procedure_file->id }}, {{ $procedure_file->state }})" class="flex w-full gap-x-3">
                        <select id="{{ $procedure_file->id }}" wire:model="state_id" class="text-[#183247] rounded peer bg-transparent block w-full py-0.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0">
                          <option value="1" @if($procedure_file->state == 1) @selected(true) @else @selected(false) @endif>Sin verificar</option>
                          <option value="2" @if($procedure_file->state == 2) @selected(true) @else @selected(false) @endif>Aceptado</option>
                          <option value="3" @if($procedure_file->state == 3) @selected(true) @else @selected(false) @endif>Rechazado</option>
                        </select>
                        <button class="p-0.5 px-2 bg-[#42a692] rounded text-white text-sm hover:bg-[#2c6f62] transition duration-300">
                          Asignar
                        </button>
                      </form>
                    </div>
                  </div>
                </div> 
              </li>
            @empty
              <li class="w-full border border-dashed border-[#2c6f62] transition duration-300 flex flex-row rounded-md">
                <div class="rounded-sm w-full flex p-2.5 justify-center">
                  <span class="text-xs ">Sin adjuntado</span>
                </div>
              </li>
            @endforelse
          </div>
        </div>
      </div>
    </div>
    <div class="w-full md:w-1/2 lg:w-1/3 px-2">
      <div class="bg-white rounded p-4">
        <div class="flex w-full flex-col scrollbar overflow-y-scroll">
          <div class="items-center">
            <p class="text-sm font-poppins text-gray-600 mb-3">Historial:</p>
            <div class="flex text-sm gap-x-3">
            </div>
          </div>
          @forelse ($procedure_histories as $procedurehistory)
            <div class="group flex items-center gap-x-3 mb-3">
              <div class="flex flex-col rounded-sm w-5 h-5 justify-center items-center">
                @switch($procedurehistory->state)
                  @case(1)
                    <svg @click="isSettingsPanelOpen = true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="cursor-pointer h-6 w-6" viewBox="0 0 64 64" aria-hidden="true" role="img" class="iconify iconify--emojione-monotone" preserveAspectRatio="xMidYMid meet">
                      <path d="M32 2C15.432 2 2 15.431 2 32c0 16.569 13.432 30 30 30s30-13.432 30-30C62 15.431 48.568 2 32 2m8.953 42.678c-2.049 1.752-4.943 2.627-8.684 2.627c-3.82 0-6.826-.863-9.014-2.588c-2.189-1.727-3.283-4.098-3.283-7.117h5.787c.188 1.326.557 2.316 1.105 2.973c1.006 1.195 2.727 1.791 5.166 1.791c1.461 0 2.646-.156 3.557-.473c1.73-.604 2.594-1.725 2.594-3.365c0-.957-.424-1.699-1.27-2.225c-.848-.512-2.191-.965-4.029-1.357l-3.141-.689c-3.088-.684-5.209-1.424-6.363-2.224c-1.957-1.339-2.934-3.432-2.934-6.28c0-2.599.957-4.757 2.869-6.476c1.912-1.72 4.723-2.579 8.43-2.579c3.096 0 5.734.81 7.922 2.431c2.184 1.621 3.33 3.974 3.438 7.058h-5.828c-.107-1.745-.887-2.985-2.34-3.721c-.969-.485-2.174-.729-3.613-.729c-1.602 0-2.879.315-3.834.945s-1.434 1.509-1.434 2.638c0 1.037.471 1.811 1.414 2.322c.604.342 1.889.742 3.855 1.201l5.092 1.201c2.23.524 3.904 1.227 5.018 2.105c1.729 1.365 2.594 3.341 2.594 5.925c0 2.651-1.023 4.854-3.074 6.606" fill="#7C7877"/>
                    </svg>
                    @break
                  @case(2)
                    <svg @click="isSettingsPanelOpen = true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="cursor-pointer h-6 w-6" viewBox="0 0 64 64" aria-hidden="true" role="img" class="iconify iconify--emojione-monotone" preserveAspectRatio="xMidYMid meet">
                      <path d="M28.216 35.543h7.431l-3.666-11.418z" fill="#CC9226"/>
                      <path d="M32 2C15.432 2 2 15.431 2 32c0 16.569 13.432 30 30 30s30-13.432 30-30C62 15.431 48.568 2 32 2m7.167 44.508l-1.914-5.965H26.567L24.6 46.508h-6.342l10.358-29.016h6.859l10.266 29.016h-6.574" fill="#CC9226"/>
                    </svg>
                    @break
                  @case(3)
                    <svg @click="isSettingsPanelOpen = true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="cursor-pointer h-6 w-6" viewBox="0 0 64 64" aria-hidden="true" role="img" class="iconify iconify--emojione-monotone" preserveAspectRatio="xMidYMid meet">
                      <path d="M32.01 21.784c-2.402 0-4.318.886-5.748 2.657s-2.146 4.291-2.146 7.56c0 3.268.717 5.787 2.146 7.559s3.346 2.657 5.748 2.657s4.309-.886 5.719-2.657s2.115-4.291 2.115-7.559c0-3.255-.705-5.771-2.115-7.55s-3.317-2.667-5.719-2.667" fill="#CC5626"/>
                      <path d="M32 2C15.432 2 2 15.432 2 32s13.432 30 30 30s30-13.432 30-30S48.568 2 32 2m9.518 41.969c-2.191 2.258-5.361 3.386-9.508 3.386s-7.316-1.128-9.508-3.386c-2.939-2.769-4.41-6.759-4.41-11.968c0-5.315 1.471-9.305 4.41-11.969c2.191-2.258 5.361-3.387 9.508-3.387s7.316 1.129 9.508 3.387c2.928 2.664 4.391 6.653 4.391 11.969c-.001 5.209-1.464 9.199-4.391 11.968" fill="#CC5626"/>
                    </svg>
                    @break
                  @case(4)
                    <svg @click="isSettingsPanelOpen = true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="cursor-pointer h-6 w-6" viewBox="0 0 64 64" aria-hidden="true" role="img" class="iconify iconify--emojione-monotone" preserveAspectRatio="xMidYMid meet">
                      <path d="M36.604 23.043c-.623-.342-1.559-.512-2.805-.512h-6.693v7.795h6.525c1.295 0 2.268-.156 2.916-.473c1.146-.551 1.721-1.639 1.721-3.268c0-1.757-.555-2.939-1.664-3.542" fill="#264ECC"/>
                      <path d="M32.002 2C15.434 2 2 15.432 2 32s13.434 30 30.002 30s30-13.432 30-30s-13.432-30-30-30m12.82 44.508h-6.693a20.582 20.582 0 0 1-.393-1.555a14.126 14.126 0 0 1-.256-2.5l-.041-2.697c-.023-1.85-.344-3.084-.959-3.701c-.613-.615-1.766-.924-3.453-.924h-5.922v11.377H21.18V17.492h13.879c1.984.039 3.51.289 4.578.748s1.975 1.135 2.717 2.027a9.07 9.07 0 0 1 1.459 2.441c.357.893.537 1.908.537 3.051c0 1.379-.348 2.732-1.043 4.064s-1.844 2.273-3.445 2.826c1.338.537 2.287 1.303 2.844 2.293c.559.99.838 2.504.838 4.537v1.949c0 1.324.053 2.225.16 2.697c.16.748.533 1.299 1.119 1.652v.731z" fill="#264ECC"/>
                    </svg>
                    @break
                  @case(5)
                    <svg @click="isSettingsPanelOpen = true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="cursor-pointer h-6 w-6" viewBox="0 0 64 64" aria-hidden="true" role="img" class="iconify iconify--emojione-monotone" preserveAspectRatio="xMidYMid meet">
                      <path d="M28.216 35.543h7.431l-3.666-11.418z" fill="#2BA532"/>
                      <path d="M32 2C15.432 2 2 15.431 2 32c0 16.569 13.432 30 30 30s30-13.432 30-30C62 15.431 48.568 2 32 2m7.167 44.508l-1.914-5.965H26.567L24.6 46.508h-6.342l10.358-29.016h6.859l10.266 29.016h-6.574" fill="#2BA532"/>
                    </svg>
                    @break
                  @case(6)
                    <svg @click="isSettingsPanelOpen = true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="cursor-pointer h-6 w-6" viewBox="0 0 64 64" aria-hidden="true" role="img" class="iconify iconify--emojione-monotone" preserveAspectRatio="xMidYMid meet">
                      <path d="M36.604 23.043c-.623-.342-1.559-.512-2.805-.512h-6.693v7.795h6.525c1.295 0 2.268-.156 2.916-.473c1.146-.551 1.721-1.639 1.721-3.268c0-1.757-.555-2.939-1.664-3.542" fill="#B22916"/>
                      <path d="M32.002 2C15.434 2 2 15.432 2 32s13.434 30 30.002 30s30-13.432 30-30s-13.432-30-30-30m12.82 44.508h-6.693a20.582 20.582 0 0 1-.393-1.555a14.126 14.126 0 0 1-.256-2.5l-.041-2.697c-.023-1.85-.344-3.084-.959-3.701c-.613-.615-1.766-.924-3.453-.924h-5.922v11.377H21.18V17.492h13.879c1.984.039 3.51.289 4.578.748s1.975 1.135 2.717 2.027a9.07 9.07 0 0 1 1.459 2.441c.357.893.537 1.908.537 3.051c0 1.379-.348 2.732-1.043 4.064s-1.844 2.273-3.445 2.826c1.338.537 2.287 1.303 2.844 2.293c.559.99.838 2.504.838 4.537v1.949c0 1.324.053 2.225.16 2.697c.16.748.533 1.299 1.119 1.652v.731z" fill="#B22916"/>
                    </svg>
                    @break
                @endswitch
              </div>
              <span class="text-sm gap-x-3">
                {{ $procedurehistory->action }} -
                {{ $procedurehistory->area->name }} - 
                {{ $procedurehistory->created_at->format('d/m/Y h:i') }}
              </span>
            </div>
          @empty
            <li class="w-full border border-dashed border-[#2c6f62] transition duration-300 flex flex-row rounded-md">
              <div class="rounded-sm w-full flex p-2.5 justify-center">
                <span class="text-xs ">Sin historial</span>
              </div>
            </li>
          @endforelse
        </div>
      </div>  
    </div>
  </div>
</div>

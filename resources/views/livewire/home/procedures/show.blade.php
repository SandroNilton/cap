<div>
  <div class="flex flex-wrap -mx-2">
    <div class="w-full md:w-1/2 lg:w-1/3 px-2 mb-4">
      <div class="bg-white rounded p-4 mb-4">
        <div class="flex items-center gap-x-3 mb-2">
          <p class="text-sm font-poppins text-gray-600">Trámite:</p>
          <span class="px-3 py-1 text-xs text-white bg-[#42a692] rounded-sm">N° {{ $procedure_data[0]->id }}</span>
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
    </div>
    <div class="w-full md:w-1/2 lg:w-1/3 px-2 mb-4">
      @if ($procedure_data[0]->state == 5)
        <div class="bg-white rounded p-4 mb-4">
          <div class="items-center">
            <p class="text-sm font-poppins text-gray-600 mb-3">Archivos de respuesta:  @error('state_id') <span class="px-3 text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</span> @enderror</p>
            <div class="flex flex-col columns-1 grid-cols-1 text-sm gap-x-3">
              @forelse ($procedure_files_finish as $procedure_file_finish)  
                <li class="min-w-full border border-dashed border-[#2c6f62] transition duration-300 flex mb-2 rounded-md">
                  <div class="rounded-sm flex flex-1 items-center p-2.5 gap-x-3">
                    <button wire:click="downloadFile({{ $procedure_file_finish->id }}, '{{ $procedure_file_finish->name }}', '{{ $procedure_file_finish->file }}')" class="flex flex-col rounded-sm w-8 h-11 bg-[#42a692] justify-center items-center cursor-pointer">
                      <svg xmlns="http://www.w3.org/2000/svg" class="text-white h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                      </svg>
                    </button>
                    <div class="flex-1">
                      <div class="text-xs mb-0.5 w-44 truncate" title="{{ $procedure_file_finish->name }}">{{ $procedure_file_finish->name }}</div>
                    </div>
                  </div> 
                </li>
              @empty
                <li class="w-full border border-dashed border-[#2c6f62] transition duration-300 flex flex-row rounded-md">
                  <div class="rounded-sm w-full flex p-2.5 justify-center">
                    <span class="text-xs ">Sin adjuntado de finalización</span>
                  </div>
                </li>
              @endforelse
            </div>
          </div>
        </div>     
      @endif
    </div>
    @if ($procedure_files_refused->count() > 0)
      <div class="w-full md:w-1/2 lg:w-1/3 px-2">
        <div class="bg-white rounded p-4">
           archivos erroneos
        </div>
      @endif
    </div>
  </div>
</div>
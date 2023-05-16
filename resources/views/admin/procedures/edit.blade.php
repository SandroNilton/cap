<x-admin-layout>

  @livewire('admin.procedures.edit')

   @push('name')
    ESTADOS
  @endpush

  @push("content")
    <span class="group flex items-center gap-x-5 rounded-md px-2.5 py-2 transition-all duration-75">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="h-6 w-6" viewBox="0 0 64 64" aria-hidden="true" role="img" class="iconify iconify--emojione-monotone" preserveAspectRatio="xMidYMid meet">
        <path d="M32 2C15.432 2 2 15.431 2 32c0 16.569 13.432 30 30 30s30-13.432 30-30C62 15.431 48.568 2 32 2m8.953 42.678c-2.049 1.752-4.943 2.627-8.684 2.627c-3.82 0-6.826-.863-9.014-2.588c-2.189-1.727-3.283-4.098-3.283-7.117h5.787c.188 1.326.557 2.316 1.105 2.973c1.006 1.195 2.727 1.791 5.166 1.791c1.461 0 2.646-.156 3.557-.473c1.73-.604 2.594-1.725 2.594-3.365c0-.957-.424-1.699-1.27-2.225c-.848-.512-2.191-.965-4.029-1.357l-3.141-.689c-3.088-.684-5.209-1.424-6.363-2.224c-1.957-1.339-2.934-3.432-2.934-6.28c0-2.599.957-4.757 2.869-6.476c1.912-1.72 4.723-2.579 8.43-2.579c3.096 0 5.734.81 7.922 2.431c2.184 1.621 3.33 3.974 3.438 7.058h-5.828c-.107-1.745-.887-2.985-2.34-3.721c-.969-.485-2.174-.729-3.613-.729c-1.602 0-2.879.315-3.834.945s-1.434 1.509-1.434 2.638c0 1.037.471 1.811 1.414 2.322c.604.342 1.889.742 3.855 1.201l5.092 1.201c2.23.524 3.904 1.227 5.018 2.105c1.729 1.365 2.594 3.341 2.594 5.925c0 2.651-1.023 4.854-3.074 6.606" fill="#7C7877"/>
      </svg>
      <div class="flex flex-col items-start justify-between font-light text-gray-600">
        <p class="text-[15px]">Sin asignar</p>
      </div>
    </span>
    <span class="group flex items-center gap-x-5 rounded-md px-2.5 py-2 transition-all duration-75">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="h-6 w-6" viewBox="0 0 64 64" aria-hidden="true" role="img" class="iconify iconify--emojione-monotone" preserveAspectRatio="xMidYMid meet">
        <path d="M28.216 35.543h7.431l-3.666-11.418z" fill="#CC9226"/>
        <path d="M32 2C15.432 2 2 15.431 2 32c0 16.569 13.432 30 30 30s30-13.432 30-30C62 15.431 48.568 2 32 2m7.167 44.508l-1.914-5.965H26.567L24.6 46.508h-6.342l10.358-29.016h6.859l10.266 29.016h-6.574" fill="#CC9226"/>
      </svg>
      <div class="flex flex-col items-start justify-between font-light text-gray-600">
        <p class="text-[15px]">Asignado</p>
      </div>
    </span>
    <span class="group flex items-center gap-x-5 rounded-md px-2.5 py-2 transition-all duration-75">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="h-6 w-6" viewBox="0 0 64 64" aria-hidden="true" role="img" class="iconify iconify--emojione-monotone" preserveAspectRatio="xMidYMid meet">
        <path d="M32.01 21.784c-2.402 0-4.318.886-5.748 2.657s-2.146 4.291-2.146 7.56c0 3.268.717 5.787 2.146 7.559s3.346 2.657 5.748 2.657s4.309-.886 5.719-2.657s2.115-4.291 2.115-7.559c0-3.255-.705-5.771-2.115-7.55s-3.317-2.667-5.719-2.667" fill="#CC5626"/>
        <path d="M32 2C15.432 2 2 15.432 2 32s13.432 30 30 30s30-13.432 30-30S48.568 2 32 2m9.518 41.969c-2.191 2.258-5.361 3.386-9.508 3.386s-7.316-1.128-9.508-3.386c-2.939-2.769-4.41-6.759-4.41-11.968c0-5.315 1.471-9.305 4.41-11.969c2.191-2.258 5.361-3.387 9.508-3.387s7.316 1.129 9.508 3.387c2.928 2.664 4.391 6.653 4.391 11.969c-.001 5.209-1.464 9.199-4.391 11.968" fill="#CC5626"/>
      </svg>
      <div class="flex flex-col items-start justify-between font-light text-gray-600">
        <p class="text-[15px]">Observado</p>
      </div>
    </span>
    <span class="group flex items-center gap-x-5 rounded-md px-2.5 py-2 transition-all duration-75">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="h-6 w-6" viewBox="0 0 64 64" aria-hidden="true" role="img" class="iconify iconify--emojione-monotone" preserveAspectRatio="xMidYMid meet">
        <path d="M36.604 23.043c-.623-.342-1.559-.512-2.805-.512h-6.693v7.795h6.525c1.295 0 2.268-.156 2.916-.473c1.146-.551 1.721-1.639 1.721-3.268c0-1.757-.555-2.939-1.664-3.542" fill="#264ECC"/>
        <path d="M32.002 2C15.434 2 2 15.432 2 32s13.434 30 30.002 30s30-13.432 30-30s-13.432-30-30-30m12.82 44.508h-6.693a20.582 20.582 0 0 1-.393-1.555a14.126 14.126 0 0 1-.256-2.5l-.041-2.697c-.023-1.85-.344-3.084-.959-3.701c-.613-.615-1.766-.924-3.453-.924h-5.922v11.377H21.18V17.492h13.879c1.984.039 3.51.289 4.578.748s1.975 1.135 2.717 2.027a9.07 9.07 0 0 1 1.459 2.441c.357.893.537 1.908.537 3.051c0 1.379-.348 2.732-1.043 4.064s-1.844 2.273-3.445 2.826c1.338.537 2.287 1.303 2.844 2.293c.559.99.838 2.504.838 4.537v1.949c0 1.324.053 2.225.16 2.697c.16.748.533 1.299 1.119 1.652v.731z" fill="#264ECC"/>
      </svg>
      <div class="flex flex-col items-start justify-between font-light text-gray-600">
        <p class="text-[15px]">Revisado</p>
      </div>
    </span>
    <span class="group flex items-center gap-x-5 rounded-md px-2.5 py-2 transition-all duration-75">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="h-6 w-6" viewBox="0 0 64 64" aria-hidden="true" role="img" class="iconify iconify--emojione-monotone" preserveAspectRatio="xMidYMid meet">
        <path d="M28.216 35.543h7.431l-3.666-11.418z" fill="#2BA532"/>
        <path d="M32 2C15.432 2 2 15.431 2 32c0 16.569 13.432 30 30 30s30-13.432 30-30C62 15.431 48.568 2 32 2m7.167 44.508l-1.914-5.965H26.567L24.6 46.508h-6.342l10.358-29.016h6.859l10.266 29.016h-6.574" fill="#2BA532"/>
      </svg>
      <div class="flex flex-col items-start justify-between font-light text-gray-600">
        <p class="text-[15px]">Aprobado</p>
      </div>
    </span>
    <span class="group flex items-center gap-x-5 rounded-md px-2.5 py-2 transition-all duration-75">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="h-6 w-6" viewBox="0 0 64 64" aria-hidden="true" role="img" class="iconify iconify--emojione-monotone" preserveAspectRatio="xMidYMid meet">
        <path d="M36.604 23.043c-.623-.342-1.559-.512-2.805-.512h-6.693v7.795h6.525c1.295 0 2.268-.156 2.916-.473c1.146-.551 1.721-1.639 1.721-3.268c0-1.757-.555-2.939-1.664-3.542" fill="#B22916"/>
        <path d="M32.002 2C15.434 2 2 15.432 2 32s13.434 30 30.002 30s30-13.432 30-30s-13.432-30-30-30m12.82 44.508h-6.693a20.582 20.582 0 0 1-.393-1.555a14.126 14.126 0 0 1-.256-2.5l-.041-2.697c-.023-1.85-.344-3.084-.959-3.701c-.613-.615-1.766-.924-3.453-.924h-5.922v11.377H21.18V17.492h13.879c1.984.039 3.51.289 4.578.748s1.975 1.135 2.717 2.027a9.07 9.07 0 0 1 1.459 2.441c.357.893.537 1.908.537 3.051c0 1.379-.348 2.732-1.043 4.064s-1.844 2.273-3.445 2.826c1.338.537 2.287 1.303 2.844 2.293c.559.99.838 2.504.838 4.537v1.949c0 1.324.053 2.225.16 2.697c.16.748.533 1.299 1.119 1.652v.731z" fill="#B22916"/>
      </svg>
      <div class="flex flex-col items-start justify-between font-light text-gray-600">
        <p class="text-[15px]">Rechazado</p>
      </div>
    </span>
  @endpush

</x-admin-layout>
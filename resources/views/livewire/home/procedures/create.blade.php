<div>
  @push('header-menu')
    <div class="bg-[#f5f7f9] p-1.5 border-b border-[#cfd7df] px-3">
      <a href="{{ route('home.procedures.index') }}" class="w-fit items-center inline-flex justify-center px-3 py-1.5 text-sm font-normal bg-white rounded border border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 shadow-sm hover:bg-gray-50">
        <ion-icon name="list" class="pr-2"></ion-icon> Lista de trámites
      </a>
    </div>
  @endpush
  <div class="flex items-center justify-center">
    <div class="w-full rounded bg-white p-4">
      <form enctype="multipart/form-data" action="{{ route('home.procedures.store') }}" method="POST">
        @csrf
        <div class="mb-4">
          <select wire:model="selectedCategory" name="category_id" id="category_id" class="text-[#183247] cursor-pointer rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 @if($errors->has('category_id')) border-[#d72d30] @endif" @required(true)>
            <option value="">Seleccione la categoria</option>
            @forelse ($categories as $category)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @empty
              No hay categorias
            @endforelse
          </select>
          @error('category_id')
            <span class="text-xxxs text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
          @enderror
        </div>
        @if ($selectedCategory)
          <div class="mb-4">
            <select wire:model="selectedTypeprocedure" name="typeprocedure_id" id="typeprocedure_id" class="text-[#183247] cursor-pointer rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0 @if($errors->has('typeprocedure_id')) border-[#d72d30] @endif" @required(true)>
              <option value="">Seleccione tipo de trámite</option>
              @forelse ($typeprocedures as $typeprocedure)
                <option value="{{ $typeprocedure->id }}">{{ $typeprocedure->name }}</option>
              @empty
                No hay tipos de trámites relacionados con la categoría seleccioanda
              @endforelse
            </select>
            @error('typeprocedure_id')
              <span class="text-xxxs text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
            @enderror
          </div>
        @endif
        @if ($selectedTypeprocedure)
          <div class="mb-4">
            @forelse ($requirements as $requirement)
              <div class="mb-4">
                <label class="mb-1.5 block text-sm">Adjuntar ({{  $requirement->name  }})</label>
                <input type="hidden" name="files[][id]" value="{{ $requirement->id }}">
                <input name="files[][file]" id="files" class="text-[#183247] w-full bg-white py-1.5 px-3.5 relative m-0 block flex-auto cursor-pointer rounded border border-[#cfd7df] hover:border-[#42a692] transition-all bg-clip-padding text-sm duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded file:border-0 file:border-solid file:border-inherit file:bg-[#42a692] file:text-white file:px-3 file:py-[0.32rem] file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] focus:outline-none" type="file" accept="" @required(true)>
              </div>
            @empty
              No hay requisitos relacionados con el tipo de tramite
            @endforelse
          </div>
        @endif
        <div class="mb-4">
          <textarea type="text" maxlength="255" name="description" id="description" placeholder="Descripción" class="text-[#183247] rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0"></textarea>
        </div>
        <button class="font-extrabold bg-[#42a692] rounded text-white text-sm py-1.5 px-3 hover:bg-[#2c6f62] transition duration-300">Crear tramite</button>
      </form>
    </div>
  </div>
</div>
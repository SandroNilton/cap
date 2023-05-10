<x-administrator-layout>

  <div class="min-w-full flex items-center justify-center">
    <section class="container max-w-full rounded-sm">
      <div class="col-span-12 rounded bg-white pt-3 pb-3 pr-5 pl-5">
        <div class="flex flex-col">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-5">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-5 text-[#183247]">
              <form action="{{ route('administrator.areas.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                  <label class="mb-1.5 block text-xxs font-medium text-[#475867]">Nombre <span class="text-red-600">*</span></label>
                  <input type="text" name="name" id="name" value="{{ old('name') }}" autofocus placeholder="Nombre" class="text-[#183247] rounded block w-full pt-0.5 pr-3 pl-3 pb-1 text-xs font-normal border border-[#cfd7df] hover:border-[#475867] transition duration-300 @if($errors->has('name')) border-[#d72d30] @endif"/>
                  @error('name')
                    <span class="text-xxxs text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
                  @enderror
                </div>
                <div class="mb-4">
                  <label class="mb-1.5 block text-xxs font-medium text-[#475867]">Descripción</label>
                  <textarea type="text" maxlength="255" name="description" id="description" placeholder="Descripción" class="text-[#183247] rounded block w-full pt-2.5 pb-2.5 text-xs font-normal border border-[#cfd7df] hover:border-[#475867] transition-all"></textarea>
                </div>
                <div class="mb-4">
                  <label class="mb-1.5 block text-xxs font-medium text-[#475867]">Estado</label>
                  <select id="state" name="state"  class="text-[#183247] rounded block w-full pt-0.5 pr-3 pl-3 pb-1 text-xs font-normal border border-[#cfd7df] hover:border-[#475867] transition duration-300">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                  </select>
                </div>
                <button class="bg-[#264966] text-white text-xs pt-1 pr-3.5 pb-1 pl-3.5 rounded font-medium border border-[#12344d] bg-gradient-to-b">Crear área</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>       

</x-administrator-layout>
<div>
  <div class="flex items-center justify-center">
    <section class="container max-w-full rounded-sm bg-white p-4">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-5">
          <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-5 text-[#183247]">
            <div class="mb-4">
              <span class="text-[#183247] text-sm">{{ $customer_data[0]->name }}</span>
            </div>
            <form action="{{ route('admin.customers.update', $customer_data[0]->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-4">
                <select id="state" name="state"  class="text-[#183247] rounded peer bg-transparent block w-full py-1.5 text-sm border-[#cfd7df] hover:border-[#42a692] transition duration-300 focus:border-[#42a692] focus:outline-none focus:ring-0">
                  <option value="1" @if($customer_data[0]->state == true) @selected(true) @else @selected(false) @endif >Activo</option>
                  <option value="0" @if($customer_data[0]->state == false) @selected(true) @else @selected(false) @endif >Inactivo</option>
                </select>
              </div>
              <button class="bg-[#42a692] px-2 rounded text-white text-sm py-1.5 hover:bg-[#2c6f62] transition duration-300">Actualizar cliente</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

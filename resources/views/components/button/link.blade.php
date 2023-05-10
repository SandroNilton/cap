<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-5 py-1.5 text-xs rounded border text-white border-[#42a692] bg-[#42a692] hover:bg-[#2c6f62] hover:border-[#2c6f62] transition duration-300 focus:outline-none focus:ring-0']) }}>
  {{ $slot }}
</button>

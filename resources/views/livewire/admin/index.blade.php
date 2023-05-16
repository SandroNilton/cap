<div>
  <div class="flex flex-col w-full mb-3 lg:flex-row lg:space-x-2 space-y-2 lg:space-y-0 h-full">
    <div class="w-full lg:w-2/3 rounded bg-white border shadow-[0_1px_0_0_#cfd7df] py-2 px-4 h-full">
      <div>
        {!! $chartprocedures->renderHtml() !!}
      </div>
    </div>
    <div class="w-full lg:w-1/3 mt-10 lg:mt-0 rounded bg-white border shadow-[0_1px_0_0_#cfd7df] p-6">
      <div>
        {!! $chartprocedurespie->renderHtml() !!}
      </div>
    </div>
  </div>
</div>

@push('js')
  {!! $chartprocedures->renderChartJsLibrary() !!}
  {!! $chartprocedures->renderJs() !!}

  {!! $chartprocedurespie->renderChartJsLibrary() !!}
  {!! $chartprocedurespie->renderJs() !!}
@endpush
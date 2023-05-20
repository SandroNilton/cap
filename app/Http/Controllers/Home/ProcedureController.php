<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeProcedure;
use App\Models\Procedure;
use App\Models\Procedurehistory;
use App\Models\Fileprocedure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home.procedures.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.procedures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $typeprocedure_area = TypeProcedure::where([['id', '=', $request->typeprocedure_id]])->get();
      $procedure = Procedure::create([
        'typeprocedure_id' => $request->typeprocedure_id,
        'area_id' => $typeprocedure_area[0]->area_id,
        'user_id' => auth()->user()->id,
        'administrator_id' => NULL,
        'description' => $request->description,
        'date' => Carbon::now(),
        'state' => 1
      ]);
      Procedurehistory::create([
        'procedure_id' => $procedure->id,
        'typeprocedure_id' => $request->typeprocedure_id,
        'area_id' => $typeprocedure_area[0]->area_id,
        'user_id' => auth()->user()->id,
        'administrator_id' => NULL,
        'description' => $request->description,
        'action' => 'Creación de tramite',
        'state' => 1
      ]);
      $date = Carbon::now()->format('Y');
      foreach ($request['files'] as $file) {
        $file_url = Storage::put('procedures/'.$date."/".$procedure->id."", $file['file']);
        Fileprocedure::create([
          'procedure_id' => $procedure->id,
          'requirement_id' => $file['id'],
          'name' => $file['file']->GetClientOriginalName(),
          'file' => (string)$file_url,
          'state' => '1'
        ]);
      }
      return redirect()->route('home.procedures.index')->notice('El trámite se creó correctamente', 'alert');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('home.procedures.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

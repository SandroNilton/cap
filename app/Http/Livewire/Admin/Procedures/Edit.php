<?php

namespace App\Http\Livewire\Admin\Procedures;
use Livewire\Component;
use App\Models\Procedurehistory;
use App\Models\Proceduremessage;
use App\Models\Procedure;
use App\Models\Area;
use App\Models\User;
use App\Models\Fileprocedure;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class Edit extends Component
{
    use WithFileUploads;

    public $message;
    public $procedure_messages;
    public $procedure_files;
    public $procedure_histories;
    public $areas;
    public $users;
    public $area_id;
    public $user_id;
    public $state_id;
    public $procedure;
    public $procedure_data;
    public $procedure_accepted;
    public $file_finish = [];
    public $message_finish;
    public $procedure_files_finish;

    public function mount()
    {
        $this->procedure = Route::current()->parameter('procedure');
    }

    public function assignme()
    {
        $unassigned_procedure  = Procedure::where([[ 'administrator_id', '=', NULL]])->get();

        if($unassigned_procedure->count() > 0) {

          Procedure::where('id', '=', $this->procedure->id)->update(['administrator_id' => auth()->user()->id]);
          Procedurehistory::create([
            'procedure_id' => $this->procedure->id,
            'typeprocedure_id' => $this->procedure->typeprocedure_id,
            'area_id' => $this->procedure->area_id,
            'user_id' => $this->procedure->user_id,
            'administrator_id' => auth()->user()->id,
            'description' => $this->procedure->description,
            'action' => 'Tomar tramite',
            'state' => 2
          ]);
          $this->notice('Se autoasigno el trámite correctamente', 'alert');
        } else {
          $this->notice('El trámite ya cuenta con un usuario', 'alert');
        }
    }

    public function addMessage()
    {
      $this->validate(
        [
        'message' => 'required'
        ],
        [
          'message.required' => 'Rellena este campo obligatorio',
        ]
      );

      $messages = [
        'procedure_id' => $this->procedure->id,
        'description' => $this->message
      ];

      Proceduremessage::create($messages);

      $this->reset('message');

    }

    public function downloadFile($id, $name, $file)
    {
      $headers = [
        'Content-Description' => 'File Transfer',
        'Content-Type' => Storage::mimeType($name), 
      ];
      return Storage::download($file, $name, $headers);
    }

    public function changeArea()
    {
      $this->validate(
        [
        'area_id' => 'required'
        ],
        [
          'area_id.required' => 'Seleccione este campo obligatorio',
        ]
      );

      if($this->procedure->area_id != $this->area_id){
        Procedure::where('id', '=', $this->procedure->id)->update(['area_id' => $this->area_id]);
        Procedurehistory::create([
          'procedure_id' => $this->procedure->id,
          'typeprocedure_id' => $this->procedure->typeprocedure_id,
          'area_id' => $this->area_id,
          'user_id' => $this->procedure->user_id,
          'administrator_id' => $this->procedure->administrator_id,
          'description' => $this->procedure->description,
          'action' => 'Asignar a área',
          'state' => 2
        ]);
        $this->reset('area_id');
        $this->notice('Se asigno al area correctamente', 'alert');
      } else {
        $this->notice('El tramite ya se encuenrta en el área seleccionada actualmente', 'alert');
      }
    }

    public function assignUser()
    {
      $this->validate(
        [
          'user_id' => 'required'
        ],
        [
          'user_id.required' => 'Seleccione este campo obligatorio',
        ]
      );

      if($this->procedure->administrator_id != $this->user_id){
        $user_get_area = User::where('id', '=', $this->user_id)->get();
        Procedure::where('id', '=', $this->procedure->id)->update(array('administrator_id' => $this->user_id, 'area_id' => $user_get_area[0]->area_id));        
        Procedurehistory::create([
          'procedure_id' => $this->procedure->id,
          'typeprocedure_id' => $this->procedure->typeprocedure_id,
          'area_id' => $user_get_area[0]->area_id,
          'user_id' => $this->procedure->user_id,
          'administrator_id' => $this->user_id,
          'description' => $this->procedure->description,
          'action' => 'Asignar a usuario',
          'state' => 2
        ]);
        $this->reset('user_id');
        $this->notice('Se asigno al usuario correctamente', 'alert');
      } else {
        $this->notice('El tramite ya se encuentra asignado al usuario seleccionado', 'alert');
      }
    }

    public function changeStateFile($formData)
    {
      $file_get_state = Fileprocedure::where('id', '=', $formData['procedurefile_id'])->get();
      if($formData['state_id'] == NULL){
        $this->notice('El archivo ya cuenta este estado', 'alert');
      } else {
        if($file_get_state[0]->state == $formData['state_id']){
          $this->notice('El archivo ya cuenta este estado', 'alert');
        } else {
          Fileprocedure::where('id', '=', $formData['procedurefile_id'])->update(['state' => $formData['state_id']]);
          $this->notice('Se actualizo el estado correctamente', 'alert');
        }
      }
    }

    public function finish_procedure()
    {
      Procedure::where('id', '=', $this->procedure->id)->update(['state' => 5]);
      Procedurehistory::create([
        'procedure_id' => $this->procedure->id,
        'typeprocedure_id' => $this->procedure->typeprocedure_id,
        'area_id' => $this->procedure->area_id,
        'user_id' => $this->procedure->user_id,
        'administrator_id' => $this->procedure->administrator_id,
        'description' => $this->procedure->description,
        'action' => 'Finalizar tramite aceptado',
        'state' => 5
      ]);
      $date = Carbon::now()->format('Y');
      foreach ($this->file_finish as $file) {
        $file_url = Storage::put('procedures/'.$date."/".$this->procedure->id."", $file);
        Fileprocedure::create([
          'procedure_id' => $this->procedure->id,
          'requirement_id' => 0,
          'name' => $file->GetClientOriginalName(),
          'file' => (string)$file_url,
          'state' => '4'
        ]);
      }
      $this->notice('Trámite finalizado correctamente', 'alert');
    }

    public function render()
    {
        $this->procedure_accepted = Fileprocedure::where([['procedure_id', '=', $this->procedure->id], ['state', '=', '1']])->orWhere([['procedure_id', '=', $this->procedure->id], ['state', '=', '3']])->get();
        $this->procedure_data = Procedure::where([['id', '=', $this->procedure->id]])->get();
        $this->procedure_files = Fileprocedure::where([['procedure_id', '=', $this->procedure->id], ['state', '!=', 4]])->get();
        $this->procedure_files_finish = Fileprocedure::where([['procedure_id', '=', $this->procedure->id], ['state', '=', 4]])->get();;
        $this->procedure_histories = Procedurehistory::where([['procedure_id', '=',  $this->procedure->id]])->get();
        $this->procedure_messages = Proceduremessage::where([['procedure_id', '=', $this->procedure->id]])->orderBy('created_at', 'desc')->get();
        $this->areas = Area::where('state', '=', 1)->get();
        $this->users = User::where([['state', '=', 1], ['type', '=', 10], ['id', '!=', 1]])->get();
        return view('livewire.admin.procedures.edit');
    }
}

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

class Edit extends Component
{

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

    public function changeStateFile($id, $state)
    {

      if($this->state_id == NULL){
        $this->notice('El archivo ya cuenta este estado', 'alert');
      } else {
        if($state == $this->state_id){
          $this->notice('El archivo ya cuenta este estado', 'alert');
        } else {
          Fileprocedure::where('id', '=', $id)->update(['state' => $this->state_id]);
          $this->notice('Se actualizo el estado correctamente', 'alert');
        }
      }
    }

    public function render()
    {
        $this->procedure_data = Procedure::where([['id', '=', $this->procedure->id]])->get();
        $this->procedure_files = Fileprocedure::where([['procedure_id', '=', $this->procedure->id]])->get();
        $this->procedure_histories = Procedurehistory::where([['procedure_id', '=',  $this->procedure->id]])->get();
        $this->procedure_messages = Proceduremessage::where([['procedure_id', '=', $this->procedure->id]])->orderBy('created_at', 'desc')->get();
        $this->areas = Area::where('state', '=', 1)->get();
        $this->users = User::where([['state', '=', 1], ['type', '=', 10], ['id', '!=', 1]])->get();
        return view('livewire.admin.procedures.edit');
    }
}

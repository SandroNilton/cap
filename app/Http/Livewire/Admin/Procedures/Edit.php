<?php

namespace App\Http\Livewire\Admin\Procedures;
use Livewire\Component;
use App\Models\Procedurehistory;
use App\Models\Proceduremessage;
use App\Models\Procedure;
use App\Models\Area;
use App\Models\User;
use App\Models\Fileprocedure;
use Filament\Notifications\Notification;
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
    public $procedure;
    public $procedure_data;

    public function mount()
    {
        $this->procedure = Route::current()->parameter('procedure');
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

      Notification::make()->success()->title('Se registro el comentario correctamente')->send(); 

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
        $this->reset('area_id');
        Notification::make()->success()->title('Se asigno al area correctamente')->send(); 
      } else {
        Notification::make()->warning()->title('El tramite ya se encuenrta en el área seleccionada actualmente')->send(); 
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
        Procedure::where('id', '=', $this->procedure->id)->update(['administrator_id' => $this->user_id]);
        $this->reset('user_id');
        Notification::make()->success()->title('Se asigno al usuario correctamente correctamente')->send(); 
      } else {
        Notification::make()->warning()->title('El tramite ya se encuenrta en el área seleccionada actualmente')->send(); 
      }
    }

    public function render()
    {
        $this->procedure_data = Procedure::where([['id', '=', $this->procedure->id]])->get();
        $this->procedure_files = Fileprocedure::where([['procedure_id', '=', $this->procedure->id]])->get();
        $this->procedure_histories = Procedurehistory::where([['procedure_id', '=',  $this->procedure->id]])->get();
        $this->procedure_messages = Proceduremessage::where([['procedure_id', '=', $this->procedure->id]])->orderBy('created_at', 'desc')->get();
        $this->areas = Area::where('state', '=', 1)->get();
        $this->users = User::where([['state', '=', 1], ['type', '=', 10]])->get();
        return view('livewire.admin.procedures.edit');
    }
}

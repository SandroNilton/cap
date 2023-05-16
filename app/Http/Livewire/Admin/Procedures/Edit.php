<?php

namespace App\Http\Livewire\Admin\Procedures;
use Livewire\Component;
use App\Models\Procedurehistory;
use App\Models\Proceduremessage;
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
    public $procedure;

    public function mount()
    {
        $this->procedure = Route::current()->parameter('procedure');
    }

    public function updated($fields)
    {
      $this->validate(
        [
          'message' => 'required'
        ],
        [
          'message.required' => 'Rellena este campo obligatorio',
        ]
      );
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

      Notification::make()->success()->title('Se autoasigno el trámite correctamente')->send(); 

    }

    public function render()
    {
        $this->procedure_files = Fileprocedure::where([['procedure_id', '=', $this->procedure->id]])->get();
        $this->procedure_histories = Procedurehistory::where([['procedure_id', '=',  $this->procedure->id]])->get();
        $this->procedure_messages = Proceduremessage::where([['procedure_id', '=', $this->procedure->id]])->orderBy('created_at', 'desc')->get();
        $this->areas = Area::where('state', '=', 1)->get();
        $this->users = User::where([['state', '=', 1], ['type', '=', 10]])->get();
        return view('livewire.admin.procedures.edit');
    }
}

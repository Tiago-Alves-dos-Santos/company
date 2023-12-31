<?php

namespace App\Livewire\Admin\Contact;

use App\Models\Contact;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class Table extends Component
{
    use WithPagination, Actions;
    #[Url()]
    public bool $read = false;
    public function markLikeRead(int $id){
        Contact::where('id',$id)->update(['isRead' => true]);
        $this->notification()->success('Sucesso', 'Mensagem marcada como lida');
        //in the future send email for client saying that he was responded

    }
    public function render()
    {
        return view('livewire.admin.contact.table', [
            'contacts' => Contact::where('isRead', $this->read)->orderBy('id','desc')->paginate($this->read ? 3:1)
        ]);
    }
}

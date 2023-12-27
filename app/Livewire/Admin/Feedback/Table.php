<?php

namespace App\Livewire\Admin\Feedback;

use Livewire\Component;
use App\Models\Feedback;
use WireUi\Traits\Actions;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use App\Facade\ServiceFactory;

class Table extends Component
{
    use Actions;
    #[Url]
    public string $search = 'inactive';
    public function delete(int $id)
    {
        $feedback = ServiceFactory::createFeedback();
        $feedback->delete($id);
        $this->notification()->success('Sucesso', 'Deletado com sucesso');
    }

    public function toggleVisible(int $id)
    {
        $feedback = ServiceFactory::createFeedback();
        $feedback->toggleVisible($id);
    }
    #[On('livewire.admin.feedback.setSearch')]
    public function setSearch(string $search){
        $this->search = $search;
        $name = '';
        switch ($this->search) {
            case 'active':
                $name = 'Ativos';
                break;
            case 'inactive':
                $name = 'Inativos';
                break;
            case 'excluded':
                $name = 'Deletados';
                break;

            default:
                # code...
                break;
        }

        $this->dispatch('view_admin_feedback', title: $name);
    }
    private function filter()
    {
        $feedback = Feedback::query()->with('client');
        switch ($this->search) {
            case 'active':
                $feedback->where('visible', true);
                break;
            case 'inactive':
                $feedback->where('visible', false);
                break;
            case 'excluded':
                $feedback->onlyTrashed();
                break;

            default:
                # code...
                break;
        }
        return $feedback->paginate(10);
    }
    public function render()
    {

        return view('livewire.admin.feedback.table', [
            'feedbacks' => $this->filter()
        ]);
    }
}

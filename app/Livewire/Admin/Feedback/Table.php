<?php

namespace App\Livewire\Admin\Feedback;

use App\Facade\ServiceFactory;
use App\Models\Feedback;
use Livewire\Component;
use WireUi\Traits\Actions;

class Table extends Component
{
    use Actions;
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

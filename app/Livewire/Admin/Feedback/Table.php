<?php

namespace App\Livewire\Admin\Feedback;

use App\Models\Feedback;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        return view('livewire.admin.feedback.table', [
            'feedbacks' => Feedback::with('client')->paginate(20)
        ]);
    }
}

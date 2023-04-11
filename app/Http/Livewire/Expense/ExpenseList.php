<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;

class ExpenseList extends Component
{
    public function remove($expense)
    {
        auth()->user()->expenses()->find($expense)->delete();
    }

    public function render()
    {
        $expenses = auth()->user()->expenses()->count() ? auth()->user()->expenses()->paginate(5) : [];
    
        return view('livewire.expense.expense-list', compact('expenses'));
    }
}

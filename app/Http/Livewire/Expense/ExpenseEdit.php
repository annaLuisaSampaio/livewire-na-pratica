<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;

class ExpenseEdit extends Component
{
    public $description;
    public $amount;
    public $type;

    public Expense $expense;

    protected $rules = [
        'description' => 'required',
        'amount' => 'required',
        'type' => 'required'
    ];

    public function mount(/*Expense $expense*/)
    {
        $this->description = $this->expense->description;
        $this->amount = $this->expense->amount;
        $this->type = $this->expense->type;
    }

    public function updateExpense()
    {
        $this->validate();

        $this->expense->update([
            'amount' => $this->amount,
            'type' => $this->type,
            'description' => $this->description            
        ]);
        session()->flash('message', 'Registro atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.expense.expense-edit');
    }
}

<?php

namespace App\Livewire;

use App\Models\Institution;
use App\Models\Principal;
use Livewire\Component;
use Livewire\WithPagination;

class PrincipalIndexTable extends Component
{
    use WithPagination;
    public $selectedInstitution = null;
    public $searchTerm = '';


    public function render()
    {
        // Obtiene todas las instituciones
        $institutions = Institution::all();

        $principals = Principal::query()
            ->when($this->selectedInstitution, function ($query) {
                $query->whereHas('user', function ($q) {
                    $q->where('institution_id', $this->selectedInstitution);
                });
            })
            ->when($this->searchTerm, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->searchTerm . '%')->orWhere('lastname', 'like', '%' . $this->searchTerm . '%');
                });
            })
            ->with(['user.institution']) // Carga la relación polimórfica y la institución
            ->orderBy('id')
            ->paginate(5);

        return view('livewire.principal-index-table', compact('institutions', 'principals'));
    }
}

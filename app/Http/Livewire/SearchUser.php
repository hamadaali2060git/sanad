<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Instructor;
class SearchUser extends Component
{
    public $query = '';
    public $results = [];

    public function updatedQuery()
    {
        $this->results = Instructor::
            Where('email', $this->query )
            ->take(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.search-user');
    }
}

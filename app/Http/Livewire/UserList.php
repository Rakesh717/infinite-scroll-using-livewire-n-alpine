<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    public string $name = "Rakesh Thapa";

    public function render()
    {
        return view('livewire.user-list', [
            'users' => $this->getUsers(),
        ]);
    }

    public function more(int $page)
    {
        $users = $this->getUsers($page);

        return  [
            'users' => $users->items(),
            'hasMorePages' => $users->hasMorePages(),
        ];
    }

    protected function getUsers(int $page = 1)
    {
        return User::query()->simplePaginate(10, ["*"], 'page', $page);
    }

}

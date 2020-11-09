<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Settings extends Component
{
    public $user, $userImage;

    public function render()
    {
    	$this->user = Auth::user();
    	$this->userImage = Storage::url($this->user['profile_photo_path']);
        return view('livewire.dashboard.settings');
    }
}

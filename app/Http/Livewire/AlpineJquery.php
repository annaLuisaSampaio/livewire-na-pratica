<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class AlpineJquery extends Component
{
    public $sessionId;
    
    protected $listeners = [
        'paymentData' => 'proccessSubscription'
    ];

    public function mount()
    {
        $email = config('pagueseguro.email');
        $token = config('pagueseguro.token');
        $url =  "https://ws.sandbox.pagseguro.uol.com.br/sessions/?email={$email}&token={$token}";

        $response = Http::post($url);
        $response = simplexml_load_string($response->body());
        $this->sessionId = (string) $response->id;
    }

    public function render()
    {
        return view('livewire.alpine-jquery')->layout('layouts.front');
    }
}

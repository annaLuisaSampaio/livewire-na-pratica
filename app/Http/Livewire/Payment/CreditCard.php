<?php

namespace App\Http\Livewire\Payment;

use App\Services\PagSeguro\Credentials;
use App\Services\PagSeguro\Subscription\SubscriptionService;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class CreditCard extends Component
{

    public $sessionId;
    
    protected $listeners = [
        'paymentData' => 'proccessSubscription'
    ];

    public function mount()
    {               
        $email = config('pagueseguro.email');
        $token = config('pagueseguro.token');

        $url = "https://ws.sandbox.pagseguro.uol.com.br/sessions/?email={$email}&token={$token}";
        // $url = Credentials::getCredentials('/sessions/');

        $response = Http::post($url);
        $response = simplexml_load_string($response->body());
        $this->sessionId = (string) $response->id;
        // dd($this->sessionId);
    }

    public function proccessSubscription($data)
    {
        $data['plan_reference'] = "40C1A283DADAE16EE41F6F9F8383C1D7";
        $makeSubscription = (new SubscriptionService($data))->makeSubscription();
        dd($makeSubscription);
        // $data['plan_reference'] = '4E6935969191A30994BA2F8FD5492A5F';
        // $makeSubscription = "3D352B94FF7747E9B11CCF3D0D1AF8B7";
        // dd($makeSubscription);
        
        // $makeSubscription = (new SubscriptionService($data))->makeSubscription();
        
    }

    public function render()
    {
        return view('livewire.payment.credit-card')
        ->layout('layouts.front');
    }
}

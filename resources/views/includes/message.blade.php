@if (session()->has('message'))
    <div class="px-5 py-4 text-white bg-green-400 border-green-900">
        <h3>{{session('message')}}</h3>    
    </div>
@endif
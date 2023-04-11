<div class="px-4 mx-auto max-w-7xl py-15">

    <x-slot name="header">
        Criar Registro
    </x-slot>

    @include('includes.message')

    <form action="" wire:submit.prevent="createExpense" class="w-full mx-auto max-w-7xl">
        <div class="flex flex-wrap mb-6 -mx-3">

            <p class="w-full px-3 mb-6 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Descrição Registro</label>
                <input type="text" name="description" wire:model="description"
                class="block appearance-none w-full bg-gray-200 border @error('description') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

            @error('description')
            <h5 class="text-xs italic text-red-500">{{$message}}</h5>
            @enderror
            </p>


            <p class="w-full px-3 mb-6 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Valor do Registro</label>
                <input type="text" name="amount" wire:model="amount"
                class="block appearance-none w-full bg-gray-200 border @error('amount') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

            @error('amount')
            <h5 class="text-xs italic text-red-500">{{$message}}</h5>
            @enderror

            </p>


            <p class="w-full px-3 mb-6 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Tipo do Registro</label>
                <select name="type" id="" wire:model="type" class="block appearance-none w-full bg-gray-200 border @error('type') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Selecione o tipo do registro: Entrada ou Saída...</option>
                    <option value="1">Entrada</option>
                    <option value="2">Saída</option>
                </select>

            @error('type')
             <h5 class="text-xs italic text-red-500">{{$message}}</h5>
            @enderror
            </p>

        </div>
        <div class="w-full px-3 py-4 mb-6 md:mb-0">

            <button type="submit"
                    class="flex-shrink-0 px-2 py-1 text-sm text-white bg-teal-500 border-4 border-teal-500 rounded hover:bg-teal-700 hover:border-teal-700">Criar Registro</button>
        </div>

    </form>
</div>
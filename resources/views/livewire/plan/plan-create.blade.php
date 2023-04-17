<div class="px-4 mx-auto max-w-7xl py-15">

    <x-slot name="header">Criar Plano</x-slot>

    @include('includes.message')

    <form action="" wire:submit.prevent="createPlan" class="w-full mx-auto max-w-7xl">
        <div class="flex flex-wrap mb-6 -mx-3">

            <p class="w-full px-3 mb-6">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Nome Plano</label>
                <input type="text" name="description" wire:model="plan.name"
                       class="block appearance-none w-full bg-gray-200 border @error('plan.name') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

                @error('plan.name')
                    <h5 class="text-xs italic text-red-500">{{$message}}</h5>
                @enderror
            </p>

            <p class="w-full px-3 mb-6">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Descrição Plano</label>
                <input type="text" name="description" wire:model="plan.description"
                       class="block appearance-none w-full bg-gray-200 border @error('plan.description') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

            @error('plan.description')
                <h5 class="text-xs italic text-red-500">{{$message}}</h5>
            @enderror
            </p>


            <p class="w-full px-3 mb-6">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Valor do Plano</label>
                <input type="text" name="amount" wire:model="plan.price"
                       class="block appearance-none w-full bg-gray-200 border @error('plan.price') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">


            @error('plan.price')
                <h5 class="text-xs italic text-red-500">{{$message}}</h5>
            @enderror

            </p>

            <p class="w-full px-3 mb-6">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Apelido Plano</label>

                <input type="text" name="slug" wire:model="plan.slug"
                       class="block appearance-none w-full bg-gray-200 @error('plan.slug') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </p>

            @error('plan.slug')
                <h5 class="text-xs italic text-red-500">{{$message}}</h5>
            @enderror

        </div>
        <div class="w-full px-3 py-4 mb-6">
            <button type="submit" class="flex-shrink-0 px-2 py-1 text-sm text-white bg-teal-500 border-4 border-teal-500 rounded hover:bg-teal-700 hover:border-teal-700">Criar Plano</button>
        </div>

    </form>
</div>
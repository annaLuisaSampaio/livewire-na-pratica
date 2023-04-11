<div class="px-4 mx-auto max-w-7xl py-15">

    <x-slot name="header">
        Meus Registros
    </x-slot>

    <div class="w-full mx-auto mb-4 text-right">
        <a href="{{route('expenses.create')}}" class="flex-shrink-0 px-2 py-1 text-sm text-white bg-teal-500 border-4 border-teal-500 rounded hover:bg-teal-700 hover:border-teal-700">Criar Registro</a>
    </div>

    @include('includes.message')

    <table class="w-full mx-auto table-auto">
        <thead>
            <tr class="text-left">
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Descrição</th>
                <th class="px-4 py-2">Valor</th>
                <th class="px-4 py-2">Data Registro</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach($expenses as $exp)
            <tr>
                <td class="px-4 py-2 border">{{$exp->id}}</td>
                <td class="px-4 py-2 border">{{$exp->description}}</td>
                <td class="px-4 py-2 border">
                    <span class ="{{$exp->type == 1 ? 'text-green-600' : 'text-red-600'}}">
                        R$ {{ number_format($exp->amount, 2, ',', '.')}}
                    </span>
                </td>
                <td class="px-4 py-2 border">{{$exp->created_at->format('d/m/Y H:i:s')}}</td>
                <td class="px-4 py-4 border">
                    <a href="{{route('expenses.edit', $exp->id)}}" class="px-4 py-2 text-white bg-blue-500 border rounded">Editar</a>
                    <a href="#" wire:click.prevent="remove({{$exp->id}})"
                    class="px-4 py-2 text-white bg-red-500 border rounded">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if (count($expenses))
        <div class="w-full mx-auto mt-10">
            {{$expenses->links()}}
        </div>
    @else
        <p>Sem registros cadastrados.</p>
    @endif    
</div>
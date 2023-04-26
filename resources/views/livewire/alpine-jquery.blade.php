<div class="px-4 mx-auto max-w-7xl py-15" x-data="creditCard()" x-init="PagSeguroDirectPayment.setSessionId('{{$sessionId}}')">

    @include('includes.message')

    <div class="flex flex-wrap mb-6 -mx-3">

        <h2 class="w-full px-3 pb-4 mb-6 border-b-2 border-cool-gray-800">
           Realizar Pagamento Assinatura
        </h2>
    </div>

    <form action="" name="creditCard" class="w-full mx-auto max-w-7xl">

        <div class="flex flex-wrap mb-6 -mx-3">

            <p class="w-full px-3 mb-6">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Data Inicio(alpine)</label>
                <input type="text" x-mask="99/99/9999 99:99" placeholder="dd/mm/aaaa hh:mm" name="data" class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
            </p>

            <p class="w-full px-3 mb-6">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">CNPJ(alpine)</label>
                <input type="text" placeholder="XXX.XXX.XXX/XXXX-XX" x-mask="999.999.999/9999-99" name="cnpj" class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
            </p>

            <p class="w-full px-3 mb-6">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">CPF(jquery)</label>
                <input type="text" id="cpf" placeholder="XXX.XXX.XXX-XX" name="cpf" class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
            </p>
            
            <p class="w-full px-3 mb-6">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Máscara Dinâmica(alpine)</label>
                <input type="text" name="cnpj" x-mask:dynamic="$input.startsWith('34') || $input.startsWith('37') ? '9999 999999 99999' : '9999 9999 9999 9999'" 
                class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
            </p>                        

        </div>
            <p class="w-full px-3 py-4 mb-6">
                <button id="testeButton" @click.prevent="cardToken" type="submit" class="flex-shrink-0 px-2 py-1 text-sm text-white bg-teal-500 border-4 border-teal-500 rounded hover:bg-teal-700 hover:border-teal-700">Realizar Assinatura</button>
            </p>

        </div>
        {{-- <button id="testeButton">Enviar</button> --}}
    </form>
    
    <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        /*
            - Recupere a bandera do cartão
            - Precisar recuperar o token do cartão
        */

        $(document).ready(function () { 
            var $seuCampoCpf = $("#cpf");
            $seuCampoCpf.mask('000.000.000-00', {reverse: true});
        });

        function creditCard(){                                    
            $( "#testeButton" ).click(function() {                
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                )                
            });                        
        }
    </script>
</div>
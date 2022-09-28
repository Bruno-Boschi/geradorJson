@extends('layout.app')

@section('title', 'Ferramenta Gerador Json')

@section('content')
    <form class="form-signin" action="{{ route('postJson') }}" method="post">
        {!! csrf_field() !!}
        <h1 class="h3 mb-3 font-weight-normal">Json Gerador</h1>

        <label for="email" class="sr-only">Email de contato</label>
        <input type="text" placeholder="Email de contato" name="email" id="email" class="form-control" required=""
            autofocus=""><br>

        <label for="endereco" class="sr-only">Endereço</label>
        <input type="text" placeholder="Endereço" name="endereco" id="endereco" class="form-control" required=""
            autofocus=""><br>

        <label for="sellers" lass="sr-only">Sellers</label>
        {{-- <input type="text" placeholder="sellers" name="sellers" id="sellers" class="form-control" required=""
            autofocus=""><br> --}}

        <div>

            <div class="form-group">
                <input type="text" placeholder="Nome" class="form-control" name="name" id="name" value="">
            </div>


            <div class="form-group">

                <input type="text" placeholder="Dominio" class="form-control" name="domain" id="domain"
                    value="">
            </div>

            <div class="form-group">

                <input type="text" placeholder="Tipo" class="form-control" name="seller_type" id="seller_type"
                    value="">
            </div>


            <button type="button" id="add" onclick="adicionar()" class="btn btn-primary">Add</button>
            <br><br>

            <div id="to-do-list">
                <label>My Sellers</label>
                <ul id="mySeller"></ul>
            </div>

        </div>


        <button class="btn btn-lg btn-primary btn-block" onclick="enviar()" type="button">Gerar</button><br>
        <p class="mt-5 mb-3 text-muted">© 2017-2022</p>
    </form>
@endsection

@section('scripts')
    <script>
        function adicionar() {
            let name = document.getElementById('name').value;
            let domain = document.getElementById('domain').value;
            let seller_type = document.getElementById('seller_type').value;



            console.log(name, domain, seller_type);
        }

        function enviar() {
            let email = document.getElementById('email').value;
            let endereco = document.getElementById('endereco').value;
            let sellers = document.getElementById('sellers').value;

            console.log(email, endereco, sellers);
        }
    </script>
@endsection

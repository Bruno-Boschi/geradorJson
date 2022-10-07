@extends('layout.app')

@section('title', 'Ferramenta Gerador Json')

@section('content')
    <div class="d-flex " style="justify-content: center; padding-top: 60px;">

        <h1> Gerador json</h1>
    </div>
    <form class="form-signin container">
        {!! csrf_field() !!}
        <label for="sellers" lass="sr-only">Dados</label>
        {{-- <label for="email" class="sr-only">Email de contato</label> --}}
        <input type="text" placeholder="Email de contato" name="email" id="email" class="form-control " required=""
            autofocus=""><br>

        {{-- <label for="endereco" class="sr-only">Endereço</label> --}}
        <input type="text" placeholder="Endereço" name="endereco" id="endereco" class="form-control" required=""
            autofocus=""><br><br><br>

        <label for="sellers" lass="sr-only">Sellers</label><br>
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

            {{-- <div class="form-group">

                <input type="text" placeholder="Tipo" class="form-control" name="seller_type" id="seller_type"
                    value="">
            </div> --}}
            <br>

            <div class="d-flex " style="justify-content: end ">
                {{-- <button type="button" id="add" onclick="adicionar()" class="btn btn-primary"> <i
                        class="fa fa-user-plus">
                    </i></button> --}}
                <i type="button" id="add" onclick="adicionar()" class=" fa fa-user-plus">
                </i>
            </div>

            <br><br>

            <label>My Sellers</label>
            <div class="conteudo">
                <ul id="mySeller"></ul>
            </div>

        </div> <br><br>

        <div class="d-flex " style="justify-content: center">
            <button class="btn btn-lg btn-primary btn-block " onclick="enviar()" type="button">Gerar</button><br>
        </div>
        <p class="mt-5 mb-3 text-muted d-flex" style="justify-content: center">© 2017-2022</p>
    </form>
@endsection

@section('scripts')
    <script>
        const ARRAY = []

        function adicionar() {
            if (document.getElementById('name').value == '' || document.getElementById('domain').value == '') {
                alert('Preencha todos os campos')
            } else {
                let name = document.getElementById('name').value;
                let domain = document.getElementById('domain').value;
                // let seller_type = document.getElementById('seller_type').value;

                ARRAY.push({
                    name: name,
                    domain: domain,
                    // seller_type: seller_type
                })

                let li = document.createElement('li');
                // li.innerHTML = name + ' - ' + domain + ' - ' + seller_type;
                li.innerHTML = name + ' - ' + domain + ' - ' +
                    '&nbsp;<i type="button" class="fa fa-trash ml-2 cursor-pointer" onclick="remover(this)"></i>';
                document.getElementById('mySeller').appendChild(li);

                document.getElementById('name').value = '';
                document.getElementById('domain').value = '';
                // document.getElementById('seller_type').value = '';
            }

        }

        function remover(item, index) {
            let li = event.target.parentNode;
            let ul = li.parentNode;
            ul.removeChild(li);
            ARRAY.splice(index, 1);
            item.remove();
        }

        function enviar() {
            if (document.getElementById('email').value == '' || document.getElementById('endereco').value == '') {
                alert('Preencha os campos de email e endereço')
            } else {
                let email = document.getElementById('email').value;
                let endereco = document.getElementById('endereco').value;


                let json = {
                    "contact_email": email,
                    "contact_address": endereco,
                    "version": "1.0",
                    "sellers": ARRAY
                }

                let myJSON = JSON.stringify(json);


                $.ajax({
                    url: "{{ route('getJson') }}",
                    type: "GET",
                    data: {
                        _token: "{{ csrf_token() }}",
                        json: myJSON
                    },
                    success: function(data) {
                        console.log(data);
                        data = "text/json;charset=utf-8," + encodeURIComponent(data);
                        var a = document.createElement("a");
                        document.body.appendChild(a);
                        a.style = "display: none";
                        a.href = 'data:' + data;
                        a.download = "arquivo.json";
                        a.click();
                    }
                });
            }
        }
    </script>
@endsection

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js" integrity="sha512-Y/GIYsd+LaQm6bGysIClyez2HGCIN1yrs94wUrHoRAD5RSURkqqVQEU6mM51O90hqS80ABFTGtiDpSXd2O05nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" type="text/javascript"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Cadastro de Doadores</title>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <h1>Cadastro de doadores</h1>
        @if (Session::has('success'))
          <div class="alert alert-info" id="alert">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('error'))
          <div class="alert alert-danger" id="alert">{{ Session::get('error') }}</div>
        @endif
        <form class="row g-3" method="POST" action="{{route('saveDonors')}}">
          @csrf
          <div class="col-md-12">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Nome Completo"  required>
          </div>
          <div class="col-md-12">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu E-mail" required>
          </div>
          <div class="col-6">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control" id="cpf" placeholder="Digite seu CPF" maxlength="14" required>
          </div>
          <div class="col-6">
            <label for="phone" class="form-label">Telefone</label>
            <input type="tel" name="phone" class="form-control" id="phone" placeholder="Digite seu telefone" maxlength="15" required>
          </div>
          <div class="col-md-6">
            <label for="birthdate" class="form-label">Data de nascimento</label>
            <input type="date" name="birthdate" class="form-control" id="birthdate" required>
          </div>
          <div class="col-md-6">
            <label for="address" class="form-label">Endereço</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Digite seu endereço" required>
          </div>
          <div class="col-md-4">
            <label for="donation_amount" class="form-label">Valor da doação</label>
            <input type="text" name="donation_amount" class="form-control" id="donation_amount" required>
          </div>
          <div class="col-md-4">
            <label for="donation_interval_id" class="form-label">Intervalo de doações</label>
            <select name="donation_interval_id" id="donation_interval_id" class="form-select">
              @foreach ($donationsInterval as $index)
                <option value="{{$index->id}}">{{$index->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4">
            <label for="payment_id" class="form-label">Forma de pagamento</label>
            <select name="payment_id" id="payment_id" class="form-select">
              @foreach ($payments as $index)
                <option value="{{$index->id}}">{{$index->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </body>
  <script type="text/javascript">
    $(document).ready(function(){
      //Máscara de CPF
      var cpf = $("#cpf");
      cpf.mask("000.000.000-00");

      $('#phone').mask('(00) 0000-00009');
      $('#phone').blur(function(event) {
        if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
            $('#phone').mask('(00) 00000-0009');
        } else {
            $('#phone').mask('(00) 0000-00009');
        }
      });

      //Máscara R$
      $("#donation_amount").maskMoney({
         prefix: "R$",
         decimal: ",",
         thousands: "."
     });

     //Timeout para return flash message
     setTimeout(function() {
      $('#alert').remove();
     }, 5000);

    });
  </script>
</html>
@extends('base_layout')

@section('javascript')
<script type="text/javascript">
    $(document).ready(function($) {
        $('.calendar').datepicker({
            dateFormat: "dd-mm-yy",
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
            dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });

        $('.hora').mask('00:00');

    });
</script>
@stop

@section('content')
<form method="POST">
    <div class="row">
        <div class="col-md-12">
            <h1>Cadastro de Evento</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label>Nome:</label> <input type="text" name="nome_evento" id="nome" required />
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <label>Data:</label> <input type="datetime" name="dataInicio" class="calendar"  required/>
        </div>
        <div class="col-md-3">
            <label>Hora:</label> <input type="time" name="horaInicio" class="hora" required/>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-3">
            <label>Data Termino:</label> <input type="datetime" name="dataTermino" class="calendar" required/>
        </div>
        <div class="col-md-3">
            <label>Hora Termino:</label> <input type="time" name="horaTermino" class="hora" required/>
        </div>
    </div>
    

    <div class="row">
        <div class="col-md-12">
            <label>Email:</label> <input type="text" name="email" pattern="[a-z]+[a-z0-9_-.,]*@[a-z]+.[a-z][a-z][a-z]([a-z.])*$" required/>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <label>Mensagem:</label> <textarea name="mensagem" required></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <input type="submit" value="Enviar" />
        </div>
    </div>
</form>
@stop
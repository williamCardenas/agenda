@extends('base_layout')

@section('javascript')
<link rel='stylesheet' href='{{URL('js/fullcalendar/fullcalendar.css')}}' />
<script src='{{URL('js/fullcalendar/lib/moment.min.js')}}'></script>
<script src="{{URL('js/fullcalendar/fullcalendar.js')}}" type="text/javascript"></script>
<script src="{{URL('js/fullcalendar/lang-all.js')}}" type="text/javascript"></script>


<script type="text/javascript">
$(document).ready(function($) {
    var compromissos = <?php echo $agenda ?>;
    //console.log(compromissos);

    var montaAlert = function(event) {
        var div = $('<div>');
        $('<p>').html('<strong>id:</strong>' + event.id).appendTo(div);
        $('<p>').html('<strong>mensagem:</strong>' + event.mensagem).appendTo(div);

        div.dialog({buttons: {
                "Editar": function() {
                    location.href = "{{URL::to('editarEvento')}}/"+event.id;
                },
                "Deletar": function() {
                    location.href = "{{URL::to('deletarEvento')}}/"+event.id;
                },
                "Cancelar": function() {
                    $(this).dialog("close");
                }
            }
        });
    }

    var compCalendar = Array();
    for (var index = 0; index < compromissos.length; index++) {
        compCalendar[index] = {
            'id': compromissos[index].id,
            'title': compromissos[index].nome_evento,
            'allDay': false,
            'start': new Date(compromissos[index].data_inicio),
            'end': new Date(compromissos[index].data_termino),
            'color': '#777',
            'mensagem': compromissos[index].mensagem
        };
    }

    var calendar = $('#fullcalendar').fullCalendar({
        lang: 'pt-br',
        events: compCalendar,
        eventClick: function(calEvent, jsEvent, view) {
            montaAlert(calEvent);
        }
    });



    $('.hora').mask('00:00');

});
</script>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div id="fullcalendar">

        </div>
    </div>
</div>
@stop

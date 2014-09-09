<?php 
class AgendaController extends BaseController{
    
    public function Index(){
        
        $agenda = Agenda::all();
        
        foreach($agenda as $compromissos){
            
            $dataInicio = new DateTime($compromissos->data_inicio);
            $dataTermino = new DateTime($compromissos->data_termino);
            
            $compromissos->data_inicio = $dataInicio->format('m/d/Y H:i:s');
            $compromissos->data_termino = $dataTermino->format('m/d/Y H:i:s');
            
        }
        
        return View::make('inicio',array('agenda'=>json_encode($agenda)));
    }
    
    public function NovoEvento(){
        
        $dataInicio = new DateTime($_POST['dataInicio'].' '.$_POST['horaInicio']);
        $dataTermino = new DateTime($_POST['dataTermino'].' '.$_POST['horaTermino']);
        
        $agenda = Agenda::create(array('nome_evento' => $_POST['nome_evento'],
                             'data_inicio'        => $dataInicio->format('Y-m-d H:i:s'),
                             'data_termino'        => $dataTermino->format('Y-m-d H:i:s'),
                             'email'       => $_POST['email'],
                             'mensagem'    => $_POST['mensagem']
                      ));
        
        return View::make('cadastroEvento');
        
    }
    
    public function EditarEvento($agenda){
        if(!empty($_POST)){
            
            $dataInicio = new DateTime($_POST['dataInicio'].' '.$_POST['horaInicio']);
            $dataTermino = new DateTime($_POST['dataTermino'].' '.$_POST['horaTermino']);
            
            $agenda->nome_evento = $_POST['nome_evento'];
            $agenda->data_inicio = $dataInicio->format('Y-m-d H:i:s');
            $agenda->data_termino = $dataTermino->format('Y-m-d H:i:s');
            $agenda->email = $_POST['email'];
            $agenda->mensagem = $_POST['mensagem'];
            
            $agenda->save();
        }
        $agenda->data_inicio = new DateTime($agenda->data_inicio);
        $agenda->data_termino = new DateTime($agenda->data_termino);
        
        return View::make('editarEvento',array('agenda'=>$agenda));
        
    }
    
    public function DeletarEvento($agenda){
        if(!empty($_POST)){
            $agenda->delete();
            return Redirect::to('/');
        }
        $agenda->data_inicio = new DateTime($agenda->data_inicio);
        $agenda->data_termino = new DateTime($agenda->data_termino);
        return View::make('deletarEvento',array('agenda'=>$agenda));
    }
    
}
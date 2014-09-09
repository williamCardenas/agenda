<?php

class Agenda extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'agenda';
        
        protected $fillable = array('nome_evento', 'data_inicio', 'data_termino', 'email', 'mensagem');
        
}

<?php
namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Post extends Eloquent
{

    /**
     * Define a chave primária da tabela
     *
     * @var string
     */
    protected $primaryKey = 'id_post';

    /**
     * Define o nome da tabela
     *
     * @var string
     */
    protected $table = 'post';
    
}
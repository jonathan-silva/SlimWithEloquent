<?php
namespace Controllers;

use Models;
use Respect\Validation\Validator as v;

class Post extends Base
{
    /**
     * Pega todos post
     *
     * @return void
     */
    public function get()
    {
        $post = Models\Post::get();
		
        echo self::encode($post);
    }

    /**
     * Pega plano pelo id
     * $request e $response usam interface psr7
     * $args contém os argumentos informados na rota
     *
     * @param Slim\Http\Request $request
     * @param Slim\Http\Response $response
     * @param array $args
     * @return boolean|Slim\Http\Response
     */
    public function getById($request, $response, $args)
    {
        $id = $args['id'];
        
        $validations = [
            v::intVal()->validate($id)
        ];

        if ($this->validate($validations) === false) {
            return $response->withStatus(400);
        }
		
		$plano = Models\Post::find($id);

		if ($plano) {
			echo self::encode($plano);
			return true;
		}
		
		$status = 404;
		echo $this->error('get#plano{id}', $request->getUri()->getPath(), $status);
		return $response->withStatus($status);
    }
}    
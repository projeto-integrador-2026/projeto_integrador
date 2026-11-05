<?php

namespace app\core;

use Exception;

class Router
{
    private array $routes = [];

    public function get($route, $action){

        $this->routes[] = [
            'method' => 'get',
            'route' => $route,
            'action' => $action
        ];
    }

    public function post($route, $action){

        $this->routes[] = [
            'method' => 'post',
            'route' => $route,
            'action' => $action
        ];
    }


public function run()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // Verifica se é uma requisição de arquivo estático
    if (preg_match('/\.(jpg|jpeg|png|gif|css|js|svg|ico|pdf)$/i', $uri)) {

        if ($this->serveStaticFile($uri)) {
            exit;
        }

        http_response_code(404);
        exit('Arquivo não encontrado');
    }

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    foreach ($this->routes as $route) {

        if ($route['route'] == $uri && $route['method'] == $method) {
            return $this->dispatch($route);
        }
    }

    http_response_code(404);
    exit('Rota não encontrada');
}

    public function dispatch($route){

        list($controller, $method) = explode('@', $route['action']);

        $controllerClass = "app\\controllers\\$controller";

        if (!class_exists($controllerClass)) {
            print "Controller $controller não encontrado";
            die;
        }

        if (!method_exists($controllerClass, $method)) {
            print "Método $method não encontrado em $controllerClass";
            die;
        }
        
        $controller = new $controllerClass;
        $controller->$method();

    }

    public function getAllRoutes(){
        return $this->routes;
    }

    private function serveStaticFile($uri)
{
    $arquivo = realpath(__DIR__ . '/../../public' . $uri);

    $diretorioPublico = realpath(__DIR__ . '/../../public');

    // Verifica se o arquivo existe e está dentro de public
    if (
        !$arquivo ||
        !str_starts_with($arquivo, $diretorioPublico . DIRECTORY_SEPARATOR) ||
        !is_file($arquivo)
    ) {
        return false;
    }

    $mime = mime_content_type($arquivo);

    header("Content-Type: $mime");
    header("Content-Length: " . filesize($arquivo));

    readfile($arquivo);

    return true;
}

}

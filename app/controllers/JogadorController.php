<?php

namespace app\controllers;

use DateTimeImmutable;
use app\core\Controller;
use app\models\Jogador;
use app\services\JogadorService;

class JogadorController extends Controller
{
    private JogadorService $service;

    public function __construct()
    {
        $this->service = new JogadorService();
    }

    public function listarTodos()
    {

        $data['lista'] = $this->service->getJogadores();
        $this->view('jogadores/jogadores_list', $data);
    }

    public function verJogador()
    {

        if (!isset($_GET['id'])) {
            $this->redirect(URL_BASE . '/jogadores');
        }

        $id = $_GET['id'];

        $data['jogador'] = $this->service->getJogador($id);

        $this->view('jogadores/jogadores_show', $data);
    }

    public function criar()
    {
        $this->autenticacaoRequired();

        $this->view('jogadores/jogadores_create', []);
    }

    public function salvar()
    {
        $this->adminRequired();

        $nome = $_POST['nome'];
        $nascimento = $_POST['dataNascimento'];
        $nacionalidade = $_POST['nacionalidade'];
        $altura = $_POST['altura'];
        $peso = $_POST['peso'];
        $peDominante = $_POST['peDominante'];
        $posicao = $_POST['posicao'];
        $time = $_POST['time'];
        $imagem = $_POST['imagem'] ?? '';


        $jogador = new Jogador();

        $jogador->setNome($nome);
        $jogador->setDataNascimento($nascimento);
        $jogador->setNacionalidade($nacionalidade);
        $jogador->setAltura($altura);
        $jogador->setPeso($peso);
        $jogador->setPeDominante($peDominante);
        $jogador->setPosicao($posicao);
        $jogador->setTime($time);
        $jogador->setImagem($imagem);

        $this->service->saveJogador($jogador);

        $this->redirect(URL_BASE . '/jogadores');
    }

    public function redirecionarTeste()
    {
        $this->redirect("http://google.com");
    }
}

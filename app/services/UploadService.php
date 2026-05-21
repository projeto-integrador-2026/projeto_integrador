<?php 

namespace app\services;

use Exception;

class UploadService {
    
    private array $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'pdf', 'gif', 'doc', 'docx'];
    private int $tamanhoMaximo = 5 * 1200000 ; //aproximadamente 5MB

    private string $uploadPath;

    public function __construct(string|null $path = null)
    {
        $this->uploadPath = $path ?? STORAGE_PATH; //salva na pasta storage que em teoria é mais segura

        if (!is_dir($this->uploadPath)) {
            mkdir(UPLOAD_PATH, 0777, true);
        }
        
    }

    // Array de arquivos vindo de um formulário
    public function upload(array $file){

        if ($file['size'] > $this->tamanhoMaximo) {
            throw new Exception("Arquivo muito grande. Tamanho máxim permitdo: 5MB.");
        }

        $extensao = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($extensao, $this->extensoesPermitidas)) {
            throw new Exception("Tipo de arquivo não permitido.");
        }
        
        //Gerar um novo nome teoricamente unico
        $novaImagem = bin2hex(random_bytes(16)) . '.'. $extensao;

        $destino = UPLOAD_PATH . '/' . $novaImagem;


        if (move_uploaded_file($file['tmp_name'], $destino)) {
            return $novaImagem;
        }

        throw new Exception("Falha ao mover o arquivo para o destinho final.");

    }

}
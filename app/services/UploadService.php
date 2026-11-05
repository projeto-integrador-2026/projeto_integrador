
<?php

namespace app\services;

use Exception;

class UploadService {

    private array $extensoesPermitidas = [
        'jpg', 'jpeg', 'png', 'pdf', 'gif', 'doc', 'docx'
    ];

    private int $tamanhoMaximo = 5 * 1024 * 1024; // 5 MB

    private string $uploadPath;

    public function __construct(string|null $path = null)
    {
        $this->uploadPath = $path ?? STORAGE_PATH;

        if (!is_dir($this->uploadPath)) {
            if (!mkdir($this->uploadPath, 0775, true) && !is_dir($this->uploadPath)) {
                throw new Exception("Não foi possível criar o diretório de uploads.");
            }
        }

        if (!is_writable($this->uploadPath)) {
            throw new Exception("O diretório de uploads não possui permissão de escrita.");
        }
    }

    public function upload(array $file)
    {
        if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Erro no recebimento do arquivo.");
        }

        if ($file['size'] > $this->tamanhoMaximo) {
            throw new Exception("Arquivo muito grande. Tamanho máximo permitido: 5MB.");
        }

        $extensao = strtolower(
            pathinfo($file['name'], PATHINFO_EXTENSION)
        );

        if (!in_array($extensao, $this->extensoesPermitidas, true)) {
            throw new Exception("Tipo de arquivo não permitido.");
        }

        $novoArquivo = bin2hex(random_bytes(16)) . '.' . $extensao;

        $destino = rtrim($this->uploadPath, DIRECTORY_SEPARATOR)
                 . DIRECTORY_SEPARATOR
                 . $novoArquivo;

        if (move_uploaded_file($file['tmp_name'], $destino)) {
            return $novoArquivo;
        }

        throw new Exception("Falha ao mover o arquivo para o destino final.");
    }
}

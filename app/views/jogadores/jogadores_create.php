<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador • Novo Jogador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

    <div class="container">



        <div class="d-flex mt-5">

            <!-- CONTEÚDO -->
            <main class="flex-fill content">

                <!-- TÍTULO + VOLTAR -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Novo Jogador</h2>
                    <a href="<?= URL_BASE ?>/jogadores" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                </div>

                <!-- CARD COM FORMULÁRIO -->
                <div class="card shadow-sm">
                    <div class="card-body p-4">

                        <form action="<?= URL_BASE ?>/jogadores/salvar" method="post" enctype="multipart/form-data">

                            <div class="row g-3">
                                <!-- Nome -->
                                <div class="col-md-6">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $jogador['nome'] ?? '' ?>">
                                    <?php if (isset($erros['nome'])): ?>
                                        <div class="text-danger">
                                            <?= $erros['nome'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Data de Nascimento -->
                                <div class="col-md-6">
                                    <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                                    <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" value="<?= $jogador['dataNascimento'] ?? '' ?>">
                                    <?php if (isset($erros['dataNascimento'])): ?>
                                        <div class="text-danger">
                                            <?= $erros['dataNascimento'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Nacionalidade -->
                                <div class="col-md-6">
                                    <label for="nacionalidade" class="form-label">Nacionalidade</label>
                                    <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" value="<?= $jogador['nacionalidade'] ?? '' ?>">

                                </div>

                                <!-- Posição -->
                                <div class="col-md-6">
                                    <label for="posicao" class="form-label">Posição</label>
                                    <select class="form-select" id="posicao" name="posicao">
                                        <option value="Goleiro" <?= (isset($jogador['posicao']) && $jogador['posicao'] == 'Goleiro') ? 'selected' : '' ?>>Goleiro</option>
                                        <option value="Defensor" <?= (isset($jogador['posicao']) && $jogador['posicao'] == 'Defensor') ? 'selected' : '' ?>>Defensor</option>
                                        <option value="Meio-campista" <?= (isset($jogador['posicao']) && $jogador['posicao'] == 'Meio-campista') ? 'selected' : '' ?>>Meio-campista</option>
                                        <option value="Atacante" <?= (isset($jogador['posicao']) && $jogador['posicao'] == 'Atacante') ? 'selected' : '' ?>>Atacante</option>
                                    </select>

                                </div>

                                <!-- Altura -->
                                <div class="col-md-4">
                                    <label for="altura" class="form-label">Altura (m)</label>
                                    <input type="number" step="0.01" class="form-control" id="altura" name="altura" value="<?= $jogador['altura'] ?? '' ?>">

                                </div>

                                <!-- Peso -->
                                <div class="col-md-4">
                                    <label for="peso" class="form-label">Peso (kg)</label>
                                    <input type="number" step="0.01" class="form-control" id="peso" name="peso" value="<?= $jogador['peso'] ?? '' ?>">

                                </div>

                                <!-- Pé Dominante -->
                                <div class="col-md-4">
                                    <label for="peDominante" class="form-label">Pé Dominante</label>
                                    <input type="text" class="form-control" id="peDominante" name="peDominante" value="<?= $jogador['peDominante'] ?? '' ?>">

                                </div>

                                <!-- Time -->
                                <div class="col-md-6">
                                    <label for="time" class="form-label">Time (País)</label>
                                    <input type="text" class="form-control" id="time" name="time" value="<?= $jogador['time'] ?? '' ?>">

                                </div>

                                <!-- Foto -->
                                <div class="col-md-6">
                                    <label for="imagem" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*">

                                    <?php if(isset($erros['imagem'])): ?>
                                        <span>
                                            <?= $erros['imagem'] ?>
                                        </span>
                                    <?php endif; ?>

                                </div>
                                
                            </div>

                            <!-- Botão Salvar -->
                            <div class="mt-4 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-check-circle"></i> Salvar
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </main>
        </div>

    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
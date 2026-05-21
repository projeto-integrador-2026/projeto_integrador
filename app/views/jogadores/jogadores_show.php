<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador • Dados do Jogador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">

        <?php if (isset($jogador)): ?>
            <!-- TÍTULO + VOLTAR -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Detalhes do Jogador</h2>
                <a href="<?= URL_BASE ?>/jogadores" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar para Lista
                </a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="row g-4">
                        <!-- IMAGEM -->
                        <div class="col-md-4">
                            <div class="bg-light rounded d-flex align-items-center justify-content-center border" style="aspect-ratio: 1/1; overflow: hidden;">
                                <?php if (!empty($jogador['imagem'])): ?>
                                    <img src="<?= URL_BASE ?>/assets/uploads/<?= $jogador['imagem'] ?>" alt="<?= $jogador['nome'] ?>" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                <?php else: ?>
                                    <div class="text-center text-muted">
                                        <i class="bi bi-person-fill" style="font-size: 5rem;"></i>
                                        <p class="mb-0">Sem foto</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- INFO -->
                        <div class="col-md-8">
                            <div class="mb-3">
                                <h3 class="mb-0 text-primary"><?= $jogador['nome'] ?></h3>
                                <p class="text-muted"><i class="bi bi-geo-alt"></i> <?= $jogador['nacionalidade'] ?></p>
                            </div>

                            <hr class="my-4">

                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <small class="text-muted d-block uppercase text-xs">Posição</small>
                                    <span class="fw-bold"><?= $jogador['posicao'] ?? 'Não informada' ?></span>
                                </div>
                                <div class="col-sm-6">
                                    <small class="text-muted d-block uppercase text-xs">Time</small>
                                    <span class="fw-bold"><?= $jogador['time'] ?? 'Não informado' ?></span>
                                </div>
                                <div class="col-sm-6">
                                    <small class="text-muted d-block uppercase text-xs">Nascimento</small>
                                    <span class="fw-bold"><?= isset($jogador['data_nascimento']) ? date('d/m/Y', strtotime($jogador['data_nascimento'])) : 'Não informado' ?></span>
                                </div>
                                <div class="col-sm-6">
                                    <small class="text-muted d-block uppercase text-xs">Pé Dominante</small>
                                    <span class="fw-bold"><?= $jogador['pe_dominante'] ?? 'Não informado' ?></span>
                                </div>
                                <div class="col-sm-6">
                                    <small class="text-muted d-block uppercase text-xs">Altura</small>
                                    <span class="fw-bold"><?= $jogador['altura'] ?>m</span>
                                </div>
                                <div class="col-sm-6">
                                    <small class="text-muted d-block uppercase text-xs">Peso</small>
                                    <span class="fw-bold"><?= $jogador['peso'] ?>kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> Jogador não encontrado.
                <div class="mt-3">
                    <a href="<?= URL_BASE ?>/jogadores" class="btn btn-warning">Voltar para Lista</a>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
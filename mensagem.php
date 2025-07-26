<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<?php
    require("conexao.php");
    if(isset($_SESSION['mensagem'])){
        $icon = match ($_SESSION['bg']) {
            'success' => 'check-circle-fill',
            'danger' => 'exclamation-triangle-fill',
        };
?>
<div class="container mt-3">
    <div class="alert alert-<?= $_SESSION['bg'] ?> alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <i class="bi bi-<?= $icon ?> me-2 fs-5" style="line-height: 1;"></i>
        <div><?= $_SESSION['mensagem'] ?></div>
        <button type="button" class="btn-close ms-2" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<?php }; ?>
<?php unset($_SESSION['bg'], $_SESSION['mensagem']);?>

<div class="row">
    <div class="col-lg-2">
        <a class="btn btn-md btn-success" href="principal.php">Página Principal</a>
    </div>
    <div class="col-lg-2">  
        <a class="btn btn-md btn-success" href="listar_usuario.php">Usuário</a>
    </div>
    <div class="col-lg-8 text-right">
        Bem-vindo <?php echo $_SESSION['nomeusu'] ?>
        <a class="btn btn-md btn-danger" href="logout.php">Sair</a>
    </div>
</div>
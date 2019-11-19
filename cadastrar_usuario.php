<?php
require_once('verifica_sessao.php');
require_once('db.class.php');
include("header.php");
include("menu.php");

$id = "";
$usuario = "";
$senha = "";
$email = "";

if (isset($_REQUEST['acao'])) {


    $id = $_REQUEST['id'];
    $acao = $_REQUEST['acao'];

    $objDb = new db();
    $linq = $objDb->conecta_mysql();

    if ($acao == "excluir") {
        $sql = "delete from tb_usuario where id_usuario = $id";
        $resultado_id = mysqli_query($linq, $sql);
        header('location:listar_usuario.php');
    } else if ($acao == "editar") {
        $sql = "select * from tb_usuario where id_usuario = $id";
    }

    $resultado_id = mysqli_query($linq, $sql);
    $dados_usuario = mysqli_fetch_object($resultado_id);

    $id = $dados_usuario->id_usuario;
    $usuario = $dados_usuario->ds_usuario;
    $senha = $dados_usuario->nm_senha;
    $email = $dados_usuario->ds_email;
}
?>

<br>
<br>
<div class="form-horizontal">
    <div class="row">
        <div class="offset-lg-3 col-lg-6">
            <form method="POST" action="registra_usuario.php<?= $id > 0 ? "?id=$id" : "" ?>" id="formCadastrarse">
                <div class="card text-center col-lg-12">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="email" class="form-control cadastro" id="email" name="email" value="<?= $email ?>" placeholder="Email" required="required">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="usuario" name="usuario" value="<?= $usuario ?>" placeholder="Usuário" required="required">
                                </div>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="senha" name="senha" value="<?= $senha ?>" placeholder="Senha" required="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary form-control">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
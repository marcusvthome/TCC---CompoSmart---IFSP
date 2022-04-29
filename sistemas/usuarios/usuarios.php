<!-- Page Heading -->
<?php
include('./verifica_admin.php');
include('./funcoes.php');
$acao = @$_GET['acao'];
?>

<?php
function modalExcluirUsuario($IdUsuario)
{ ?>

    <div class="modal  fade" id="ModalExcluirUsuario<?php echo $IdUsuario ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true" style="height: 100%!important; width: 100%!important;">
        <div class="d-flex justify-content-center align-items-center modal-dialog modal-lg" role="document" style="height: 100%;">
            <div class="modal-content" style="height: fat-content;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir Usuário</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <canvas id="myChart"> </canvas> -->
                    <h1 class="h3 mb-4 mt-10 text-gray-800">Tem certeza de que deseja excluir este Usuário?</h1>
                    <p class="mb-4">Ao excluir um usuário, você não terá mais acesso aos dados!</p>
                    <hr />
                    <div class="row">
                        <div class="col-12">
                            <?php
                            echo "<form action=' ./usuarios/usuario-acao.php?acao=excluir&id=" . $IdUsuario . "' method='POST'>"
                            ?>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
                            <button id="btnExcluir" type="submit" class="btn btn-danger">Confirmar</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>

<?php
if ($acao == "") {
?>
    <h1 class="h3 mb-3 text-gray-800 text-center text-lg-left">Usuários</h1>

    <div class="card shadow mb-4">
        <div class="col-md-12 pt-3">
            <div class="table-responsive">
                <table class="exibe-dados table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Função</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $qr = mysqli_query($connect, "SELECT * FROM tbusuario WHERE Status = 'Ativo'");
                        $funcao = $_SESSION['Funcao'];

                        while ($dado = mysqli_fetch_array($qr)) {
                            $dadoId = $dado['id'];
                            modalExcluirUsuario($dadoId);

                            if ($funcao == "Administrador") {
                                echo "
                                    <tr>
                                        <td>
                                            " . $dado['Nome'] . "
                                            <br />
                                                <div style='font-size: 13px;'>
                                                    <a href='./index.php?p=usuarios&acao=ver&id=" . $dado['id'] . "'>Ver</a>
                                                        <span style='font-size: 12px;'> | </span> 
                                                    <a href='./index.php?p=usuarios&acao=editar&id=" . $dado['id'] . "'>Editar</a>
                                                        <span style='font-size: 12px;'> | </span> 
                                                    <a href='#' data-toggle='modal' data-target='#ModalExcluirUsuario" . $dado['id'] . "' class='text-danger'>Excluir</a>
                                                </div>
                                        </td>
                                        <td>" . $dado['Email'] . "</td>
                                        <td>" . $dado['Funcao'] . "</td>
                                    </tr>
                                ";
                            } else {
                                echo "
                                    <tr>
                                        <td>
                                            " . $dado['Nome'] . "
                                            <br />
                                                <div style='font-size: 13px;'>
                                                    <a href='./index.php?p=usuarios&acao=ver&id=" . $dado['id'] . "'>Ver</a>
                                                </div>
                                        </td>
                                        <td>" . $dado['Email'] . "</td>
                                        <td>" . $dado['Funcao'] . "</td>
                                    </tr>
                                ";
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
} else {

    $id = @$_GET['id'];

    if ($acao == "editar") {
    ?>

        <h1 class="h3 mb-3 text-gray-800 text-center text-lg-left">Editar usuário existente</h1>
        <p class="mb-5 text-center text-lg-left">Altere dados cadastrais do usuário.</p>

        <!-- Content Row -->
        <?php

        $qr = mysqli_query($connect, "SELECT * FROM tbusuario WHERE id = '{$id}'");
        $dado = mysqli_fetch_array($qr);

        echo "<form action='./usuarios/usuario-acao.php?acao=editar&id=" . $dado['id'] . "' method='POST' enctype='multipart/form-data'>";

        ?>
        <div class="row">

            <div class="col-12 col-lg-8">



                <div class="col-12 col-lg-4 d-block d-lg-none mb-5">
                    <div class="card shadow justify-content-center">
                        <div class="card-header py-3 text-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-secondary">Imagem de perfil Atual</h6>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <?php
                            if ($dado['img'] != NULL) {
                                echo "<img class='mb-2 align-self-center rounded-circle' src='./img/usuarios/" . $dado['img'] . "' style='max-width: 150px;'>";
                            } else {
                                echo "<img class='mb-2 align-self-center rounded-circle' src='./img/undraw_profile.svg' style='max-width: 150px;'>";
                            }
                            ?>
                        </div>
                        <div class="card-header py-3 text-center ">
                            <input id="fileImg" name="img" type="file" class="form-control-file">
                        </div>
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtNome">Nome <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="txtNome" name="Nome" type="text" class="form-control obrigatorio" value="<?php echo $dado['Nome']; ?>">
                    </div>
                </div>
                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtTelefone">Telefone <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="txtTelefone" name="Telefone" type="text" class="form-control obrigatorio" value="<?php echo $dado['Telefone']; ?>">
                    </div>
                </div>
                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtDataNasc">Data de Nascimento <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="txtDataNasc" name="DataNasc" type="date" class="form-control obrigatorio" value="<?php echo $dado['DataNasc']; ?>">
                    </div>
                </div>
                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="slctFuncao">Função <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12 col-md-7">
                        <select id="slctFuncao" name="Funcao" class="form-control">
                            <?php
                            if ($dado['Funcao'] == 'Comum') {
                                echo "<option selected value='Comum'>Comum</option>";
                                echo "<option value='Administrador'>Administrador</option>";
                            } else {
                                echo "<option value='Comum'>Comum</option>";
                                echo "<option selected value='Administrador'>Administrador</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtEmail">E-mail <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="txtEmail" name="Email" type="text" class="form-control obrigatorio" value="<?php echo $dado['Email'] ?>">
                    </div>
                </div>
                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtSenha">Senha</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <div class="form-group position-relative m-0">
                            <a id="btnNovaSenha" class="btn" style="border-color: #00882d; color:#00882d;">Nova Senha</a>
                            <input id="txtSenha" name="Senha" type="password" class="form-control d-none">
                            <div class="btnTogglePassword position-absolute d-none"><i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-row align-items-center mb-4 confirm-senha d-none">
                    <div class="col font-weight-bold">
                        <label for="txtConfirmSenha">Confirmar Senha</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <div class="form-group position-relative m-0">
                            <input id="txtConfirmSenha" name="Senha" type="password" class="form-control">
                            <div class="btnTogglePassword position-absolute"><i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                        </div>
                        <div class="invalid-feedback">
                            As senhas não são iguais!
                        </div>
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col">
                        <input type="button" name="submitted" class="btn btn-secondary" value="Cancelar" onClick="window.location='index.php?p=usuarios';" />
                        <button id="btnVeriEnviar" type="button" class="btn" style="background: #00882d; color:white;">Salvar</button>
                    </div>
                </div>



            </div>

            <div class="col-12 col-lg-4 d-none d-lg-block">
                <div class="card shadow justify-content-center">
                    <div class="card-header py-3 text-center justify-content-center">
                        <h6 class="m-0 font-weight-bold text-secondary">Imagem de perfil Atual</h6>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <?php
                        if ($dado['img'] != NULL) {
                            echo "<img class='mb-2 align-self-center rounded-circle' src='./img/usuarios/" . $dado['img'] . "' style='max-width: 150px;'>";
                        } else {
                            echo "<img class='mb-2 align-self-center rounded-circle' src='./img/undraw_profile.svg' style='max-width: 150px;'>";
                        }
                        ?>
                    </div>
                    <div class="card-header py-3 text-center ">
                        <input id="fileImg" name="img" type="file" class="form-control-file">
                    </div>
                </div>
            </div>
        </div>
        </form>

    <?php
    } else if ($acao == "ver") {
    ?>

        <h1 class="h3 mb-3 text-gray-800 text-center text-lg-left">Dados do Usuário</h1>

        <!-- Content Row -->
        <div class="row">

            <div class="col-12 col-lg-8">

                <?php
                $qr = mysqli_query($connect, "SELECT * FROM tbusuario WHERE id = '{$id}'");
                $dado = mysqli_fetch_array($qr);

                echo "<form action='./usuarios/usuario-acao.php?acao=editar&id=" . $dado['id'] . "' method='POST'>";

                ?>

                <div class="col-12 col-lg-4 d-block d-lg-none mb-5">
                    <div class="card shadow">
                        <div class="card-header py-3 text-center">
                            <h6 class="m-0 font-weight-bold text-secondary">Imagem de perfil deste usuário</h6>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <?php
                            if ($dado['img'] != NULL) {
                                echo "<img class='mb-2 align-self-center rounded-circle' src='./img/usuarios/" . $dado['img'] . "' style='max-width: 150px;'>";
                            } else {
                                echo "<img class='mb-2 align-self-center rounded-circle' src='./img/undraw_profile.svg' style='max-width: 150px;'>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtNome">Nome</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="txtNome" name="Nome" type="text" class="form-control obrigatorio" value="<?php echo $dado['Nome']; ?>" readonly>
                    </div>
                </div>
                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtTelefone">Telefone</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="txtTelefone" name="Telefone" type="text" class="form-control obrigatorio" value="<?php echo $dado['Telefone']; ?>" readonly>
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtDataNasc">Data de Nascimento</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="txtDataNasc" name="DataNasc" type="date" class="form-control obrigatorio" value="<?php echo $dado['DataNasc']; ?>" readonly>
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="slctFuncao">Função</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input type="text" id="slctFuncao" name="Funcao" class="form-control" readonly placeholder="<?php
                                                                                                                    echo  $dado['Funcao'];
                                                                                                                    ?>">

                        </select>
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtEmail">E-mail</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="txtEmail" name="Email" type="text" class="form-control obrigatorio" readonly value="<?php echo $dado['Email'] ?>">
                    </div>
                </div>
                </form>
            </div>

            <div class="col-12 col-lg-4 d-none d-lg-block">
                <div class="card shadow">
                    <div class="card-header py-3 text-center">
                        <h6 class="m-0 font-weight-bold text-secondary">Imagem de perfil deste usuário</h6>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <?php
                        if ($dado['img'] != NULL) {
                            echo "<img class='mb-2 align-self-center rounded-circle' src='./img/usuarios/" . $dado['img'] . "' style='max-width: 150px;'>";
                        } else {
                            echo "<img class='mb-2 align-self-center rounded-circle' src='./img/undraw_profile.svg' style='max-width: 150px;'>";
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>

    <?php
    } else if ($acao == 'excluir') {

    ?>
        <h1 class="h3 mb-3 text-gray-800">Excluir usuário</h1>
        <p class="mb-5">Tem certeza de que deseja excluir permanentemente este usuário?</p>

        <div class="row">

            <div class="col-12">
                <?php
                $qr = mysqli_query($connect, "SELECT * FROM tbusuario WHERE id ='{$id}'");
                $dado = mysqli_fetch_array($qr);

                echo "<form action='./usuarios/usuario-acao.php?acao=excluir&id=" . $dado['id'] . "' method='POST'>"
                ?>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <?php
                        echo "Nome: " . $dado['Nome'] . "<br>Email: " . $dado['Email'] . "<br>Função: " . $dado['Funcao'];
                        ?>
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col">
                        <button id="btnExcluir" type="submit" class="btn btn-primary">Confirmar exclusão</button>
                    </div>
                </div>

                </form>

            </div>
        </div>
<?php
    }
}
?>
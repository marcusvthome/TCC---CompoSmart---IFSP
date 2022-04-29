<!-- Page Heading -->
<?php include('funcoes.php') ?>
<h1 class="h3 mb-3 text-gray-800 mb-5 text-center text-lg-left">Meu Perfil</h1>

<!-- Content Row -->
<div class="row">

    <div class="col-12 col-lg-8">

        <?php
        $Email = $_SESSION['Email'];
        $qr = mysqli_query($connect, "SELECT * FROM tbusuario WHERE Email = '{$Email}'");
        $dado = mysqli_fetch_array($qr);
        $funcao = $dado['Funcao'];

        echo "<form action='./usuarios/usuario-acao.php?acao=editar&id=" . $dado['id'] . "&perfil=true' method='POST' enctype='multipart/form-data'>";
        ?>

        <div class="card shadow d-block d-lg-none mb-5">
            <div class="card-header py-3 text-center">
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
        </div>

        <div class="form-row align-items-center mb-4">
            <div class="col font-weight-bold">
                <label for="txtNome">Nome</label>
            </div>
            <div class="col-12 col-md-7">
                <input id="txtNome" name="Nome" type="text" class="form-control obrigatorio" value="<?php echo $dado['Nome']; ?>">
            </div>
        </div>
        <div class="form-row align-items-center mb-4">
            <div class="col font-weight-bold">
                <label for="txtDataNasc">Data de Nascimento</label>
            </div>
            <div class="col-12 col-md-7">
                <input id="txtDataNasc" name="DataNasc" type="date" class="form-control obrigatorio" value="<?php echo $dado['DataNasc']; ?>">
            </div>
        </div>
        <div class="form-row align-items-center mb-4">
            <div class="col font-weight-bold">
                <label for="txtTelefone">Telefone</label>
            </div>
            <div class="col-12 col-md-7">
                <input id="txtTelefone" name="Telefone" type="text" class="form-control obrigatorio" value="<?php echo $dado['Telefone']; ?>">
            </div>
        </div>

        <?php if ($funcao == "Administrador") { ?>
            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="slctFuncao">Função</label>
                </div>
                <div class="col-12 col-md-7">
                    <select type="text" id="slctFuncao" name="Funcao" class="form-control" >
                        <option selected value="Administrador">Administrador</option>
                        <option  value="Comum">Comum</option>

                    </select>
                </div>
            </div>
        <?php } else { ?>
            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="slctFuncao">Função</label>
                </div>
                <div class="col-12 col-md-7">
        
                        <input type="text" id="slctFuncao" name="Funcao" class="form-control" readonly value="<?php echo  $funcao; ?>">
                </div>
            </div>
        <?php }  ?>
        <div class="form-row align-items-center mb-4">
            <div class="col font-weight-bold">
                <label for="fileImg">Imagem de Perfil</label>
            </div>
            <div class="col-12 col-md-7">
                <input id="fileImg" name="img" type="file" class="form-control-file">
            </div>
        </div>
        <div class="form-row align-items-center mb-4">
            <div class="col font-weight-bold">
                <label for="txtEmail">E-mail</label>
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
                <button id="btnVeriEnviar" type="submit" class="btn" style="background: #00882d; color:white;">Atualizar Perfil</button>
            </div>
        </div>
        </form>
    </div>
    <div class="col-12 col-lg-4 d-none d-lg-block">
        <div class="card shadow">
            <div class="card-header py-3 text-center">
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
        </div>
    </div>
</div>
<!-- Page Heading -->
<?php
include('./verifica_admin.php');
?>

<h1 class="h3 mb-3 text-gray-800 text-center text-lg-left">Adicionar novo usuário</h1>
<p class="mb-5 text-center text-lg-left">Crie um usuário novo e o adicione a este sistema.</p>

<!-- Content Row -->
<div class="row">

    <div class="col-12 col-lg-8">

        <form action="./usuarios/usuario-acao.php" method="POST" enctype="multipart/form-data">

            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="txtNome">Nome <span class="text-danger">*</span></label>
                </div>
                <div class="col-12 col-md-7">
                    <input id="txtNome" name="Nome" type="text" class="form-control obrigatorio">
                </div>
            </div>
            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="txtDataNasc">Data de Nascimento <span class="text-danger">*</span></label>
                </div>
                <div class="col-12 col-md-7">
                    <input id="txtDataNasc" name="DataNasc" type="date" max="<?php echo date('Y-m-d')?>" class="form-control obrigatorio">
                </div>
            </div>
            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="txtTelefone">Telefone <span class="text-danger">*</span></label>
                </div>
                <div class="col-12 col-md-7">
                    <input id="txtTelefone" name="Telefone" type="text" class="form-control obrigatorio">
                </div>
            </div>
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
                    <label for="slctFuncao">Função <span class="text-danger">*</span></label>
                </div>
                <div class="col-12 col-md-7">
                    <select id="slctFuncao" name="Funcao" class="form-control">
                        <option selected value="Comum">Comum</option>
                        <option value="Administrador">Administrador</option>
                    </select>
                </div>
            </div>
            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="txtEmail">E-mail <span class="text-danger">*</span></label>
                </div>
                <div class="col-12 col-md-7">
                    <input id="txtEmail" name="Email" type="text" class="form-control obrigatorio">
                </div>
            </div>
            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="txtSenha">Senha <span class="text-danger">*</span></label>
                </div>
                <div class="col-12 col-md-7">
                    <div class="form-group position-relative m-0">
                        <input id="txtSenha" name="Senha" type="password" class="form-control obrigatorio">
                        <div class="btnTogglePassword position-absolute"><i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-row align-items-center mb-4 confirm-senha">
                <div class="col font-weight-bold">
                    <label for="txtConfirmSenha">Confirmar Senha</label>
                </div>
                <div class="col-12 col-md-7">
                    <div class="form-group position-relative m-0">
                        <input id="txtConfirmSenha" name="Senha" type="password" class="form-control obrigatorio">
                        <div class="btnTogglePassword position-absolute"><i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                    </div>
                    <div class="invalid-feedback">
                        As senhas não são iguais!
                    </div>
                </div>
            </div>
            <div class="form-row align-items-center">
                <div class="col">
                    <input type="button" name="submitted" class="btn btn-secondary" value="Cancelar" onClick="window.location='index.php?p=usuarios';"/>
                    <button id="btnVeriEnviar" type="button" class="btn" style="background: #00882d; color:white;">Cadastrar</button>
                </div>
            </div>
        </form>

    </div>

    <div class="col-12 col-lg-4">

    </div>
</div>
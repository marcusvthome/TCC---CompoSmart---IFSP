<?php
if (isset($_SESSION['erro_cadastro'])) :
?>
    <div class="row mb-4 px-2">
        <div class="card col-12 border-left-danger shadow py-3 px-4">
            <div class="h6 mb-0 font-weight-normal text-gray-800">Erro ao cadastrar!</div>
        </div>
    </div>
<?php
endif;
unset($_SESSION['erro_cadastro']);
?>

<?php
if (isset($_SESSION['erro_edicao'])) :
?>
    <div class="row mb-4 px-2">
        <div class="card col-12 border-left-danger shadow py-3 px-4">
            <div class="h6 mb-0 font-weight-normal text-gray-800">Erro ao editar!</div>
        </div>
    </div>
<?php
endif;
unset($_SESSION['erro_edicao']);
?>

<?php
if (isset($_SESSION['erro_exclusao'])) :
?>
    <div class="row mb-4 px-2">
        <div class="card col-12 border-left-danger shadow py-3 px-4">
            <div class="h6 mb-0 font-weight-normal text-gray-800">Erro ao excluir!</div>
        </div>
    </div>
<?php
endif;
unset($_SESSION['erro_exclusao']);
?>

<?php
if (isset($_SESSION['usuario_cadastrado'])) :
?>
    <div class="row mb-4 px-2">
        <div class="card col-12 border-left-success shadow py-3 px-4">
            <div class="h6 mb-0 font-weight-normal text-gray-800">Usuário cadastrado com sucesso!</div>
        </div>
    </div>
<?php
endif;
unset($_SESSION['usuario_cadastrado']);
?>

<?php
if (isset($_SESSION['usuario_existente'])) :
?>
    <div class="row mb-4 px-2">
        <div class="card col-12 border-left-danger shadow py-3 px-4">
            <div class="h6 mb-0 font-weight-normal text-gray-800">Atenção! Já existe um usuário com o email informado!</div>
        </div>
    </div>
<?php
endif;
unset($_SESSION['usuario_existente']);
?>

<?php
if (isset($_SESSION['usuario_alterado'])) :
?>
    <div class="row mb-4 px-2">
        <div class="card col-12 border-left-success shadow py-3 px-4">
            <div class="h6 mb-0 font-weight-normal text-gray-800">Usuário alterado com sucesso!</div>
        </div>
    </div>
<?php
endif;
unset($_SESSION['usuario_alterado']);
?>

<?php
if (isset($_SESSION['usuario_excluido'])) :
?>
    <div class="row mb-4 px-2">
        <div class="card col-12 border-left-success shadow py-3 px-4">
            <div class="h6 mb-0 font-weight-normal text-gray-800">Exclusão de usuário efetuada com sucesso!</div>
        </div>
    </div>
<?php
endif;
unset($_SESSION['usuario_excluido']);
?>

<?php
if (isset($_SESSION['perfil_atualizado'])) :
?>
    <div class="row mb-4 px-2">
        <div class="card col-12 border-left-success shadow py-3 px-4">
            <div class="h6 mb-0 font-weight-normal text-gray-800">Perfil atualizado com sucesso!</div>
        </div>
    </div>
<?php
endif;
unset($_SESSION['perfil_atualizado']);
?>



<?php
if (isset($_SESSION['linha_cadastrada'])) :
?>
    <div class="row mb-4 px-2">
        <div class="card col-12 border-left-success shadow py-3 px-4">
            <div class="h6 mb-0 font-weight-normal text-gray-800">Linha cadastrada com sucesso!</div>
        </div>
    </div>
<?php
endif;
unset($_SESSION['linha_cadastrada']);
?>

<?php
if (isset($_SESSION['secao_cadastrada'])) :
?>
    <div class="row mb-4 px-2">
        <div class="card col-12 border-left-success shadow py-3 px-4">
            <div class="h6 mb-0 font-weight-normal text-gray-800">Secao cadastrada com sucesso!</div>
        </div>
    </div>
<?php
endif;
unset($_SESSION['secao_cadastrada']);
?>



<?php
if (isset($_SESSION['linha_alterada'])) :
?>
    <div class="row mb-4 px-2">
        <div class="card col-12 border-left-success shadow py-3 px-4">
            <div class="h6 mb-0 font-weight-normal text-gray-800">Linha alterada com sucesso!</div>
        </div>
    </div>
<?php
endif;
unset($_SESSION['linha_alterada']);
?>

<?php
if (isset($_SESSION['linha_excluida'])) :
?>
    <div class="row mb-4 px-2">
        <div class="card col-12 border-left-success shadow py-3 px-4">
            <div class="h6 mb-0 font-weight-normal text-gray-800">Exclusão de linha efetuada com sucesso!</div>
        </div>
    </div>
<?php
endif;
unset($_SESSION['linha_excluida']);
?>


<?php
if (isset($_SESSION['secao_excluida'])) :
?>
    <div class="row mb-4 px-2">
        <div class="card col-12 border-left-success shadow py-3 px-4">
            <div class="h6 mb-0 font-weight-normal text-gray-800">Exclusão de secao efetuada com sucesso!</div>
        </div>
    </div>
<?php
endif;
unset($_SESSION['secao_excluida']);
?>

<?php
if (isset($_SESSION['linha_finalizada'])) :
?>
    <div class="row mb-4 px-2">
        <div class="card col-12 border-left-success shadow py-3 px-4">
            <div class="h6 mb-0 font-weight-normal text-gray-800">Linha finalizada com sucesso! Estágio: curado.</div>
        </div>
    </div>
<?php
endif;
unset($_SESSION['linha_finalizada']);
?>
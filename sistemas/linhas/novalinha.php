<!-- Page Heading -->



<div class="modal  fade p-3" id="ModalTamanho" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%!important; width: 100%!important;">
    <div class="d-flex justify-content-center align-items-center modal-dialog modal-lg" role="document" style="height: 100%;">
        <div class="modal-content" style="height: fat-content;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tamanhos das Linhas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body justify-content-left ">
                <div class="card-body shadow">
                    <img src="./img/300X150CM-manual.png" width="360px" alt="Base">
                    <p> Linha com 3m de base e 1,5m de altura</p>
                    <hr />
                    <img src="./img/200X100CM-manual.png" width="360px" alt="Base">
                    <p> Linha com 2m de base e 1m de altura</p>
                </div>
            </div><!-- fim do body -->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>




<h1 class="h1 mb-3 text-gray-800 text-center text-lg-left">Cadastrar Linha</h1>
<p class="mb-1">Preencha todos os campos para cadastrar a Linha!</p>
<p class="mb-4"><b><a href="./index.php?p=linhascuradas">Clique aqui</a></b> para mesclar uma linha</p>

<!-- Content Row -->
<div class="row">

    <div class="col-12 col-lg-8">

        <form action="./linhas/linha-acao.php" method="POST">

            <!-- NOME DA LINHA -->
            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="txtNome">Nome da Linha <span class="text-danger">*</span></label>
                </div>
                <div class="col-12 col-md-7">
                    <input name="txtNome" id="txtNome" type="text" class="form-control obrigatorio" required="required">

                </div>
            </div>

            <!-- SELECIONANDO DATA -->
            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="dtData">Data de Criação da Linha <span class="text-danger">*</span></label>
                </div>
                <div class="col-12 col-md-7">
                    <input name="dtData" id="dtData" type="date" class="form-control obrigatorio" max="<?php echo date('Y-m-d') ?>" formaction="text" required>
                </div>
            </div>

            <!-- LOCAL -->
            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="txtLocal">Localização <span class="text-danger">*</span></label>
                </div>
                <div class="col-12 col-md-7">
                    <input name="txtLocal" id="txtLocal" type="text" class="form-control obrigatorio" formaction="text" required>
                </div>
            </div>

            <!-- COMPOSTOS -->
            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="slctTipoComposto">Relação C/N dos Compostos <span class="text-danger">*</span></label>
                </div>
                <div class="col-12 col-md-7">
                    <select name="slctTipoComposto" id="slctTipoComposto" class="form-control obrigatorio">
                        <option> C/N maior que 30/1</option>
                        <option> C/N menor que 30/1</option>
                        <option selected>C/N igual a 30/1</option>
                    </select>
                </div>
            </div>

            <!-- TAMANHO DA LINHA -->
            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="slctTamanho">Tamanho da Linha <span class="text-danger">*</span></label>
                </div>
                <button type="button" class='btn btn-secondary btn-sm' data-toggle='modal' data-target='#ModalTamanho'><i class="fa fa-question-circle "></i></button>
                <div class="col-12 col-md-7">
                    <select name="slctTamanho" id="slctTamanho" class="form-control obrigatorio">
                        <option>3m x 1,5m</option>
                        <option>2m x 1m</option>
                    </select>

                </div>

            </div>

            <!-- DESCRIÇÃO -->
            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="txtDescricao">Descrição</label>
                </div>
                <div class="col-12 col-md-7">
                    <textarea class="form-control" name="txtDescricao" id="txtDescricao" rows="4" placeholder="Anote aqui os compostos utilizados e sua porcentagem..."></textarea>
                </div>
            </div>

            <div class="form-row align-items-center">
                <div class="col">
                    <input type="button" name="submitted" class="btn btn-secondary" value="Cancelar" onClick="window.location='index.php';" />
                    <button id="btnVeriEnviar" type="button" class="btn" style="background: #00882d; color:white;">Cadastrar</button>
                </div>
            </div>

        </form>

    </div>
    <div class="col-12 col-lg-4">
    </div>
</div>


<?php

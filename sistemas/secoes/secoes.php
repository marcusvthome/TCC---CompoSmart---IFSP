<!-- Page Heading -->
<?php

$acao = @$_GET['acao'];
$id = @$_GET['id'];

if ($acao == "cadastrarsecao") {
?>


    <h1 class="h1 mb-3 text-gray-800 ">Cadastrar Seção</h1>
    <p class="mb-5">Preencha todos os campos para cadastrar a seção!</p>

    <!-- Content Row -->
    <div class="row">

        <div class="col-12 col-lg-6 pl-3 pr-3">

            <?php
            echo "<form action='./secoes/secao-acao.php?acao=cadastrarsecao&id=" . $id . "' method='POST'>"

            ?>

            <?php
            $Email = $_SESSION['Email'];
            $qr = mysqli_query($connect, "SELECT * FROM tbusuario WHERE Email = '{$Email}'");
            $dado = mysqli_fetch_array($qr);

            ?>

            <!-- SELECIONANDO DATA -->
            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="dtData">Data de Criação <span class="text-danger">*</span></label>
                </div>
                <div class="col-12 col-md-7">
                    <input name="dtData" id="dtData" type="date" max="<?php echo date('Y-m-d') ?>" class="form-control obrigatorio" formaction="text">
                </div>
            </div>

            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="txtNomeFuncionario">Nome do Funcionário <span class="text-danger">*</span></label>
                </div>
                <div class="col-12 col-md-7">
                    <input name="txtNomeFuncionario" id="txtNomeFuncionario" type="text" class="form-control obrigatorio" required="required">
                </div>
            </div>

            <!-- POSIÇÃO DA seção -->
            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="txtPosicao">Posição da seção na Linha<span class="text-danger">*</span></label>
                </div>
                <div class="col-12 col-md-7">
                    <input name="txtPosicao" id="txtPosicao" type="number" class="form-control obrigatorio" formaction="text" placeholder="Metros em relação ao início da linha">
                </div>
            </div>

            <!-- OBSERVAÇÃO -->
            <div class="form-row align-items-center mb-4">
                <div class="col font-weight-bold">
                    <label for="txtObservacao">Observação</label>
                </div>
                <div class="col-12 col-md-7">
                    <textarea class="form-control" name="txtObservacao" id="txtObservacao" rows="2"></textarea>
                </div>
            </div>
            <?php
            $qr = mysqli_query($connect, "SELECT * FROM tblinha WHERE Id = '$id'");
            $dado = mysqli_fetch_array($qr);
            if ($dado['Tamanho'] == '3m x 1,5m') {
            ?>

                <table class="exibe-dados table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <p>Preencha as coordenadas com base na imagem!</p>
                    <thead>
                        <tr>
                            <th>Temperatura</th>
                            <th>Umidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        echo "
                                    <tr>
                                        <td > <input name='numT1' id='numT1' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 1' > </td>
                                        <td > <input name='numU1' id='numU1' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 1' > </td>
                                    </tr>
                                    <tr>
                                        <td > <input name='numT2' id='numT2' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 2'>  </td>
                                        <td > <input name='numU2' id='numU2' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 2' > </td>
                                    </tr>
                                    <tr>
                                        <td > <input name='numT3' id='numT3' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 3' >  </td>
                                        <td > <input name='numU3' id='numU3' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 3' > </td>
                                    </tr>
                                    <tr>
                                        <td > <input name='numT4' id='numT4' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 4' >  </td>
                                        <td > <input name='numU4' id='numU4' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 4' > </td>
                                    </tr>
                                    <tr>
                                        <td > <input name='numT5' id='numT5' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 5' >  </td>
                                        <td > <input name='numU5' id='numU5' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 5' > </td>
                                    </tr>
                                    <tr>
                                        <td ><input name='numT6' id='numT6' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 6' ></td>
                                        <td > <input name='numU6' id='numU6' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 6' > </td>
                                    </tr>
                                    
                             ";
                        ?>
                    </tbody>
                </table>

            <?php
            } else {
            ?>
                <hr />
                <table class="exibe-dados table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <p>Preencha as coordenadas com base na imagem!</p>
                    <thead>
                        <tr>
                            <th>Temperatura</th>
                            <th>Umidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        echo "
                                    <tr>
                                        <td > <input name='numT1' id='numT1' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 1' > </td>
                                        <td > <input name='numU1' id='numU1' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 1' > </td>
                                    </tr>
                                    <tr>
                                        <td > <input name='numT2' id='numT2' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 2'>  </td>
                                        <td > <input name='numU2' id='numU2' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 2' > </td>
                                    </tr>
                                    <tr>
                                        <td > <input name='numT3' id='numT3' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 3' >  </td>
                                        <td > <input name='numU3' id='numU3' type='number' class='form-control obrigatorio' formaction='text' placeholder='Ponto 3' > </td>
                                    </tr>                    
                             ";
                        ?>
                    </tbody>
                </table>
            <?php
            }
            ?>

            <div class="form-row align-items-center pt-2">
                <div class="col">
                    <input type="button" name="submitted" class="btn btn-secondary" value="Cancelar" onClick="window.location='index.php';" />
                    <button id="btnVeriEnviar" type="button" class="btn" style="background: #00882d; color:white;">Cadastrar</button>

                </div>
            </div>
            <br />

            </form>

        </div>

        <div class="col-12 col-lg-6 d-none d-lg-block" style="border-left: 1px solid;">

            <?php if ($dado['Tamanho'] == '3m x 1,5m') {
            ?>
                <img src="./img/300X150CM.png" width="500px" alt="Base">

                <img src="./img/300X150CM-manual.png" width="500px" alt="Base">

            <?php } else {
            ?>
                <img src="./img/200X100CM.png" width="500px" alt="Base">
                <img src="./img/200X100CM-manual.png" width="500px" alt="Base">

            <?php }
            ?>
        </div>

        <div class="col-12 d-block d-lg-none d-flex justify-content-center">

            <?php if ($dado['Tamanho'] == '3m x 1,5m') {
            ?>
                <div class="row">
                    <div class="col-md">
                        <img src="./img/300X150CM.png" width="100%" alt="Base">
                    </div>
                    <div class="col-md">
                        <img src="./img/300X150CM-manual.png" width="500px" alt="Base">
                    </div>
                <?php } else {
                ?>
                    <div class="row">
                        <div class="col-md">
                            <img src="./img/200X100CM.png" width="100%" alt="Base">
                        </div>

                        <div class="col-md">
                            <img src="./img/200X100CM-manual.png" width="100%" alt="Base">
                        </div>
                    <?php }
                    ?>
                    </div>
                </div>
        </div>

            <?php
        } else if ($acao == 'excluirsecao') { ?>

                <h1 class="h3 mb-3 text-gray-800">Excluir Seção</h1>
                <p class="mb-5">Tem certeza de que deseja excluir esta seção?</p>

                <div class="row">

                    <div class="col-12">
                        <?php
                        $qr = mysqli_query($connect, "SELECT * FROM tbsecao WHERE Id ='{$id}'");
                        $dado = mysqli_fetch_array($qr);

                        echo "<form action='./secoes/secao-acao.php?acao=excluirsecao&id=" . $dado['Id'] . "' method='POST'>"
                        ?>

                        <div class="form-row align-items-center mb-4">
                            <div class="col font-weight-bold">
                                <?php
                                echo "seção: " . $dado['Id'];
                                ?>
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <div class="col">
                                <button id="btnExcluir" type="submit" class="btn btn-primary">Confirmar</button>
                            </div>
                        </div>

                        </form>

                    </div>
                </div>

            <?php
        }
            ?>
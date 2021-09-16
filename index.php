<?php
include_once('buscarendereco.php');
include_once('connection.php');

$address = getAddress($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumindo API</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">

                <h1 class="masthead-heading text-uppercase mb-0">Busca CEP</h1>
                <p class="masthead-subheading font-weight-light mb-0">Encontre o xml do cep que busca!</p>
            </div>
        </header>
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <form action="." method="post">
                    <?php if (($address->cep == 'CEP não existe!' || $address->cep == 'Cep inválido!') && isset($_POST['cep'])) { ?>
                        <div class="alert alert-danger div-margin-lt" role="alert">
                            <?php echo $address->cep == 'CEP não existe!' ? "O CEP ". $_POST['cep']." não existe tente outro!" : "Cep inválido ou mau formatado! Digite algo parecido com <b>66033-000</b>"; ?>
                        </div>
                    <?php } ?>
                    <h3 class="masthead-subheading font-weight-light mb-0 div-margin-lt">Digite o CEP para encontrar o endereço.</h3>
                    <div class="col-md" id='div-input'>
                        <div class="form-floating">
                            <input type="text" class="form-control div-margin-lt" id="floatingInput" placeholder="Digite um cep..." name="cep" value="<?php $address->cep ?>">
                            <label for="floatingInput">Digite um cep...</label>
                        </div>
                    </div>
                    <div class="col-md div-margin-lt">
                        <div class="form-floating">
                            <button type="button submit" class="btn btn-primary btn-lg">Buscar CEP</button>
                        </div>
                    </div>
            </div>
            </form>
    </div>
    </section>

    <?php
    if ($address->ddd) {
    ?>
        <div class="container overflow-hidden" id="container-xml">
            <div class="card div-margin-lt" style="width: 30rem; ">
                <div class="col-6"></div>
                <div class="p-3 border bg-light">                  

        <pre class="xml">
<code>&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;root&gt;
    &lt;cep&gt;<?php echo $address->cep; ?>&lt;/cep&gt;
    &lt;logradouro&gt;<?php echo $address->logradouro; ?>&lt;/logradouro&gt;
    &lt;complemento&gt;<?php echo $address->complemento; ?>&lt;/complemento&gt;
    &lt;bairro&gt;<?php echo $address->bairro; ?>&lt;/bairro&gt;
    &lt;localidade&gt;<?php echo $address->localidade; ?>&lt;/localidade&gt;
    &lt;uf&gt;<?php echo $address->uf; ?>&lt;/uf&gt;
    &lt;ibge&gt;<?php echo $address->ibge; ?>&lt;/ibge&gt;
    &lt;gia&gt;<?php echo $address->gia; ?>&lt;/gia&gt;
    &lt;ddd&gt;<?php echo $address->ddd; ?>&lt;/ddd&gt;
    &lt;siafi&gt;<?php echo $address->siafi; ?>&lt;/siafi&gt;    
&lt;/root&gt;</code></pre>
                </div>
            </div>
        </div>
        </div>
    <?php }  ?>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
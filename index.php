<!DOCTYPE html>

<html>
    <head>
        <title>Calculo IR</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.css" rel="stylesheet">
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> 

        <style>
            div{
                border-style: solid;
                border-color: aliceblue;
                border-width: 3px;
                background-color: aliceblue;
                position: relative;
                text-align: center
                    
            }
            #div2{
                border-style: solid;
                border-color: #adadad;
                border-width: 3px;
                
            }
            img.displayed {
                display: block;
                margin-left: auto ;
                margin-right: auto
            }

            h1 { 
                text-align: center

            }
            h4 {
                text-align: center

            }
            p {
                font-weight: bold;
            }

        </style>

    </head>
    <body>

        <div id="div1"> 
            <form method="POST" action="index.php">

                <IMG class="displayed" src="leao.png" alt=" "><br/>
                <h1>Cálculo de Imposto de Renda</h1> <br/>
                Salário:
                <input type="number" name="salario" step="0.01" min="1" autocomplete="on" autofocus /><br><br><br>
                <input type="submit" name="btnCalcular" value="CALCULAR">	
            </form>    
        </div>



        <?php
            if (isset($_POST["salario"])) {
                 $salario = ($_POST["salario"]);

            if ($salario <= 1556.94) {
                 $salInss = $salario - ($salario * 0.08);
            } elseif ($salario >= 1556.95 && $salario <= 2594.92) {
                 $salInss = $salario - ($salario * 0.09);
            } elseif ($salario >= 2594.93 && $salario <= 5189.82) {
                 $salInss = $salario - ($salario * 0.11);
            } else {

                 $salInss = $salario - (5189.82 * 0.11);
            }


            if ($salInss <= 1903.98) {
                $salLiquido = $salInss;
            } elseif ($salInss >= 1903.99 && $salInss <= 2826.65) {
                $salLiquido = $salInss - (($salInss * 0.075) - 142.80);
            } elseif ($salInss >= 2826.66 && $salInss <= 3751.05) {
                $salLiquido = $salInss - (($salInss * 0.15) - 354.80);
            } elseif ($salInss >= 3751.06 && $salInss <= 4664.68) {
                $salLiquido = $salInss - (($salInss * 0.225) - 636.13);
            } elseif ($salInss > 4664.68) {
                $salLiquido = $salInss - (($salInss * 0.275) - 869.36);
            } else {

                $salLiquido = 0;
            }
            ?>      
            <div id="div2">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th><h4> Proventos</h4></th>
                            <th><h4>Descontos</h4></th>
                            <th><h4>Salário Líquido </h4></th>
                        </tr>
                    </thead>  
                    <tbody>
                        <tr>
                            <td>
            <?php
                if ($salario == NULL ) {
                    echo "DIGITE O VALOR DO SALARIO";
                } else {
                    echo "R$ ";
                    echo number_format($salario, 2, ",", ".");
                }
            ?>
                            </td>
                            <td>

            <?php
                echo "R$ ";
                $desconto = $salario - $salLiquido;
                echo number_format($desconto, 2, ",", ".");
            ?>
                            </td>                        

                            <td>
            <?php
                 echo "R$ ";
                 echo number_format($salLiquido, 2, ",", ".");
            }
            ?>
                        </td>
                    </tr>
                </tbody>              
            </table>
        </div>
    </body>
</html> 
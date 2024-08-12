<?php
function cac($investimento, $clientes) {
	$resultado = $investimento / $clientes;
	echo "Resultado: $resultado";
}

function calcular() {
	if (isset($_POST['calcular'])) {
		$investimento = $_POST['investimento'];
		$clientes = $_POST['clientes'];
		cac($investimento, $clientes);
	}
}
?>

<body>
	<style>
    .calculadora {
        align-items: center;
    }

    .form-calculadora {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .input-calculadora {
        width: 30% !important;
        margin-bottom: 20px;
		border: none !important;
		border-bottom: 2px solid #000 !important;
		outline: none;
        box-sizing: border-box;
    }
	
	.input-calculadora:focus {
        border-bottom-color: #4CAF50 !important;
    }
		
	.input-calculadora:first-child {
        margin-right: 4%;
    }

    input[type="submit"] {
        width: 100%; 
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
	</style>

	<div class="calculadora">
		<form class="form-calculadora" method="POST">
			<input class="input-calculadora" type="number" name="investimento" placeholder="Valor que deseja investir...">
			<input class="input-calculadora" type="number" name="clientes" placeholder="Quantidade de clientes esperado...">
            <input class="input-calculadora" type="number" name="roas" placeholder="ROAS esperado...">
			<input type="submit" name="calcular" value="Calcular">
		</form>
		<div>
			<?php calcular() ?>
		</div>
	</div>
</body>
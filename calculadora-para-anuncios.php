<?php
session_start();

function resultado() {
    if (isset($_POST['calcular'])) {
        $investimento = (float)$_POST['investimento'];
        $retorno = (float)$_POST['retorno'];
        $ticket = (float)$_POST['ticket'];
        $nicho = $_POST['nicho'];

        switch ($nicho) {
            case 'comercio':
                list($txClientes, $txLeads, $txRetencao) = comercio($nicho);
                calculo($investimento, $retorno, $ticket, $txClientes, $txLeads, $txRetencao);
                exit();
                break;

            case 'tecnologia':
                list($txClientes, $txLeads, $txRetencao) = tecnologia($nicho);
                calculo($investimento, $retorno, $ticket, $txClientes, $txLeads, $txRetencao);
                exit();
                break;
            
            case 'educacao':
                list($txClientes, $txLeads, $txRetencao) = educacao($nicho);
                calculo($investimento, $retorno, $ticket, $txClientes, $txLeads, $txRetencao);
                exit();
                break;
            
            case 'saude':
                list($txClientes, $txLeads, $txRetencao) = saude($nicho);
                calculo($investimento, $retorno, $ticket, $txClientes, $txLeads, $txRetencao);
                exit();
                break;

            case 'imobiliario':
                list($txClientes, $txLeads, $txRetencao) = imobiliario($nicho);
                calculo($investimento, $retorno, $ticket, $txClientes, $txLeads, $txRetencao);
                exit();
                break;

            case 'financas':
                list($txClientes, $txLeads, $txRetencao) = financas($nicho);
                calculo($investimento, $retorno, $ticket, $txClientes, $txLeads, $txRetencao);
                exit();
                break;

            case 'turismo':
                list($txClientes, $txLeads, $txRetencao) = turismo($nicho);
                calculo($investimento, $retorno, $ticket, $txClientes, $txLeads, $txRetencao);
                exit();
                break;
            
            case 'automoveis':
                list($txClientes, $txLeads, $txRetencao) = automoveis($nicho);
                calculo($investimento, $retorno, $ticket, $txClientes, $txLeads, $txRetencao);
                exit();
                break;
        
            case 'jogos':
                list($txClientes, $txLeads, $txRetencao) = jogos($nicho);
                calculo($investimento, $retorno, $ticket, $txClientes, $txLeads, $txRetencao);
                exit();
                break;

            case 'moda':
                list($txClientes, $txLeads, $txRetencao) = moda($nicho);
                calculo($investimento, $retorno, $ticket, $txClientes, $txLeads, $txRetencao);
                exit();
                break;
        }
    } 
}

function comercio($nicho) {
    if ($nicho === 'comercio') {
        $txClientes = 0.04;
        $txLeads = 0.05;
        $txRetencao = 0.04;

        return array ($txClientes, $txLeads, $txRetencao);
    }
}

function tecnologia($nicho) {
    if ($nicho === 'tecnologia') {
        $txClientes = 0.06;
        $txLeads = 0.04;
        $txRetencao = 0.03;

        return array ($txClientes, $txLeads, $txRetencao);
    }
}

function educacao($nicho) {
    if ($nicho === 'educacao') {
        $txClientes = 0.20;
        $txLeads = 0.10;
        $txRetencao = 0.02;

        return array ($txClientes, $txLeads, $txRetencao);
    }
}

function saude($nicho) {
    if ($nicho === 'saude') {
        $txClientes = 0.05;
        $txLeads = 0.05;
        $txRetencao = 0.03;

        return array ($txClientes, $txLeads, $txRetencao);
    }
}

function imobiliario($nicho) {
    if ($nicho === 'imobiliario') {
        $txClientes = 0.04;
        $txLeads = 0.07;
        $txRetencao = 0.02;

        return array ($txClientes, $txLeads, $txRetencao);
    }
}

function financas($nicho) {
    if ($nicho === 'financas') {
        $txClientes = 0.10;
        $txLeads = 0.06;
        $txRetencao = 0.03;

        return array ($txClientes, $txLeads, $txRetencao);
    }
}

function turismo($nicho) {
    if ($nicho === 'turismo') {
        $txClientes = 0.04;
        $txLeads = 0.04;
        $txRetencao = 0.03;

        return array ($txClientes, $txLeads, $txRetencao);
    }
}

function automoveis($nicho) {
    if ($nicho === 'automoveis') {
        $txClientes = 0.05;
        $txLeads = 0.06;
        $txRetencao = 0.02;

        return array ($txClientes, $txLeads, $txRetencao);
    }
}

function jogos($nicho) {
    if ($nicho === 'jogos') {
        $txClientes = 0.08;
        $txLeads = 0.10;
        $txRetencao = 0.04;

        return array ($txClientes, $txLeads, $txRetencao);
    }
}

function moda($nicho) {
    if ($nicho === 'moda') {
        $txClientes = 0.04;
        $txLeads = 0.05;
        $txRetencao = 0.03;

        return array ($txClientes, $txLeads, $txRetencao);
    }
}

function calculo($investimento, $retorno, $ticket, $txClientes, $txLeads, $txRetencao) {
    $_SESSION['viewRoas'] = (int)($retorno/$investimento);
    $_SESSION['viewClientes'] = (int)($retorno/$ticket);
    $_SESSION['viewLeads'] = (int)($_SESSION['viewClientes']/$txClientes);
    $_SESSION['viewCliques'] = (int)($_SESSION['viewLeads']/$txLeads);
    $_SESSION['viewImpressoes'] = (int)($_SESSION['viewCliques']/$txRetencao);
    $_SESSION['viewTxClientes'] = ($txClientes*100) . "%";
    $_SESSION['viewTxLeads'] = ($txLeads*100) . "%";
    $_SESSION['viewTxRetencao'] = ($txRetencao*100) . "%";

    echo "<h2>Resultado da Análise</h2>";
    echo "<p>Para alcançar os resultados desejados você precisará de:</p>";
    echo "<p>Aproximadamente: " . (isset($_SESSION['viewImpressoes']) ? $_SESSION['viewImpressoes'] : '') . " impressões.</p>";
    echo "<p>Um CTR de: " . (isset($_SESSION['viewTxRetencao']) ? $_SESSION['viewTxRetencao'] : '') . ".</p>";
    echo "<p>Aproximadamente: " . (isset($_SESSION['viewCliques']) ? $_SESSION['viewCliques'] : '') . " cliques.</p>";
    echo "<p>Uma taxa de conversão de leads de: " . (isset($_SESSION['viewTxLeads']) ? $_SESSION['viewTxLeads'] : '') . ".</p>";
    echo "<p>Aproximadamente: " . (isset($_SESSION['viewLeads']) ? $_SESSION['viewLeads'] : '') . " leads.</p>";
    echo "<p>Uma taxa de conversão de clientes de: " . (isset($_SESSION['viewTxClientes']) ? $_SESSION['viewTxClientes'] : '') . ".</p>";
    echo "<p>Aproximadamente: " . (isset($_SESSION['viewClientes']) ? $_SESSION['viewClientes'] : '') . " clientes.</p>";
    echo "<p>Um ROAS de: " . (isset($_SESSION['viewRoas']) ? $_SESSION['viewRoas'] : '') . ".</p>";
}

?>

<body>
	<style>
    .calculadora {
        align-items: center;
        border-radius: 10px;
        box-shadow: 5px 5px 10px #00000040;
        padding-left: 20px;
        padding-right: 20px;
        margin: 50px;
        font-family: Arial, Helvetica, sans-serif;
        padding-top: 20px;
    }

    .form-calculadora {
        display: flex;
        flex-direction: column;
        flex-wrap: nowrap;
    }

    .input-calculadora {
        width: 100%;
        margin-bottom: 20px;
        padding-top: 20px;
		border: none;
		border-bottom: 1px solid #000;
		outline: none;
        box-sizing: border-box;
        font-size: 15;
    }
	
	.input-calculadora:focus {
        border-bottom-color: #4CAF50;
    }
		
	.input-calculadora:first-child {
        margin-right: 4%;
    }

    .menu-suspenso {
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .select {
        border: none;
        border-bottom: 1px solid #000;
        padding: 8px;
        font-size: 15;
        font-weight: bold;
    }

    .select:focus {
        border-bottom-color: #4CAF50;
    }

    .calcular {
        width: 100%; 
        padding: 10px;
        margin-bottom: 30px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        font-size: 20;
        font-weight: bold;
    }

    .resultado {
        padding-bottom: 20px;
    }

	</style>

	<div class="calculadora">
        <h1 class="titulo">Calculadora de Tráfego</h1>
		<form class="form-calculadora" method="POST">
			<input class="input-calculadora" type="number" name="investimento" placeholder="Valor que deseja investir...">
			<input class="input-calculadora" type="number" name="retorno" placeholder="Retorno esperado em R$...">
            <input class="input-calculadora" type="number" name="ticket" placeholder="Ticket médio do produto...">
            <div class="menu-suspenso">
                <label for="nicho">Selecione seu nicho:</label>
                <select class="select" name="nicho" id="id_nicho">
                    <option value="comercio">E-commerce & Varejo</option>
                    <option value="tecnologia">Tecnologia & Eletrônicos</option>
                    <option value="educacao">Educação & Cursos Online</option>
                    <option value="saude">Saúde & Bem-estar</option>
                    <option value="imobiliario">Imobiliário</option>
                    <option value="financas">Finanças & Investimentos</option>
                    <option value="turismo">Turismo & Viagens</option>
                    <option value="automoveis">Automóveis</option>
                    <option value="jogos">Jogos & Entretenimento</option>
                    <option value="moda">Moda & Beleza</option>
                </select>
            </div>
			<input class="calcular" type="submit" name="calcular" value="Calcular">
		</form>
		<div class="resultado">
            <?php echo resultado(); ?>
		</div>
	</div>
</body>
<?php

function calcularCuspes($salario) {
    if ($salario <= 1903.98) {
        return ["faixa" => "Isento", "cuspes" => 0];
    } elseif ($salario <= 2826.65) {
        return ["faixa" => "7.5%", "cuspes" => 1];
    } elseif ($salario <= 3751.05) {
        return ["faixa" => "15%", "cuspes" => 2];
    } elseif ($salario <= 4664.68) {
        return ["faixa" => "22.5%", "cuspes" => 3];
    } else {
        return ["faixa" => "27.5%", "cuspes" => 4];
    }
}

function barraDeCuspes($qtd) {
    return str_repeat("💦", $qtd);
}

$resultado = null;

if (isset($_POST['salario'])) {
    $salario = floatval($_POST['salario']);
    $resultado = calcularCuspes($salario);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Cuspes do Dalai Lhama versão Meta AI 2025</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <div class="lhama-box">
        <img src="dalailhama.png" alt="Dalai Lhama - Meta AI: aquela que cospe 4 vezes" class="lhama-image">
        <div class="lhama-caption">
            “Eu cuspo porque sim.” — LHAMA, Dalai. Meta AI, 2025
        </div>
    </div>

    <h1>💦 Simulador de Cuspes por Faixa de Imposto 💦</h1>
    <p style="text-align:center">Tecnologia Tributária Lhamística 2025™</p>
    
    <div class="text-area">
        <p>Bem-vindo ao Simulador de Cuspes do Dalai Lhama! Aqui você pode descobrir a intensidade da cuspida do Dalai Lhama com base na sua faixa de imposto de renda. Quanto maior o imposto, mais forte é a cuspida!</p>
        <p>Insira seu salário mensal para ver quantas cuspidas você receberá de acordo com a tabela progressiva do imposto de renda.</p>
    </div>
    
    <div style="text-align: center;">
        <a href="https://chatgpt.com/share/692c5a79-e308-800f-b1f9-004266e4b013" target="_blank" class="external-link">💦 Simulador de Cuspes por Faixa de Imposto (SCFI) 💦</a>
    </div>

    <form method="post">
        <label>Informe seu salário:</label>
        <input type="number" name="salario" step="0.01" placeholder="Ex.: 4500.00" required>
        <button type="submit">Calcular Cuspida</button>
    </form>

    <?php if ($resultado): ?>
    <div class="resultado">
        <strong>Faixa de IR:</strong> <?= $resultado['faixa'] ?><br>
        <strong>Intensidade da Cuspida:</strong>
        <div class="cuspes"><?= barraDeCuspes($resultado['cuspes']) ?></div>

        <p style="text-align:center; font-size:14px; margin-top:10px;">
            "Quanto maior o imposto, mais forte é a cospida." – Dalai Lhama, 2025.
        </p>
    </div>
    <?php endif; ?>

</div>

<footer>
    <div class="footer-links">
    <p>&copy; 2025 Simulador de Cuspes do Dalai Lhama - Tecnologia Tributária Lhamística™</p>
    <p>Desenvolvido com muito cuspe e dedicação por <a href="https://github.com/Alekafka999?tab=repositories" target="_blank">1 humana</a> e 3 IAs:</p>
        <a href="https://chatgpt.com" target="_blank">ChatGPT</a> |
        <a href="https://www.meta.ai" target="_blank">Meta AI</a> |
        <a href="https://aws.amazon.com/q/" target="_blank">Amazon Q</a>
    </div>
</footer>

</body>
</html>


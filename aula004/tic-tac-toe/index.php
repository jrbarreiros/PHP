<?php
require_once "./templates/header.php";
?>

<form method="post" action="register-players.php">
    <div class="welcome">
        <h1>Tic Tac Toe!</h1>
        <h2>Por favor, informe o nome dos jogadores</h2>

        <div class="player-name">
            <label for="player-x">Primeiro Jogador (X)</label>
            <input type="text" id="player-x" name="player-x" required placeholder="Jogador 1"/>
        </div>

        <div class="player-name">
            <label for="player-o">Segundo Jogador (O)</label>
            <input type="text" id="player-o" name="player-o" required placeholder="Jogador 2"/>
        </div>

        <button type="submit">Começar</button>
    </div>
</form>

<?php
require_once "./templates/footer.php";

<?php
require_once "templates/header.php";

if (!playersRegistered()) {
    header("location: index.php");
}
$player = $_GET['player'];
$op = $_GET['op'];
if($op == 'res') {
    if($_SESSION['PLAYER_PLAYSX'] > 0 || $_SESSION['PLAYER_PLAYSO'] > 0) {
        abandonedPlay($player);
    }
    resetBoard();
}

if ($_POST['cell']) {
    $win = play($_POST['cell']);
}

if (playsCount() >= 9) {
    totaltimesTies();
    echo "<h2>It's a tie!</h2>";
} elseif ($win) {
    echo '<h2>' . currentPlayer() . ' VENCEU!</h2> ';
} else {
    echo '<h2>' . currentPlayer() . " está jogando.</h2>";
}
?>


<div class="playarea">
    <form class="playform" method="post" action="play.php">
        <div class="game">
        <table class="tic-tac-toe" cellpadding="0" cellspacing="0">
            <tbody>
    
            <?php
            $lastRow = 0;
for ($i = 1; $i <= 9; $i++) {
    $row = ceil($i / 3);

    if ($row !== $lastRow) {
        $lastRow = $row;

        if ($i > 1) {
            echo "</tr>";
        }

        echo "<tr class='row-{$row}'>";
    }

    $additionalClass = '';

    if ($i == 2 || $i == 8) {
        $additionalClass = 'vertical-border';
    } elseif ($i == 4 || $i == 6) {
        $additionalClass = 'horizontal-border';
    } elseif ($i == 5) {
        $additionalClass = 'center-border';
    }
    ?>
    
                <td class="cell-<?= $i ?> <?= $additionalClass ?>">
                    <?php if (getCell($i) === 'x'): ?>
                        <strong>X</strong>
                    <?php elseif (getCell($i) === 'o'): ?>
                        <strong>O</strong>
                    <?php else: ?>
                        <input type="radio" name="cell" value="<?= $i ?>" onclick="enableButton()"/>
                    <?php endif; ?>
                </td>
    
            <?php } ?>
    
            </tr>
            </tbody>
        </table>
    
    </div>
    <button type="submit" disabled id="play-btn">Play</button>
    </form>
    <div class="playtimes">
        <strong>Resumo do Jogo</strong>
        <div class="players">
            <?php echo 'Total de Partidas :: <strong>' . $_SESSION['PLAYER_PLAYSX_ABANDONED'] + $_SESSION['PLAYER_PLAYSO_ABANDONED'] + $_SESSION['TOTAL_TIES'] +
                                                        $_SESSION['PLAYER_X_WINS'] + $_SESSION['PLAYER_O_WINS'] . '</strong>'; ?>
            <br>
            <?php echo 'Empates :: <strong>' . $_SESSION['TOTAL_TIES'] . '</strong>';?>
            <br>
            <?php echo 'Abandonos :: <strong>' . $_SESSION['PLAYER_PLAYSX_ABANDONED'] + $_SESSION['PLAYER_PLAYSO_ABANDONED'] . '</strong>';?>
            <br>
            <?php echo 'Jogadas desde o início :: <strong>' . $_SESSION['PLAYERS_PLAYS_TOTAL'] . '</strong>'; ?>
        </div>
        <br>
        <hr>
        <div class="players">
            <?php echo 'Jogador <strong>' . playerName($player = 'x') . '</strong>' . ' :: ' ;?>
            <br>
            <?php echo 'Ganhou <strong>' . $_SESSION['PLAYER_' . strtoupper('x') . '_WINS'] . '</strong>' . ' partida(s).';?>
            <br>
            <?php echo 'Abandonou <strong>' . $_SESSION['PLAYER_PLAYS' . strtoupper('x') . '_ABANDONED'] . '</strong>' . ' partida(s).';?>
            <br>
            <?php echo 'Jogou desde o início <strong>' . $_SESSION['TOTAL_PLAYER_PLAYS' . strtoupper($player)] . '</strong>' . ' vezes.';?>
            <br>
            <?php echo 'Nesta partida jogou <strong>' . $_SESSION['PLAYER_PLAYS' . strtoupper($player)] . '</strong>' . ' vezes.';?>
            <br><br>
        </div>
        <br>
        <div class="players">
            <?php echo 'Jogador <strong>' . playerName($player = 'o') . '</strong>' . ' :: ' ;?>
            <br>
            <?php echo 'Ganhou <strong>' . $_SESSION['PLAYER_' . strtoupper('o') . '_WINS'] . '</strong>' . ' partida(s).';?>
            <br>
            <?php echo 'Abandonou <strong>' . $_SESSION['PLAYER_PLAYS' . strtoupper('o') . '_ABANDONED'] . '</strong>' . ' partida(s).';?>
            <br>
            <?php echo 'Jogou desde o início <strong>' . $_SESSION['TOTAL_PLAYER_PLAYS' . strtoupper($player)] . '</strong>' . ' vezes.';?>
            <br>
            <?php echo 'Nesta partida jogou <strong>' . $_SESSION['PLAYER_PLAYS' . strtoupper($player)] . '</strong>' . ' vezes.';?>
        </div>
        <hr>
         <a href="play.php?op=res&player=<?php echo getTurn();?>" class="reset-btn">Reiniciar a partida</a> (abandonar partida)<br />
         <br>
        <a href="index.php" class="reset-btn">Novo o jogo</a>
    </div>
</div>

<script type="text/javascript">
    function enableButton() {
        document.getElementById('play-btn').disabled = false;
    }
</script>

<?php
require_once "templates/footer.php";

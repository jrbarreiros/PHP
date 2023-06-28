<?php
session_start();
require "templates/header.php";
require "autoload.php";

include 'config.php';

if (isset($_POST['newWord'])) {
    unset($_SESSION['answer']);
}
if (!isset($_SESSION['answer'])) {
    $_SESSION['attempts'] = 0;
    $answer = \classes\cl_WordArrayFetcher::fetchWordArray($WORDLISTFILE);
    $_SESSION['answer'] = $answer;
    $_SESSION['hidden'] = \classes\cl_HiddenCharacters::hideCharacters($answer);
    echo 'Tentativas restantes:  ' . ($MAX_ATTEMPTS - $_SESSION['attempts']) . '<br><br>';
} else {
    if (isset($_POST['userInput'])) {
        $userInput = $_POST['userInput'];
        $_SESSION['hidden'] = \classes\cl_WordChecker::checkAndReplace(strtolower($userInput), $_SESSION['hidden'], $_SESSION['answer']);
        \classes\cl_GameOverChecker::checkGameOver($MAX_ATTEMPTS, $_SESSION['attempts'], $_SESSION['answer'], $_SESSION['hidden']);
    }
    $_SESSION['attempts'] = $_SESSION['attempts'] + 1;
    echo 'Tentativas restantes:  ' . ($MAX_ATTEMPTS - $_SESSION['attempts']) . "<br><br>";
}
$hidden = $_SESSION['hidden'];
foreach ($hidden as $char) {
    echo $char . "  ";
}
?>
    <script type="application/javascript">
        function validateInput() {
        var x=document.forms["inputForm"]["userInput"].value;
        if (x=="" || x==" " || !isNaN(x)) {
            alert("Please enter a character.");
            return false;
        }
      
    }
    </script>
    <br>
    <form class="form" name="inputForm" action="" method = "post">
        <br><br>
        Seu palpite: <input name ="userInput"  size="1" maxlength="1" autofocus />
        <br><br>
        <input class="button" type="submit" value="Check" onclick="return validateInput()"/>
        <input class="button" type="submit" name="newWord" value = "Try another Word"/>
    </form>
    <?php
require_once "./templates/footer.php";
?>
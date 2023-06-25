<?php

require_once "functions.php";

registerPlayers($_POST['player-x'], $_POST['player-o']);

if (playersRegistered()) {
    resettotaltimesPlay();
    resetabandonedPlay();
    header("location: play.php?op=ini");
}

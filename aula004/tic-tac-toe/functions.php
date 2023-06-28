<?php

session_start();
error_reporting(E_ERROR | E_PARSE);

function registerPlayers($playerX = "", $playerO = "")
{
    $_SESSION['PLAYER_X_NAME'] = $playerX;
    $_SESSION['PLAYER_O_NAME'] = $playerO;
    setTurn('x');
    resetBoard();
    resetWins();
    resetPlaysCount();
}

function resetBoard()
{
    resetPlaysCount();

    for ($i = 1; $i <= 9; $i++) {
        unset($_SESSION['CELL_' . $i]);
    }
}

function resetWins()
{
    $_SESSION['PLAYER_X_WINS'] = 0;
    $_SESSION['PLAYER_O_WINS'] = 0;
    resettimesPlay();
}

function playsCount()
{
    return $_SESSION['PLAYS'] ? $_SESSION['PLAYS'] : 0;
}

function addPlaysCount()
{
    if (!$_SESSION['PLAYS']) {
        $_SESSION['PLAYS'] = 0;
    }

    $_SESSION['PLAYS']++;
}

function resetPlaysCount()
{
    resettimesPlay();
    $_SESSION['PLAYS'] = 0;
}

function playerName($player = 'x')
{
    return $_SESSION['PLAYER_' . strtoupper($player) . '_NAME'];
}

function playersRegistered()
{
    return $_SESSION['PLAYER_X_NAME'] && $_SESSION['PLAYER_O_NAME'];
}

function setTurn($turn = 'x')
{
    $_SESSION['TURN'] = $turn;
}

function getTurn()
{
    return $_SESSION['TURN'] ? $_SESSION['TURN'] : 'x';
}

function markWin($player = 'x')
{
    $_SESSION['PLAYER_' . strtoupper($player) . '_WINS']++;
}

function abandonedPlay($player)
{
    if (!$_SESSION['PLAYER_PLAYS' . strtoupper($player) . '_ABANDONED']) {
        $_SESSION['PLAYER_PLAYS' . strtoupper($player) . '_ABANDONED'] = 0;
    }

    $_SESSION['PLAYER_PLAYS' . strtoupper($player) . '_ABANDONED']++;
}
function resetabandonedPlay()
{
    $_SESSION['PLAYER_PLAYSX_ABANDONED'] = 0;
    $_SESSION['PLAYER_PLAYSO_ABANDONED'] = 0;
}
function timesPlay($player)
{
    if (!$_SESSION['PLAYER_PLAYS' . strtoupper($player)]) {
        $_SESSION['PLAYER_PLAYS' . strtoupper($player)] = 0;
    }

    $_SESSION['PLAYER_PLAYS' . strtoupper($player)]++;
    totaltimesPlay($player);
}
function resettimesPlay()
{
    $_SESSION['PLAYER_PLAYSX'] = 0;
    $_SESSION['PLAYER_PLAYSO'] = 0;
}
function totaltimesPlay($player)
{
    if (!$_SESSION['TOTAL_PLAYER_PLAYS' . strtoupper($player)]) {
        $_SESSION['TOTAL_PLAYER_PLAYS' . strtoupper($player)] = 0;
    }
    $_SESSION['TOTAL_PLAYER_PLAYS' . strtoupper($player)]++;
    $_SESSION['PLAYERS_PLAYS_TOTAL']++;
}
function totaltimesTies()
{
    if (!$_SESSION['TOTAL_TIES']) {
        $_SESSION['TOTAL_TIES'] = 0;
    }
    $_SESSION['TOTAL_TIES']++;
}
function resettotaltimesPlay()
{
    $_SESSION['TOTAL_TIES'] = 0;
    $_SESSION['PLAYERS_PLAYS_TOTAL'] = 0;
    $_SESSION['TOTAL_PLAYER_PLAYS' . strtoupper('x')] = 0;
    $_SESSION['TOTAL_PLAYER_PLAYS' . strtoupper('o')] = 0;
}

function switchTurn()
{
    timesPlay(getTurn());
    switch (getTurn()) {
        case 'x':
            setTurn('o');

            break;
        case 'o':
            setTurn('x');

            break;
        default:
            echo 'turn error - Please verify';

            break;
    }
}

function currentPlayer()
{
    return playerName(getTurn());
}

function play($cell = '')
{
    if (getCell($cell)) {
        return false;
    }

    $_SESSION['CELL_' . $cell] = getTurn();
    addPlaysCount();
    $win = playerPlayWin($cell);

    if (!$win) {
        switchTurn();
    } else {
        markWin(getTurn());
        timesPlay(getTurn());
        resetBoard();
    }

    return $win;
}

function getCell($cell = '')
{
    return $_SESSION['CELL_' . $cell];
}

function playerPlayWin($cell = 1)
{
    if (playsCount() < 3) {
        return false;
    }

    $column = $cell % 3;
    if (!$column) {
        $column = 3;
    }
    $row = ceil($cell / 3);

    $player = getTurn();


    return isVerticalWin($column, $player) || isHorizontalWin($row, $player) || isDiagonalWin($player);
}

function isVerticalWin($column = 1, $turn = 'x')
{
    return getCell($column) == $turn &&
        getCell($column + 3) == $turn &&
        getCell($column + 6) == $turn;
}

function isHorizontalWin($row = 1, $turn = 'x')
{
    if ($row == 2) {
        $row = 4;
    } elseif ($row == 3) {
        $row = 7;
    }

    return getCell($row) == $turn && getCell($row + 1) == $turn && getCell($row + 2) == $turn;
}

function isDiagonalWin($turn = 'x')
{
    $win = getCell(1) == $turn &&
        getCell(9) == $turn;

    if (!$win) {
        $win = getCell(3) == $turn &&
            getCell(7) == $turn;
    }

    return $win && getCell(5) == $turn;
}

function score($player = 'x')
{
    $score = $_SESSION['PLAYER_' . strtoupper($player) . '_WINS'];

    return $score ? $score : 0;
}

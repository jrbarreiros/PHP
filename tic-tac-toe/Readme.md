Curso de PHP - Fundamentos

Atividade :
Jogo TIC-TAC-TOE

/**
 * O TIC-TAC-TOE é o famoso Jogo da Velha
 * Na tela inicial pede os nomes dos 2 jogadores
 * O jogo sempre começa com o primeiro jogador e é mantido para a próxima partida caso ele ganhe, caso contrário, será a vez do segundo jogador iniciar
 * Ganha o jogo se tiver 3 acertos em uma linha horizontal, em uma coluna vertical ou em uma das diagonais
 * O jogo contabiliza as partidas com todos os totais do própriojogo e de cada jogador, como o exmplo abaixo:
 * 
  * * Resumo do Jogo
  * * Total de Partidas :: 3
  * * Empates :: 1
  * * Abandonos :: 1
  * * Jogadas desde o início :: 10
  * * ______________________________________
  * * Jogador xxx ::
  * * Ganhou 0 partida(s).
  * * Abandonou 0 partida(s).
  * * Jogou desde o início 4 vezes.
  * * Nesta partida jogou 2 vezes.
  * * ______________________________________
  * * Jogador yyy ::
  * * Ganhou 0 partida(s).
  * * Abandonou 1 partida(s).
  * * Jogou desde o início 6 vezes.
  * * Nesta partida jogou 3 vezes.
  * * ______________________________________
 * Quando solicita um novo jogo, clicando o botão, todos os valores são zerados e pede novamente para informar os nomes dos jogadores
 * Se um jogador, no meio do jogo, apertar o botão Reiniciar a partida, e considerado e contabilizado com abandono da partida e começa uma nova sem pedir os nomes
 * Se não aconteceu nenhuma jogada ainda e o botão Reiniciar a Partida for clicado, não é considerado abandono de nenhum jogador
 * Caso nenhum jogador consiga vencer a partida, é contabilizado como empate
 */

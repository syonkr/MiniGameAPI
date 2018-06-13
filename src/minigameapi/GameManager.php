<?php

namespace minigameapi;

class GameManager {
  private $games = [];
  private $miniGameApi;
  public function __construct(MiniGameApi $miniGameApi) {
    $this->miniGameApi = $miniGameApi;
  }
  public function broadcastMessageToGames(string $message){
    foreach($this->getGames() as $game) {
      $game->broadcastMessage($message);
    }
  }
  public function submitGame(Game $game) {
    if(!is_null($this->getGame($game->getName()))) return;
    $this->games[] = $game;
  }
  public function getGames() : array{
    return $this->games()
  }
  public function getGame(string $gameName) : ?Game{
    foreach($this->getGames() as $game) {
      if($game->getName() == $gameName) return $game;
    }
  }
  public function getTeams() : array {
    $result = [];
    foreach($this->getGames() as $game) {
      $result = array_merge($result,$game->getTeams();
    }
    return $result;
  }
  public function removePlayer(Player $player){
    foreach($this->getGames() as $game) {
      $game->removePlayer($player);
    }
  }
}

<?php

namespace JC\Commands;

use Jc\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class Food extends Command implements PluginIdentifiableCommand {

    private $plugin;

    public function __construct(Main $main) {
        parent::__construct("food", "Food a player");
        $this->setPermission("food.cmd");
        $this->plugin = $main;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if($sender instanceof Player){
            if (isset($args[0])) {
                $player = $this->plugin->getServer()->getPlayer($args[0]);
                $player->setFood(20);
                $player->sendMessage($this->plugin->getConfig()->get("FoodMessage"));
                return true;
            } else {
                $sender->setFood(20);
                $sender->sendMessage($this->plugin->getConfig()->get("FoodMessage"));
                return true;
            }
        } else {
            $sender->sendMessage("§cPuoi eseguire questo comando solo in-game!");
            return false;
        }
    }

    public function getPlugin(): Plugin {
        return $this->plugin;
    }
}
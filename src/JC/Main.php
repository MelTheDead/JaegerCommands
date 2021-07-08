<?php

namespace JC;

use JC\Commands\Heal;
use JC\Commands\Food;
use JC\Commands\Survival;
use JC\Commands\Creative;
use JC\Commands\Spectator;
use JC\Commands\Day;
use JC\Commands\Night;
#Use Commands
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

    public function onEnable(){
        $this->getServer()->getCommandMap()->register("Heal", new Heal($this));
        $this->getServer()->getCommandMap()->register("Food", new Food($this));
        $this->getServer()->getCommandMap()->register("Survival", new Survival($this));
        $this->getServer()->getCommandMap()->register("Creative", new Creative($this));
        $this->getServer()->getCommandMap()->register("Spectator", new Spectator($this));
        $this->getServer()->getCommandMap()->register("Night", new Night($this));
        $this->getServer()->getCommandMap()->register("Day", new Day($this));
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Enable");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if ($sender instanceof Player){
            $sender->sendMessage("§l§c-JaegerComands-\n§4Use: /heal\n§4Use: /food\n§4Use: /day\n§4Use: /night\nUse: /gm1\n§4Use: /gm0\n§4Use: /gm3\n§l§c-JaegerComands-");
        }
        return true;
    }
}
<?php

namespace CommandPack;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Commands extends PluginBase implements Listener{
        public function onEnable(): void {
                $this->getServer()->getPluginManager()->registerEvents($this, $this);
        }

        public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {


                switch($cmd->getName()) {
                case "feed":
                    if($sender instanceof Player){
                        if($sender->hasPermission)("use.feed")){    
                        $sender->setFood(20);
                        $sender->sendMessage("You are no longer hungry!");                        }    
                    }
                return true;
                break;
                
                case "nick":
                    if($sender instanceof Player){
                        if($sender->hasPermission("use.nick")){
                        $sender->setNameTag($args[0]);
                        $sender->sendMessage("Nick has been set succesfully");
                        }"
                    }
                return true;
                break;
                            
                case "heal":
                    if($sender instanceof Player){
                        if($sender-hasPermission("use.heal")){
                        $sender->setHealth(20);
                        $sender->sendMessage("You have been healed!");
                        }
                    }
                return true;
                break;

                case "cure":
                    if($sender instanceof Player){
                        if($sender->hasPermission("use.cure")){
                        $sender->setHealth(20);
                        $sender->setFood(20);
                        $sender->sendMessage("You have been cured!");
                        }
                    }        
                return true;
                break;
                
                case "clearinv":
                    if($sender instanceof Player){
                        if($sender->hasPermission("use.clearinv")){
                        $sender->getInventory()->clearAll();
                        $sender->getArmorInventory()->clearAll();
                        $sender->sendMessage("Inventory Has been cleared Succesfully");
                        }    
                    }
                return true;
                break;
                
                case "fly":
                    if($sender instanceof Player){
                        if($sender->hasPermission("use.fly")){
                        if($sender->getAllowFlight()){
                            $sender->setAllowFlight(true);
                        } else {
                            $sender->setAllowFlight(false);
                        }
                    }
                return true;
                break;
            }
        }
}

<?php

namespace Cmd;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener {

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getLogger()->alert("Plugin SimpleNick ON");

    }

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) : bool{
        switch($cmd->getName()){
            case "nick":
            if($args[0] === null){
                $sender->sendMessage("§4You must send a nickname");
            } else {
            if($sender->hasPermission("nick.use")){
            
                $sender->setDisplayName($args[0]);
                $sender->setNameTag($args[0]);
                $sender->sendMessage("§aYour nickname changed to". $args[0] . ".");
        }else {
            $sender->sendMessage("§4You dont have a permission to change your nickname");
        }
    }
            break;
        } 
return true;
    }


}
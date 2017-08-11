<?php

namespace LuckyKitDP;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\block\SignChangeEvent;
use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\inventory\BaseInventory;
use pocketmine\tile\Sign;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Server;

class Main extends PluginBase implements Listener{

    public $prefix = "§l§6[§bLucky§cKit§d-§eDP§6]";

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("$this->prefix §bis §6Enable.");
        $this->saveDefaultConfig();
        $this->reloadConfig();
    }

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args)
    {
        if($cmd->getName() == 'lk'){
            switch(mt_rand(1,3)){
                case 1:
                    $sender->sendMessage("$this->prefix §l§bWoW §6Nice §cKit");
                    $sender->getInventory()->clearAll();
                    $sender->getInventory()->setHelmet(item::get($this->getConfig()->get("helmet1"), 0, 1));
                    $sender->getInventory()->setChestplate(item::get($this->getConfig()->get("Chestplate1"), 0, 1));
                    $sender->getInventory()->setLeggings(item::get($this->getConfig()->get("Leggings1"), 0, 1));
                    $sender->getInventory()->setBoots(item::get($this->getConfig()->get("Boots1"), 0, 1));
                    $sender->getInventory()->additem(item::get($this->getConfig()->get("sword1"), 0, 1));
                    $sender->getInventory()->additem(item::get($this->getConfig()->get("food1"), 0, 64));
                    break;
                case 2:
                    $sender->sendMessage("$this->prefix §6Ok §l§eNot Bad");
                    $sender->getInventory()->clearAll();
                    $sender->getInventory()->setHelmet(item::get($this->getConfig()->get("helmet2"), 0, 1));
                    $sender->getInventory()->setChestplate(item::get($this->getConfig()->get("Chestplate2"), 0, 1));
                    $sender->getInventory()->setLeggings(item::get($this->getConfig()->get("Leggings2"), 0, 1));
                    $sender->getInventory()->setBoots(item::get($this->getConfig()->get("Boots2"), 0, 1));
                    $sender->getInventory()->additem(item::get($this->getConfig()->get("sword2"), 0, 1));
                    $sender->getInventory()->additem(item::get($this->getConfig()->get("food2"), 0, 64));
                    break;
                case 3:
                    $sender->sendMessage("$this->prefix §l§cBad §bKit");
                    $sender->getInventory()->clearAll();
                    $sender->getInventory()->setHelmet(item::get($this->getConfig()->get("helmet3"), 0, 1));
                    $sender->getInventory()->setChestplate(item::get($this->getConfig()->get("Chestplate3"), 0, 1));
                    $sender->getInventory()->setLeggings(item::get($this->getConfig()->get("Leggings3"), 0, 1));
                    $sender->getInventory()->setBoots(item::get($this->getConfig()->get("Boots3"), 0, 1));
                    $sender->getInventory()->additem(item::get($this->getConfig()->get("sword3"), 0, 1));
                    $sender->getInventory()->additem(item::get($this->getConfig()->get("food3"), 0, 64));
            }
        }
    }

    public function onChange(SignChangeEvent $event)
    {
        $player = $event->getPlayer();

        if($player->isOp()) {
            if ($event->getLine(0) === "lk") {
                $event->setLine(0, $this->getConfig()->get("line1"));
                $event->setLine(1, $this->getConfig()->get("line2"));
                $event->setLine(2, $this->getConfig()->get("line3"));
                $event->setLine(3, $this->getConfig()->get("line4"));
            }
        }
    }

    public function onClick(PlayerInteractEvent $event)
    {
        $sign = $event->getBlock()->getLevel()->getTile($event->getBlock());
        $player = $event->getPlayer();

        if($sign instanceof Sign){
            $text = $sign->getText();

            if ($text[0] === $this->getConfig()->get("line1")) {
                switch(mt_rand(1,3)){
                    case 1:
                        $player->sendMessage("$this->prefix §l§bWoW §6Nice §cKit");
                        $player->getInventory()->clearAll();
                        $player->getInventory()->setHelmet(item::get($this->getConfig()->get("helmet1"), 0, 1));
                        $player->getInventory()->setChestplate(item::get($this->getConfig()->get("Chestplate1"), 0, 1));
                        $player->getInventory()->setLeggings(item::get($this->getConfig()->get("Leggings1"), 0, 1));
                        $player->getInventory()->setBoots(item::get($this->getConfig()->get("Boots1"), 0, 1));
                        $player->getInventory()->additem(item::get($this->getConfig()->get("sword1"), 0, 1));
                        $player->getInventory()->additem(item::get($this->getConfig()->get("food1"), 0, 64));
                        break;
                    case 2:
                        $player->sendMessage("$this->prefix §6Ok §l§eNot Bad");
                        $player->getInventory()->clearAll();
                        $player->getInventory()->setHelmet(item::get($this->getConfig()->get("helmet2"), 0, 1));
                        $player->getInventory()->setChestplate(item::get($this->getConfig()->get("Chestplate2"), 0, 1));
                        $player->getInventory()->setLeggings(item::get($this->getConfig()->get("Leggings2"), 0, 1));
                        $player->getInventory()->setBoots(item::get($this->getConfig()->get("Boots2"), 0, 1));
                        $player->getInventory()->additem(item::get($this->getConfig()->get("sword2"), 0, 1));
                        $player->getInventory()->additem(item::get($this->getConfig()->get("food2"), 0, 64));
                        break;
                    case 3:
                        $player->sendMessage("$this->prefix §l§cBad §bKit");
                        $player->getInventory()->clearAll();
                        $player->getInventory()->setHelmet(item::get($this->getConfig()->get("helmet3"), 0, 1));
                        $player->getInventory()->setChestplate(item::get($this->getConfig()->get("Chestplate3"), 0, 1));
                        $player->getInventory()->setLeggings(item::get($this->getConfig()->get("Leggings3"), 0, 1));
                        $player->getInventory()->setBoots(item::get($this->getConfig()->get("Boots3"), 0, 1));
                        $player->getInventory()->additem(item::get($this->getConfig()->get("sword3"), 0, 1));
                        $player->getInventory()->additem(item::get($this->getConfig()->get("food3"), 0, 64));
                }
            }
        }
    }
}

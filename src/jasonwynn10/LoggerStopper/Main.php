<?php
declare(strict_types=1);
namespace jasonwynn10\LoggerStopper;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {
	public function onLoad() {
		$this->getServer()->getLogger()->shutdown();
		$this->getServer()->getLogger()->join();
		unlink($this->getServer()->getDataPath()."server.log");
	}
}
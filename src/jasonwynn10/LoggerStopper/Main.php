<?php
declare(strict_types=1);
namespace jasonwynn10\LoggerStopper;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {
	public function onLoad() {
		$this->getServer()->getLogger()->shutdown();
		//$this->getServer()->getLogger()->join();
		unlink($this->getServer()->getDataPath()."server.log");
	}
	public function onDisable() {
		touch($this->getServer()->getDataPath()."server.log");
		$instance = $this->getServer()->getLogger();
		$ref = new \ReflectionClass($instance);
		$prop = $ref->getProperty('shutdown');
		$prop->setAccessible(true);
		$prop->setValue($instance, false);
		$instance->notify();
	}
}
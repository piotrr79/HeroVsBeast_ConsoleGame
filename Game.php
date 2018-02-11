<?php
namespace Game;

// include classes for php-cli 
include('Skills.php');
include('ChooseAttacker.php');
include('Skirmish.php');

use Skills;
use ChooseAttacker;
use Skirmish;

/*
 * Main game code - simulation of a battle between Hero and a wild Beast according to the game rules
 */
 
class Game extends Skills\Skills {

	
	public function battle($skills) {
		// get skills
		$creatureSkills = $this->getSkills($skills);
		// choose attacker
		$creaturesSetUp = new ChooseAttacker\ChooseAttacker($creatureSkills);
		$creatures = $creaturesSetUp->chooseAttacker($creatureSkills);
		// run duel
		$duel = new Skirmish\Skirmish($creatures);
		$result = $duel->calculateFight($creatures);
		
		return $result;
    }

}

// set skills
$skills = ['heroHealth' => ['startRange' => '70', 'endRange' =>'100'], 'heroStrength' => ['startRange' => '70', 'endRange' =>'80'], 
		   'heroDefence' => ['startRange' => '45', 'endRange' =>'55'], 'heroSpeed' => ['startRange' => '40', 'endRange' =>'50'], 
		   'heroLuck' => ['startRange' => '10', 'endRange' =>'30'],
		   'heroRapidStrike' => ['startRange' => '10', 'endRange' =>'10'], 
		   'heroMagickShield' => ['startRange' => '20', 'endRange' =>'20'],
		   'beastHealth' => ['startRange' => '60', 'endRange' =>'90'], 'beastStrength' => ['startRange' => '60', 'endRange' =>'90'], 
		   'beastDefence' => ['startRange' => '40', 'endRange' =>'60'], 'beastSpeed' => ['startRange' => '40', 'endRange' =>'60'], 
		   'beastLuck' => ['startRange' => '25', 'endRange' =>'40'],
		   'beastRapidStrike' => ['startRange' => '0', 'endRange' =>'0'], 
		   'beastMagickShield' => ['startRange' => '0', 'endRange' =>'0']
			   ];
			   
$obj = new Game($skills);
echo $obj->battle($skills);


<?php
namespace ChooseAttacker;

/*
 * Choose who will attack. The first attack is done by the player with the higher speed. If both players have the same speed, 
 * than the attack is carried on by the player with the highest luck. After an attack, the players switch roles.
 */
 
class ChooseAttacker {
	
	public function chooseAttacker($creatureSkills = null) {	
		// hero
		$hero = 'Hero';
		$valueHeroHealth = $creatureSkills[0]['heroHealth'];
		$valueHeroStrength = $creatureSkills[1]['heroStrength'];
		$valueHeroDefence = $creatureSkills[2]['heroDefence'];
		$valueHeroSpeed = $creatureSkills[3]['heroSpeed'];
		$valueHeroLuck = $creatureSkills[4]['heroLuck'];
		$valueHeroRapidStrike = $creatureSkills[5]['heroRapidStrike'];
		$valueHeroMagickSheild = $creatureSkills[6]['heroMagickShield'];
		// beast
		$beast = 'Beast';
		$valueBeastHealth = $creatureSkills[7]['beastHealth'];
		$valueBeastStrength = $creatureSkills[8]['beastStrength'];
		$valueBeastDefence = $creatureSkills[9]['beastDefence'];
		$valueBeastSpeed = $creatureSkills[10]['beastSpeed'];
		$valueBeastLuck = $creatureSkills[11]['beastLuck'];
		$valueBeastRapidStrike = $creatureSkills[12]['beastRapidStrike'];
		$valueBeastMagickSheild = $creatureSkills[13]['beastMagickShield'];
		
		// pick up attacker
		if ($valueHeroSpeed > $valueBeastSpeed) {
			// attacker
			$attacker = $hero;
			$attackerStrenght = $valueHeroStrength;
			$attackerHealth = $valueHeroHealth;
			$attackerDefence = $valueHeroDefence;
			$attackerLuck = $valueHeroLuck;
			$attackerRapidStrike = $valueHeroRapidStrike;
			$attackerMagickSheild = $valueHeroMagickSheild;
			// defender
			$defender = $beast;
			$defenderStrenght = $valueBeastStrength;
			$defenderHealth = $valueBeastHealth;
			$defenderDefence = $valueBeastDefence;
			$defenderLuck = $valueBeastLuck;
			$defenderRapidStrike = $valueBeastRapidStrike;
			$defenderMagickSheild = $valueBeastMagickSheild;
		} elseif ($valueHeroSpeed < $valueBeastSpeed) {
			// attacker
			$attacker = $beast;
			$attackerStrenght = $valueBeastStrength;
			$attackerHealth = $valueBeastHealth;
			$attackerDefence = $valueBeastDefence;
			$attackerLuck = $valueBeastLuck;
			$attackerRapidStrike = $valueBeastRapidStrike;
			$attackerMagickSheild = $valueBeastMagickSheild;
			// defender
			$defender = $hero;
			$defenderStrenght = $valueHeroStrength;
			$defenderHealth = $valueHeroHealth;
			$defenderDefence = $valueHeroDefence;
			$defenderLuck = $valueHeroLuck;			
			$defenderRapidStrike = $valueHeroRapidStrike;
			$defenderMagickSheild = $valueHeroMagickSheild;
		} elseif ($valueHeroLuck > $valueBeastLuck) {
			// attacker
			$attacker = $hero;
			$attackerStrenght = $valueHeroStrength;
			$attackerHealth = $valueHeroHealth;
			$attackerDefence = $valueHeroDefence;
			$attackerLuck = $valueHeroLuck;
			$attackerRapidStrike = $valueHeroRapidStrike;
			$attackerMagickSheild = $valueHeroMagickSheild;
			// defender
			$defender = $beast;
			$defenderStrenght = $valueBeastStrength;
			$defenderHealth = $valueBeastHealth;
			$defenderDefence = $valueBeastDefence;
			$defenderLuck = $valueBeastLuck;
			$defenderRapidStrike = $valueBeastRapidStrike;
			$defenderMagickSheild = $valueBeastMagickSheild;
		} elseif ($valueHeroLuck < $valueBeastLuck) {
			// attacker
			$attacker = $beast;
			$attackerStrenght = $valueBeastStrength;
			$attackerHealth = $valueBeastHealth;
			$attackerDefence = $valueBeastDefence;
			$attackerLuck = $valueBeastLuck;
			$attackerRapidStrike = $valueBeastRapidStrike;
			$attackerMagickSheild = $valueBeastMagickSheild;
			// defender
			$defender = $hero;
			$defenderStrenght = $valueHeroStrength;
			$defenderHealth = $valueHeroHealth;
			$defenderDefence = $valueHeroDefence;
			$defenderLuck = $valueHeroLuck;	
			$defenderRapidStrike = $valueHeroRapidStrike;
			$defenderMagickSheild = $valueHeroMagickSheild;
		}
			
		
		$creatures = ['attacker' => $attacker, 'attackerStrenght' => $attackerStrenght, 'attackerHealth' => $attackerHealth,
					  'attackerDefence' => $attackerDefence, 'attackerLuck' => $attackerLuck,
					  'attackerRapidStrike' => $attackerRapidStrike, 'attackerMagickSheild' => $attackerMagickSheild,
					  'defender' => $defender, 'defenderStrenght' => $defenderStrenght, 'defenderHealth' => $defenderHealth,
					  'defenderDefence' => $defenderDefence, 'defenderLuck' => $defenderLuck,
					  'defenderRapidStrike' => $defenderRapidStrike, 'defenderMagickSheild' => $defenderMagickSheild
					 ];
		
		return $creatures;
		
	}
	
}	

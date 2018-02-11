<?php
namespace Skirmish;

/*
 * Calculate duel result. The first attack is done by the player with the higher speed. If both players have the same speed, 
 * than the attack is carried on by the player with the highest luck. After an attack, the players switch roles.
 * 
 * Every creature has skills: health, strength, defence, speed, luck. Hero has got also extra skills: 
 * rapid strike (strike twice while it’s his turn to attack) and magick shield 
 * (takes only half of the usual damage when an enemy attacks).
 * Both extra skills has some probability (%) to appear in every turn - defined in skills array.
 * 
 * The damage done by the attacker is calculated with the following formula: damage = Attacker strength – Defender defence,
 * The damage is subtracted from the defender’s health. An attacker can miss their hit and do no 
 * damage if the defender gets lucky that turn.
 * The game ends when one of the players remain without health or the number of turns reaches 20
 */
 
class Skirmish {
	
	public function calculateFight($creatures = null) {	
		
		$attacker = $creatures['attacker'];
		$defender = $creatures['defender'];
		$attackerHealth = $creatures['attackerHealth'];
		$defenderHealth = $creatures['defenderHealth'];
		$attackerStrenght = $creatures['attackerStrenght'];
		$defenderStrenght = $creatures['defenderStrenght'];
		$defenderDefence = $creatures['attackerDefence'];
		$attackerDefence = $creatures['defenderDefence'];
		$attackerLuck = $creatures['attackerLuck'];
		$defenderLuck = $creatures['defenderLuck'];

		$attackerRapidStrike = $creatures['attackerRapidStrike'];
		$defenderRapidStrike = $creatures['defenderRapidStrike'];
		$attackerMagickSheild = $creatures['attackerMagickSheild'];
		$defenderMagickSheild = $creatures['defenderMagickSheild'];
		
		$message = '';
		$turns = range (1, 20);		
		$i = 1;
		$message .= $attacker. ' met '.$defender. ' in the forest'. PHP_EOL;
		$message .=  $attacker. ' health was '.$attackerHealth. ', '.$defender. ' health was '.$defenderHealth.PHP_EOL;
		foreach ($turns as $turn) {		
			if ($defenderHealth > 0 AND $attackerHealth > 0) {
				$message .=  'In '. $i;
				if ($i == 1) {
					$message .=  'st';
				} elseif ($i == 2) {
					$message .=  'nd';
				} elseif ($i == 3) {
					$message .=  'rd';
				} else {
					$message .=  'th';
				}
				$message .=  ' turn ';
				// turn when attacker attacks
				if($i%2 == 0) {
					$damage = $attackerStrenght - $defenderDefence;		
					// if defender has luck - no damage taken			
					if(rand(0,100) <= $defenderLuck) {
						$defenderHealth = $defenderHealth;
						$message .=  $attacker. ' unsuccessfuly attacked '.$defender. ' who got no damage'. PHP_EOL;
					// if defender has no luck
					} else {
						// if rapid strike appeard (and attacker is hero) - attack twice
						if(rand(0,100) <= $attackerRapidStrike) {
							$defenderHealth = $defenderHealth - $damage;
							$message .=  $attacker. ' attacked '.$defender. ' who got '. $damage. ' damage'. PHP_EOL;
							$defenderHealth = $defenderHealth - $damage;
							$message .=  $attacker. ' attacked again '.$defender. ' with Rapid Strike bonus '.$defender. ' got '. $damage. ' damage'. PHP_EOL;
						// if magic shield appeared (and attacker is beast) - take only half of damage
						} elseif(rand(0,100) <= $defenderMagickSheild) {
							$defenderHealth = $defenderHealth - $damage/2;
							$message .=  $attacker. ' attacked '.$defender. ' who got ony half of '. $damage. ' damage with Magick Shield bonus'. PHP_EOL;
						// if no rapid strike and np magic shield appeared - fight according to standard rules
						} else {
							$defenderHealth = $defenderHealth - $damage;
							$message .=  $attacker. ' attacked '.$defender. ' who got '. $damage. ' damage'. PHP_EOL;
						}
					}
					$message .=  'After turn '. $attacker. ' health is '.$attackerHealth. ', '.$defender. ' health is '.$defenderHealth.PHP_EOL;					
				// turn when players switched roles, now defender strikes back and defender defends himself
				} else {
					$damage = $defenderStrenght - $attackerDefence;
					// if attacker has luck - no damage taken	
					if(rand(0,100) <= $attackerLuck) {
						$attackerHealth = $attackerHealth;
						$message .=  $defender. ' unsuccessfuly attacked '.$attacker. ' who got no damage'. PHP_EOL;
					} else {
						// if rapid strike appeard (and defender is hero) - stikes back twice
						if(rand(0,100) <= $defenderRapidStrike) {
							$attackerHealth = $attackerHealth - $damage;
							$message .=  $defender. ' attacked '.$attacker. ' who got '. $damage. ' damage'. PHP_EOL;
							$attackerHealth = $attackerHealth - $damage;
							$message .=  $defender. ' attacked again '.$attacker. ' with Rapid Strike bonus '.$attacker. ' got '. $damage. ' damage'. PHP_EOL;
						// if magic shield appeared (and attacker is hero) - take only half of damage
						} elseif(rand(0,100) <= $attackerMagickSheild) {
							$attackerHealth = $attackerHealth - $damage/2;
							$message .=  $defender. ' attacked '.$attacker. ' who got ony half of '. $damage. ' damage with Magick Shield bonus'. PHP_EOL;
						// if no rapid strike and np magic shield appeared - fight according to standard rules
						}  else {
							$attackerHealth = $attackerHealth - $damage;
							$message .=  $defender. ' attacked '.$attacker. ' who got '. $damage. ' damage'. PHP_EOL;
						}
					}
					$message .=  'After turn '. $attacker. ' health is '.$attackerHealth. ', '.$defender. ' health is '.$defenderHealth.PHP_EOL;	
				}
			// attacker has still healht bigger than 0 - he won
			} elseif ($defenderHealth <= 0 AND $attackerHealth > 0) {			
				$message .=  $attacker. ' won the battle !!!'. PHP_EOL;
				break;
			// defender has still healht bigger than 0 - he won
			}  elseif ($defenderHealth > 0 AND $attackerHealth <= 0) {			
				$message .=  $defender. ' won the battle !!!'. PHP_EOL;
				break;
			// attacker and defender have still healht bigger than 0 - duel finished after 20 turns, the one with greater helth left won
			} else {
				$message .=  'battle finished after 20 turns, '.$attacker. ' has '.$attackerHealth. ' health, '.$defender. ' has '.$defenderHealth. ' health'. PHP_EOL;
				// print who won the battle defender or attacker - according to remaining helath level
				if ($attackerHealth > $defenderHealth) {
					$message .=  $attacker. ' won'. PHP_EOL;
				} elseif ($attackerHealth < $defenderHealth) {
					$message .=  $defender. ' won'. PHP_EOL;
				}
				break;
			}
		$i++;
		}
		
		return $message;
	}
	
}	

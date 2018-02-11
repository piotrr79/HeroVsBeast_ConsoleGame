<?php
namespace Skills;

/*
 * Create creatures skills. Every creature has skills: health, strength, defence, speed, luck. 
 * Hero has got also extra skills: rapid strike and magick shield
 */
 
class Skills {
	
	public $skills;
	
	public function setArray($skills) {        
        $gameSkills = [];
        foreach ($skills as $key => $value) {
			$gameSkills[] = [$key => range($value['startRange'], $value['endRange'])];
		}
		return $gameSkills;
    }
	
	public function getSkills($skills) {
		$skillsArray = $this->setArray($skills);
		$creatures = [];
		foreach ($skillsArray as $subArray) {
			$skillName = key($subArray);
			$skillValue = $subArray[$skillName];
			$subArrayKey = array_rand($skillValue);
			$subArrayValue = $skillValue[$subArrayKey];
			$creatures[] = [$skillName => $subArrayValue];		
		}
		return $creatures;
    }

}	


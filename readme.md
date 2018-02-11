# Simulation of a battle between Hero and a wild Beast - console game

# Istallation: 

1. Clone git repo and from console, form git folder run: php -f Game.php

# Game Rules:

1. Every creature has skills: health, strength, defence, speed, luck. The are defined as ranges.
2. Hero has got also extra skills: rapid strike (strike twice while it’s his turn to attack) 
and magick shield (takes only half of the usual damage when an enemy attacks)
3. On every battle, Hero and the Beast must be initialized with random properties, within their ranges.
4. Both extra skills has some probability (%) to appear in every turn.
5. The first attack is done by the player with the higher speed.
6. If both players have the same speed, than the attack is carried on by the player with the highest luck. 
7. After an attack, the players switch roles.
8. The damage done by the attacker is calculated with the following formula: damage = Attacker strength – Defender defence.
9. The damage is subtracted from the defender’s health.
10. An attacker can miss their hit and do no damage if the defender gets lucky that turn.
11. The game ends when one of the players remain without health or the number of turns reaches 20



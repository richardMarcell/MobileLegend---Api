<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->getHeroes() as $heroData)
        {
            $hero = Hero::create([
                'name' => $heroData['name'],
                'description' => $heroData['description'],
                'offensive' => $heroData['offensive'],
                'defensive' => $heroData['defensive'],
                'utility' => $heroData['utility'],
                'image' => $heroData['image'],
            ]);
            $hero->skills()->createMany(
                $heroData['skills']
            );
        }
    }

    private function getHeroes(): array
    {
        return [
            [
                'name' => 'Layla',
                'description' => 'As an adventurous child. Layla set off to explore the world after she received the Malefic Cannon from his father. Unexpectedly, Layla fell into the hands of Laboratory 1718. Her father gave himself to the lab as a hostage in order to save Layla. To make up for her mistake and save her father, Layla picked up the Malefic Gun and set out on a rescue mission.',
                'offensive' => 120,
                'defensive' => 50,
                'utility' => 200,
                'image' => 'https://liquipedia.net/mobilelegends/File:Layla_infobox.jpg',
                'skills' => [
                    [
                        'name' => 'Malefic Gun',
                        'description' => 'Layla deals increased damage to enemies farther away from her (from 100% to 140%, reaches the maximum at 6 units).',
                        'category' => 'Skill Passive',
                    ],
                    [
                        'name' => 'Malefic Bomb',
                        'description' => 'Layla fires a Malefic Energy Bomb in the target direction, dealing 200 (+80% Total Physical Attack) Physical Damage to the first enemy hit. This damage can critically strike.',
                        'category' => 'Skill 1',
                    ],
                    [
                        'name' => 'Void Projectile',
                        'description' => 'Layla fires an orb of Malefic Energy at the target enemy that explodes on hit, dealing 170 (+65% Total Physical Attack) Physical Damage to enemies in the area, slowing them by 30% for 1.2s, and marking them with a Malefic Mark',
                        'category' => 'Skill 2',
                    ],
                    [
                        'name' => 'Destruction Rush',
                        'description' => 'Layla fires a blast of Malefic Energy in the target direction, dealing 500 (+150% Total Physical Attack) Physical Damage to enemies in a line.',
                        'category' => 'Skill Ultimate',
                    ],
                ]
            ],
            [
                'name' => 'Tigreal',
                'description' => 'Tigreal is the rising star of the Moniyan Empire. But in a battle, the Second Army that he was leading went deep into the enemy territory alone under the orders of high-level officials and suffered heavy losses, for which Tigreal was eventually forced to take responsibility. Because of this, he left the Empire and came to the Northern Vale. During this period of time, Tigreal finally resolved the problems in his mind. Eventually, he returned to the Empire and became the leader of the Light\'s Order.',
                'offensive' => 100,
                'defensive' => 200,
                'utility' => 100,
                'image' => 'https://liquipedia.net/mobilelegends/File:Tigreal_infobox.jpg',
                'skills' => [
                    [
                        'name' => 'Fearless',
                        'description' => 'Tigreal gains a stack of blessing each time he casts a skill or is hit by a Basic Attack (excluding attacks from minions). At 4 stacks, Tigreal will consume all the stacks to negate the damage of the next Basic Attack he receives (excluding attacks from minions).',
                        'category' => 'Skill Passive',
                    ],
                    [
                        'name' => 'Attack Wave',
                        'description' => 'Tigreal sends a shockwave in the target direction, dealing 270(+70%Total Physical Attack) Physical Damage to enemies in a fan-shaped area and slowing them by up to 30% for 1.5s. The slow effect scales with the shockwave\'s travel distance.',
                        'category' => 'Skill 1',
                    ],
                    [
                        'name' => 'Sacred Hammer',
                        'description' => 'Tigreal charges in the target direction, dealing (+100%Total Physical Attack) Physical Damage to enemies in his path and sweeping them along with him.',
                        'category' => 'Skill 2',
                    ],
                    [
                        'name' => 'Implosion',
                        'description' => 'Tigreal begins channeling, pulling nearby enemies toward him, then smashes the ground with his hammer, dealing 270(+130%Total Physical Attack) Physical Damage to enemies in the area and stunning them for 1.5s. The channeling can be interrupted by transformation and airborne effects.',
                        'category' => 'Skill Utimate',
                    ],
                ],
            ],
            [
                'name' => 'Lapu-Lapu',
                'description' => 'Lapu-Lapu lives with other Doricans on the Vonetis Islands, living a life outside of worldly strife. But the arrival of a warlord who had defected from the Moniyan Empire broke this silence and brought about endless killing. Lapu-Lapu gathered all the tribes together to fight back against the warlord\'s invasion and finally won, turning the Vonetis Islands into a paradise of freedom again.',
                'offensive' => 150,
                'defensive' => 150,
                'utility' => 50,
                'image' => 'https://liquipedia.net/mobilelegends/File:Lapu-lapu_infobox.png',
                'skills' => [
                    [
                        'name' => 'Homeland Defender',
                        'description' => 'Lapu-Lapu accumulates 10 Bravery Blessing each time he deals damage (halved for damage dealt to non-hero units). When Bravery Blessing is full, Lapu-Lapu\'s next Basic Attack will make him dash toward the target, dealing 250(+65*Hero Level) Physical Damage (cannot critically strike) and granting him a shield that absorbs 2.5 damage for (+150% Total Physical Attack)s.',
                        'category' => 'Skill Passive',
                    ],
                    [
                        'name' => 'Justice Blades',
                        'description' => 'Lapu-Lapu releases two boomerangs in the target direction, each boomerang dealing 175(+50%Total Physical Attack) Physical Damage to enemies hit on its way out and back.',
                        'category' => 'Skill 1',
                    ],
                    [
                        'name' => 'Jungle Warrior',
                        'description' => 'Lapu-Lapu dashes in the target direction, dealing 100(+50%Total Physical Attack) Physical Damage to enemies along the way.',
                        'category' => 'Skill 2',
                    ],
                    [
                        'name' => 'Bravest Fighter',
                        'description' => 'Lapu-Lapu leaps to the target location while combining his twin blades into one, dealing 300(+80%Total Physical Attack) Physical Damage to nearby enemies upon landing and slowing them by 60% for 1s. Lapu-Lapu gains 500% times more Bravery Blessing from this Skill and Skills in transformed state.',
                        'category' => 'Skill Ultimate',
                    ],
                    [
                        'name' => 'Land Shaker',
                        'description' => 'Lapu-Lapu channels for 0.7s, slowing enemies in the target direction by 60%. He then slams his heavy sword to the ground, dealing 250(+100%Total Physical Attack) Physical Damage to enemies hit and stunning them for 1s.',
                        'category' => 'Skill 1 Transform',
                    ],
                    
                    [
                        'name' => 'Storm Sword',
                        'description' => 'Lapu-Lapu whirls his heavy sword, dealing 250(+100%Total Physical Attack) Physical Damage to nearby enemies.',
                        'category' => 'Skill 2 Transform',
                    ],
                    [
                        'name' => 'Raging Slash',
                        'description' => 'Lapu-Lapu swings his heavy sword 3 times. The first two attacks deal 380(+160%Total Physical Attack) Physical Damage each, while the third deals 440(+210%Total Physical Attack) Physical Damage to enemies in a large area.',
                        'category' => 'Skill Ultimate Transform',
                    ],
                ],
            ],
        ];
    }

}

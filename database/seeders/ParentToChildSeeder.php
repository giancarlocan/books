<?php

namespace Database\Seeders;

use App\Models\ParentToChild;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParentToChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $relationships = [
            [
                'user_id_parent' => 1,
                'user_id_child' => 3,
            ],
            [
                'user_id_parent' => 1,
                'user_id_child' => 4,
            ],
            [
                'user_id_parent' => 2,
                'user_id_child' => 3,
            ],
            [
                'user_id_parent' => 2,
                'user_id_child' => 4,
            ],
        ];

        foreach ($relationships as $relationship) {
            ParentToChild::create($relationship);
        }
    }
}

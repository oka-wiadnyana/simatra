<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = ['ketua', 'wakil_ketua', 'panitera', 'panmud_hukum', 'panmud_pidana','panmud_perdata','panmud_tipikor','admin_hukum','admin_pidana','admin_perdata','admin_tipikor', 'satker','super_admin'];
        foreach ($levels as $level) {
            DB::table('levels')->insert([
                'level_name' => $level,
            ]);
        }

    }
}

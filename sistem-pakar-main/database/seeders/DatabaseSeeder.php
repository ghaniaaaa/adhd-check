<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Artikel;
use App\Models\Gejala;
use App\Models\KondisiUser;
use App\Models\TingkatKecenderungan;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\New_;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        \App\Models\User::factory(3)->create();
        // Artikel::factory(4)->create();

        \App\Models\User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'admin',
                'password' => bcrypt('$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'), // password
            ]
        );

        $this->call([
            GejalaSeeder::class,
            KondisiUserSeeder::class,
            TingkatKecenderunganSeeder::class,
            ArtikelSeeder::class,
        ]);

        // Info di console
        $this->command->info('Seeding selesai, admin & data dummy siap!');
    }
}

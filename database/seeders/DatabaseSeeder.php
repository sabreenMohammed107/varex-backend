<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use WhyUsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([ UserSeeder::class,]);
        $this->call([ CategorySeeder::class,]);
        $this->call([ CertificateSeeder::class,]);
        $this->call(ContactUsTableSeeder::class);
        $this->call(FaqsTableSeeder::class);
        $this->call(AboutUsSeeder::class);
        $this->call(WhyUsSeeder::class);

    }
}

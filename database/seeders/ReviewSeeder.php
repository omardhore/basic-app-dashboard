<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'name' => 'Liam Gallagher',
                'position' => 'Teacher of Luxe Escapes Hotels',
                'message' => 'This app transformed my budgeting! It has been a clear view longer have to worry of my It has been success expenses and savings goals.',
                'image' => 'frontend/assets/images/v1/img7.png',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Michael Chen',
                'position' => 'Founder of EcoChic Apparel',
                'message' => 'The interface is intuitive, and I love how syncs with my bank accounts. I no longer have to worry about manual tracking. Highly recommend!',
                'image' => 'frontend/assets/images/v1/img2.png',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'David Nguyen',
                'position' => 'COO of Luxe Escapes Hotels',
                'message' => 'With this app, I’ve been able to stick to my budget and even save for a vacation. The budget alerts are a game changer!',
                'image' => 'frontend/assets/images/v1/img3.png',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Rachel Kim',
                'position' => 'CEO of GreenLeaf Organics',
                'message' => 'Having all my accounts in one place gives me complete overspending accounts control over my money. Highly recommend!',
                'image' => 'frontend/assets/images/v1/img5.png',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Aisha Hassan',
                'position' => 'CEO of RoyexLeaf Organics',
                'message' => 'Having all my accounts in one place gives me complete control over my money. So user-friendly and helpful! Highly recommend!',
                'image' => 'frontend/assets/images/v1/img6.png',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}

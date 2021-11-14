<?php

namespace Database\Seeders;

use App\Models\FeedBack;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'related_model' => FeedBack::class,
                'slug' => 'new',
                'title' => 'Нова',
            ],
            [
                'related_model' => FeedBack::class,
                'slug' => 'draft',
                'title' => 'Опрацьвано',
            ],
            [
                'related_model' => FeedBack::class,
                'slug' => 'draft',
                'title' => 'Чорновик',
            ],

        ];
        foreach ($statuses as $status) {
            Status::updateOrCreate(
                [
                    'related_model' => $status["related_model"],
                    'slug' => $status["slug"],
                    'title' => $status["title"],
                ],

            );
        }

    }
}

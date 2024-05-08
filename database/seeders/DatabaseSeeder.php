<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1)->create();

        \App\Models\User::factory()->create([
            'id' => 1,
            'name' => 'Roberts',
            'email' => 'skilled.user@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => \Str::random(10),
        ]);

        $playlists = [
            [
                'id' => 1,
                'name' => 'Watch Later',
                'user_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Favourites',
                'user_id' => 1
            ],
            [
                'id' => 3,
                'name' => 'Code videos',
                'user_id' => 1
            ],
        ];

        foreach ($playlists as $playlist) {
            \App\Models\Playlist::create($playlist);
        }

        $videos = [
            [
                'id' => 1,
                'title' => 'Watch Later Video 1',
                'user_id' => 1
            ],
            [
                'id' => 2,
                'title' => 'Watch Later Video 2',
                'user_id' => 1
            ],
            [
                'id' => 3,
                'title' => 'Watch Later Video 3',
                'user_id' => 1
            ],
            [
                'id' => 4,
                'title' => 'Favourites Video 1',
                'user_id' => 1
            ],
            [
                'id' => 5,
                'title' => 'Favourites Video 2',
                'user_id' => 1
            ],
            [
                'id' => 6,
                'title' => 'Favourites Video 3',
                'user_id' => 1
            ],
            [
                'id' => 7,
                'title' => 'Code Video 1',
                'user_id' => 1
            ],
            [
                'id' => 8,
                'title' => 'Code Video 2',
                'user_id' => 1
            ],
            [
                'id' => 9,
                'title' => 'Code Video 3',
                'user_id' => 1
            ],
        ];

        foreach ($videos as $video) {
            \App\Models\Video::create($video);
        }

        $playlists_videos = [
            [
                'playlist_id' => 1,
                'video_id' => 1
            ],
            [
                'playlist_id' => 1,
                'video_id' => 2
            ],
            [
                'playlist_id' => 1,
                'video_id' => 3
            ],
            [
                'playlist_id' => 2,
                'video_id' => 4
            ],
            [
                'playlist_id' => 2,
                'video_id' => 5
            ],
            [
                'playlist_id' => 2,
                'video_id' => 6
            ],
            [
                'playlist_id' => 3,
                'video_id' => 7
            ],
            [
                'playlist_id' => 3,
                'video_id' => 8
            ],
            [
                'playlist_id' => 3,
                'video_id' => 9
            ],
        ];

        \DB::table('playlist_video')->insert($playlists_videos);
    }
}

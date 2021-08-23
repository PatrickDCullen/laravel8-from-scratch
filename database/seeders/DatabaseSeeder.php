<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\File as FileFacade;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create([
            'name' => 'John Doe',
            'username' => 'John Doe',
            'email' => 'john@doe.com',
        ]);

        // Clear out storage/app/public/thumbnails so you don't endlessly add thumbnails to the folder
        Storage::delete(Storage::files('thumbnails'));

        // Copy images/defaults thumbnails to storage/app/public/thumbnails
        $files = FileFacade::files(public_path('images/defaults'));

        foreach ($files as $file) {
            $filename = public_path('images/defaults/') . $file->getFilename();
            Storage::putFile('thumbnails', new File($filename));
        }

        Post::factory(6)->create([
            'user_id' => $admin->id,
        ]);
    }
}

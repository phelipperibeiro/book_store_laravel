<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = factory(\App\Models\User::class)->create([
           'name' => 'Author da Silva',
            'email'=>'author@admin.com',
            'password'=>bcrypt(123456)
        ]);

        $author2 = factory(\App\Models\User::class)->create([
            'name' => 'Author 2 da Silva',
            'email'=>'author2@admin.com',
            'password'=>bcrypt(123456)
        ]);

        factory(\App\Models\Book::class, 2)->create([
            'user_id'=>$author->id
        ]);

        factory(\App\Models\Book::class, 2)->create([
            'user_id'=>$author2->id
        ]);

        $book_manage = factory(\App\Models\Permission::class)->create([
           'name'=>'book_manage_all',
            'description'=>'Can Manage All books'
        ]);

        $roleManager = \App\Models\Role::whereName('Manager')->first();
        $roleManager->addPermission($book_manage);
    }
}

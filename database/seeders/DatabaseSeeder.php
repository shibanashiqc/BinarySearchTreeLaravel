<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //root node is A
        $a = \App\Models\Node::create([
            'name' => 'A',
            'position' => 'root',
            'parent_id' => null,
        ]);
        //B is a child of A
        $b = \App\Models\Node::create([
            'name' => 'B',
            'position' => 'L',
            'parent_id' => $a->id,
        ]);

        //C is a child of A
        $c = \App\Models\Node::create([
            'name' => 'C',
            'position' => 'R',
            'parent_id' => $a->id,
        ]);

        // v is a child of B
        $v = \App\Models\Node::create([
            'name' => 'V',
            'position' => 'L',
            'parent_id' => $b->id,
        ]);

        //f is a child of B

        $f = \App\Models\Node::create([
            'name' => 'F',
            'position' => 'R',
            'parent_id' => $b->id,
        ]);

        //g is a child of C
        $g = \App\Models\Node::create([
            'name' => 'G',
            'position' => 'L',
            'parent_id' => $c->id,
        ]);

        //h is a child of C
        $h = \App\Models\Node::create([
            'name' => 'H',
            'position' => 'R',
            'parent_id' => $c->id,
        ]);

        //t is a child of v
        $t = \App\Models\Node::create([
            'name' => 'T',
            'position' => 'L',
            'parent_id' => $v->id,
        ]);

        //y is a child of v

        $y = \App\Models\Node::create([
            'name' => 'Y',
            'position' => 'R',
            'parent_id' => $v->id,
        ]);

        //i is a child of f
        $i = \App\Models\Node::create([
            'name' => 'I',
            'position' => 'L',
            'parent_id' => $f->id,
        ]);

        //l is a child of f

        $l = \App\Models\Node::create([
            'name' => 'L',
            'position' => 'R',
            'parent_id' => $f->id,
        ]);




        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

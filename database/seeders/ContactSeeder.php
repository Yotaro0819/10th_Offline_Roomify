<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use Carbon\Carbon;


class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'message' => 'Hello, I have a question.',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'message' => 'Can you help me with my order?',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'message' => 'I love your website!',
                'is_read' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bob Brown',
                'email' => 'bob@example.com',
                'message' => 'I am interested in your services.',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Charlie Davis',
                'email' => 'charlie@example.com',
                'message' => 'How can I contact support?',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Daisy Evans',
                'email' => 'daisy@example.com',
                'message' => 'I would like to give feedback.',
                'is_read' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Ethan Foster',
                'email' => 'ethan@example.com',
                'message' => 'Your website is amazing!',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Fiona Green',
                'email' => 'fiona@example.com',
                'message' => 'I need more information about your product.',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'George Hill',
                'email' => 'george@example.com',
                'message' => 'Do you offer discounts?',
                'is_read' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Hannah Adams',
                'email' => 'hannah@example.com',
                'message' => 'Thank you for your quick response!',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

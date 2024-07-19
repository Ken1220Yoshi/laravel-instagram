<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use SebastianBergmann\Type\VoidType;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function run():void
    {
        $this->user->name = 'Administrator';
        $this->user->email = 'admin@email.com';
        $this->user->password = Hash::make('admin12345');
        $this->user->role_id = 1;
        $this->user->save();
    }
}

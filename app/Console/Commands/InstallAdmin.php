<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User; // Make sure this path is correct for your project
use Illuminate\Support\Facades\Hash;

class InstallAdmin extends Command
{
    protected $signature = 'install:admin';
    protected $description = 'Install System Admin';

    public function handle()
    {
        $user = new User([
            'name' => 'BMS Admin',
            'email' => 'bms@yopmail.com',
            'phone_no' => '9876543210', // Just a placeholder
            'password' => Hash::make('secret'), // Hashing password correctly
            'user_type' => 1
        ]); // ✅ SEMICOLON ADDED HERE

        if ($user->save()) {
            $this->info('Account Insert Successful');
        } else {
            $this->error('Account Insert Failed');
        }
    }
}

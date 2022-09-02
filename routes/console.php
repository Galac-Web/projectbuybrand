<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

Artisan::command('remember:clear', function () {
    try {
        $users = (new \App\Models\User())->getTable();

        DB::table($users)->update([
            'remember_token' => null,
        ]);

        $this->info("Remember tokens has been cleared successfully on {$users} table");
    } catch (\Exception $e) {
        $this->error($e->getMessage());
    }
})->describe('Clear remember token on users');

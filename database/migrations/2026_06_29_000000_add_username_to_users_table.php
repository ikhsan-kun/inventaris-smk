<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddUsernameToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->unique()->after('name');
        });

        $users = DB::table('users')->get();

        foreach ($users as $user) {
            $username = $user->username ?: Str::slug($user->name, '_');

            if (!$username) {
                $username = 'user_'.$user->id;
            }

            if (DB::table('users')
                ->where('username', $username)
                ->where('id', '!=', $user->id)
                ->exists()) {
                $username = $username.'_'.$user->id;
            }

            DB::table('users')
                ->where('id', $user->id)
                ->update(['username' => $username]);
        }

        DB::table('users')
            ->where('name', 'Admin Sarpras')
            ->orWhere('email', 'admin@alirsyad.sch.id')
            ->update(['username' => 'admin']);
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
}

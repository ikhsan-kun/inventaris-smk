<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->nullable()->after('email');
        });

        DB::table('users')
            ->whereNull('role')
            ->update(['role' => 'peminjam']);

        DB::table('users')
            ->where('name', 'Admin Sarpras')
            ->orWhere('email', 'admin@alirsyad.sch.id')
            ->update(['role' => 'admin']);
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
}

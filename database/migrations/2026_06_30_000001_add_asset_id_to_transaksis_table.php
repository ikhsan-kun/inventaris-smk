<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAssetIdToTransaksisTable extends Migration
{
    public function up()
    {
        // Handled in original create_transaksis_table migration to avoid doctrine/dbal requirement.
    }

    public function down()
    {
        // Handled in original create_transaksis_table migration to avoid doctrine/dbal requirement.
    }
}

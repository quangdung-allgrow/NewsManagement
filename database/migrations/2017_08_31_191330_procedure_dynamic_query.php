<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProcedureDynamicQuery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $databaseName = env('DB_DATABASE','');

        $proc = "use $databaseName;
                DROP PROCEDURE IF EXISTS dynamic_query;
                CREATE DEFINER = `root`@`localhost` PROCEDURE dynamic_query ( IN  query VARCHAR(255) )
                BEGIN
                    SET @s = query;
                    PREPARE stmt FROM @s;
                    EXECUTE stmt;
                    DEALLOCATE PREPARE stmt;
                END";
        DB::unprepared($proc);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $databaseName = env('DB_DATABASE','');
        $proc = "
            use $databaseName;
            DROP PROCEDURE IF EXISTS dynamic_query;";
        DB::unprepared($proc);
    }
}

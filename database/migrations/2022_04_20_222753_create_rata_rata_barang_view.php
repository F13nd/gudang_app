<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRataRataBarangView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS product_entry_averages");

        \DB::statement('
            CREATE VIEW product_entry_averages AS

            SELECT 
                users.name as supplier_name,
                products.name as name,
                AVG(CASE WHEN transactions.type = "in" THEN transactions.value ELSE 0 END) as average_number_of_entries
                FROM `transactions`
                JOIN products ON products.id = transactions.product_id 
                JOIN users ON users.id = transactions.user_id
                WHERE users.role = "supplier"
                GROUP BY products.id, users.id;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_entry_averages');
    }
}

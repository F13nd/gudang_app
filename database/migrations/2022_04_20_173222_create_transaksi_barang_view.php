<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiBarangView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS monthly_transactions");

        \DB::statement('
            CREATE VIEW monthly_transactions AS
                SELECT products.name as name, 
                SUM(CASE WHEN transactions.type = "in" THEN transactions.value ELSE 0 END) as number_of_entries, 
                SUM(CASE WHEN transactions.type = "out" THEN transactions.value ELSE 0 END) as amount_out, 
                products.stock AS stock,
                MONTHNAME(transactions.created_at) as month, 
                year(transactions.created_at) as year 
                FROM transactions 
                JOIN products ON products.id = transactions.product_id 
                GROUP BY products.id, year(transactions.created_at), month(transactions.created_at)
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW monthly_transactions");

    }
}

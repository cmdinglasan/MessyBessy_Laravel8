<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameStockAndStockDefectiveOnProductsAndStocksTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('stock', 'stock_qty');
            $table->renameColumn('stock_defective', 'minimum_stock');
        });

        Schema::table('stocks', function (Blueprint $table) {
            $table->renameColumn('stock', 'branch_stock');
            $table->renameColumn('stock_defective', 'branch_minimum_stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

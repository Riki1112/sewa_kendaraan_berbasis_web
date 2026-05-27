public function up()
{
    Schema::table('vehicles', function (Blueprint $table) {
        $table->date('tax_due_date')->nullable();
        $table->date('last_service_date')->nullable();
    });
}

public function down()
{
    Schema::table('vehicles', function (Blueprint $table) {
        $table->dropColumn(['tax_due_date', 'last_service_date']);
    });
}
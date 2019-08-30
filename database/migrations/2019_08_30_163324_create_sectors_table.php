<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectors', function (Blueprint $table) {
            $table->integer('registry_id');
            $table->string('name');
            $table->bigInteger('parent_id')->nullable();
            $table->timestamps();

            $table->primary('registry_id');
            $table->foreign('parent_id')->references('registry_id')->on('sectors');
        });

        DB::table('sectors')->insert([
            ['name' => 'Manufacturing', 'registry_id' => '1', 'parent_id' => null],
            ['name' => 'Construction materials', 'registry_id' => '19', 'parent_id' => '1'],
            ['name' => 'Electronics and Optics', 'registry_id' => '18', 'parent_id' => '1'],
            ['name' => 'Food and Beverage', 'registry_id' => '6', 'parent_id' => '1'],
            ['name' => 'Bakery & confectionery products', 'registry_id' => '342', 'parent_id' => '6'],
            ['name' => 'Beverages', 'registry_id' => '43', 'parent_id' => '6'],
            ['name' => 'Fish & fish products', 'registry_id' => '42', 'parent_id' => '6'],
            ['name' => 'Meat & meat products', 'registry_id' => '40', 'parent_id' => '6'],
            ['name' => 'Milk & dairy products', 'registry_id' => '39', 'parent_id' => '6'],
            ['name' => 'Other', 'registry_id' => '437', 'parent_id' => '6'],
            ['name' => 'Sweets & snack food', 'registry_id' => '378', 'parent_id' => '6'],
            ['name' => 'Furniture', 'registry_id' => '13', 'parent_id' => '1'],
            ['name' => 'Bathroom/sauna', 'registry_id' => '389', 'parent_id' => '13'],
            ['name' => 'Bedroom', 'registry_id' => '385', 'parent_id' => '13'],
            ['name' => 'Children’s room', 'registry_id' => '390', 'parent_id' => '13'],
            ['name' => 'Kitchen', 'registry_id' => '98', 'parent_id' => '13'],
            ['name' => 'Living room', 'registry_id' => '101', 'parent_id' => '13'],
            ['name' => 'Office', 'registry_id' => '392', 'parent_id' => '13'],
            ['name' => 'Other (Furniture)', 'registry_id' => '394', 'parent_id' => '13'],
            ['name' => 'Outdoor', 'registry_id' => '341', 'parent_id' => '13'],
            ['name' => 'Project furniture', 'registry_id' => '99', 'parent_id' => '13'],
            ['name' => 'Machinery', 'registry_id' => '12', 'parent_id' => '1'],
            ['name' => 'Machinery components', 'registry_id' => '94', 'parent_id' => '12'],
            ['name' => 'Machinery equipment/tools', 'registry_id' => '91', 'parent_id' => '12'],
            ['name' => 'Manufacture of machinery', 'registry_id' => '224', 'parent_id' => '12'],
            ['name' => 'Maritime', 'registry_id' => '97', 'parent_id' => '12'],
            ['name' => 'Aluminium and steel workboats', 'registry_id' => '271', 'parent_id' => '97'],
            ['name' => 'Boat/Yacht building', 'registry_id' => '269', 'parent_id' => '97'],
            ['name' => 'Ship repair and conversion', 'registry_id' => '230', 'parent_id' => '97'],
            ['name' => 'Metal structures', 'registry_id' => '93', 'parent_id' => '12'],
            ['name' => 'Other', 'registry_id' => '508', 'parent_id' => '12'],
            ['name' => 'Repair and maintenance service', 'registry_id' => '227', 'parent_id' => '12'],
            ['name' => 'Metalworking', 'registry_id' => '11', 'parent_id' => '1'],
            ['name' => 'Construction of metal structures', 'registry_id' => '67', 'parent_id' => '11'],
            ['name' => 'Houses and buildings', 'registry_id' => '263', 'parent_id' => '11'],
            ['name' => 'Metal products', 'registry_id' => '267', 'parent_id' => '11'],
            ['name' => 'Metal works', 'registry_id' => '542', 'parent_id' => '11'],
            ['name' => 'CNC-machining', 'registry_id' => '75', 'parent_id' => '542'],
            ['name' => 'Forgings, Fasteners', 'registry_id' => '62', 'parent_id' => '542'],
            ['name' => 'Gas, Plasma, Laser cutting', 'registry_id' => '69', 'parent_id' => '542'],
            ['name' => 'MIG, TIG, Aluminum welding', 'registry_id' => '66', 'parent_id' => '542'],
            ['name' => 'Plastic and Rubber', 'registry_id' => '9', 'parent_id' => '1'],
            ['name' => 'Packaging', 'registry_id' => '54', 'parent_id' => '9'],
            ['name' => 'Plastic goods', 'registry_id' => '556', 'parent_id' => '9'],
            ['name' => 'Plastic processing technology', 'registry_id' => '559', 'parent_id' => '9'],
            ['name' => 'Blowing', 'registry_id' => '55', 'parent_id' => '559'],
            ['name' => 'Moulding', 'registry_id' => '57', 'parent_id' => '559'],
            ['name' => 'Plastics welding and processing', 'registry_id' => '53', 'parent_id' => '559'],
            ['name' => 'Plastic profiles', 'registry_id' => '560', 'parent_id' => '9'],
            ['name' => 'Printing', 'registry_id' => '5', 'parent_id' => '1'],
            ['name' => 'Advertising', 'registry_id' => '148', 'parent_id' => '5'],
            ['name' => 'Book/Periodicals printing', 'registry_id' => '150', 'parent_id' => '5'],
            ['name' => 'Labelling and packaging printing', 'registry_id' => '145', 'parent_id' => '5'],
            ['name' => 'Textile and Clothing', 'registry_id' => '7', 'parent_id' => '1'],
            ['name' => 'Clothing', 'registry_id' => '44', 'parent_id' => '7'],
            ['name' => 'Textile', 'registry_id' => '45', 'parent_id' => '7'],
            ['name' => 'Wood', 'registry_id' => '8', 'parent_id' => '1'],
            ['name' => 'Other (Wood)', 'registry_id' => '337', 'parent_id' => '8'],
            ['name' => 'Wooden building materials', 'registry_id' => '51', 'parent_id' => '8'],
            ['name' => 'Wooden houses', 'registry_id' => '47', 'parent_id' => '8'],
            ['name' => 'Other', 'registry_id' => '3', 'parent_id' => '1'],
            ['name' => 'Creative industries', 'registry_id' => '37', 'parent_id' => '3'],
            ['name' => 'Energy technology', 'registry_id' => '29', 'parent_id' => '3'],
            ['name' => 'Environment', 'registry_id' => '33', 'parent_id' => '3'],
            ['name' => 'Service', 'registry_id' => '2', 'parent_id' => null],
            ['name' => 'Business services', 'registry_id' => '25', 'parent_id' => '2'],
            ['name' => 'Engineering', 'registry_id' => '35', 'parent_id' => '2'],
            ['name' => 'Information Technology and Telecommunications', 'registry_id' => '28', 'parent_id' => '2'],
            ['name' => 'Data processing, Web portals, E-marketing', 'registry_id' => '581', 'parent_id' => '28'],
            ['name' => 'Programming, Consultancy', 'registry_id' => '576', 'parent_id' => '28'],
            ['name' => 'Software, Hardware', 'registry_id' => '121', 'parent_id' => '28'],
            ['name' => 'Telecommunications', 'registry_id' => '122', 'parent_id' => '28'],
            ['name' => 'Tourism', 'registry_id' => '22', 'parent_id' => '2'],
            ['name' => 'Translation services', 'registry_id' => '141', 'parent_id' => '2'],
            ['name' => 'Transport and Logistics', 'registry_id' => '21', 'parent_id' => '2'],
            ['name' => 'Air', 'registry_id' => '111', 'parent_id' => '21'],
            ['name' => 'Rail', 'registry_id' => '114', 'parent_id' => '21'],
            ['name' => 'Road', 'registry_id' => '112', 'parent_id' => '21'],
            ['name' => 'Water', 'registry_id' => '113', 'parent_id' => '21'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sectors');
    }
}

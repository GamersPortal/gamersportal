<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array(
            0 =>
                array(
                    'id' => 99,
                    'name' => 'Administrator',
                    'created_at' => '2015-09-09 22:51:43',
                    'updated_at' => '2015-09-09 22:51:43',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => 'Customer',
                    'created_at' => '2015-09-09 22:51:56',
                    'updated_at' => '2015-09-09 22:51:56',
                ),
        ));
    }

}

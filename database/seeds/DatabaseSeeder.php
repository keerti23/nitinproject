<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Admin;
use App\ServiceEngineer;
use App\Setting;
use App\Report;
use App\ReportImage;
class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
    public function run()
    {
        Model::unguard();
        $this->call('AdminTableSeeder');

        $this->command->info('Admin table seeded!');
    }
}
class AdminTableSeeder extends Seeder {

    public function run()
    {
        DB::table('admins')->delete();

        Admin::create([
            'name'     => 'Admin',
            'email'   => 'nitin@gmail.com',
            'password' => Hash::make('123456')
        ]);
       

      

        DB::table('settings')->delete();

        Setting::create([
            'name'      => 'nitin Company',
            'logo'      => 'logo-invert.png' ,
            'email'     => 'nitin.indora@gmail.com',
            'address'   =>  'XXXX XXXX XXXX XXXX',
            'phone_number'     =>  '9414758069'
        ]);

//        DB::table('report')->truncate();
//        DB::table('report_image')->truncate();
       


    }

}

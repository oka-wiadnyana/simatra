<?php

namespace Database\Seeders;

use App\Models\Satker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $satkers=[
           [
            'name'=>'Pengadilan Negeri Negara',
            'address'=>'Negara',
            'nick_name'=>'PN Negara',
            'whatsapp_number'=>'081337320205',
            'satker_code'=>'099802',
           ],
           [
            'name'=>'Pengadilan Negeri Denpasar',
            'address'=>'Denpasar',
            'nick_name'=>'PN Denpasar',
            'whatsapp_number'=>'081337320205',
            'satker_code'=>'99999',
           ] 
        ];

        foreach($satkers as $satker){
            Satker::create([
                'name'=>$satker['name'],
                'address'=>$satker['address'],
                'nick_name'=>$satker['nick_name'],
                'whatsapp_number'=>$satker['whatsapp_number'],
                'satker_code'=>$satker['satker_code'],
            ]);
        }
    }
}

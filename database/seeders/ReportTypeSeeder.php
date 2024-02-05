<?php

namespace Database\Seeders;

use App\Models\ReportType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reportTypes=[
            [
                'periode'=>'bulanan','name'=>'Laporan Perkara E-Court','for_menu'=>'E-Court','description'=>'Laporan perkara yang diupload adalah perkara E-Court Gugatan, Permohonan, dan Gugatan Sederhana'
             
            ],
            [
                'periode'=>'bulanan','name'=>'Laporan Perkara E-Litigasi','for_menu'=>'E-Litigasi','description'=>'Laporan perkara yang diupload adalah perkara E-Litigasi Gugatan, Permohonan, dan Gugatan Sederhana'
             
            ],
            [
                'periode'=>'bulanan','name'=>'Laporan Perkara Banding Elektronik','for_menu'=>'Banding Elektronik','description'=>'Laporan  yang diupload adalah perkara Banding secara E-Court'
             
            ],
            [
                'periode'=>'bulanan','name'=>'Laporan Keuangan Perkara Perdata','for_menu'=>'Keuangan Perkara','description'=>'Laporan yang diupload adalah Laporan Keuangan Perkara Eksekusi Putusan dan Hak Tanggungan'
             
            ],
            [
                'periode'=>'bulanan','name'=>'Laporan proses perkara lebih 5 bulan', 'for_menu'=>'Lebih 5 bulan','description'=>'Laporan perkara yang diupload adalah laporan perkara pidana dan perdata yang penyelesaiannya lebih dari 5 bulan'
             
            ],
            [
                'periode'=>'bulanan','name'=>'Laporan Perkara Eksekusi', 'for_menu'=>'Eksekusi','description'=>'Laporan yang diupload adalah Laporan Perkara Eksekusi Putusan dan Hak Tanggungan'
             
            ],
            
            [
                'periode'=>'bulanan','name'=>'Laporan Pelaksanaan Delegasi', 'for_menu'=>'Delegasi','description'=>'Laporan yang diupload adalah Laporan Laporan Pelaksanaan Delegasi Pidana dan perdata'
             
            ],
            [
                'periode'=>'bulanan','name'=>'Laporan Penerapan Gugatan Sederhana', 'for_menu'=>'Penerapan GS','description'=>'Laporan yang diupload adalah Laporan Penerapan Gugatan Sederhana'
             
            ],
            [
                'periode'=>'bulanan','name'=>'Laporan Perkara yang menempuh dan tidak menempuh Kasasi', 'for_menu'=>'Perk. Menempuh Kasasi','description'=>'Laporan yang diupload adalah Laporan Perkara yang Menempuh dan Tidak Menempuh Kasasi'
             
            ],
            [
                'periode'=>'bulanan','name'=>'Laporan Keadaan Perkara Pidana', 'for_menu'=>'Keadaan Pidana','description'=>'Laporan yang diupload adalah Semua Laporan Keadaan Perkara Pidana'
             
            ],
            [
                'periode'=>'bulanan','name'=>'Laporan Keadaan Perkara Perdata', 'for_menu'=>'Keadaan Perdata','description'=>'Laporan yang diupload adalah Semua Laporan Keadaan Perkara Perdata'
             
            ],
            [
                'periode'=>'bulanan','name'=>'Laporan Rekapitulasi dan Keberhasilan Mediasi', 'for_menu'=>'Rekap Mediasi','description'=>'Laporan yang diupload adalah Laporan Rekap Mediasi Perbulan, dan detail perkara yang berhasil dimediasi'
             
            ],
            [
                'periode'=>'bulanan','name'=>'Laporan Perkara Banding yang Mengajukan PK', 'for_menu'=>'Banding ke PK','description'=>'Laporan yang diupload adalah laporan perkara yang diputus banding dan diajukan PK'
             
            ],
            [
                'periode'=>'bulanan','name'=>'Laporan Restorative Justice', 'for_menu'=>'RJ','description'=>'Laporan yang diupload adalah Semua perkara yang diselesaikan dengan Restorative Justice'
             
            ],
            [
                'periode'=>'caturwulan','name'=>'Laporan Perkara Banding', 'for_menu'=>'banding','description'=>'Laporan yang diupload adalah laporan banding pidana dan perdata'
             
            ],
          
            [
                'periode'=>'caturwulan','name'=>'Laporan Perkara Kasasi', 'for_menu'=>'Kasasi','description'=>'Laporan yang diupload adalah laporan kasasi pidana dan perdata'
             
            ],
            [
                'periode'=>'caturwulan','name'=>'Laporan Perkara PK', 'for_menu'=>'PK','description'=>'Laporan yang diupload adalah laporan PK pidana dan perdata'
             
            ],
            [
                'periode'=>'semester','name'=>'Laporan Kegiatan Hakim Perdata', 'for_menu'=>'Keg. Hakim Perdata','description'=>'Laporan yang diupload adalah laporan kegiatan hakim perkara perdata'
             
            ],
            [
                'periode'=>'semester','name'=>'Laporan Kegiatan Hakim Pidana', 'for_menu'=>'Keg. Hakim Pidana','description'=>'Laporan yang diupload adalah laporan kegiatan hakim perkara pidana'
             
            ],
            [
                'periode'=>'tahunan','name'=>'Laporan Perkara Tahunan', 'for_menu'=>'Perkara Tahunan','description'=>'Laporan yang diupload adalah laporan tahunan keadaan perkara pidana dan perdata'
             
            ],

        ];

        foreach($reportTypes as $reportType){
            ReportType::create([
                'periode'=>$reportType['periode'],
                'name'=>$reportType['name'],
                'for_menu'=>$reportType['for_menu'],
                'description'=>$reportType['description'],
            ]);
        }
    }
}

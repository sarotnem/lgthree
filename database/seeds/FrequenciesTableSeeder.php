<?php

use Illuminate\Database\Seeder;

class FrequenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('frequencies')->insert([ 'airport_id' => 1, 'callsign' => 'LGZA_ATIS', 'frequency' => '127.050', 'name' => 'Zakinthos ATIS' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 1, 'callsign' => 'LGZA_TWR', 'frequency' => '125.420', 'name' => 'Zakinthos Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 2, 'callsign' => 'LGTT_TWR', 'frequency' => '122.650', 'name' => 'Tatoi Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 3, 'callsign' => 'LGTS_APP', 'frequency' => '120.800', 'name' => 'Thessaloniki Radar' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 3, 'callsign' => 'LGTS_ATIS', 'frequency' => '127.550', 'name' => 'Thessaloniki ATIS' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 3, 'callsign' => 'LGTS_DEL', 'frequency' => '118.050', 'name' => 'Makedonia Delivery' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 3, 'callsign' => 'LGTS_GND', 'frequency' => '121.700', 'name' => 'Makedonia Ground' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 3, 'callsign' => 'LGTS_TWR', 'frequency' => '118.100', 'name' => 'Makedonia Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 4, 'callsign' => 'LGTL_TWR', 'frequency' => '120.350', 'name' => 'Kasteli Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 5, 'callsign' => 'LGTG_APP', 'frequency' => '120.250', 'name' => 'Tanagra Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 5, 'callsign' => 'LGTG_TWR', 'frequency' => '122.100', 'name' => 'Tanagra Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 6, 'callsign' => 'LGSY_APP', 'frequency' => '123.200', 'name' => 'Skiros Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 6, 'callsign' => 'LGSY_TWR', 'frequency' => '122.100', 'name' => 'Skiros Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 7, 'callsign' => 'LGST_TWR', 'frequency' => '122.600', 'name' => 'Sitia Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 8, 'callsign' => 'LGSR_APP', 'frequency' => '118.050', 'name' => 'Santorini Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 8, 'callsign' => 'LGSR_ATIS', 'frequency' => '126.450', 'name' => 'Santorini ATIS' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 8, 'callsign' => 'LGSR_TWR', 'frequency' => '122.100', 'name' => 'Santorini Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 9, 'callsign' => 'LGSO_TWR', 'frequency' => '118.850', 'name' => 'Syros Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 10, 'callsign' => 'LGSM_APP', 'frequency' => '124.100', 'name' => 'Samos Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 10, 'callsign' => 'LGSM_TWR', 'frequency' => '129.850', 'name' => 'Samos Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 11, 'callsign' => 'LGSK_APP', 'frequency' => '126.050', 'name' => 'Skiathos Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 11, 'callsign' => 'LGSK_TWR', 'frequency' => '123.250', 'name' => 'Skiathos Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 12, 'callsign' => 'LGSD_TWR', 'frequency' => '122.100', 'name' => 'Sedes Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 13, 'callsign' => 'LGSA_APP', 'frequency' => '118.120', 'name' => 'Souda Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 13, 'callsign' => 'LGSA_ATIS', 'frequency' => '130.170', 'name' => 'Daskalogiannis ATIS' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 13, 'callsign' => 'LGSA_GND', 'frequency' => '121.700', 'name' => 'Souda Ground' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 13, 'callsign' => 'LGSA_TWR', 'frequency' => '122.100', 'name' => 'Souda Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 14, 'callsign' => 'LGRX_TWR', 'frequency' => '125.250', 'name' => 'Araxos Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 15, 'callsign' => 'LGRP_APP', 'frequency' => '127.250', 'name' => 'Diagoras Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 15, 'callsign' => 'LGRP_ATIS', 'frequency' => '126.35', 'name' => 'Diagoras ATIS' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 15, 'callsign' => 'LGRP_GND', 'frequency' => '121.700', 'name' => 'Diagoras Ground' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 15, 'callsign' => 'LGRP_TWR', 'frequency' => '118.200', 'name' => 'Diagoras Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 16, 'callsign' => 'LGRD_TWR', 'frequency' => '118.100', 'name' => 'Maritsa Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 17, 'callsign' => 'LGPZ_APP', 'frequency' => '120.450', 'name' => 'Aktion Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 17, 'callsign' => 'LGPZ_TWR', 'frequency' => '122.100', 'name' => 'Aktion Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 18, 'callsign' => 'LGPL_TWR', 'frequency' => '124.850', 'name' => 'Astypalaia Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 19, 'callsign' => 'LGPA_TWR', 'frequency' => '125.050', 'name' => 'Paros Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 20, 'callsign' => 'LGNX_TWR', 'frequency' => '124.750', 'name' => 'Naxos Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 21, 'callsign' => 'LGMT_APP', 'frequency' => '123.850', 'name' => 'Mitilini Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 21, 'callsign' => 'LGMT_TWR', 'frequency' => '122.100', 'name' => 'Mitilini Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 22, 'callsign' => 'LGML_TWR', 'frequency' => '122.250', 'name' => 'Milos Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 23, 'callsign' => 'LGMK_APP', 'frequency' => '118.750', 'name' => 'Mikonos Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 23, 'callsign' => 'LGMK_ATIS', 'frequency' => '128.850', 'name' => 'Mikonos ATIS' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 23, 'callsign' => 'LGMK_TWR', 'frequency' => '119.870', 'name' => 'Mikonos Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 24, 'callsign' => 'LGMG_TWR', 'frequency' => '123.500', 'name' => 'Megara Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 25, 'callsign' => 'LGLR_APP', 'frequency' => '120.550', 'name' => 'Larissa Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 25, 'callsign' => 'LGLR_TWR', 'frequency' => '122.100', 'name' => 'Larissa Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 26, 'callsign' => 'LGLM_APP', 'frequency' => '128.500', 'name' => 'Limnos Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 26, 'callsign' => 'LGLM_TWR', 'frequency' => '122.100', 'name' => 'Limnos Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 27, 'callsign' => 'LGLE_TWR', 'frequency' => '124.950', 'name' => 'Leros Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 28, 'callsign' => 'LGKZ_TWR', 'frequency' => '118.200', 'name' => 'Filippos Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 29, 'callsign' => 'LGKY_TWR', 'frequency' => '118.870', 'name' => 'Kalymnos Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 30, 'callsign' => 'LGKV_APP', 'frequency' => '124.650', 'name' => 'Kavala Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 30, 'callsign' => 'LGKV_TWR', 'frequency' => '118.400', 'name' => 'Megas Alexandros Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 32, 'callsign' => 'LGKR_APP', 'frequency' => '122.350', 'name' => 'Kerkira Radar' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 32, 'callsign' => 'LGKR_ATIS', 'frequency' => '126.350', 'name' => 'Kerkira ATIS' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 32, 'callsign' => 'LGKR_GND', 'frequency' => '121.700', 'name' => 'Kapodistrias Ground' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 32, 'callsign' => 'LGKR_TWR', 'frequency' => '120.850', 'name' => 'Kerkira Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 33, 'callsign' => 'LGKP_TWR', 'frequency' => '123.200', 'name' => 'Karpathos Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 34, 'callsign' => 'LGKO_APP', 'frequency' => '119.950', 'name' => 'Kos Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 34, 'callsign' => 'LGKO_ATIS', 'frequency' => '126.950', 'name' => 'Ippokratis ATIS' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 34, 'callsign' => 'LGKO_TWR', 'frequency' => '121.050', 'name' => 'Ippokratis Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 34, 'callsign' => 'LGKO_TWR', 'frequency' => '121.050', 'name' => 'Ippokratis Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 35, 'callsign' => 'LGKN_TWR', 'frequency' => '120.900', 'name' => 'Kotroni Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 36, 'callsign' => 'LGKL_APP', 'frequency' => '120.750', 'name' => 'Kalamata Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 36, 'callsign' => 'LGKL_TWR', 'frequency' => '122.100', 'name' => 'Kalamata Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 37, 'callsign' => 'LGKJ_TWR', 'frequency' => '122.900', 'name' => 'Kastelorizo Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 38, 'callsign' => 'LGKF_TWR', 'frequency' => '122.250', 'name' => 'Kefallinia Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 39, 'callsign' => 'LGKC_TWR', 'frequency' => '123.250', 'name' => 'Kithira Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 40, 'callsign' => 'LGKA_TWR', 'frequency' => '118.400', 'name' => 'Aristotelis Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 41, 'callsign' => 'LGIR_APP', 'frequency' => '123.970', 'name' => 'Iraklion Radar' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 41, 'callsign' => 'LGIR_ATIS', 'frequency' => '127.550', 'name' => 'Kazantzakis ATIS' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 41, 'callsign' => 'LGIR_GND', 'frequency' => '121.700', 'name' => 'Kazantzakis Ground' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 41, 'callsign' => 'LGIR_TWR', 'frequency' => '120.850', 'name' => 'Kazantzakis Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 42, 'callsign' => 'LGIO_APP', 'frequency' => '118.600', 'name' => 'Ioannina Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 42, 'callsign' => 'LGIO_TWR', 'frequency' => '132.200', 'name' => 'Ioannina Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 43, 'callsign' => 'LGIK_TWR', 'frequency' => '122.300', 'name' => 'Ikaria Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 44, 'callsign' => 'LGHI_APP', 'frequency' => '124.000', 'name' => 'Chios Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 44, 'callsign' => 'LGHI_TWR', 'frequency' => '122.700', 'name' => 'Chios Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 45, 'callsign' => 'LGEL_TWR', 'frequency' => '120.150', 'name' => 'Elefsis Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 46, 'callsign' => 'LGBL_APP', 'frequency' => '120.350', 'name' => 'Almiros Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 46, 'callsign' => 'LGBL_TWR', 'frequency' => '122.100', 'name' => 'Almiros Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 48, 'callsign' => 'LGAV_APP', 'frequency' => '132.970', 'name' => 'Athens Arrival' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 48, 'callsign' => 'LGAV_ATIS', 'frequency' => '136.120', 'name' => 'Athens ATIS' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 48, 'callsign' => 'LGAV_DEL', 'frequency' => '118.670', 'name' => 'Venizelos Delivery' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 48, 'callsign' => 'LGAV_DEP', 'frequency' => '128.950', 'name' => 'Athens Departure' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 48, 'callsign' => 'LGAV_F_APP', 'frequency' => '121.400', 'name' => 'Athens Director' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 48, 'callsign' => 'LGAV_GND', 'frequency' => '121.750', 'name' => 'Venizelos Ground' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 48, 'callsign' => 'LGAV_TWR', 'frequency' => '118.620', 'name' => 'Venizelos Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 48, 'callsign' => 'LGAV_W_TWR', 'frequency' => '135.270', 'name' => 'Venizelos Tower West' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 49, 'callsign' => 'LGAL_APP', 'frequency' => '123.800', 'name' => 'Alexandroupolis Approach' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 49, 'callsign' => 'LGAL_TWR', 'frequency' => '122.100', 'name' => 'Alexandroupolis Tower' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 50, 'callsign' => 'LGAD_APP', 'frequency' => '120.650', 'name' => 'Andravida Radar' ]);
    	DB::table('frequencies')->insert([ 'airport_id' => 50, 'callsign' => 'LGAD_TWR', 'frequency' => '122.100', 'name' => 'Andravida Tower' ]);
        DB::table('frequencies')->insert([ 'airport_id' => 51, 'callsign' => 'LCPH_GND', 'frequency' => '119.150', 'name' => 'Paphos Ground' ]);
        DB::table('frequencies')->insert([ 'airport_id' => 51, 'callsign' => 'LCPH_TWR', 'frequency' => '119.900', 'name' => 'Paphos Tower' ]);
        DB::table('frequencies')->insert([ 'airport_id' => 51, 'callsign' => 'LCPH_APP', 'frequency' => '120.800', 'name' => 'Paphos Approach' ]);
        DB::table('frequencies')->insert([ 'airport_id' => 52, 'callsign' => 'LCLK_GND', 'frequency' => '119.100', 'name' => 'Larnaca Ground' ]);
        DB::table('frequencies')->insert([ 'airport_id' => 52, 'callsign' => 'LCLK_TWR', 'frequency' => '119.400', 'name' => 'Larnaca Tower' ]);
        DB::table('frequencies')->insert([ 'airport_id' => 52, 'callsign' => 'LCLK_APP', 'frequency' => '121.200', 'name' => 'Larnaca Approach' ]);
        DB::table('frequencies')->insert([ 'airport_id' => 53, 'callsign' => 'LCRA_GND', 'frequency' => '122.100', 'name' => 'Akrotiri Ground' ]);
        DB::table('frequencies')->insert([ 'airport_id' => 53, 'callsign' => 'LCRA_TWR', 'frequency' => '122.400', 'name' => 'Akrotiri Tower' ]);
        DB::table('frequencies')->insert([ 'airport_id' => 53, 'callsign' => 'LCRA_APP', 'frequency' => '123.600', 'name' => 'Akrotiri Approach' ]);
    }
}

<?php

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = 'kecamatan';
        $this->filename = base_path() . '/database/seeds/kecamatan.csv';
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id',
            1 => 'kabupaten_id',
            2 => 'nama',
        ];
        $this->insert_chunk_size = 500;
    }


    public function run()
    {
        DB::disableQueryLog();

        DB::table($this->table)->truncate();

        parent::run();
        DB::setEventDispatcher(new Illuminate\Events\Dispatcher());
    }
}

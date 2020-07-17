<?php

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class DesaSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = 'desa';
        $this->filename = base_path() . '/database/seeds/desa.csv';
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id',
            1 => 'kecamatan_id',
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

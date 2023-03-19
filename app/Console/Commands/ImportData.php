<?php

namespace App\Console\Commands;

use App\Imports\PasienImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:data {--pasien} {--visits}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importing data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pasien = $this->option('pasien');
        $visit = $this->option('visits');

        if ($pasien) {
            $this->importPasien();
        }
        if ($visit) {
            $this->importVisit();
        }
    }

    public function importPasien()
    {
        // $file = 'tes_impor_data_pasien.xlsx';
        $file = 'data_pasien_siap_impor.xlsx';
        Excel::import(new PasienImport, $file);

    }

    public function importVisit()
    {

    }
}

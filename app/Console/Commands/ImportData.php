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
        /*
        Catatan:
        di excel, pastikan tanggalnya format text, bukan format date yang bener malahan. Soalnya format date yang bener malah ga bisa diparsing di sistem, dan ga bisa dimasukin as is ke sistem. Yang paling bener emang diketik pake format Y-m-d dengan cell formatting text. Jadi kebaca by import as is sebagai Y-m-d, bukan format lain.
        */
        Excel::import(new PasienImport, $file);

    }

    public function importVisit()
    {

    }
}

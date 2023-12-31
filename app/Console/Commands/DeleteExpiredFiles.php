<?php

namespace App\Console\Commands;

use App\Models\File;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteExpiredFiles extends Command
{
    protected $signature = 'files:delete-expired';

    protected $description = 'Delete expired files from the database';

    public function handle()
    {

        $expiredFiles = File::where('expire_after', '<=', Carbon::now())->get();

        foreach ($expiredFiles as $file) {

             Storage::disk('public')->delete('uploads/' . $file->name);
            $file->delete();
        }

        $this->info('Expired files have been deleted successfully.');
    }
}

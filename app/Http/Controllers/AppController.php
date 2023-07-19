<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class AppController extends Controller
{
    public function sendFile(Request $request, $fileName)
    {
        $uploadedContent = $request->getContent();

        $file = Storage::disk("public")->put('uploads/' . $fileName, $uploadedContent);

        $filePath = "/storage/uploads/" . $fileName;

        $slug = Str::uuid();

        $fileModel = new File();
        $fileModel->name = $fileName;
        $fileModel->path = $filePath;
        $fileModel->slug = $slug;
        $fileModel->downloads = 0;
        $fileModel->max_downloads = $request->header('max_downloads') ?? 5;
        $fileModel->expire_after = $request->header('expire_after') ? now()->addDays($request->header('expire_after')) : now()->addDays(1);
        $fileModel->save();

        $downloadPageUrl = url("/" . $slug . "/" . $fileName);

        return $downloadPageUrl . "\n";
    }
    public function getFile(Request $request, $fileSlug, $fileName)
    {
        $data['files'] = File::where('slug', $fileSlug)->where('name', $fileName)->firstOrFail();

        if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/^(curl|wget)/i', $_SERVER['HTTP_USER_AGENT'])) {

            return redirect()->to('/download/' . $data['files']->slug);
        } else {

            return Inertia::render('GetFile', $data);
        }
    }

    public function downloadFile($slug)
    {
        $fileModel = File::where('slug', $slug)->firstOrFail();

        if ($fileModel->hasExpired()) {
            return response()->json(['message' => 'File has expired']);
        } else {

            if ($fileModel->downloads >= $fileModel->max_downloads) {

                return response()->json(['message' => 'Maximum download limit reached',]);
            } else {

                $path = public_path('storage/uploads/' . $fileModel->name);
                $headers = [
                    'Cache-Control' => 'no-cache, no-store, must-revalidate',
                    'Pragma' => 'no-cache',
                    'Expires' => '0',
                ];

                $fileModel->downloads++;
                $fileModel->save();

                return response()->download($path, $fileModel->name, $headers);
            }
        }
    }




    public function deleteFile($id)
    {
        $file = File::where('id', $id)->firstOrFail();
        $path = public_path('storage/uploads/' . $file->name);
        if ($path) {
            unlink($path);

            $file->delete();
        }
    }
}

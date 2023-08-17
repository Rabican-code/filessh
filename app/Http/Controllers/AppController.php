<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Mail;
use App\Mail\ForgotPasswordMail;
use Psy\Formatter\Formatter;

class AppController extends Controller
{
    public function sendFile(Request $request, $fileName)
    {
        $uploadedContent = $request->getContent();
        $is_public = true;
        if (auth('api')->check()) {
            $is_public = false;
            $user = auth('api')->user();
            $check = auth('api')->user()->name;
            // dd($check);
            $userFolder = 'user_files/' . $user->id;
            Storage::disk('public')->makeDirectory($userFolder);
            $file = Storage::disk('public')->put($userFolder . '/' . $fileName, $uploadedContent);
            $filePath = "/storage/" . $userFolder . "/" . $fileName;
            $slug = Str::uuid();
            // dd("Uploaded file to private folder");
        } else {
            $file = Storage::disk("public")->put('uploads/' . $fileName, $uploadedContent);
            $filePath = "/storage/uploads/" . $fileName;
            $slug = Str::uuid();
            // dd("Uploaded file to public folder");


        }

        $fileModel = new File();
        $fileModel->name = $fileName;
        $fileModel->path = $filePath;
        $fileModel->is_public = $is_public;
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

    public function Token(Request $request)
    {
        $data['user'] = Auth::user();
        $data['token'] = $data['user']->createToken('token-name')->plainTextToken;
        
        return Inertia::render('Dashboard', $data);
    }

    public function downloadFile($slug)
    {
        $fileModel = File::where('slug', $slug)->firstOrFail();
        $is_public = $fileModel->is_public;

        if (!$is_public) {

            if (auth('api')->user()) {
                $id = auth('api')->user()->id;
            } else {
                return response()->json(['message' => 'User is not logged in!']);
            }

            $check = $id = auth('api')->user();

            if ($fileModel->hasExpired()) {
                return response()->json(['message' => 'File has expired']);
            } else {

                if ($fileModel->downloads >= $fileModel->max_downloads) {

                    return response()->json(['message' => 'Maximum download limit reached',]);
                } else {

                    $path = public_path('storage/user_files/' . $id->id . "/" . $fileModel->name);
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
        } else {

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
    }

    public function deleteFile($id)
    {

        $file = File::where('id', $id)->firstOrFail();
        $is_public = $file->is_public;

        if (!$is_public) {
            $auth_id = auth('api')->user()->id;
            $path = public_path('storage/user_files/' . $auth_id . "/" . $file->name);
        } else {
            $path = public_path('storage/uploads/' . $file->name);
        }


        if ($path) {
            unlink($path);

            $file->delete();
        }
    }

    
}

<?php

use App\Models\Tool;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\FrameworkLibrary;
use App\Models\ProgrammingLanguage;
use App\Models\UserFile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/programming-languages', function () {
    $data = [];
    foreach (ProgrammingLanguage::orderBy('name', 'asc')->get('name') as $programmingLanguage) {
        $data += [count($data) => $programmingLanguage->name];
    }
    return response()->json($data);
});

Route::get('/framework-libraries', function () {
    $data = [];
    foreach (FrameworkLibrary::orderBy('name', 'asc')->get('name') as $frameworkLibrary) {
        $data += [count($data) => $frameworkLibrary->name];
    }
    return response()->json($data);
});

Route::get('/tools', function () {
    $data = [];
    foreach (Tool::orderBy('name', 'asc')->get('name') as $tool) {
        $data += [count($data) => $tool->name];
    }
    return response()->json($data);
});

Route::post('/talent/files', function (Request $request) {
    $userId = base64_decode($request->header("X-User-Id"));
    if (User::find($userId) ?? false) {
        if (UserFile::where('user_id', $userId)->where('file', $request->file('file')->getClientOriginalName())->first() ?? false) {
            return response()->json([
                'success' => false,
                'message' => 'File name already exists'
            ]);
        }
        $request->file('file')->storeAs('dropzone/' . $userId, $request->file('file')->getClientOriginalName());
        UserFile::create([
            'user_id' => $userId,
            'file' => $request->file('file')->getClientOriginalName(),
        ]);
        return response()->json(['success' => true]);
    }
    return response()->json(['success' => false]);
});

Route::get('/talent/files', function (Request $request) {
    $userId = base64_decode($request->header("X-User-Id"));
    if (User::find($userId) ?? false) {
        $files = UserFile::where('user_id', $userId)->get();
        $data = [];
        foreach ($files as $file) {
            $data[count($data)] = [
                'name' => $file->file,
                'size' => Storage::size('dropzone/' . $userId . '/' . $file->file),
                'file_type' => pathinfo(storage_path('dropzone/' . $userId . '/' . $file->file), PATHINFO_EXTENSION),
            ];
        }
        return response()->json($data);
    }
    return response()->json(['success' => false]);
});

Route::delete('/talent/files', function (Request $request) {
    $userId = base64_decode($request->header("X-User-Id"));
    $file = $request->file;
    if (User::find($userId) ?? false) {
        $file = UserFile::where('user_id', $userId)->where('file', $file)->first();
        if ($file) {
            Storage::delete('dropzone/' . $userId . '/' . $file->file);
            $file->delete();
            return response()->json(['success' => true]);
        }
    }
    return response()->json(['success' => false]);
});

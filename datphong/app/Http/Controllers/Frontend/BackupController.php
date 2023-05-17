<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    private $controllerName = 'backup';
    private $token;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        $signKey = 'zendvn_backup';
        $now = Carbon::now()->format('d-m-Y H');
        $this->token = md5($signKey . $now);
    }

    public function createDatabase(Request $request)
    {
        if ($request->token != $this->token) {
            return response()->json([
                'status' => false,
                'msg' => 'Permission deny'
            ]);
        }
        Artisan::call('backup:db');
        return response()->json([
            'status' => true,
            'url' => asset('backups/db.sql')
        ]);
    }

    public function deleteDatabase(Request $request)
    {
        if ($request->token != $this->token) {
            return response()->json([
                'status' => false,
                'msg' => 'Permission deny'
            ]);
        }
        Storage::disk('zvn_storage_backups')->delete('db.sql');
        return response()->json([
            'status' => true,
            'msg' => 'Delete success'
        ]);
    }

    public function createFiles(Request $request)
    {
        if ($request->token != $this->token) {
            return response()->json([
                'status' => false,
                'msg' => 'Permission deny'
            ]);
        }
        Artisan::call('backup:files');
        return response()->json([
            'status' => true,
            'url' => asset('backups/files.zip')
        ]);
    }

    public function deleteFiles(Request $request)
    {
        if ($request->token != $this->token) {
            return response()->json([
                'status' => false,
                'msg' => 'Permission deny'
            ]);
        }
        Storage::disk('zvn_storage_backups')->delete('files.zip');
        return response()->json([
            'status' => true,
            'msg' => 'Delete success'
        ]);
    }
}

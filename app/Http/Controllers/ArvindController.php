<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArvindController extends Controller {

    public function uploadimg(Request $request) {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $destinationPath = 'uploads';
            $filename = $destinationPath . '/' . uniqid() . $file->getClientOriginalName();
            $filedata = $file->move($destinationPath, $filename);
            return json_encode(['location' => url('/') . '/' . $filename]);
        }
    }

}

<?php

namespace App\Http\Controllers\Web;

use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\UUD;
use App\Models\PP;
use App\Models\Perda;
use App\Models\Perbup;
use App\Models\Kepbup;
use App\Models\Library;

class DownloadController extends Controller
{
 	public function download_uud($id) 
    {
        
        $file = UUD::where('id', $id)->firstOrFail();
        $path = public_path(). '/public/uploads/uud/'. $file->file;
        return response()->download($path, $file
            ->original_filename, ['Content-Type' => $file->mime]);
    }

    public function download_pp($id) 
    {
        
        $file = PP::where('id', $id)->firstOrFail();
        $path = public_path(). '/public/uploads/pp/'. $file->file;
        return response()->download($path, $file
            ->original_filename, ['Content-Type' => $file->mime]);

    }

    public function download_perda($id) 
    {
        
        $file = Perda::where('id', $id)->firstOrFail();
        $path = public_path(). '/public/uploads/perda/'. $file->file;
        return response()->download($path, $file
            ->original_filename, ['Content-Type' => $file->mime]);

    }

    public function download_perbup($id) 
    {
        
        $file = Perbup::where('id', $id)->firstOrFail();
        $path = public_path(). '/public/uploads/perbup/'. $file->file;
        return response()->download($path, $file
            ->original_filename, ['Content-Type' => $file->mime]);

    }

    public function download_kepbup($id) 
    {
        
        $file = Kepbup::where('id', $id)->firstOrFail();
        $path = public_path(). '/public/uploads/kepbup/'. $file->file;
        return response()->download($path, $file
            ->original_filename, ['Content-Type' => $file->mime]);
    }

    public function download_regulasi($id) 
    {
        
        $file = Library::where('id', $id)->firstOrFail();
        $path = public_path(). '/public/uploads/library/'. $file->file;
        return response()->download($path, $file
            ->original_filename, ['Content-Type' => $file->mime]);
    }
}

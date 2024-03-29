<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\BeritaImage;
use App\Models\Category;
use App\Models\DashboardCaraosel;
use App\Models\DetailRuangan;
use App\Models\TransaksiDetail;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $DashboardCaraosel = DashboardCaraosel::all();
        $DetailsGallery = DetailRuangan::with(['Gallery'])->get();
        $TransaksiGallery = TransaksiDetail::with(['detail_ruangan'])->orderBy('jumlah', 'desc')->get()->unique('detail_ruangans_id')->values();
        $BeritaImages = Berita::with(['BeritaImage'])->get();
        if (count($TransaksiGallery) < 4) {
            return view('pages.user.Dashboard',[
                'DashboardCaraosel' => $DashboardCaraosel,
                'DetailsGallery'    => $DetailsGallery->take(4),
                'BeritaImages'      => $BeritaImages->take(6),
            ]);
        }else{
            return view('pages.user.Dashboard',[
                'DashboardCaraosel' => $DashboardCaraosel,
                'TransaksiGallery'    => $TransaksiGallery->take(4),
                'BeritaImages'      => $BeritaImages->take(6),
            ]);
        }
    }

    public function semuaberita()
    {
        $datas = Berita::with(['BeritaImage'])->paginate(15);
        return view('pages.user.SemuaBerita')->with('datas',$datas);
    }

    public function berita(Berita $berita)
    {
        $slug = Berita::findOrFail($berita->id);
        $category = Category::wherehas('Berita', function($q) use($slug){
            $q->where('categories_id', '=', $slug->categories_id);
        })->first();
        $image = BeritaImage::where('berita_id', $slug->id)->get();
        return view('pages.user.Berita',[
            'slug' => $slug,
            'category' => $category,
            'image' => $image
        ]);
    }

    public function Laboratorium(Request $request)
    {
        // $time_start = microtime(true);
        // algoritma sequential search
        // $lab =  DetailRuangan::with(['Gallery'])->get();
        $lab =  DetailRuangan::with(['Gallery'])->orderBy('title', 'ASC')->get();
        // dd($lab);
        // echo 'Total execution time in seconds: ' . round((microtime(true) - $time_start), 3). ' ms';

        // $searchLive = DetailRuangan::with(['Gallery'])->where('title' , 'LIKE', $request->keywords)->get();
        return view('pages.user.Laboratorium',[
            'lab'           => $lab,
            // 'searchLive'   => $searchLive
        ]);
    }

    public function whereAllLab(Request $request)
    {
        $data =  DetailRuangan::with(['Gallery'])
        ->where('title', 'LIKE', "%$request->keywords%")
        ->orWhere('details', 'LIKE', "%$request->keywords%")
        ->orderBy('title', 'ASC')->get();
        return response()->json($data);
    }

    public function visimisi()
    {
        $data = VisiMisi::First();
        return view('pages.user.VisiMisi',[
            'data'  => $data
        ]);
    }

}

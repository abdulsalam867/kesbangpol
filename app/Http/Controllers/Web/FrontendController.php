<?php

namespace App\Http\Controllers\Web;

use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Tags;
use App\Models\Slides;
use App\Models\Quotes;
use App\Models\Informasi;
use App\Models\Pengaduan;
use App\Models\Pegawai;
use App\Models\VisiMisi;
use App\Models\Tupoksi;
use App\Models\TupoksiBagian;
use App\Models\Renstra;
use App\Models\UUD;
use App\Models\PP;
use App\Models\Perda;
use App\Models\Perbup;
use App\Models\Kepbup;
use App\Models\Penelitian;
use App\Models\Ormas;
use App\Models\Parpol;
use App\Models\Keterangan;
use App\Models\Albums;
use App\Models\Photos;
use App\Models\Library;
use App\Models\Subscribes;


class FrontendController extends Controller
{
    public function index(Posts $posts)
    {
        $widget_category    = Category::all();
        $slideImage         = Slides::all();
        $quotes_widget      = Quotes::inRandomOrder()->get();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::latest()->take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

    	$data = $posts->latest()->paginate(4);
    	return view('blog', compact('data', 'slideImage','quotes_widget', 'widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function isi_blog($slug)
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Posts::where('slug', $slug)->get();
        return view('blog.isi_post', compact('data','widget_category','widget_tags','widget_informasi','footer_post')); 
    }

    public function list_post()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Posts::latest()->paginate(4);
    	return view('blog.list_post', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_category(category $category)
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = $category->posts()->paginate(4);
        return view('blog.list_post', compact('data', 'widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function cari(Request $request)
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Posts::where('title', $request->cari)->orWhere('title', 'like', '%'.$request->cari.'%')->paginate(4);
        return view('blog.list_post', compact('data', 'widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_tags(tags $tags)
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = $tags->posts()->paginate(4);
        return view('blog.list_post', compact('data', 'widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_informasi(informasi $informasi)
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Informasi::latest()->paginate(4);
        return view('blog.list_informasi', compact('data', 'widget_category','widget_tags','widget_informasi','footer_post'));
    }


    public function isi_informasi($slug)
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Informasi::where('slug', $slug)->get();
        return view('blog.isi_informasi', compact('data','widget_category','widget_tags','widget_informasi','footer_post')); 
    }


    public function list_pegawai()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Pegawai::all();
        return view('blog.list_pegawai', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_visimisi()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = VisiMisi::all();
        return view('blog.list_visimisi', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_tupoksi()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Tupoksi::all();
        return view('blog.list_tupoksi', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_bagian()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = TupoksiBagian::all();
        return view('blog.list_bagian', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_renstra()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Renstra::all();
        return view('blog.list_renstra', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_uud()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = UUD::all();
        return view('blog.list_uud', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_pp()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = PP::all();
        return view('blog.list_pp', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_perda()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Perda::all();
        return view('blog.list_perda', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_perbup()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Perbup::all();
        return view('blog.list_perbup', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_kepbup()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Kepbup::all();
        return view('blog.list_kepbup', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_penelitian()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Penelitian::all();
        return view('blog.list_penelitian', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_ormas()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Ormas::all();
        return view('blog.list_ormas', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_parpol()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Parpol::all();
        return view('blog.list_parpol', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_keterangan()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Keterangan::all();
        return view('blog.list_keterangan', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function list_album()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Albums::all();
        return view('blog.list_album', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function show_album($id)
    {
        $widget_category    = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();
        $album_widget       = Albums::where('id', $id)->get();

        $data = Photos::where('albums_id', $id)->paginate(12);
        return view('blog.show_album', compact('data','widget_category','widget_tags','widget_informasi','footer_post','album_widget'));
    }

    public function list_regulasi()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Library::all();
        return view('blog.list_regulasi', compact('data','widget_category','widget_tags','widget_informasi','footer_post'));
    }

    public function form_pengaduan()
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $data = Pengaduan::all();
        return view('blog.formPengaduan', compact('data','widget_category','widget_tags','widget_informasi','footer_post')); 
    }

    public function post_pengaduan(Request $request)
    {
        $widget_category = Category::all();
        $widget_tags        = Tags::all();
        $widget_informasi   = Informasi::take(4)->get();
        $footer_post        = Posts::inRandomOrder()->take(2)->get();

        $this->validate($request, [
            'title'     => 'required',
            'email'     => 'required',
            'content'   => 'required',
            'file'      => 'required'
        ]);

        $filenameWithExtension = $request->file('file')->getClientOriginalName();

        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        $extension = $request->file('file')->getClientOriginalExtension();

        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        $path = $request->file('file')->storeAs('public/pengaduan', $filenameToStore);

        
        $pengaduan = new Pengaduan();
        $pengaduan->title = $request->input('title');
        $pengaduan->email = $request->input('email');
        $pengaduan->content = $request->input('content');
        $pengaduan->file = $filenameToStore;
        $pengaduan->save();

        return redirect()->back();
    }

}

<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\Web\FrontendController@index')->name('home');

Route::get('artikel/{slug}', 'App\Http\Controllers\Web\FrontendController@isi_blog')->name('blog.isi');
Route::get('data-artikel', 'App\Http\Controllers\Web\FrontendController@list_post')->name('blog.list');

Route::get('data-category/{category}', 'App\Http\Controllers\Web\FrontendController@list_category')->name('blog.category');

Route::get('data-tags/{tags}', 'App\Http\Controllers\Web\FrontendController@list_tags')->name('blog.tags');

Route::get('data-informasi', 'App\Http\Controllers\Web\FrontendController@list_informasi')->name('blog.informasi');
Route::get('informasi/{slug}', 'App\Http\Controllers\Web\FrontendController@isi_informasi')->name('blog.isi-informasi');

Route::get('form-pengaduan', 'App\Http\Controllers\Web\FrontendController@form_pengaduan')->name('blog.formPengaduan');
Route::post('post-pengaduan', 'App\Http\Controllers\Web\FrontendController@post_pengaduan')->name('blog.postPengaduan');

Route::get('data-pegawai', 'App\Http\Controllers\Web\FrontendController@list_pegawai')->name('blog.pegawai');
Route::get('visi-misi', 'App\Http\Controllers\Web\FrontendController@list_visimisi')->name('blog.visimisi');
Route::get('tupoksi-kesbangpol', 'App\Http\Controllers\Web\FrontendController@list_tupoksi')->name('blog.tupoksi');
Route::get('tupoksi-bagian-kesbangpol', 'App\Http\Controllers\Web\FrontendController@list_bagian')->name('blog.tupoksibagian');
Route::get('renstra-kesbangpol', 'App\Http\Controllers\Web\FrontendController@list_renstra')->name('blog.renstra');

Route::get('regulasi/undang-undang', 'App\Http\Controllers\Web\FrontendController@list_uud')->name('blog.uud');
Route::get('regulasi/peraturan-pemerintah', 'App\Http\Controllers\Web\FrontendController@list_pp')->name('blog.pp');
Route::get('regulasi/peraturan-daerah', 'App\Http\Controllers\Web\FrontendController@list_perda')->name('blog.perda');
Route::get('regulasi/peraturan-bupati', 'App\Http\Controllers\Web\FrontendController@list_perbup')->name('blog.perbup');
Route::get('regulasi/keputusan-bupati', 'App\Http\Controllers\Web\FrontendController@list_kepbup')->name('blog.kepbup');

Route::get('surat-rekomendasi-penelitian', 'App\Http\Controllers\Web\FrontendController@list_penelitian')->name('blog.penelitian');
Route::get('data-ormas', 'App\Http\Controllers\Web\FrontendController@list_ormas')->name('blog.ormas');
Route::get('data-parpol', 'App\Http\Controllers\Web\FrontendController@list_parpol')->name('blog.parpol');
Route::get('keterangan-baik', 'App\Http\Controllers\Web\FrontendController@list_keterangan')->name('blog.keterangan');

Route::get('album-galleri', 'App\Http\Controllers\Web\FrontendController@list_album')->name('blog.album');
Route::get('gallery-photo/{id}', 'App\Http\Controllers\Web\FrontendController@show_album')->name('blog.photo');

Route::get('regulasi-lainnya', 'App\Http\Controllers\Web\FrontendController@list_regulasi')->name('blog.library');

Route::get('cari', 'App\Http\Controllers\Web\FrontendController@cari')->name('blog.cari');

Route::post('post-subscribe', 'App\Http\Controllers\SubscribeController@store')->name('blog.postSubscribes');

/* Download */
Route::get('/download-uud/{id}', 'App\Http\Controllers\Web\DownloadController@download_uud')->name('download.uud');
Route::get('/download-pp/{id}', 'App\Http\Controllers\Web\DownloadController@download_pp')->name('download.pp');
Route::get('/download-perda/{id}', 'App\Http\Controllers\Web\DownloadController@download_perda')->name('download.perda');
Route::get('/download-perbup/{id}', 'App\Http\Controllers\Web\DownloadController@download_perbup')->name('download.perbup');
Route::get('/download-kepbup/{id}', 'App\Http\Controllers\Web\DownloadController@download_kepbup')->name('download.kepbup');
Route::get('/download-regulasi/{id}', 'App\Http\Controllers\Web\DownloadController@download_regulasi')->name('download.regulasi');
/* Download */


Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'CheckTipe:1']],function(){
	Route::resource('category','App\Http\Controllers\CategoryController');
	Route::resource('tags','App\Http\Controllers\TagController');
	Route::resource('user', 'App\Http\Controllers\UserController');
	Route::get('list-subscribe', 'App\Http\Controllers\SubscribeController@index')->name('blog.subscribes');
});

Route::group(['middleware' => ['auth', 'CheckTipe:1,0']],function(){
	Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

	Route::get('pegawai', 'App\Http\Controllers\PegawaiController@index')->name('pegawai');
	Route::get('pegawai/create', 'App\Http\Controllers\PegawaiController@create')->name('pegawai.create');
	Route::post('pegawai/upload', 'App\Http\Controllers\PegawaiController@store')->name('pegawai.store');
	Route::get('pegawai/edit/{id}', 'App\Http\Controllers\PegawaiController@edit')->name('pegawai.edit');
	Route::put('pegawai/update/{id}', 'App\Http\Controllers\PegawaiController@update')->name('pegawai.update');
	Route::delete('pegawai/hapus/{id}', 'App\Http\Controllers\PegawaiController@destroy')->name('pegawai.destroy');

	Route::resource('visimisi', 'App\Http\Controllers\VisiMisiController');
	Route::resource('tupoksi', 'App\Http\Controllers\TupoksiController');

	Route::get('tupoksi-bagian', 'App\Http\Controllers\TupoksiBagianController@index')->name('tupoksi.bagian');
	Route::get('tupoksi-bagian/create', 'App\Http\Controllers\TupoksiBagianController@create')->name('tupoksibagian.create');
	Route::post('tupoksi-bagian/post', 'App\Http\Controllers\TupoksiBagianController@store')->name('tupoksibagian.store');
	Route::get('tupoksi-bagian/edit/{id}', 'App\Http\Controllers\TupoksiBagianController@edit')->name('tupoksibagian.edit');
	Route::put('tupoksi-bagian/update/{id}', 'App\Http\Controllers\TupoksiBagianController@update')->name('tupoksibagian.update');
	Route::delete('hapus/{id}', 'App\Http\Controllers\TupoksiBagianController@destroy')->name('tupoksibagian.destroy');

	Route::resource('renstra', 'App\Http\Controllers\RenstraController');
	Route::resource('uud', 'App\Http\Controllers\UUDController');
	Route::resource('pp', 'App\Http\Controllers\PPController');
	Route::resource('perda', 'App\Http\Controllers\PerdaController');
	Route::resource('perbup', 'App\Http\Controllers\PerbupController');
	Route::resource('kepbup', 'App\Http\Controllers\KepbupController');
	Route::resource('library', 'App\Http\Controllers\LibraryController');
	Route::resource('penelitian', 'App\Http\Controllers\PenelitianController');

	Route::resource('ormas', 'App\Http\Controllers\OrmasController');
	Route::resource('parpol', 'App\Http\Controllers\ParpolController');
	Route::resource('keterangan', 'App\Http\Controllers\KeteranganController');
	Route::resource('quotes', 'App\Http\Controllers\QuoteController');
	Route::resource('informasi', 'App\Http\Controllers\InformasiController');

	Route::get('post','App\Http\Controllers\PostController@index')->name('post.index');
	Route::get('post/create','App\Http\Controllers\PostController@create')->name('post.create');
	Route::post('post/proses_post','App\Http\Controllers\PostController@store')->name('post.store');
	Route::get('post/edit/{id}','App\Http\Controllers\PostController@edit')->name('post.edit');
	Route::put('artikel/update/{id}','App\Http\Controllers\PostController@update')->name('post.update');
	Route::delete('artikel/delete/{id}','App\Http\Controllers\PostController@destroy')->name('post.destroy');
	Route::get('artikel/show/{id}', 'App\Http\Controllers\PostController@show')->name('post.show');

	Route::resource('album','App\Http\Controllers\AlbumController');
	Route::get('album/{id}','App\Http\Controllers\AlbumController@show')->name('album-show');
	Route::delete('album/hapus/{id}','App\Http\Controllers\AlbumController@destroy')->name('album-destroy');

	Route::get('/photos/create/{albumId}', 'App\Http\Controllers\PhotoController@create')->name('photo-create');
	Route::delete('photos/hapus/{id}','App\Http\Controllers\PhotoController@destroy')->name('photo-destroy');

	Route::post('upload', 'App\Http\Controllers\PhotoController@store')->name('Upload');

	Route::resource('slideImages', 'App\Http\Controllers\SlideController');

	Route::resource('pengaduan', 'App\Http\Controllers\PengaduanController');

	Route::get('changePassword', 'App\Http\Controllers\UserController@changePasswordForm')->name('changePassword');
	Route::put('postChangePassword', 'App\Http\Controllers\UserController@postChangePassword')->name('postChangePassword');

	/* Download */
	Route::get('/download-pengaduan/{id}', 'App\Http\Controllers\PengaduanController@downloadpengaduan')->name('download.pengaduan');
	/* Download */

});
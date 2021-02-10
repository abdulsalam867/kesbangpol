<?php
use App\Models\Pegawai;
use App\Models\Posts;
use App\Models\Informasi;
use App\Models\Pengaduan;

function totalPegawai()
{
	return Pegawai::count();
}

function totalPosts()
{
	return Posts::count();
}

function totalInformasi()
{
	return Informasi::count();
}

function totalPengaduan()
{
	return Pengaduan::count();
}
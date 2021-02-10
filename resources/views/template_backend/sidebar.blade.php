<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{url('dashboard')}}" class="brand-link">
    <img src="{{asset('images/logolebak.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Kesbangpol Lebak</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="{{url('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-id-card-alt"></i>
              <p>
                Profil
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('pegawai')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-sm text-primary"></i>
                  <p>Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('visimisi.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-sm text-warning"></i>
                  <p>Visi Misi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('tupoksi.index')}}" class= "nav-link">
                  <i class="far fa-circle nav-icon text-sm text-danger"></i>
                  <p>Tupoksi Kesbangpol</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('tupoksi.bagian')}}" class= "nav-link">
                  <i class="far fa-circle nav-icon text-sm text-info"></i>
                  <p>Tupoksi Bagian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('renstra.index')}}" class= "nav-link">
                  <i class="far fa-circle nav-icon text-sm text-success"></i>
                  <p>Renstra</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Produk Hukum
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('uud.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-sm text-success"></i>
                  <p>Undang-Undang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pp.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-sm text-warning"></i>
                  <p>Peraturan Pemerintah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('perda.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-sm text-danger"></i>
                  <p>Peraturan Daerah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('perbup.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-sm text-primary"></i>
                  <p>Peraturan Bupati</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('kepbup.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-sm text-maroon"></i>
                  <p>Keputusan Bupati</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('library.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-sm text-purple"></i>
                  <p>Regulasi Lainnya</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-headset"></i>
              <p>
                Pelayanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('penelitian.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-sm text-primary"></i>
                  <p>Penelitian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ormas.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-sm text-warning"></i>
                  <p>Organisasi Masyarakat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('parpol.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-sm text-success"></i>
                  <p>Partai Politik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('keterangan.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-sm text-danger"></i>
                  <p>Keterangan Khianat</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('post.index')}}" class="nav-link">
              <i class="fas fa-pencil-alt nav-icon"></i>
              <p>Artikel</p>
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-photo-video"></i>
              <p>
                Multimedia
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('album.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-sm text-danger"></i>
                  <p>
                    Gallery
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('slideImages.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-sm text-success"></i>
                  <p>
                    Slide Images
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('pengaduan.index')}}" class="nav-link">
              <i class="nav-icon fas fa-mail-bulk"></i>
              <p>
                Pengaduan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('informasi.index')}}" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Informasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('quotes.index')}}" class="nav-link">
              <i class="nav-icon fas fa-comment-dots"></i>
              <p>
                Catatan Bijak
              </p>
            </a>
          </li>
          @if(auth()->user()->tipe == '1')
          <li class="nav-header">BASIC DATA</li>
          <li class="nav-item">
            <a href="{{route('category.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('tags.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Tags
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
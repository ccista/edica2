@extends('admin.layouts.main')
@section('content')
<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Главная</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>                    
                  </ol>
                </nav>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            
            {{-- <div class="row">              
              <div class="col-lg-3 col-6">              
                <div class="small-box text-bg-primary">
                  <div class="inner">
                    <h3>{{ $users }}</h3>
                    <p>Пользователи</p>
                  </div>
                  <i class="bi bi-person-bounding-box small-box-icon"></i>
                  <a
                    href="{{ route('admin.users.index') }}"
                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                  >
                    Подробнее <i class="bi bi-link-45deg"></i>
                  </a>
                </div>                
              </div>              
              
              <div class="col-lg-3 col-6">                
                <div class="small-box text-bg-success">
                  <div class="inner">
                    <h3>{{ $categories }}</h3>
                    <p>Категории</p>
                  </div>
                  <i class="bi bi-amazon small-box-icon"></i>
                  <a
                    href="{{ route('admin.categories.index') }}"
                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                  >
                    Подробнее <i class="bi bi-link-45deg"></i>
                  </a>
                </div>                
              </div>
              
              <div class="col-lg-3 col-6">
                
                <div class="small-box text-bg-warning">
                  <div class="inner">
                    <h3>{{ $posts }}</h3>
                    <p>Записей</p>
                  </div>
                  <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"
                    ></path>
                  </svg>
                  <a
                    href="{{ route('admin.posts.index') }}"
                    class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover"
                  >
                    Подробнее <i class="bi bi-link-45deg"></i>
                  </a>
                </div>                
              </div>
              
              <div class="col-lg-3 col-6">                
                <div class="small-box text-bg-danger">
                  <div class="inner">
                    <h3>{{ $tags }}</h3>

                    <p>Теги</p>
                  </div>
                  <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" > <path clip-rule="evenodd" fill-rule="evenodd" d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z" ></path> <path clip-rule="evenodd" fill-rule="evenodd" d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z" ></path> </svg>
                  <a
                    href="{{ route('admin.tags.index') }}"
                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                  >
                    Подробнее <i class="bi bi-link-45deg"></i>
                  </a>
                </div>                
              </div>              
            </div> --}}
            <!--end::Row-->
            
            <!-- /.row (main row) -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
@endsection
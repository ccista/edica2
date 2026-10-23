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
                <h1 class="mb-0 fs-3">Добавить запись</h1>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
              </div>
              
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">
                  <a href="{{ route('admin.posts.index') }}" class="btn btn-primary mb-2">&larr; Назад</a>
                </div>
                <div class="col-md-6">
                  <div class="card mb-4">
                    <div class="card-header justify-content-between d-flex align-items-center">
                      <h3 class="card-title">
                        <strong>Запись: </strong>{{ $post->title }}
                      </h3>
                      <div class="actions">
                        <a href="{{ route('admin.posts.edit', $post->id) }}"><svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="ionicon"><path d="M364.13 125.25 87 403l-23 45 44.99-23 277.76-277.13zM420.69 68.69l-22.62 22.62 22.62 22.63 22.62-22.63a16 16 0 0 0 0-22.62h0a16 16 0 0 0-22.62 0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32px"/></svg></a>
                        <form action="{{ route('admin.posts.delete', $post->id) }}" method="POST" style="display: inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">
                            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="ionicon"><path d="m112 112 20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32px"/><path d="M80 112h352" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32px"/><path d="M192 112V72h0a23.93 23.93 0 0 1 24-24h80a23.93 23.93 0 0 1 24 24h0v40M256 176v224M184 176l8 224M328 176l-8 224" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32px"/></svg>
                          </button>
                        </form>
                      </div>                      
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <tbody>                          
                            <tr>
                              <td><strong>ID</strong></td>
                              <td>{{ $post->id }}</td>                       
                            </tr>
                            <tr>
                              <td><strong>Название</strong></td>
                              <td>{{ $post->title }}</td>
                              
                            </tr>
                            <tr>
                              <td><strong>Категория</strong></td>
                              <td>{{ $post->category?->title }}</td>
                            </tr>
                            <tr>
                              <td><strong>Контент</strong></td>
                              <td>{{ $post->content }}</td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->                    
                  </div>
                  <!-- /.card -->                
                </div>
                <!-- /.col -->            
            </div>            
            <!--end::Row-->

            
            
            <!-- /.row (main row) -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
@endsection
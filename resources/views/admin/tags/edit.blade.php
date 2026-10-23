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
                <h1 class="mb-0 fs-3">Редактировать Тег</h1>
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
                  <a href="{{ route('admin.tags.index') }}" class="btn btn-primary mb-2">&larr; Назад</a>
                </div>                
            </div>            
            <!--end::Row-->

            <div class="row">
              <div class="col-12">
                <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST" class="w-25">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                    <label for="title" class="form-label">Название тега</label>
                    <input type="text" name="title" 
                            class="form-control" id="title" 
                            placeholder="Введите название тега" value="{{ $tag->title }}">
                  </div>
                  @error('title')
                    <div class="text-danger mb-3">{{ $message }}</div>
                  @enderror
                  <button type="submit" class="btn btn-primary">Обновить</button>
                </form>
              </div>
            </div>
            
            <!-- /.row (main row) -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
@endsection
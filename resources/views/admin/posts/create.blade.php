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
            </div>            
            <!--end::Row-->

            <div class="row">
              <div class="col-12">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              </div>

              <div class="col-12">
                <form 
                  action="{{ route('admin.posts.store') }}" 
                  method="POST" 
                  class="w-50" 
                  enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                      <label class="form-label" for="select-default">Категория</label>
                      <select class="form-select" id="select-default" name="category_id">
                        <option selected="">Выберите категорию</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                              {{ $category->id == old('category_id') ? 'selected' : '' }}
                              >{{ $category->title }}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="mb-3">
                    <label for="title" class="form-label">Название записи</label>
                    <input type="text" name="title" class="form-control" id="title" 
                      placeholder="Введите название записи"
                      value="{{ old('title') }}"
                      >
                  </div>
                  @error('title')
                    <div class="text-danger mb-3">{{ $message }}</div>
                  @enderror
                  <div class="mb-3">
                    <label for="content" class="form-label">Содержание записи</label>
                    <textarea class="form-control" id="content" name="content" placeholder="Введите содержание записи" style="height: 6rem">{{ old('content') }}</textarea>
                    @error('content')
                      <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                  </div>
                  <!-- === Файл === -->
                  <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                      <div class="card-title">Изображения</div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="main_image">
                        <label class="input-group-text">Главное изображение</label>
                    </div>
                    @error('main_image')
                      <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="preview_image">
                        <label class="input-group-text">Превью</label>
                    </div>
                    @error('preview_image')
                      <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                </div>

                  <div class="mb-3">
                      <label class="form-label" for="select-multiple">
                          Теги:
                      </label>

                      <select
                          name="tag_ids[]"
                          class="form-select"
                          id="select-multiple"
                          multiple
                          placeholder="Начните вводить название тега..."
                      >
                          @foreach($tags as $tag)
                              <option
                                  value="{{ $tag->id }}"
                                  {{ in_array($tag->id, old('tag_ids', [])) ? 'selected' : '' }}
                              >
                                  {{ $tag->title }}
                              </option>
                          @endforeach
                      </select>
                  </div>
                  @error('tag_ids')
                    <div class="text-danger mb-3">{{ $message }}</div>
                  @enderror

                  <button type="submit" class="btn btn-primary">Создать</button>
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
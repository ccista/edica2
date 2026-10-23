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
                <h1 class="mb-0 fs-3">Редактировать запись</h1>
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
                <form action="{{ route('admin.posts.update', $post->id) }}" 
                    method="POST"
                    class="w-25"
                    enctype="multipart/form-data"
                    >
                  @csrf
                  @method('PUT')
                  
                  <div class="mb-3">
                      <label class="form-label" for="select-default">Категория</label>
                      <select class="form-select" id="select-default" name="category_id">
                        <option selected="">Выберите категорию</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                              {{ $category->id == $post->category_id ? 'selected' : '' }}
                              >{{ $category->title }}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="mb-3">
                    <label for="title" class="form-label">Название записи</label>
                    <input type="text" name="title" class="form-control" id="title" 
                      placeholder="Введите название записи"
                      value="{{ $post->title }}"
                      >
                  </div>
                  @error('title')
                    <div class="text-danger mb-3">{{ $message }}</div>
                  @enderror
                  <div class="mb-3">
                    <label for="content" class="form-label">Содержание записи</label>
                    <textarea class="form-control" 
                      id="content" name="content" 
                      placeholder="Введите содержание записи"
                      style="height: 6rem"                      
                      >
                      {{ $post->content }}
                    </textarea>
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
                        <div class="w-25">                     
                          <img src="{{ asset('storage/' . $post->main_image) }}" 
                              alt="main_image"
                              class="w-50">
                        </div>
                    </div>
                    
                    
                    <!-- === === -->
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="preview_image">
                        <label class="input-group-text">Превью</label>                        
                        <div class="w-25">
                          <img src="{{ asset('storage/' . $post->preview_image) }}" 
                              alt="preview_image"
                              class="w-50">
                        </div>
                    </div>                    
                </div>

                  <div class="mb-3">
                      <label class="form-label" for="select-multiple">Теги:</label>
                      <select name="tag_ids[]" class="form-select" id="select-multiple" multiple="" size="3">
                        @foreach($tags as $tag)
                          <option value="{{ $tag->id }}"
                            {{ $post->tags->pluck('id')->contains($tag->id) ? 'selected' : '' }}
                          >{{ $tag->title }}</option>
                        @endforeach
                      </select>
                  </div>

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
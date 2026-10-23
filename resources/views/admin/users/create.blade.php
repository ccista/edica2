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
                <h1 class="mb-0 fs-3">Добавить пользователя</h1>
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
                  <a href="{{ route('admin.users.index') }}" class="btn btn-primary mb-2">&larr; Назад</a>
                </div>                
            </div>            
            <!--end::Row-->

            <div class="row">
              <div class="col-12">
                <form action="{{ route('admin.users.store') }}" method="POST" class="w-25">
                  @csrf

                  <!-- === Name === -->
                  <div class="mb-3">
                    <label for="name" class="form-label">Название пользователя</label>
                    <input type="text" name="name" class="form-control" id="name" 
                      placeholder="Введите название пользователя"
                      value="{{ old('name') }}"
                      >
                  </div>
                  @error('name')
                    <div class="text-danger mb-3">{{ $message }}</div>
                  @enderror
                  
                  <!-- === Email === -->
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" 
                      placeholder="Введите email пользователя"
                      value="{{ old('email') }}"
                      >
                  </div>
                  @error('email')
                    <div class="text-danger mb-3">{{ $message }}</div>
                  @enderror

                  <!-- === Password === -->
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" 
                      id="password"
                      placeholder="Введите пароль пользователя"
                      value="{{ old('password') }}"
                      >
                  </div>
                  @error('password')
                    <div class="text-danger mb-3">{{ $message }}</div>
                  @enderror

                  <!-- === Роль === -->
                  <div class="mb-3">
                    <label for="role" class="form-label">Роль</label>
                    <select name="role" id="role" class="form-select">
                      <option value="0" {{ old('role') == 0 ? 'selected' : '' }}>Пользователь</option>
                      <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>Администратор</option>
                    </select>
                  </div>

                  <button type="submit" class="btn btn-primary">Создать</button>
                </form>
              </div>
            </div>
            
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
@endsection
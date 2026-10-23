<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{ route('admin.index') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('./assets/images/android.png') }}"
              alt="Админка Блога"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2" aria-label="Main navigation">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              data-accordion="false"
              id="navigation"
            >
              <!-- === СТРАНИЦА ИКОНОК http://icons.getbootstrap.com/ === -->
              <li class="nav-item">
                <a href="{{ route('admin.categories.index')}}" class="nav-link">
                  <i class="bi bi-amazon"></i>
                  <p>Категории</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.tags.index')}}" class="nav-link">
                  <i class="bi bi-bookmark-check"></i>
                  <p>Теги</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.posts.index')}}" class="nav-link">
                  <i class="bi bi-file-post-fill"></i>
                  <p>Записи</p>
                </a>
              </li>
              <li class="nav-item">
                {{-- <a href="{{ route('admin.users.index')}}" class="nav-link">
                  <i class="bi bi-person-bounding-box"></i>
                  <p>Пользователи</p>
                </a> --}}
              </li>

            </ul>
          </nav>            

        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
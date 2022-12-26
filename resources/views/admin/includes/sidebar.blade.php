      <!-- ======= Sidebar ======= -->
      <aside id="sidebar" class="sidebar">

          <ul class="sidebar-nav" id="sidebar-nav">
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-menu-button-wide"></i><span>Trang chủ</span><i
                          class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="{{ route('categories.index') }}">
                              <i class="bi bi-circle"></i><span>Quản lí Phân Loại</span>
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('products.index') }}">
                              <i class="bi bi-circle"></i><span>Quản Lí Sản Phẩm</span>
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('customers.index') }}">
                              <i class="bi bi-circle"></i><span>Quản Lí Khách Hàng</span>
                          </a>
                      </li>
                  </ul>
              </li>
          </ul>
      </aside>

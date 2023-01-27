@extends('admin.layouts.master')
<main id="main" class="main">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Loại sản Phẩm</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="" class="card-link">Hiện có : {{ $categories }} Loại sản Phẩm</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Sản Phẩm</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="">Hiện có : {{ $products }} Sản Phẩm</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Khách Hàng</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="">Hiện có : {{ $customers }} Khách Hàng</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Đơn Hàng</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="">Hiện có : {{ $orders }} Đơn Hàng</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
              <div class="col-lg-6">
      
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Top khách hàng</h5>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Address</th>
                          <th scope="col">Số đơn hàng đã mua</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ( $topcustomers as $key => $topcustomer )
                        <tr>
                            <td>{{ $topcustomer->name }}</td>
                            <td>{{ $topcustomer->address }}</td>
                            <td>{{ $topcustomer->total }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <!-- End Default Table Example -->
                  </div>
                </div>
      
              </div>
      
              <div class="col-lg-6">
      
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Table with stripped rows</h5>
      
                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Position</th>
                          <th scope="col">Age</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Brandon Jacob</td>
                          <td>Designer</td>
                          <td>28</td>
                        </tr>
                        <tr>
                          <td>Bridie Kessler</td>
                          <td>Developer</td>
                          <td>35</td>
                        </tr>
                        <tr>
                          <td>Ashleigh Langosh</td>
                          <td>Finance</td>
                          <td>45</td>
                        </tr>
                       
                      </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
      
                  </div>
                </div>
      
      
              </div>
            </div>
          </section>
    </div>
</main>
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Your work has been saved',
    showConfirmButton: false,
    timer: 1500
    })
</script> --}}
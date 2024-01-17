@extends('index')

@section('titletopbar')
    Home page
@endsection

@section('content')
<section class="section dashboard">
    <div class="row d-flex justify-content-around">
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Information Product -->
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card sales-card">
            
                    <div class="card-body">
                        <h5 class="card-title">Solde <span>| GAZ</span></h5>
            
                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-fuel-pump"></i>
                        </div>
                        <div class="ps-3">
                            @foreach ($countgazs as $countgaz)
                                @if ($countgaz->gaz == null)
                                    <h6>0</h6>
                                @else
                                    <h6>{{ $countgaz->gaz }}</h6>
                                @endif
                                @if ($countgaz->gaz <= 20)
                                    <span class="text-danger small pt-1 fw-bold">Red Zone</span> |<span class="text-danger small pt-2 ps-1">Increase</span>
                                @else 
                                    <span class="text-success small pt-1 fw-bold">Good stock</span>
                                @endif
                            @endforeach
                                        
                        </div>
                        </div>
                    </div>
            
                    </div>
                </div>
                <!-- End of information Product -->
        
                <!-- Information Product -->
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card sales-card">
            
                    <div class="card-body">
                        <h5 class="card-title">Solde <span>| Lubrifiant</span></h5>
            
                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-droplet"></i>
                        </div>
                        <div class="ps-3">
                            @foreach ($countlubrifs as $countlubrif)
                                @if ($countlubrif->lubrif == null)
                                    <h6>0</h6>
                                @else
                                    <h6>{{ $countlubrif->lubrif }}</h6>
                                @endif
                                @if ($countlubrif->lubrif <= 20)
                                    <span class="text-danger small pt-1 fw-bold">Red Zone</span> | <span class="text-danger small pt-2 ps-1">Increase</span>
                                @else 
                                    <span class="text-success small pt-1 fw-bold">Good stock</span>
                                @endif
                            @endforeach
                                        
                        </div>
                        </div>
                    </div>
            
                    </div>
                </div>
                <!-- End of information Product -->

                <!-- Information Product -->
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card sales-card">
            
                    <div class="card-body">
                        <h5 class="card-title">Solde <span>| Petrole</span></h5>
            
                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-file-ppt-fill"></i>
                        </div>
                        <div class="ps-3">
                            @foreach ($countpetrols as $countpetrol)
                                @if ($countpetrol->petrol == null)
                                    <h6>0</h6>
                                @else
                                    <h6>{{ $countpetrol->petrol }}</h6>
                                @endif
                                
                                @if ($countpetrol->petrol <= 50)
                                    <span class="text-danger small pt-1 fw-bold">Red Zone</span> | <span class="text-danger small pt-2 ps-1">Increase</span>
                                @else 
                                    <span class="text-success small pt-1 fw-bold">Good stock</span>
                                @endif
                            @endforeach
                                        
                        </div>
                        </div>
                    </div>
            
                    </div>
                </div>
                <!-- End of information Product -->

                <!-- Information Product -->
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card sales-card">
            
                    <div class="card-body">
                        <h5 class="card-title">Solde <span>| Super</span></h5>
            
                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-stripe"></i>
                        </div>
                        <div class="ps-3">
                            @foreach ($countsupers as $countsuper)
                                @if ($countsuper->super == null)
                                    <h6>0</h6>
                                @else
                                    <h6>{{ $countsuper->super }}</h6>
                                @endif
                                
                                @if ($countsuper->super <= 50)
                                    <span class="text-danger small pt-1 fw-bold">Red Zone</span> | <span class="text-danger small pt-2 ps-1">Increase</span>
                                @else 
                                    <span class="text-success small pt-1 fw-bold">Good stock</span>
                                @endif
                            @endforeach
                                        
                        </div>
                        </div>
                    </div>
            
                    </div>
                </div>
                <!-- End of information Product -->
            </div>

            <div class="row d-flex justify-content-center">
                <!-- Information Product -->
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card sales-card">
            
                    <div class="card-body">
                        <h5 class="card-title">Solde <span>| Gazoil</span></h5>
            
                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-tsunami"></i>
                        </div>
                        <div class="ps-3">
                            @foreach ($countgazoils as $countgazoil)
                                @if ($countgazoil->gazoil == null)
                                    <h6>0</h6>
                                @else
                                    <h6>{{ $countgazoil->gazoil }}</h6>
                                @endif
                                
                                @if ($countgazoil->gazoil <= 50)
                                    <span class="text-danger small pt-1 fw-bold">Red Zone</span> |<span class="text-danger small pt-2 ps-1">Increase</span>
                                @else 
                                    <span class="text-success small pt-1 fw-bold">Good stock</span>
                                @endif
                            @endforeach
                                        
                        </div>
                        </div>
                    </div>
            
                    </div>
                </div>
                <!-- End of information Product -->
            </div>
        </div>
        <!-- End Left side columns -->    
    </div>

    {{-- <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
                </div>

                <div class="card-body">
                <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                <table class="table table-borderless datatable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>Brandon Jacob</td>
                        <td><a href="#" class="text-primary">At praesentium minu</a></td>
                        <td>$64</td>
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>Bridie Kessler</td>
                        <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                        <td>$47</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>Ashleigh Langosh</td>
                        <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                        <td>$147</td>
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Angus Grady</td>
                        <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                        <td>$67</td>
                        <td><span class="badge bg-danger">Rejected</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Raheem Lehner</td>
                        <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                        <td>$165</td>
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    </tbody>
                </table>

                </div>

            </div>
        </div>
        <!-- End Recent Sales -->
    </div> --}}
  </section>
@endsection
@extends('index')

@section('titletopbar')
    Role page
@endsection

@section('content')
<section class="section dashboard mb-4">
    <a class="btn btn-outline-primary" href=" {{ route('role.index') }}"><i class="bi bi-arrow-left-circle"></i> return here</a>
    <div class="row d-flex justify-content-center">
        <!-- Recent Sales -->
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title text-center">Enter the information of new role</h5>
    
                  <!-- No Labels Form -->
                  <form class="row g-3 needs-validation" method="POST" action="{{ route('role.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="col-md-12">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Product Name" id="validationCustom01" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-tooltip">
                        Please enter the name.
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-outline-primary">Save</button>
                      <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    </div>
                  </form>
    
                </div>
              </div>
        </div>
        <!-- End Recent Sales -->
    </div>
</section>
@endsection

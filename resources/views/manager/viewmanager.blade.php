@extends('index')

@section('titletopbar')
    User view page
@endsection

@section('content')
<section class="section dashboard mb-4">
    
    <div class="row d-flex justify-content-center">
        <!-- Recent Sales -->
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">View User {{ $user->name }}</h5>
    
                  <!-- No Labels Form -->
                  <form class="row g-3 needs-validation" method="POST" action="{{ route('manager.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="col-md-12">
                      <input type="text" class="form-control" name="name" id="validationCustom01" value="{{ $user->name }}" disabled>
                    </div>
                    <div class="col-md-12">
                      <input type="email" class="form-control" name="email" id="validationCustom02" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="text-center">
                      <a class="btn btn-outline-primary" href=" {{ route('manager.index') }} ">Return</a>
                    </div>
                  </form>
    
                </div>
              </div>
        </div>
        <!-- End Recent Sales -->
    </div>
</section>
@endsection

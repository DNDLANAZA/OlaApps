@extends('index')

@section('titletopbar')
    Stock view page
@endsection

@section('content')
<section class="section dashboard mb-4">
    
    <div class="row d-flex justify-content-center">
        <!-- Recent Sales -->
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">View stock {{ $stock->producttype->name }}</h5>
    
                  <!-- No Labels Form -->
                  <form class="row g-3 needs-validation" method="POST" action="{{ route('stock.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="col-md-6">
                      <label for="name" class="text-dark-emphasis">Name of exiting product</label>
                      <input type="text" class="form-control" name="name" id="validationCustom01" value="{{ $stock->producttype->name }}" disabled>
                    </div>
                    <div class="col-md-6">
                      <label for="name" class="text-dark-emphasis">Quantity of exiting product</label>
                      <input type="text" class="form-control" name="name" id="validationCustom01" value="{{ $stock->quantite .' '. $stock->unite }}" disabled>
                    </div>
                    <div class="col-md-6">
                      <label for="name" class="text-dark-emphasis">Description of exiting product</label>
                      <input type="text" class="form-control" name="name" id="validationCustom01" value="{{ $stock->description }}" disabled>
                    </div>
                    <div class="col-md-6">
                      <label for="name" class="text-dark-emphasis">The date of exiting product</label>
                      <input type="text" class="form-control" name="name" id="validationCustom01" value="{{ $stock->created_at }}" disabled>
                    </div>
                    
                    <div class="text-center">
                      <a class="btn btn-outline-primary" href=" {{ route('stock.index') }} ">Return</a>
                    </div>
                  </form>
    
                </div>
              </div>
        </div>
        <!-- End Recent Sales -->
    </div>
</section>
@endsection

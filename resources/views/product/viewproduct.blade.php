@extends('index')

@section('titletopbar')
    Product view page
@endsection

@section('content')
<section class="section dashboard mb-4">
    
    <div class="row d-flex justify-content-center">
        <!-- Recent Sales -->
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">View product {{ $product->producttype->name }}</h5>
    
                  <!-- No Labels Form -->
                  <form class="row g-3 needs-validation" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="col-md-6">
                      <label for="name" class="text-dark-emphasis">Name of product</label>
                      <input type="text" class="form-control" name="name" id="validationCustom01" value="{{ $product->producttype->name }}" disabled>
                    </div>
                    <div class="col-md-6">
                      <label for="name" class="text-dark-emphasis">Quantity of product</label>
                      <input type="text" class="form-control" name="name" id="validationCustom01" value="{{ $product->quantite .' '. $product->unite }}" disabled>
                    </div>
                    <div class="col-md-6">
                      <label for="name" class="text-dark-emphasis">Name of supplier</label>
                      <input type="text" class="form-control" name="name" id="validationCustom01" value="{{ $product->fournisseur }}" disabled>
                    </div>
                    <div class="col-md-6">
                      <label for="name" class="text-dark-emphasis">Creation date</label>
                      <input type="text" class="form-control" name="name" id="validationCustom01" value="{{ $product->datecreation }}" disabled>
                    </div>
                    <div class="col-md-12">
                      <label for="name" class="text-dark-emphasis">File name</label>
                      <input type="text" class="form-control" name="name" id="validationCustom01" value="{{ $product->fichier }}" disabled>
                    </div>
                    <div class="text-center">
                      <a class="btn btn-outline-primary" href=" {{ route('product.index') }} ">Return</a>
                    </div>
                  </form>
    
                </div>
              </div>
        </div>
        <!-- End Recent Sales -->
    </div>
</section>
@endsection

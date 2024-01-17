@extends('index')

@section('titletopbar')
    Product page
@endsection

@section('content')
<section class="section dashboard mb-4">
  <a class="btn btn-outline-primary" href=" {{ route('product.index') }}"><i class="bi bi-arrow-left-circle"></i> return here</a>
    
    <div class="row d-flex justify-content-center">
        <!-- Recent Sales -->
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Update the information of product</h5>
    
                  <!-- No Labels Form -->
                  <form class="row g-3 needs-validation" method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    @if (isset($product))
                        @method('PUT')
                    @endif
                    <div class="col-md-6">
                      <select class="form-select @error('name') is-invalid @enderror" id="validationCustom01" name="name" required>
                        <option value="{{ $product->id }}">{{ $product->producttype->name }}</option>
                        @foreach ($producttypes as $producttype)
                          <option value=" {{ $producttype->id }} " > {{ $producttype->name }}</option>
                        @endforeach
                      </select>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-tooltip">
                        Please enter your name.
                      </div>
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control @error('quantite') is-invalid @enderror" name="quantite" placeholder="Quantity" id="validationCustom02" value="{{ $product->quantite }}" required>
                        @error('quantite')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-tooltip">
                        Please enter your quantity.
                      </div>
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control @error('fournisseur') is-invalid @enderror" name="fournisseur" placeholder="Enter the Fournisseur" id="validationCustom03" value="{{ $product->fournisseur }}" required>
                        @error('fournisseur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-tooltip">
                        Please enter your fournisseur.
                      </div>
                    </div>
                    <div class="col-md-6">
                      <input type="file" class="form-control @error('fichier') is-invalid @enderror" name="fichier" value="{{ $product->fichier }}" id="validationCustom04" accept=".png, .jpg, .jpeg, .pdf, .doc,.docx,">
                        @error('fichier')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-tooltip">
                        Please enter your file.
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

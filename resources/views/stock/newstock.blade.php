@extends('index')

@section('titletopbar')
    stock page
@endsection

@section('content')
<section class="section dashboard mb-4">
    <a class="btn btn-outline-primary" href=" {{ route('stock.index') }}"><i class="bi bi-arrow-left-circle"></i> return here</a>
    <div class="row d-flex justify-content-center">
        <!-- Recent Sales -->
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title text-center">Enter the information of stock</h5>
    
                  <!-- No Labels Form -->
                  <form class="row g-3 needs-validation" method="POST" action=" {{ route('stock.store') }} " enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="col-md-6">
                      <select class="form-select @error('name') is-invalid @enderror" id="validationCustom01" name="name" required>
                        <option selected disabled>Choose the name</option>
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
                        Please select the name.
                      </div>
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control @error('quantite') is-invalid @enderror" name="quantite" placeholder="Quantity" id="validationCustom02" required>
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
                    <div class="col-md-12">
                      <div class="input-group">
                        <span class="input-group-text">Enter your description</span> 
                        <textarea class="form-control @error('description') is-invalid @enderror" aria-label="With textarea" name="description" placeholder="Enter your desciption" id="validationCustom03" required></textarea>
                      </div>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-tooltip">
                        Please enter your description.
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

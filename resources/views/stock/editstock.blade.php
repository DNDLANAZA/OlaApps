@extends('index')

@section('titletopbar')
    Stock page
@endsection

@section('content')
<section class="section dashboard mb-4">
  <a class="btn btn-outline-primary" href=" {{ route('stock.index') }}"><i class="bi bi-arrow-left-circle"></i> return here</a>
    
    <div class="row d-flex justify-content-center">
        <!-- Recent Sales -->
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Update the information of exiting product</h5>
    
                  <!-- No Labels Form -->
                  <form class="row g-3 needs-validation" method="POST" action="{{ route('stock.update', $stock->id) }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    @if (isset($stock))
                        @method('PUT')
                    @endif
                    <div class="col-md-6">
                      <select class="form-select @error('name') is-invalid @enderror" id="validationCustom01" name="name" required>
                        <option value="{{ $stock->id }}">{{ $stock->producttype->name }}</option>
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
                      <input type="text" class="form-control @error('quantite') is-invalid @enderror" name="quantite" placeholder="Quantity" id="validationCustom02" value="{{ $stock->quantite }}" required>
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
                      <textarea class="form-control @error('description') is-invalid @enderror" aria-label="With textarea" name="description" id="validationCustom03" required>{{ $stock->description }}</textarea> 
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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

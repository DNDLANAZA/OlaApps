@extends('index')

@section('titletopbar')
    User Role page
@endsection

@section('content')
<section class="section dashboard mb-4">
    <a class="btn btn-outline-primary" href=" {{ route('rus.index') }}"><i class="bi bi-arrow-left-circle"></i> return here</a>
    <div class="row d-flex justify-content-center">
        <!-- Recent Sales -->
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title text-center">Enter the information about role of user</h5>
    
                  <!-- No Labels Form -->
                  <form class="row g-3 needs-validation" method="POST" action="{{ route('rus.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="col-md-12">
                      <select class="form-select @error('user_id') is-invalid @enderror" id="validationCustom01" name="user_id" required>
                        <option selected disabled>Choose the User</option>
                        @foreach ($users as $user)
                          <option value=" {{ $user->id }} " > {{ $user->name }}</option>
                        @endforeach
                      </select>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-tooltip">
                        Please enter the user.
                      </div>
                    </div>
                    <div class="col-md-6">
                      <select class="form-select @error('role_id') is-invalid @enderror" id="validationCustom01" name="role_id" required>
                        <option selected disabled>Choose the role</option>
                        @foreach ($roles as $role)
                          <option value=" {{ $role->id }} " > {{ $role->name }}</option>
                        @endforeach
                      </select>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-tooltip">
                        Please enter the role.
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

@extends('icheck')

@section('titletopbar')
    Check Products page
@endsection

@section('content')
<section class="section dashboard">
    @if(session()->has('status'))
        <div class="alert alert-success" id="alert1">
            <h6 class="text-center"> {{ session()->get('status') }} </h6>
        </div>
    @endif
    <div class="col-md-12 mt-5 mb-4 d-flex justify-content-around">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Enter more information for search</h5>

              <!-- No Labels Form -->
              <form class="row g-3" method="POST" action="{{ route('check.in') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="select" class="mb-2 text-black">Choose the name of product</label>
                    <select class="form-select" id="validationCustom01" name="name">
                        <option selected disabled>Choose the name of product</option>
                        @foreach ($producttypes as $producttype)
                        <option value=" {{ $producttype->id }} " > {{ $producttype->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3" >
                    <label for="Startdate" class="mb-2 text-black">Start Date</label>
                    <input type="datetime-local" class="form-control" name="startdate" id="validationCustom02" required>
                </div>
                <div class="col-md-3" >
                    <label for="Enddate" class="mb-2 text-black">End Date</label>
                    <input type="datetime-local" class="form-control" name="enddate" id="validationCustom02" required>
                </div>
                <div class="text-center">  
                  <button type="submit" class="btn btn-outline-primary" name="out" value="out">Released products</button>
                </div>
              </form>

            </div>
        </div>

    </div>
    <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <h5 class="card-title">List of products found <span>| range by recent add</span></h5>

                    <table class="table table-borderless datatable" id="example" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">QUANTITE</th>
                            <th scope="col">UNITE</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">DATE</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($resultsout as $result)
                                <tr>
                                    <th scope="row"><a href="#">{{ $result->id }}</a></th>
                                    <td>
                                        @if($result->name == 1)
                                            Gaz
                                        @elseif($result->name == 2)
                                            Lubrifiant
                                        @elseif ($result->name == 3)
                                            Petrol
                                        @elseif ($result->name == 4)
                                            Super
                                        @else
                                            Gazoil
                                        @endif     
                                    </td>
                                    <td>{{ $result->quantite }}</td>
                                    <td>{{ $result->unite }}</td>
                                    <td>{{ $result->description }}</td>
                                    <td>{{ $result->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <!-- End Recent Sales -->
    </div>
</section>

<script type="text/javascript">
    let x = document.getElementById("alert1");
    setTimeout(function(){ x.style.visibility = "hidden"; }, 2000);
</script>

@endsection


@extends('index')

@section('titletopbar')
    Stock page
@endsection

@section('content')
<section class="section dashboard">
    @if(session()->has('status'))
        <div class="alert alert-success" id="alert1">
            <h6 class="text-center"> {{ session()->get('status') }} </h6>
        </div>
    @endif
    <div class="col-6 mt-5 mb-4">
        <a class="btn btn-outline-primary" href=" {{ route('stock.create') }} "><i class="fas fa-plus"></i>&nbsp;&nbsp;Go out product </a>
    </div>
    <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <h5 class="card-title">List of stock <span>| range by last out</span></h5>

                    <table class="table table-borderless datatable">
                        <thead>
                        <tr>
                            <th scope="col">NAME</th>
                            <th scope="col">QUANTITE EN UC</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">RELEASE DATE</th>
                            <th scope="col">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($stocks as $stock)
                                <tr>
                                    <th scope="row"><a href="#">{{ $stock->producttype->name }}</a></th>
                                    <td>{{ $stock->quantite." ".  $stock->unite }}</td>
                                    <td>{{ $stock->description }}</td>
                                    <td>{{ $stock->created_at }}</td>
                                    <td>
                                        <form action="{{ route('stock.destroy', $stock->id) }}" method="POST">

                                            <a class="btn btn-outline-warning" href=" {{ route('stock.show', $stock->id) }}"><i class="bi bi-eye"></i></a>
                                            <a class="btn btn-outline-primary" href="{{ route('stock.edit', $stock) }}"><i class="bi bi-pencil"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
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


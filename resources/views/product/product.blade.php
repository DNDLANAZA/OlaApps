@extends('index')

@section('titletopbar')
    Product page
@endsection

@section('content')
<section class="section dashboard">
    @if(session()->has('status'))
        <div class="alert alert-success" id="alert1">
            <h6 class="text-center"> {{ session()->get('status') }} </h6>
        </div>
    @endif
    <div class="col-6 mt-5 mb-4">
        <a class="btn btn-outline-primary" href=" {{ route('product.create') }} "><i class="fas fa-plus"></i>&nbsp;&nbsp;New product</a>
    </div>
    <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <h5 class="card-title">List of product <span>| range by recent add</span></h5>

                    <table class="table table-borderless datatable">
                        <thead>
                        <tr>
                            {{-- <th scope="col">ID</th> --}}
                            <th scope="col">NAME</th>
                            <th scope="col">QUANTITE EN UC</th>
                            {{-- <th scope="col">UNITE</th> --}}
                            <th scope="col">CREATION DATE</th>
                            <th scope="col">UPDATE DATE</th>
                            <th scope="col">FICHIER</th>
                            <th scope="col">FOURNISSEUR</th>
                            <th scope="col">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row"><a href="#">{{ $product->producttype->name }}</a></th>
                                    <td>{{ $product->quantite." ".  $product->unite }}</td>
                                    {{-- <td>{{ $product->unite }}</td> --}}
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                    <td>{{ $product->fichier }}</td>
                                    <td>{{ $product->fournisseur }}</td>
                                    <td>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">

                                            <a class="btn btn-outline-warning" href=" {{ route('product.show', $product->id) }}"><i class="bi bi-eye"></i></a>
                                            <a class="btn btn-outline-primary" href="{{ route('product.edit', $product) }}"><i class="bi bi-pencil"></i></a>
                                            <a class="btn btn-outline-primary" href="{{ route('product.download', $product->id) }}"><i class="bi bi-download"></i></a>

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


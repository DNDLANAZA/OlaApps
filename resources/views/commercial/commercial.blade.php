@extends('index')

@section('titletopbar')
    Commercial page
@endsection

@section('content')
<section class="section dashboard">
    @if(session()->has('status'))
        <div class="alert alert-success" id="alert1">
            <h6 class="text-center"> {{ session()->get('status') }} </h6>
        </div>
    @endif
    <div class="col-6 mt-5 mb-4">
        <a class="btn btn-outline-primary" href=" {{ route('commercial.create') }} "><i class="fas fa-plus"></i>&nbsp;&nbsp;New commercial</a>
    </div>
    <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <h5 class="card-title">List of commercial <span>| range by recent add</span></h5>

                    <table class="table table-borderless datatable">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($commercials as $commercial)
                                <tr>
                                    <th scope="row"><a href="#">{{ $commercial->id }}</a></th>
                                    <td>{{ $commercial->name }}</td>
                                    <td><a href="#" class="text-primary">{{ $commercial->email }}</a></td>
                                    <td>
                                        <form action="{{ route('commercial.destroy', $commercial->id) }}" method="POST">

                                            <a class="btn btn-outline-warning" href=" {{ route('commercial.show', $commercial->id) }}"><i class="bi bi-eye"></i></a>
                                            <a class="btn btn-outline-primary" href="{{ route('commercial.edit', $commercial) }}"><i class="bi bi-pencil"></i></a>
        
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


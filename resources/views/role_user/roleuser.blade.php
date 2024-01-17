@extends('index')

@section('titletopbar')
    Role of user page
@endsection

@section('content')
<section class="section dashboard">
    @if(session()->has('status'))
        <div class="alert alert-success" id="alert1">
            <h6 class="text-center"> {{ session()->get('status') }} </h6>
        </div>
    @endif
    <div class="col-6 mt-5 mb-4">
        <a class="btn btn-outline-primary" href=" {{ route('rus.create') }} "><i class="fas fa-plus"></i>&nbsp;&nbsp;New User Role</a>
    </div>
    <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <h5 class="card-title">List of User_Role <span>| range by recent add</span></h5>

                    <table class="table table-borderless datatable">
                        <thead>
                        <tr>
                            {{-- <th scope="col">ID</th> --}}
                            <th class="text-center">USER_ID</th>
                            <th class="text-center">ROLE_ID</th>
                            <th scope="col">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($rus as $ru)
                                <tr>
                                    {{-- <th scope="row"><a href="#">{{ $ru->id }}</a></th> --}}
                                    <td>{{ $ru->user_id }}</td>
                                    <td>{{ $ru->role_id }}</td>
                                    <td>
                                        <form action="{{ route('rus.destroy', $ru->id) }}" method="POST">

                                            <a class="btn btn-outline-warning" href=" {{ route('rus.show', $ru->id) }}"><i class="bi bi-eye"></i></a>
                                            <a class="btn btn-outline-primary" href="{{ route('rus.edit', $ru) }}"><i class="bi bi-pencil"></i></a>
        
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


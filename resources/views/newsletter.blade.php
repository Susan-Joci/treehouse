@extends('app')

@section('styles')
  <link  href="{{asset('css/newsletter.css')}}" rel="stylesheet">
@endsection

@section('content')
<nav class="navbar navbar-dark bg-mynav">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">NewsLetter <i class="fas fa-newspaper"></i></a>
      </div>
    </nav>

    <div class="container">
      <div class="bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight">
            <button type="button" class="btn btn-secondary create-btn" onclick="window.location='{{ url("/") }}'">Home <i class="fa fa-home" aria-hidden="true"></i></button>
            <h3>
              Users <i class="fa fa-user" aria-hidden="true"></i>
            </h3>
            </div>
      </div>

      <div class="table-responsive tableFixHead">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="mytable">
            @if (count($users) == 0)
                <tr>
                    <th scope="row" colspan="5" class="txtaligncenter">No records were found.</th>
                </tr>
            @else
              @foreach ($users as $key=>$user)
                  <tr>
                    <th scope="col">{{ $key+1 }}</th>
                    <th scope="col">{{ $user->name }}</th>
                    <th scope="col">{{ $user->email }}</th>
                    <th scope="col">
                      <input type="checkbox" {{ $user->status==1?'checked':'' }} id="{{ $user->id }}" data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                    </th>
                  </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>

@endsection

@section('scripts')
    <script>
      $('input:checkbox').change(function() {
        console.log($(this).prop('checked'));
        console.log("Change event: " + this.id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: '/newsletter/users',
            data: {user_id:this.id, status: $(this).is(':checked')},
            success: function( msg ) {
                
            },
            error: function(xhr) { // if error occured
            },
        });
      })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
@endsection
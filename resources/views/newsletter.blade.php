@extends('app')

@section('styles')
  <link  href="{{asset('css/newsletter.css')}}" rel="stylesheet">
@endsection

@section('content')
<nav class="navbar navbar-dark bg-mynav">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">NewsLetter</a>
      </div>
    </nav>

    <div class="container">
      <div class="bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight">
            <!-- <button type="button" class="btn btn-secondary create-btn" onclick="showUserCreateBox()">Create</button> -->
            <h2>Users</h2>
            </div>
        <div class="p-2 bd-highlight">
        </div>
      </div>

      <div class="table-responsive">
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
                      <button onclick="showUserEditBox('{{ $user->name }}', '{{ $user->email }}' )">Edit</button>
                      <button>Remove</button>
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
        function loadTable() {
            const xhttp = new XMLHttpRequest();
            xhttp.open("GET", "https://www.mecallapi.com/api/users");
            xhttp.send();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var trHTML = "";
                const objects = JSON.parse(this.responseText);
                for (let object of objects) {
                    trHTML += "<tr>";
                    trHTML += "<td>" + object["id"] + "</td>";
                    trHTML +=
                    '<td><img width="50px" src="' +
                    object["avatar"] +
                    '" class="avatar"></td>';
                    trHTML += "<td>" + object["fname"] + "</td>";
                    trHTML += "<td>" + object["lname"] + "</td>";
                    trHTML += "<td>" + object["username"] + "</td>";
                    trHTML +=
                    '<td><button type="button" class="btn btn-outline-secondary" onclick="showUserEditBox(' +
                    object["id"] +
                    ')">Edit</button>';
                    trHTML +=
                    '<button type="button" class="btn btn-outline-danger" onclick="userDelete(' +
                    object["id"] +
                    ')">Del</button></td>';
                    trHTML += "</tr>";
                }
                document.getElementById("mytable").innerHTML = trHTML;
                }
            };
        }

        loadTable();

    function showUserEditBox(name, email) {
        Swal.fire({
            title: "Update Your Information",
            html:
            '<input id="id" type="hidden">' +
            '<input id="name" class="swal2-input" placeholder="Name" value="'+name+'">' +
            '<input id="email" class="swal2-input" placeholder="Email" value="'+email+'">',
            focusConfirm: false,
            preConfirm: () => {
            userCreate();
            },
        });
    }

    function userCreate() {
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    console.log(fname,lname,email, this);
    var formData = {
            fname,
            lname,
            email        
    };
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
        type:'POST',
        url:'/submit',
        data:formData,
        success:function(data) {

        }
    });
    // const xhttp = new XMLHttpRequest();
    // xhttp.open("POST", "https://www.mecallapi.com/api/users/create");
    // xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    // xhttp.send(
    //     JSON.stringify({
    //     fname: fname,
    //     lname: lname,
    //     username: username,
    //     email: email,
    //     avatar: "https://www.mecallapi.com/users/cat.png",
    //     })
    // );
    // xhttp.onreadystatechange = function () {
    //     if (this.readyState == 4 && this.status == 200) {
    //     const objects = JSON.parse(this.responseText);
    //     Swal.fire(objects["message"]);
    //     loadTable();
    //     }
    // };
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
@endsection
@extends('app')

@section('styles')
<style>

    .bg-mynav {
      background-color: #2c3e50;
    }
    
    body {
      font-size: 1.25rem;
      background-color: #f6f8fa;
    }
    
    td {
      line-height: 3rem;
    }

    .create-btn {
        float : right;
    }
</style>
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
            <button type="button" class="btn btn-secondary create-btn" onclick="showUserCreateBox()">Create</button>
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
            @if (false)
                <tr>
                    <th scope="row" colspan="5">NO records were found.</th>
                </tr>
            @else
            <tr>
              <th scope="col">1</th>
              <th scope="col">John Doe</th>
              <th scope="col">john@does.com</th>
              <th scope="col"><button>Edit</button></th>
            </tr>
            <tr>
              <th scope="col">1</th>
              <th scope="col">John Doe</th>
              <th scope="col">john@does.com</th>
              <th scope="col"><button>Edit</button></th>
            </tr>
            <tr>
              <th scope="col">1</th>
              <th scope="col">John Doe</th>
              <th scope="col">john@does.com</th>
              <th scope="col"><button>Edit</button></th>
            </tr>
            <tr>
              <th scope="col">1</th>
              <th scope="col">John Doe</th>
              <th scope="col">john@does.com</th>
              <th scope="col"><button>Edit</button></th>
            </tr>
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

    function showUserCreateBox() {
        Swal.fire({
            title: "Create user",
            html:
            '<input id="id" type="hidden">' +
            '<input id="fname" class="swal2-input" placeholder="First">' +
            '<input id="lname" class="swal2-input" placeholder="Last">' +
            '<input id="username" class="swal2-input" placeholder="Username">' +
            '<input id="email" class="swal2-input" placeholder="Email">',
            focusConfirm: false,
            preConfirm: () => {
            userCreate();
            },
        });
    }

    function userCreate() {
    const fname = document.getElementById("fname").value;
    const lname = document.getElementById("lname").value;
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    console.log(fname,lname,username,email);
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "https://www.mecallapi.com/api/users/create");
    xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhttp.send(
        JSON.stringify({
        fname: fname,
        lname: lname,
        username: username,
        email: email,
        avatar: "https://www.mecallapi.com/users/cat.png",
        })
    );
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
        const objects = JSON.parse(this.responseText);
        Swal.fire(objects["message"]);
        loadTable();
        }
    };
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
@endsection
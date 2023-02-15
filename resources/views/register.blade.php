@extends('master')

@section('konten')
<h1 class="text-center">Form Pendaftaran</h1>

    <div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="card align-items-center" style="width: 600px; height:550px">
    <br>

    <div class="row mt-10">
    <div class="col-md-12">
    <form action="/user/register" method="post">
            @csrf

            <label for="name">Nama</label>
            <br>
            <input type="text" id="name" name="name" value="{{ old('name') }}"><br>
            @error('name')
            <script>alert('{{ $message }}')</script>
            @enderror

            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="hobbies">Hobi</label><br>

                    @foreach ($hobbies as $hobby)
                        <input type="checkbox" id="hobby{{ $hobby['id'] }}" name="hobbies[]" value="{{ $hobby['id'] }}" {{ in_array($hobby['id'], old('hobbies', [])) ? 'checked' : '' }}>
                        <label for="hobby{{ $hobby['id'] }}">{{ $hobby['name'] }}</label><br>
                    @endforeach

                    @error('hobbies')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            <br>
                <div class="col-md-6">

                    <label for="gender">Gender</label><br>

                    @foreach ($genders as $key => $gender)
                    <div class="form-check">
                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="{{ $gender }}" value="{{ $gender->id }}" {{ old('gender') == $key ? 'checked' : '' }} >
                        <label class="form-check-label" for="{{ $gender }}">
                            {{ ucfirst($gender->name) }}
                        </label>
                    </div>
                    @endforeach


                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-6">

                <label for="email">Email</label>
                <br>

                <input type="email" id="email" name="email" value="{{ old('email') }}" >

                @error('email')
                <script>alert('{{ $message }}')</script>
                @enderror


            </div>

            <div class="col-md-6">
                <label for="phone">Telp</label>
                <br>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" >
                @error('phone')
                <script>alert('{{ $message }}')</script>
                @enderror


            </div>

        </div>
        <br>

        <div class="row">
            <div class="col-md-6">

                <label for="username">Username</label>
                <br>

                <input type="text" id="username" name="username" value="{{ old('username') }}" maxlength="10" >
                @error('username')
                <script>alert('{{ $message }}')</script>
                @enderror
              </div>

            <div class="col-md-6">

                <label for="password">Password</label>
                <br>
                <input type="password" id="password" name="password" 0minlength="7" >
                @error('password')
                <script>alert('{{ $message }}')</script>
                @enderror

            </div>

        </div>
        <br>
          <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <button type="submit" class="btn btn-primary me-md-2" >Submit</button>
            <input class="btn btn-success" type="reset" value="Reset">
        </div>
        <br>
        <br>


    </form>
    <hr>

    </div>
    </div>


    </div>
    </div>

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar User</div>

                <div class="card-body">

                    <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
<script src="assets/resource/tiny_mce.js"></script>


<script type="text/javascript">
$(document).ready(function () {
   $('#tbl_list').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.data') }}",

        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'actions', name: 'actions' },
        ]
    });
 });
</script>

<style>
input[type=text], input[type="tel"],input[type="password"],input[type="email"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid red;
  border-radius: 15px;
}

.btn{
    width:100px;
}

</style>

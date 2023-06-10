<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container">
    <h2>{{$title}}</h2>
    <a href="{{route('mahasiswaAdd')}}" class="btn btn-primary">Tambah Data</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Umur</th>
                <th scope="col">Alamat</th>
                <th scope="col">Kota</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jurusan</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <th>{{$student->nim}}</th>
                <th>{{$student->nama}}</th>
                <th>{{$student->umur}}</th>
                <th>{{$student->alamat}}</th>
                <th>{{$student->kota}}</th>
                <th>{{$student->kelas}}</th>
                <th>{{$student->jurusan}}</th>
                <th class="d-flex justify-content-evenly">
                    <a href="{{route('mahasiswaEdit', $student->nim)}}" class="btn btn-secondary">Edit</a>
                    <form action="{{route('mahasiswaDelete', $student->nim)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
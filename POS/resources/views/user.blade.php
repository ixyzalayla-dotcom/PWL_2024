<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Data User - Praktikum 6 (Eloquent Models)</h1>

        <h3 class="mt-5">Form Tambah Data User</h3>
        <form action="/user/store" method="POST" class="row g-3">
            @csrf
            <div class="col-md-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>
            <div class="col-md-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>

        <h3 class="mt-5">Form Update Data User</h3>
        <form action="/user/1" method="POST" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="Pelanggan Baru" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </form>

        <h3 class="mt-5">Tabel Data User</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Level ID</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->level_id }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

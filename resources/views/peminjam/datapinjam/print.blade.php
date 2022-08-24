<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 Generate PDF From View</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col-3">Nama Peminjam</th>
                <th scope="col-3">Ruangan</th>
                <th scope="col-3">Sapras</th>
                <th scope="col-3">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $nama_peminjam }}</th>
                <td>{{ $ruangan }}</td>
                <td>{{ $sapras }}</td>
                <td>{{ $status }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
td,
th {
    padding: 5px;
    border: 1px solid;
    font-size: 10pt;
}



table {
    width: 97%;
    margin: 5px;
    border-collapse: collapse;
}

.container {
    margin: 10px;
}

.cont {
    margin-bottom: 10px;
    display: block;
}
</style>

<body>
    <div class="container">
        <h3>Laporkuy</h3>
        @foreach($laporan as $name => $lpm)
        <div class="cont">
            <h4>Daftar Laporan {{ucwords($name)}}</h4>

            <p>Daftar laporan:</p>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Judul Laporan</th>
                        <th>Isi Laporan</th>
                        <th>Pelapor</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lpm as $i => $lp)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$lp["tanggal"]}}</td>
                        <td>{{$lp["judul_laporan"]}}</td>
                        <td>{{$lp["keterangan"]}}</td>
                        <td>{{$lp["pelapor"]["name"]}}</td>
                        <td>{{ucwords($lp["status"])}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endforeach
        </div>
    </div>


</body>

</html>
<center>
    <h4>Laporan Usulan</h4>
</center>
<table class='table table-bordered'>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kanwil</th>
            <th>Upt</th>
            <th>Usulan</th>
            <th>Jumlah Peserta</th>
        </tr>
    </thead>
    <tbody>
        @php $i=1 @endphp
        @foreach($usulan as $p)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{$p->nama_user}}</td>
            <td>{{$p->kanwil}}</td>
            <td>{{$p->upt}}</td>
            <td>{{$p->usulan}}</td>
            <td>{{$p->jumlah}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multi</title>
</head>
<body>
    @php
        $table = [
            [ 'name' => 'Provinsi', 'table' => Crypt::encryptString('m_provinsi'), 'model' => Crypt::encryptString('mProvinsi')],
            ['name' => 'Kabupaten', 'table' => Crypt::encryptString('m_kabupaten'), 'model' => Crypt::encryptString('mKabupaten')],
            ['name' => 'Kecamatan','table' => Crypt::encryptString('m_kecamatan'), 'model' => Crypt::encryptString('mKecamatan')],
        ];
    @endphp
    <nav>
        <ul>
            @foreach ($table as $tb)
                <li><a href="{{ route('index', $tb['table']) }}">{{ $tb['name'] }}</a></li>
            @endforeach
        </ul>
    </nav>
    @yield('content')
</body>
</html>
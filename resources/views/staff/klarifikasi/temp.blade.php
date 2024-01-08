<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pembelian</title>
    <style>
        #back-wrap {
            margin: 30px auto 0 auto;
            width: 500px;
            display: flex;
            justify-content: flex-end;
        }

        .btn-back {
            width: fit-content;
            padding: 8px 15px;
            color: #666;
            /* background: #666; */
            border-radius: 5px;
            text-decoration: none;
        }

        .container{
            border: 1px solid rgba(128, 128, 128, 0.466);
            padding: 20px;
            margin: 20px auto 100px auto;
            width: 780px;
            background: #fff;
        }

        #content, .head-let {
            /* box-shadow: 5px 10px 15px rgba(0,0,0,0.5); */

            display: flex;
        }

        .cont-info{
            margin-top: 13px;
            margin-left: 17px;
            width: 290px;
        }

        .cont-contact{
            margin-top: 18px;

            margin-left: 11%;
            text-align: right;
        }

        hr,h2,p{
            padding: 0;
            margin: 0;
        }

        .cont-info-hr{
            height: 2px;
            border: none; /* Menghapus border bawaan */
            background-color: black; /* Warna latar belakang menjadi hitam */
            margin: 10px 0; /* Menambahkan margin atas dan bawah agar terlihat lebih baik */
            font-weight: bold; /* Membuat tebal (bold) */
        }

        .hr-1{
            height: 1px;
            border: none; /* Menghapus border bawaan */
            background-color: black; /* Warna latar belakang menjadi hitam */
            margin: 10px 0; /* Menambahkan margin atas dan bawah agar terlihat lebih baik */
            font-weight: bold; /* Membuat tebal (bold) */
        }
        
        .tanggal{
            display: flex;
            justify-content: end;
            margin-top: 19px;
            margin-right: 20px;
        }

        .head-let{
            margin: 21px 25px;
            justify-content: space-between;
        }

        .peserta{
            margin-top:32px;
        }

        .main-content{
            margin: 40px 25px;

        }

        .hrmt-kami{
            margin-top: 40px;
            display: flex;
            justify-content: end;
            text-align: center;
        }
        
        

    </style>
</head>

<body>
    <div id="back-wrap">
        <a href="{{ route('surat.') }}" class="btn-back">Kembali</a>
        <a href="{{ route('klasifikasi.pdf', $data['id']) }}" class="btn-print">Cetak (.pdf)</a>

    </div>
    <div class="container">
        <div id="content">
            <div class="img">
                <img src="{{ asset('assets/wikrama-logo.png') }}" alt="" width="120">
            </div>
            <div class="cont-info">
                <h2>SMK WIKRAMA BOGOR<hr class="cont-info-hr"></h2>
                <p>Bisnis dan Manajemen<br>Teknologi Informasi dan Komunikasi<br>Pariwisata</p>
            </div>
            <div class="cont-contact">
                <p>
                    Jl. Raya Wangun Kel. Sindangsari Bogor<br>
                    Telp/Faks: (021)-8121848<br>
                    e-mail: prohumasi@smkwikrama.sch.id<br>
                    Website: www.smkwikrama.sch.id
                </p>
            </div>
        </div><hr class="hr-1">
        <div class="tanggal">
            <p>
                @php
                setlocale(LC_ALL, 'IND');
                @endphp
                {{ Carbon\Carbon::parse($data['created_at'])->formatLocalized('%d %B %Y') }}
            </p>
        </div>
        <div class="head-let">
            <div class="about-let">
                No: {{ $data['klasifikasi']['letter_code'] }}<br>
                Hal: <b>{{ $data['letter_perihal'] }}</b>
            </div>
            <div class="for-let">
                Kepada<br>Yth. Bapak/Ibu Terlampir<br>di Tempat
            </div>
        </div>

        <div class="main-content">
            {!! $data['content'] !!}
            <div class="peserta">
                Peserta: 
                <ol>
                    @foreach ($data['recipients'] as $item)
                    <li>{{ $item['name'] }}</li>
                    @endforeach
                </ol>

            </div>
            <div class="hrmt-kami">
             
                <p>
                    Hormat Kami,<br>
                    Kepala SMK Wikrama Bogor<br><br><br><br><br><br>
                    <span>(............................................)</span>
                </p>
               
            </div>
        </div>
       
    </div>
</body>

</html>

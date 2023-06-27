<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 card">

            <style>
                /* CSS styles for the letter */
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 20px;
                }
                
                .letterhead {
                    text-align: center;
                    margin-bottom: 20px;
                }
                
                .letterhead img {
                    max-width: 200px;
                    margin-bottom: 10px;
                }
                
                .letterhead h1 {
                    font-size: 24px;
                    margin: 0;
                }
                
                .letterhead p {
                    font-size: 14px;
                    margin: 0;
                }
                
                .content {
                    margin-bottom: 20px;
                }
                
                .content h2 {
                    font-size: 18px;
                    margin: 0;
                    margin-bottom: 10px;
                }
                
                .content p {
                    font-size: 14px;
                    margin: 0;
                    margin-bottom: 10px;
                }
            </style>
            <div class="letterhead">
                <img src="logo.png" alt="Logo">
                <h1>Perusahaan ABC</h1>
                <p>Jl. Contoh No. 123, Kota ABC</p>
                <p>Telp: 123-456-789</p>
            </div>
            
            <div class="content">
                <h2>Surat Dinas</h2>
                <p>Tanggal: {{ date('d F Y') }}</p>
                
                {{-- <p>Kepada:</p> --}}
                {{-- <p>Nama Penerima</p> --}}
                {{-- <p>Alamat Penerima</p> --}}
                
                <p>Perihal: Contoh Surat Dinas</p>
                
                <h4 class="text-center">Surat Perjalanan Dinas</h4>
                <p>Dengan ini menyatakan bahwa:</p>
                <p>
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ ucwords($employee->name) }}</td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>:</td>
                            <td>{{ ucwords($employee->jabatan) }}</td>
                        </tr>
                    </table>
                </p>
                <p>Mengharap kepada Bapak/ Ibu/ Sdr/ i Karyawan Perusahan ABC ketenagakerjaan dibidang industri otomotif Tahun 2023 untuk mengikuti acara peresmian new Vendor Otomotif </p>

            </div>
            
            <footer>
                <p>Terima kasih,</p>
                <p>CEO Perusahaan ABC</p>
            </footer>

        </div>
        <div class="col-md-3"></div>

    </div>
</div>
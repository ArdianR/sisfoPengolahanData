<br>
<div class="basic-container white">
    <h5>Info Karyawan</h5>
    <div class="row">
        <div class="col s12">

        </div>
    </div>
    <div class="row">
        <div class="col s8 offset-s2">
            <table class="striped">
                <div class="center-align">
                    <img src="../public/img/users/{{getData[0].photo}}" alt="" width="200px" height="200px">
                </div>
                <h5>Profil</h5>
                <tr>
                    <td>ID Karyawan</td>
                    <td>:</td>
                    <td>{{getData[0].id}}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{getData[0].nama}}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{getData[0].tempatLahir}}, {{getData[0].tanggalLahir}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{getData[0].alamat}}</td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td>:</td>
                    <td>{{getData[0].noTelp}}</td>
                </tr>
                <tr>
                    <td>E-Mail</td>
                    <td>:</td>
                    <td>{{getData[0].email}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<br>
<div class="basic-container white">
  <br>
    <div class="row">
        <div class="col s6 offset-s3 card-panel">
        <h5><i class="material-icons left">account_circle</i>Edit Karyawan</h5>
            <table class="striped">
                <tr>
                    <td>ID</td>
                    <td>:</td>
                    <td><input type="text" name="id" id="id"  value="{{data[0].id}}" readonly></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama" id="nama"  value="{{data[0].nama}}"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><input type="text" name="alamat" id="alamat" value="{{data[0].alamat}}"></td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td>:</td>
                    <td><input type="text" name="noTelp" id="noTelp" value="{{data[0].noTelp}}"></td>
                </tr>
                <tr>
                    <td>E-Mail</td>
                    <td>:</td>
                    <td><input type="text" name="email" id="email"  value="{{data[0].email}}"></td>
                </tr>
            </table>
            <button type="button" ng-click="edit()" class="btn blue darken-4 right"><i class="material-icons">send</i></button>
        </div>
    </div>
</div>

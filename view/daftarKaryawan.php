<br>
<div class="basic-container white">
    <div class="row">
        <div class="col s12">
            <h5>Daftar Karyawan</h5>
            <div class="col s4 offset-s8">
                <input type="text" ng-model="search" placeholder="filter">
            </div>
            <table class="striped">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>E-Mail</th>
                    <th>No. Telp</th>
                    <th>Action</th>
                </tr>
                <tr ng-repeat="karyawan in data | filter: search">
                    <td><a ng-href="#!/profile/{{karyawan.id}}">{{karyawan.id}}</a></td>
                    <td>{{karyawan.nama}}</td>
                    <td>{{karyawan.alamat}}</td>
                    <td>{{karyawan.email}}</td>
                    <td>{{karyawan.noTelp}}</td>
                    <td>
                        <a href="#!/hapusKaryawan/{{karyawan.id}}" class="btn-floating red"><i class="material-icons">delete</i></a>
                        <a href="#!/editKaryawan/{{karyawan.id}}" class="btn-floating blue"><i class="material-icons">edit</i></a>
                    </td>
                </tr>                
            </table>
            <div class="fixed-action-btn horizontal click-to-toggle">
                <a href="" class="btn-floating btn-large red">
                    <i class="material-icons">menu</i>
                </a>
                <ul>
                    <li><a href="#!/tambahKaryawan" class="btn-floating red"><i class="material-icons">add</i></a></li>
                    <li><a href="" class="btn-floating red"><i class="material-icons">print</i></a></li>
                    <li><a href="" class="btn-floating red"><i class="material-icons">file_download</i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
 

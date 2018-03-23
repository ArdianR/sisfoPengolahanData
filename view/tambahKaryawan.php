<br>
<div class="white basic-container">    
    <div class="row">
        <div class="col s8 offset-s2">          
            <h5 class="basic-title"><i class="material-icons left">account_box</i>Form Karyawan</h5>
           <div class="input-field">
                <input type="text" class="validate" name="id" id="id" ng-model="id" required>
                <label for="id">ID Karyawan</label>
           </div>
           <div class="input-field">
                <input type="text" class="validate" name="nama" id="nama" ng-model="nama" required>
                <label for="nama">Nama</label>
           </div>
           <div class="input-group">
                Jenis Kelamin :
               <input type="radio" name="jk" id="Pria" ng-model="jk" value="Pria">
               <label for="Pria">Pria</label>
               <input type="radio" name="jk" id="Wanita" ng-model="jk" value="Wanita">
               <label for="Wanita">Wanita</label>
           </div>
           <div class="input-field">
               <input type="text" class="validate" name="tempatLahir" id="tempatLahir" ng-model="tempatLahir">
               <label for="tempatLahir">Tempat Lahir</label>
           </div>
           <div class="input-group">
                <label for="tanggalLahir">Tanggal Lahir</label>
                <input type="date" name="" id="" class="validate" ng-model="tanggalLahir">
           </div>
           <div class="input-field">
                <input type="text" name="alamat" id="alamat" ng-model="alamat">
                <label for="alamat">alamat</label>
           </div>
           <div class="input-field">
                <input type="text" name="email" id="email" ng-model="email" class="validate">
                <label for="email">E-Mail</label>
           </div>
           <div class="input-field">
               <input type="text" name="telp" id="telp" ng-model="telp" class="validate">
                <label for="telp">No.Telp</label> 
           </div>
           <!-- <div class="input-field">
               <input type="text" name="idGaji" id="idGaji" ng-model="idGaji" class="validate">
                <label for="idGaji">idGaji</label> 
           </div> -->
           <button ng-click="add()" class="waves-effect waves-light btn right blue darken-4"><i class="material-icons">send</i></button> 
        </div>
    </div>  
</div>

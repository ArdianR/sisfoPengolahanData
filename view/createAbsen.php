<br>
<div class="basic-container white">
    <div class="row">
        <div class="col s8 offset-s2">
        <h5><i class="material-icons left">format_list_numbered</i>Buat Absen</h5><br>
             <form action="../API/createAbsen.php" method="POST" enctype="multipart/form-data">
                <div class="input-field">
                    <input type="text" name="subject_id" id="subject">
                    <label for="subject">Subject ID</label>
                </div>
                <div class="file-field input-field">
                   <div class="btn">
                       <span>File</span>
                       <input type="file" name="foto">
                   </div>
                   <div class="file-path-wrapper">
                       <input class="file-path validate" type="text">
                   </div>
                 </div>
                <input type="submit" name="submit" id="" value="upload">
            </form>
        </div>
    </div>
</div>

<?php 
 if(isset($_POST['submit'])){  
    include('../config/database.php');
    $subject_id = $_POST['subject_id'];
    $ch = curl_init();
    $asal = $_FILES['foto']['tmp_name'];
    $nama = $_FILES['foto']['name'];        
    $imageData = base64_encode(file_get_contents($asal));
    $src = 'data:'.mime_content_type($asal).';base64,'.$imageData;

    move_uploaded_file($asal, '../public/img/users/' . $nama); // Upload Photo ke img/src
    curl_setopt($ch, CURLOPT_URL, "https://api.kairos.com/enroll");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);

    curl_setopt($ch, CURLOPT_POSTFIELDS, "{
        \"image\": \"$src\",
        \"subject_id\": \"$subject_id\",
        \"gallery_name\": \"face\"
    }");

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
       "Content-Type: application/json",
       "app_id: 9ddfb293",
        "app_key: 543409066e9d2ec2694b6f93f68e31ba"
    ));

        $response = curl_exec($ch);
        curl_close($ch);
        // echo $response;
        $data   = json_decode($response);
        $status = $data->images[0]->transaction->status;
        // echo $status;
        if($status == "success"){
            if(mysqli_query($con, "update karyawan set photo='$nama' where nama='$subject_id'")){
                header('Location: /MyTemplateAdmin/view/#!/daftarKaryawan');
            }              
           
        }      
  }
?>    

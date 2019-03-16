 //上传接口
     function uploadImg(){
        $nowNameArr = '';
        $nowCount = $oldCount = $newCount = 0;     
        $folder = "./Uploads/img/"; //设置系统上传路径
        $type = array(   //图片允许后缀
            "image/gif",
            "image/pjpeg",
            "image/jpeg",
            "image/jpg",
            "image/png"
        ); 
        // 创建文件夹，并给予最高权限
        if(!file_exists($folder)){ 
            mkdir($folder, 777);
        };

        //检查上传文件是否在允许上传的类型
        foreach($_FILES["picture"]["error"] as $key => $error) {
            if($class==1){
                if(!in_array($_FILES["picture"]["type"][$key], $type)) {
                    echo"<script language='javascript'>";
                    echo"alert(\"文件类型错误!\");";
                    echo"</script>";
                    exit;
                }
            }
            if($error == UPLOAD_ERR_OK) {
                //截取文件名称后缀
                $tmp_name = $_FILES["picture"]["tmp_name"][$key];
                $a = explode(".", $_FILES["picture"]["name"][$key]);

                $prename = $a[0];
                if($class==1){
                    $name = date('YmdHis') . mt_rand(100, 999) . "." . $a[1];
                }else{
                    $name = $_FILES["picture"]["name"][$key];
                }
                // 文件的重命名 （日期+随机数+后缀）
                $nowNameArr .= $name.',';
                $name = $folder.$name;
                // 文件的路径
                move_uploaded_file($tmp_name, $name);

                $nowCount++;
            }
        }      
    }

<?php
    require_once("version.php");
    if(isset($argv[1])){
        $rama = $argv[1];
        
        if($rama === "master"){
            ++$shck_version_dev;
        }

        if($rama === "testing"){
            ++$shck_version_pre;
        }

        if($rama === "production"){
            ++$shck_version_pro;
        }
    }  

    $nuevo_archivo = "<?php\n";
    $nuevo_archivo .= ' $shck_version_dev = '.$shck_version_dev.";\n";
    $nuevo_archivo .= ' $shck_version_pre = '.$shck_version_pre.";\n";
    $nuevo_archivo .= ' $shck_version_pro = '.$shck_version_pro.";\n";
    $nuevo_archivo .= '?>';

    $nuevo_archivo_json = '$version_shck: \''.$shck_version_pro.'.'.$shck_version_pre.'.'.$shck_version_dev.'\';';    

    file_put_contents("www/version.php", $nuevo_archivo);
    file_put_contents("www/assets/app/scss/_version.scss", $nuevo_archivo_json);

    echo $shck_version_pro.".".$shck_version_pre.".".$shck_version_dev;

?>
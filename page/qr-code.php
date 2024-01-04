<?php
$dir = "../img/qr/";
$id  = 1;

// Membuka direktori
if (is_dir($dir)){
    if ($dh = opendir($dir)){
        // Melakukan perulangan untuk setiap file dalam direktori
        while (($file = readdir($dh)) !== false){
            // Melewatkan direktori parent dan current
            if ($file == "." || $file == "..") continue;
            
            // Mencetak nama file dalam div dengan class card
            echo '<section class="content">
                    <div class="content-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">QR Code'.$id++.'<b class="ml-3">('.$file.')</b>'.'</h3>
                                    </div>
                                    <div class="card-body">
                    ';
            echo '<img src="../img/qr/'.$file.'" alt="" srcset="">';
            echo '</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>';
        }
        closedir($dh);
    }
}
?>
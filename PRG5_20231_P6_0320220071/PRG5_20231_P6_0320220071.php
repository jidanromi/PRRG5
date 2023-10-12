<?php
// 
        // function TampilHello($a) {
            // try {
                // if ($a<1) {
                    // throw new Exception ("Masukkan angka lebih dari satu", 1);
                // } else {
                    // for ($i=1;$i<=$a;$i++) {
                        // echo "$i Hello world <br/>";
                    // }
                // }
            // } catch (Exception $e) {
                // echo "Maaf : " .$e->getMessage()." <br/> ";
            // }
        // }
// 
        // ketika nilai parameter kurang dari 1
        // TampilHello(0);
?>



<?php

        class SpecificException extends Exception {}

        function test() {
            throw new SpecificException('Test Gagal');
        }

        try {
            test();
        } catch (SpecificException) {
            echo "Jidan, Fatih, Dicky, Gipari";
        }
?>

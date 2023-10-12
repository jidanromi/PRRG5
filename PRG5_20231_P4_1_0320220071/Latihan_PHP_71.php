<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        echo "saya sedang belajar PHP <br/><br/>";
        echo "Belajar PHP hingga jadi master <br/><br/>";
    ?>
    <button onclick="identity()">Klik untuk melihat identitas saya</button>
    
    <div id="Identitas" style="display: none">
        <table border=0px>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td>0320220074</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>Muhammad Jidan Romi</td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td>Jakarta 11 December 2003</td>
            </tr>
            <tr>
                <td>No.Hp</td>
                <td>:</td>
                <td>0856-9341-4044</td>
            </tr>
            <tr>
                <td>Moto Hidup</td>
                <td>:</td>
                <td>Hidup Seperti Larry</td>
            </tr>
        </table>
    </div>

    <?php
        
    ?>

    <script>
        function identity(){
            var confirma = confirm("Yakin?");
            var identitas = document.getElementById("Identitas");
            if(confirma == true){
                identitas.style.display = "block";
            } else {
                identitas.style.display = "none";
            }
        }
    </script>

</body>
</html>
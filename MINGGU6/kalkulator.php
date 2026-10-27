<!DOCTYPE html>
<html>
    <head>
        <title>Kalkulator Sederhana</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f4f8;
                min-height: 100vh;
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .box {
                background-color: white;
                width: 320px;
                padding: 25px;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 2px 8px #0000001a;
            }

            h2 {
                text-align: center;
                margin-top: 0;
                margin-bottom: 24px;
            }

            label {
                display: block;
                margin-top: 15px;
                margin-bottom: 6px;
            }

            input[type="number"],
            select {
                box-sizing: border-box;
                width: 100%;
                padding: 8px;
            }

            input[type="submit"] {
                width: 100%;
                padding: 9px;
                margin-top: 20px;
                cursor: pointer;
            }

            .hasil {
                margin-top: 18px;
                padding: 10px;
                background-color: #f2f4f8;
                border-radius: 5px;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="box">
            <h2>Kalkulator Sederhana</h2>

            <form method="post">
                <label for="angka1">Angka pertama:</label>
                <input type="number" id="angka1" name="angka1" required>

                <label for="operator">Operator:</label>
                <select id="operator" name="operator">
                    <option value="+">Penjumlahan (+)</option>
                    <option value="-">Pengurangan (-)</option>
                    <option value="*">Perkalian (*)</option>
                    <option value="/">Pembagian (/)</option>
                </select>

                <label for="angka2">Angka kedua:</label>
                <input type="number" id="angka2" name="angka2" required>

                <input type="submit" name="hitung" value="Hitung">
            </form>

            <?php
            if (isset($_POST["hitung"])) {
                $angka1 = $_POST["angka1"];
                $angka2 = $_POST["angka2"];
                $operator = $_POST["operator"];

                if ($operator == "+") {
                    $hasil = $angka1 + $angka2;
                } elseif ($operator == "-") {
                    $hasil = $angka1 - $angka2;
                } elseif ($operator == "*") {
                    $hasil = $angka1 * $angka2;
                } elseif ($operator == "/") {
                    if ($angka2 == 0) {
                        echo "<div class='hasil'>Angka kedua tidak boleh 0 untuk pembagian.</div>";
                    } else {
                        $hasil = $angka1 / $angka2;
                    }
                }

                if (isset($hasil)) {
                    echo "<div class='hasil'>Hasil: " . $angka1 . " " . $operator . " " . $angka2 . " = " . $hasil . "</div>";
                }
            }
            ?>
        </div>
    </body>
</html>
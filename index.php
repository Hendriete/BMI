<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
    <style>
        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            text-align: center;
        }
            .underweight {
        color: red;
        }

        .normal-weight {
            color: green;
        }

        .overweight {
            color: orange;
        }

        .obese {
            color: maroon;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>BMI Calculator</h2>
        <form action="" method="post">
            <label for="height">Tinggi Badan (cm):</label>
            <input type="text" name="height" id="height" required><br><br>
            
            <label for="weight">Berat Badan (kg):</label>
            <input type="text" name="weight" id="weight" required><br><br>
            
            <input type="submit" value="Calculate">
        </form>
        <?php
        // Membuat koneksi ke database
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'bmi';

        $koneksi = mysqli_connect($host, $user, $password, $database);

        // Cek koneksi
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Mendapatkan data yang dikirim dari form
            $weight = $_POST['weight'];
            $height = $_POST['height'];
            
            // Menghitung BMI
            $height_in_meters = $height / 100;
            $bmi = $weight / ($height_in_meters ** 2);
            
            // Menentukan interpretasi BMI
            if ($bmi < 18.5) {
                $interpretation = "Kurus";
                $color = "underweight";
            } elseif ($bmi >= 18.5 && $bmi < 25) {
                $interpretation = "Normal";
                $color = "normal-weight";
            } elseif ($bmi >= 25 && $bmi < 30) {
                $interpretation = "Gemuk";
                $color = "overweight";
            } else {
                $interpretation = "Obesitas";
                $color = "obese";
            }
            $formatted_bobot = number_format($bmi, 1);
            // Memasukkan data ke dalam database
            $query = "INSERT INTO kalkulator (weight, height, bmi, interpretation) VALUES ('$weight', '$height', '$formatted_bobot', '$interpretation')";
            mysqli_query($koneksi, $query);
            
            // Menampilkan hasil dengan kategori dan perbedaan warna
            echo "<h3>Your BMI Result:</h3>";
            echo "<p>Bobot: <strong>$formatted_bobot</strong></p>";
            echo "<p>Keterangan: <span class='$color'>$interpretation</span></p>";
        }

        // Menutup koneksi
        mysqli_close($koneksi);
        ?>
    </div>
</body>
</html>

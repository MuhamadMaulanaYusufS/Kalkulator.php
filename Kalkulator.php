<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Konversi Suhu</title>
</head>
<body>
    <h1>Kalkulator Konversi Suhu</h1>
    <form method="post">
        <label>Masukkan suhu dalam:</label>
        <input type="number" name="input_temperature" required>
        <select name="from_unit">
            <option value="celsius">Celcius</option>
            <option value="kelvin">Kelvin</option>
            <option value="fahrenheit">Fahrenheit</option>
            <option value="reaumur">Réaumur</option>
        </select>
        <br>
        <label>Konversi ke:</label>
        <select name="to_unit">
            <option value="celsius">Celcius</option>
            <option value="kelvin">Kelvin</option>
            <option value="fahrenheit">Fahrenheit</option>
            <option value="reaumur">Réaumur</option>
        </select>
        <br>
        <input type="submit" name="submit" value="Konversi">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $input_temperature = floatval($_POST['input_temperature']);
        $from_unit = $_POST['from_unit'];
        $to_unit = $_POST['to_unit'];

        // Fungsi untuk mengonversi suhu
        function konversiSuhu($input_temperature, $from_unit, $to_unit) {
            switch ($from_unit) {
                case 'celsius':
                    if ($to_unit == 'kelvin') {
                        return $input_temperature + 273.15;
                    } elseif ($to_unit == 'fahrenheit') {
                        return ($input_temperature * 9/5) + 32;
                    } elseif ($to_unit == 'reaumur') {
                        return $input_temperature * 4/5;
                    }
                    break;
                case 'kelvin':
                    if ($to_unit == 'celsius') {
                        return $input_temperature - 273.15;
                    } elseif ($to_unit == 'fahrenheit') {
                        return ($input_temperature - 273.15) * 9/5 + 32;
                    } elseif ($to_unit == 'reaumur') {
                        return ($input_temperature - 273.15) * 4/5;
                    }
                    break;
                case 'fahrenheit':
                    if ($to_unit == 'celsius') {
                        return ($input_temperature - 32) * 5/9;
                    } elseif ($to_unit == 'kelvin') {
                        return ($input_temperature - 32) * 5/9 + 273.15;
                    } elseif ($to_unit == 'reaumur') {
                        return ($input_temperature - 32) * 4/9;
                    }
                    break;
                case 'reaumur':
                    if ($to_unit == 'celsius') {
                        return $input_temperature * 5/4;
                    } elseif ($to_unit == 'kelvin') {
                        return ($input_temperature * 5/4) + 273.15;
                    } elseif ($to_unit == 'fahrenheit') {
                        return ($input_temperature * 9/4) + 32;
                    }
                    break;
                default:
                    return $input_temperature;
            }
        }

        $hasil_konversi = konversiSuhu($input_temperature, $from_unit, $to_unit);

        echo "<p>Hasil konversi: $hasil_konversi $to_unit</p>";
    }
    ?>
</body>
</html>

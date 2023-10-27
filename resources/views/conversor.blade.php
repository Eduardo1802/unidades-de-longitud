<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conversor</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="{{ asset('images/unnamed.png') }}" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .input-container {
            display: flex;
            align-items: center;
        }

        select, input {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .icon-arrow {
            font-size: 20px;
            margin: 0 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        #result {
            text-align: center;
            font-size: 20px;
            margin-top: 10px;
        }
        footer {
            text-align: center;
            /* background-color: #007BFF; */
            /* color: #fff; */
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        /* footer:hover {
            background-color: #007BFF;
        } */
    </style>
</head>
<body>
    <h1>Conversor de unidades de longitud</h1>
    <div class="container">
        <!-- DATOS -->
        <div class="input-container">
            <select name="select1" id="select1">
                <option value="centimetros">Centímetros</option>
                <option value="metros" selected>Metros</option>
                <option value="pies">Pies</option>
                <option value="pulgadas">Pulgadas</option>
                <option value="kilometros">Kilómetros</option>
                <option value="millas">Millas</option>
            </select>
            <input type="number" id="inputValue">
            <i class="fas fa-arrows-alt-h icon-arrow"></i>
            <select name="select2" id="select2">
                <option value="centimetros" selected>Centímetros</option>
                <option value="metros">Metros</option>
                <option value="pies">Pies</option>
                <option value="pulgadas">Pulgadas</option>
                <option value="kilometros">Kilómetros</option>
                <option value="millas">Millas</option>
            </select>
        </div>
        <button id="convertButton">Convertir</button>
        <button id="limpiar">Limpiar</button>
        <!-- RESULTADO -->
        <input type="text" name="result" id="result" value="0" readonly>
    </div>
    <footer>
        Eduardo Azuara Redondo 10 A
    </footer>
    <script>
        $(document).ready(function() {
            $('#select1').on('change', function() {
                var selectedValue = $(this).val();
                $('#select2 option').show();
                $('#select2 option[value="' + selectedValue + '"]').hide();
            });

            $('#limpiar').click(function() {
                $('#select1').val('metros');
                $('#select2').val('centimetros');
                $('#inputValue').val('');
                $('#result').val('0');
            });

            $('#convertButton').click(function() {
                var valor_uno = $('#select1').val();
                var valor_dos = $('#select2').val();
                var inputValue = parseFloat($('#inputValue').val());
                var result;

                if (valor_uno === "centimetros" && valor_dos === "metros") {
                    result = inputValue / 100;
                } else if (valor_uno === "centimetros" && valor_dos === "pies") {
                    result = inputValue / 30.48;
                } else if (valor_uno === "centimetros" && valor_dos === "pulgadas") {
                    result = inputValue / 2.54;
                } else if (valor_uno === "centimetros" && valor_dos === "kilometros") {
                    result = inputValue / 100000;
                } else if (valor_uno === "centimetros" && valor_dos === "millas") {
                    result = (inputValue / 100) / 1609.34;
                } else if (valor_uno === "centimetros" && valor_dos === "centimetros") {
                    result = inputValue ;
                }

                else if (valor_uno === "metros" && valor_dos === "centimetros") {
                    result = inputValue * 100;
                } else if (valor_uno === "metros" && valor_dos === "pies") {
                    result = inputValue * 3.281;
                } else if (valor_uno === "metros" && valor_dos === "pulgadas") {
                    result = inputValue * 39.3701;
                } else if (valor_uno === "metros" && valor_dos === "kilometros") {
                    result = inputValue / 1000;
                } else if (valor_uno === "metros" && valor_dos === "millas") {
                    result = inputValue / 1609.34;

                } else if (valor_uno === "pies" && valor_dos === "centimetros") {
                    result = inputValue * 30.48;
                } else if (valor_uno === "pies" && valor_dos === "metros") {
                    result = inputValue / 3.281;
                } else if (valor_uno === "pies" && valor_dos === "pulgadas") {
                    result = inputValue * 12; 
                } else if (valor_uno === "pies" && valor_dos === "kilometros") {
                    result = inputValue / 3280.84;
                } else if (valor_uno === "pies" && valor_dos === "millas") {
                    result = inputValue / 5280;

                } else if (valor_uno === "pulgadas" && valor_dos === "centimetros") {
                    result = inputValue * 2.54;
                } else if (valor_uno === "pulgadas" && valor_dos === "metros") {
                    result = inputValue / 39.3701; 
                } else if (valor_uno === "pulgadas" && valor_dos === "pies") {
                    result = inputValue / 12; 
                } else if (valor_uno === "pulgadas" && valor_dos === "kilometros") {
                    result = (inputValue * 2.54) / 100000; 
                } else if (valor_uno === "pulgadas" && valor_dos === "millas") {
                    result = (inputValue * 2.54) / 63360;

                } else if (valor_uno === "kilometros" && valor_dos === "centimetros") {
                    result = inputValue * 100000;
                } else if (valor_uno === "kilometros" && valor_dos === "metros") {
                    result = inputValue * 1000;
                } else if (valor_uno === "kilometros" && valor_dos === "pies") {
                    result = inputValue * 3280.84;
                } else if (valor_uno === "kilometros" && valor_dos === "pulgadas") {
                    result = inputValue * 39370.1;
                } else if (valor_uno === "kilometros" && valor_dos === "millas") {
                    result = inputValue / 0.621371;


                } else if (valor_uno === "millas" && valor_dos === "centimetros") {
                    result = inputValue * 160934.4;
                } else if (valor_uno === "millas" && valor_dos === "metros") {
                    result = inputValue * 1609.34;
                } else if (valor_uno === "millas" && valor_dos === "pies") {
                    result = inputValue * 5280;
                } else if (valor_uno === "millas" && valor_dos === "pulgadas") {
                    result = inputValue * 63360; 
                } else if (valor_uno === "millas" && valor_dos === "kilometros") {
                    result = inputValue / 1.60934; 

                } else {
                    result = inputValue; 
                }
                
                $('#result').val(result);
            });
        });
    </script>
</body>
</html>

<?php
include_once ("Mobile_Detect.php");
$detecta = new Mobile_Detect();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abril Hosting</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
            max-width: 90%;
            width: 400px;
        }
        h1 {
            color: #333;
            margin-bottom: 0.5rem;
        }
        h2 {
            margin-top: 0;
        }
        .hosting {
            color: #FF0000;
            font-style: italic;
            font-size: 1.5em;
        }
        .device-info {
            margin-top: 2rem;
            padding: 1rem;
            background-color: #f8f8f8;
            border-radius: 5px;
            font-weight: bold;
        }
        
/*Salir*/
        button {
            display: flex;
            height: 3em;
            width: 100px;
            align-items: center;
            justify-content: center;
            background-color: #eeeeee4b;
            border-radius: 3px;
            letter-spacing: 1px;
            transition: all 0.2s linear;
            cursor: pointer;
            border: none;
            background: #fff;
}

        button > svg {
            margin-right: 5px;
            margin-left: 5px;
            font-size: 20px;
            transition: all 0.4s ease-in;
}

        button:hover > svg {
            font-size: 1.2em;
            transform: translateX(-5px);
}

        button:hover {
            box-shadow: 9px 9px 33px #d1d1d1, -9px -9px 33px #ffffff;
            transform: translateY(-2px);
}
    </style>
</head>
<body>
    <div class="container">
        <h1>Abril</h1>
        <h2><span class="hosting">Hosting</span></h2>
        <div class="device-info">
            <?php
            if ( $detecta->isAndroidtablet() || $detecta->isIpad() || $detecta->isBlackberrytablet() ) {
                echo "Versión para Tablets";
            } elseif( $detecta->isAndroid() ) {
                echo "Versión Android";
            } elseif ( $detecta->isIphone() ) {
                echo "Versión iPhone";
            } elseif ( $detecta->isMobile() ) {
                echo "Otros Móviles";
            } else {
                echo "Versión normal de Windows";
            }
            ?>
        </div>
    </div>

    <a href="menu.php">
        <button>
            <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
            <span>Regresar</span>
        </button>

</body>
</html>
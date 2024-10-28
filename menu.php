<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
            color: #4a4a4a;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }
        .container {
            height: 400px;
            width: 600px;
            border-radius: 1em;
            overflow: hidden;
            box-shadow: 0 10px 20px #dbdbdb;
        }
        .palette {
            display: flex;
            flex-wrap: wrap;
            height: 100%;
            width: 100%;
        }
        .color {
            height: 50%;
            flex: 1 0 33.333%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.2em;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            padding: 10px;
        }
        .color span {
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }
        .color:nth-child(1) { background: #1dd074; }  /* #264653 */
        .color:nth-child(2) { background: #9a1dd0; }  /* #2a9d8f */
        .color:nth-child(3) { background: #b30978; }  /* #e9c46a */
        .color:nth-child(4) { background: #0b9dc1; }  /* #f4a261 */       
        .color:hover {
            flex: 1 0 50%;
            font-size: 1.4em;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }
        .color:hover span {
            opacity: 1;
        }
        #stats {
            width: 100%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            box-sizing: border-box;
            color: #4a4a4a;
            font-size: 1.2em;
            border-top: 1px solid #dbdbdb;
        }
        #stats svg {
            fill: #4a4a4a;
            transform: scale(1.2);
        }
        .pdf-form {
            width: 100%;
            max-width: 600px;
            display: flex;
            gap: 10px;
        }
        .pdf-form select, .pdf-form button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
        }
        .pdf-form select {
            flex-grow: 1;
        }
        .pdf-form button {
            background-color: #264653;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .pdf-form button:hover {
            background-color: #2a9d8f;
        }
        /* .logout {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #4a4a4a;
            text-decoration: none;
            font-size: 1em;
            transition: color 0.3s ease;
        }
        .logout:hover {
            color: #e76f51;
        } */

/*Letra-Mobile Detect*/
        .large-text {
            font-size: 25px;
            transition: transform 0.5s cubic-bezier(0.76, 0, 0.24, 1);
}

        .color:hover svg {
            transform: translateX(5px) rotate(90deg);
}

        .color:hover .large-text {
            transform: translateX(7px);
}

        .color {
            display: flex;
            align-items: center;
            font-family: inherit;
            cursor: pointer;
            font-weight: 500;
            font-size: 17px;
            padding: 0.8em 1.3em 0.8em 0.9em;
            color: white;
            background: #ad5389;
            background: linear-gradient(to right, #0f0c29, #302b63, #24243e);
            text-decoration: none; /* Quita el subrayado del enlace */
            border: none;
            letter-spacing: 0.05em;
            border-radius: 16px;
            transition: background 0.3s;
}

        .color svg {
            margin-right: 3px;
            transform: rotate(30deg);
            transition: transform 0.5s cubic-bezier(0.76, 0, 0.24, 1);
}

        .color span {
            transition: transform 0.5s cubic-bezier(0.76, 0, 0.24, 1);
}

        .color:hover svg {
            transform: translateX(5px) rotate(90deg);
}

        .color:hover span {
            transform: translateX(7px);
}

/*Cerrar Sesion*/
        .Btn {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 45px;
            height: 45px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: rgb(255, 65, 65);
}

        .sign {
            width: 100%;
            transition-duration: .3s;
            display: flex;
            align-items: center;
            justify-content: center;
}

        .sign svg {
            width: 17px;
}

        .sign svg path {
            fill: white;
}

        .text {
            position: absolute;
            right: 0%;
            width: 0%;
            opacity: 0;
            color: white;
            font-size: 1.2em;
            font-weight: 600;
            transition-duration: .3s;
}

        .Btn:hover {
            width: 125px;
            border-radius: 40px;
            transition-duration: .3s;
}

        .Btn:hover .sign {
            width: 30%;
            transition-duration: .3s;
            padding-left: 20px;
}

        .Btn:hover .text {
            opacity: 1;
            width: 70%;
            transition-duration: .3s;
            padding-right: 10px;
}

        .Btn:active {
            transform: translate(2px ,2px);
}

        .logout {
            text-decoration: none;
}
    </style>
</head>
<body>
    <div class="main-container">
        <div class="container">
            <div class="palette">
                <a href="tabla.php?tabla=articulos" class="color"><span>Artículos</span></a>
                <a href="tabla.php?tabla=medidas" class="color"><span>Medidas</span></a>
                <a href="tabla.php?tabla=departamentos" class="color"><span>Departamentos</span></a>
                <a href="tabla.php?tabla=categorias" class="color"><span>Categorías</span></a>
            </div>
        </div>
        
        <form action="generar-pdf.php" method="GET" class="pdf-form">
            <select name="tabla" id="tabla" required>
                <option value="">Seleccionar tabla para PDF</option>
                <option value="articulos">Artículos</option>
                <option value="medidas">Medidas</option>
                <option value="departamentos">Departamentos</option>
                <option value="categorias">Categorías</option>
            </select>
            <button type="submit">Ver PDF</button>
        </form>
        
        <span class="large-text">Mobile Detect </span>
    <a href="muestra.php" class="color">
        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 13c0-5.088 2.903-9.436 7-11.182C16.097 3.564 19 7.912 19 13c0 .823-.076 1.626-.22 2.403l1.94 1.832a.5.5 0 0 1 .095.603l-2.495 4.575a.5.5 0 0 1-.793.114l-2.234-2.234a1 1 0 0 0-.707-.293H9.414a1 1 0 0 0-.707.293l-2.234 2.234a.5.5 0 0 1-.793-.114l-2.495-4.575a.5.5 0 0 1 .095-.603l1.94-1.832C5.077 14.626 5 13.823 5 13zm1.476 6.696l.817-.817A3 3 0 0 1 9.414 18h5.172a3 3 0 0 1 2.121.879l.817.817.982-1.8-1.1-1.04a2 2 0 0 1-.593-1.82c.124-.664.187-1.345.187-2.036 0-3.87-1.995-7.3-5-8.96C8.995 5.7 7 9.13 7 13c0 .691.063 1.372.187 2.037a2 2 0 0 1-.593 1.82l-1.1 1.039.982 1.8zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" fill="currentColor"></path>
        </svg>
        <span>Launch</span>
    </a>
        
        <!-- <a href="logout.php" class="logout">Cerrar sesión</a> -->
    <a href="logout.php" class="logout Btn">
        <div class="sign">
            <svg viewBox="0 0 512 512">
                <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
            </svg>
        </div>
        <div class="text">Logout</div>
    </a>
    </div>
</body>
</html>
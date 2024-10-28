<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #fff5f5;
            color: #4a4a4a;
        }
        .container {
            background-color: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
        }
        h2 {
            text-align: center;
            color: #ff69b4;
            margin-bottom: 1.5rem;
            font-weight: 300;
        }
        .form {
            display: flex;
            flex-direction: column;
        }
        p {
            text-align: center;
            margin-top: 1rem;
        }
        a {
            color: #ff69b4;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .input__container {
            position: relative;
            background: #f0f0f0;
            padding: 20px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 15px;
            border: 4px solid #000;
            max-width: 350px;
            transition: all 400ms cubic-bezier(0.23, 1, 0.32, 1);
            transform-style: preserve-3d;
            transform: rotateX(10deg) rotateY(-10deg);
            perspective: 1000px;
            box-shadow: 10px 10px 0 #000;
            margin-bottom: 20px;
        }
        .input__container:hover {
            transform: rotateX(5deg) rotateY(1deg) scale(1.05);
            box-shadow: 25px 25px 0 -5px #e9b50b, 25px 25px 0 0 #000;
        }
        .shadow__input {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            bottom: 0;
            z-index: -1;
            transform: translateZ(-50px);
            background: linear-gradient(
                45deg,
                rgba(255, 107, 107, 0.4) 0%,
                rgba(255, 107, 107, 0.1) 100%
            );
            filter: blur(20px);
        }
        .input__button__shadow {
            cursor: pointer;
            border: 3px solid #000;
            background: #e9b50b;
            transition: all 400ms cubic-bezier(0.23, 1, 0.32, 1);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            transform: translateZ(20px);
            position: relative;
            z-index: 3;
            font-weight: bold;
            text-transform: uppercase;
        }
        .input__button__shadow:hover {
            background: #e9b50b;
            transform: translateZ(10px) translateX(-5px) translateY(-5px);
            box-shadow: 5px 5px 0 0 #000;
        }
        .input__button__shadow svg {
            fill: #000;
            width: 25px;
            height: 25px;
        }
        .input__search {
            width: 100%;
            outline: none;
            border: 3px solid #000;
            padding: 15px;
            font-size: 18px;
            background: #fff;
            color: #000;
            transform: translateZ(10px);
            transition: all 400ms cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            z-index: 3;
            font-family: "Roboto", Arial, sans-serif;
            letter-spacing: -0.5px;
        }
        .input__search::placeholder {
            color: #666;
            font-weight: bold;
            text-transform: uppercase;
        }
        .input__search:hover,
        .input__search:focus {
            background: #f0f0f0;
            transform: translateZ(20px) translateX(-5px) translateY(-5px);
            box-shadow: 5px 5px 0 0 #000;
        }
        .input__container::before {
            content: "USERNAME";
            position: absolute;
            top: -15px;
            left: 20px;
            background: #e9b50b;
            color: #000;
            font-weight: bold;
            padding: 5px 10px;
            font-size: 14px;
            transform: translateZ(50px);
            z-index: 4;
            border: 2px solid #000;
        }
        /* Nuevo estilo para el botón */
        .cta {
            display: flex;
            padding: 11px 33px;
            text-decoration: none;
            font-size: 25px;
            color: white;
            background: #6225e6;
            transition: 1s;
            box-shadow: 6px 6px 0 black;
            transform: skewX(-15deg);
            border: none;
            cursor: pointer;
            width: 100%;
            justify-content: center;
            margin-top: 20px;
        }
        .cta:focus {
            outline: none;
        }
        .cta:hover {
            transition: 0.5s;
            box-shadow: 10px 10px 0 #fbc638;
        }
        .cta .second {
            transition: 0.5s;
            margin-right: 0px;
        }
        .cta:hover .second {
            transition: 0.5s;
            margin-right: 45px;
        }
        .span {
            transform: skewX(15deg);
        }
        .second {
            width: 20px;
            margin-left: 30px;
            position: relative;
            top: 12%;
        }
        .one {
            transition: 0.4s;
            transform: translateX(-60%);
        }
        .two {
            transition: 0.5s;
            transform: translateX(-30%);
        }
        .cta:hover .three {
            animation: color_anim 1s infinite 0.2s;
        }
        .cta:hover .one {
            transform: translateX(0%);
            animation: color_anim 1s infinite 0.6s;
        }
        .cta:hover .two {
            transform: translateX(0%);
            animation: color_anim 1s infinite 0.4s;
        }
        @keyframes color_anim {
            0% {
                fill: white;
            }
            50% {
                fill: #fbc638;
            }
            100% {
                fill: white;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bienvenido/a</h2>
        <form action="login_process.php" method="POST" class="form">
            <div class="input__container">
                <div class="shadow__input"></div>
                <button class="input__button__shadow">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="#000000"
                    width="20px"
                    height="20px"
                    >
                    <path d="M0 0h24v24H0z" fill="none"></path>
                    <path
                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"
                    ></path>
                    </svg>
                </button>
                <input
                    type="text"
                    name="usuario"
                    class="input__search"
                    placeholder="Nombre de Usuario"
                    required
                />
            </div>
            <div class="input__container">
                <div class="shadow__input"></div>
                <button class="input__button__shadow">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="#000000"
                    width="20px"
                    height="20px"
                    >
                    <path d="M0 0h24v24H0z" fill="none"></path>
                    <path
                        d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"
                    ></path>
                    </svg>
                </button>
                <input
                    type="password"
                    name="clave"
                    class="input__search"
                    placeholder="Contraseña"
                    required
                />
            </div>
            <button type="submit" class="cta">
                <span class="span">Iniciar Sesión</span>
                <span class="second">
                    <svg width="50px" height="20px" viewBox="0 0 66 43" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="arrow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <path class="one" d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z" fill="#FFFFFF"></path>
                            <path class="two" d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z" fill="#FFFFFF"></path>
                            <path class="three" d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z" fill="#FFFFFF"></path>
                        </g>
                    </svg>
                </span>
            </button>
        </form>
        <p>¿No tienes una cuenta? <a href="register.php">Regístrate</a></p>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Login</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            overflow: hidden;
            background: #080b08;
        } 
        .container {
            width: 100%;
            height: 100vh;

            display: flex;

            background:
                radial-gradient(
                    circle at 25% 50%,
                    rgba(255, 220, 70, 0.05),
                    transparent 35%
                ),
                #080b08;

            transition: background 0.5s ease;
        } 

        .container.light-on {
            background:
                radial-gradient(
                    circle at 27% 50%,
                    rgba(255, 220, 70, 0.35),
                    transparent 40%
                ),
                #10140e;
        }
 

        .lamp-area {
            width: 55%;
            height: 100%;

            position: relative;

            display: flex;
            justify-content: center;
            align-items: flex-start;
        } 

        .lamp {
            position: absolute;

            top: 100px;

            width: 100px;
            height: 45px;

            background: #050505;

            border-radius: 50px 50px 15px 15px;

            z-index: 5;

            box-shadow:
                0 5px 15px rgba(0,0,0,0.8);
        }
 

        .bulb {
            position: absolute;

            top: 132px;

            left: 50%;

            transform: translateX(-50%);

            width: 25px;
            height: 30px;

            border-radius: 50%;

            background: #333;

            transition: 0.4s;

            z-index: 4;
        } 

        
 

        .light-on .bulb {
            background: #fff5a0;

            box-shadow:
                0 0 15px #fff200,
                0 0 40px #ffd900,
                0 0 70px #ffcc00;
        }

        .light-on .light-beam {
            border-top-color: rgba(255, 220, 80, 0.28);

            filter: blur(2px);
        }

        .light-on .lamp {
            box-shadow:
                0 0 25px rgba(255, 220, 70, 0.4);
        } 
        .table {
            position: absolute;

            bottom: 110px;

            width: 120px;
            height: 8px;

            background: #181818;

            border-radius: 50%;
        }

        .table::before {
            content: "";

            position: absolute;

            left: 50%;

            transform: translateX(-50%);

            top: 5px;

            width: 5px;
            height: 70px;

            background: #181818;
        }

        .table::after {
            content: "";

            position: absolute;

            left: 50%;

            transform: translateX(-50%);

            top: 70px;

            width: 55px;
            height: 5px;

            background: #181818;

            border-radius: 50%;
        } 
        .cord {
            position: absolute;

            top: 140px;

            left: calc(50% + 35px);

            width: 4px;

            height: 100px;

            background: #030303;

            z-index: 10;

            cursor: grab;

            touch-action: none;

            transform-origin: top;
        }

        .cord:active {
            cursor: grabbing;
        } 
        .handle {
            position: absolute;

            bottom: -15px;

            left: 50%;

            transform: translateX(-50%);

            width: 22px;
            height: 30px;

            background: #070707;

            border-radius: 8px;

            cursor: grab;

            box-shadow:
                0 3px 5px rgba(0,0,0,0.6);
        }

        .handle::after {
            content: "";

            position: absolute;

            bottom: -7px;

            left: 50%;

            transform: translateX(-50%);

            width: 14px;
            height: 8px;

            background: #555;

            border-radius: 50%;
        }
 
        .login-area {
            width: 45%;
            height: 100%;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 30px;
        }

        .login-box {
            width: 380px;

            padding: 35px;

            background: rgba(35, 38, 31, 0.95);

            border: 1px solid rgba(255,255,255,0.08);

            border-radius: 15px;

            box-shadow:
                0 15px 40px rgba(0,0,0,0.6);

            opacity: 0;

            transform: translateX(80px);

            pointer-events: none;

            transition:
                opacity 0.6s ease,
                transform 0.6s ease;
        }
 

        .light-on .login-box {
            opacity: 1;

            transform: translateX(0);

            pointer-events: auto;
        }

        .login-box h1 {
            text-align: center;

            color: white;

            margin-bottom: 8px;
        }

        .login-box .subtitle {
            text-align: center;

            color: #999;

            font-size: 12px;

            margin-bottom: 25px;
        }
 

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;

            color: #aaa;

            font-size: 13px;

            margin-bottom: 7px;
        }

        .input-group input {
            width: 100%;

            padding: 12px;

            background: #151813;

            border: 1px solid #333;

            border-radius: 8px;

            color: white;

            outline: none;
        }

        .input-group input:focus {
            border-color: #ffd900;

            box-shadow:
                0 0 8px rgba(255, 217, 0, 0.25);
        } 

        .login-btn {
            width: 100%;

            padding: 13px;

            border: none;

            border-radius: 8px;

            background: #ffd900;

            color: #111;

            font-weight: bold;

            cursor: pointer;

            margin-top: 5px;

            transition: 0.3s;
        }

        .login-btn:hover {
            background: #ffe84a;

            transform: translateY(-2px);

            box-shadow:
                0 5px 15px rgba(255, 217, 0, 0.25);
        } 

        .instruction {
            position: absolute;

            bottom: 35px;

            left: 50%;

            transform: translateX(-50%);

            color: #888;

            font-size: 13px;

            text-align: center;

            white-space: nowrap;
        }

        .light-on .instruction {
            color: #ddd;
        }
 

        @media (max-width: 800px) {

            .container {
                flex-direction: column;
            }

            .lamp-area {
                width: 100%;
                height: 45%;
            }

            .login-area {
                width: 100%;
                height: 55%;
            }

            .lamp {
                top: 40px;
            }

            .bulb {
                top: 72px;
            }

            .light-beam {
                top: 80px;
            }

            .cord {
                top: 80px;
            }

            .table {
                bottom: 20px;
            }

            .login-box {
                width: 90%;
                padding: 25px;
            }

            .instruction {
                bottom: 5px;
            }
        }

    </style>
</head>

<body>

<div class="container" id="container">
 
    <div class="lamp-area">

        <div class="lamp"></div>

        <div class="bulb"></div>

        <div class="light-beam"></div>
 
        <div class="cord" id="cord">
            <div class="handle"></div>
        </div>

        <div class="table"></div>

        <div class="instruction" id="instruction">
            Drag the cord down to turn on the lamp
        </div>

    </div>
 
    <div class="login-area">

        <div class="login-box">

            <h1>Welcome Back</h1>

            <p class="subtitle">
                Enter your details to continue
            </p>

            <form action="/login" method="POST">

                @csrf

                <div class="input-group">

                    <label>Username</label>

                    <input
                        type="text"
                        name="username"
                        placeholder="Username"
                    >

                </div>


                <div class="input-group">

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        placeholder="Email Address"
                    >

                </div>


                <div class="input-group">

                    <label>Password</label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Password"
                    >

                </div>


                <button
                    type="submit"
                    class="login-btn"
                >
                    Sign In
                </button>

            </form>

        </div>

    </div>

</div>


<script>

    const container = document.getElementById("container");

    const cord = document.getElementById("cord");

    const instruction = document.getElementById("instruction");

    let isDragging = false;

    let startY = 0;

    let cordPosition = 0;

    let lampOn = false;

 
    cord.addEventListener("pointerdown", function(event) {

        isDragging = true;

        startY = event.clientY;

        cord.setPointerCapture(event.pointerId);

    });

 

    cord.addEventListener("pointermove", function(event) {

        if (!isDragging) {
            return;
        }

        let difference = event.clientY - startY;

        

        if (difference < 0) {
            difference = 0;
        }

        if (difference > 130) {
            difference = 130;
        }

        cordPosition = difference;

        cord.style.height = (90 + difference) + "px";

    });

 

    cord.addEventListener("pointerup", function(event) {

        if (!isDragging) {
            return;
        }

        isDragging = false;

 
        if (cordPosition > 60) {

            lampOn = true;

        } else {

            lampOn = false;

        }


        updateLamp();

    });

 
    cord.addEventListener("pointercancel", function() {

        isDragging = false;

        updateLamp();

    });


    function updateLamp() {

        if (lampOn) {

            container.classList.add("light-on");

            cord.style.height = "150px";

            instruction.innerHTML =
                "Drag the cord back up to turn off the lamp";

        } else {

            container.classList.remove("light-on");

            cord.style.height = "90px";

            instruction.innerHTML =
                "Drag the cord down to turn on the lamp";

        }

    }

</script>

</body>
</html>
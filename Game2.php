

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Farzad Foroghy & Arian Hossein pour">
    <meta name="keywords" content="جنگی , فاتحان خیبر , فاتحان , خیبر , حاج قاسم , سردار دل ها , موشک , مرگ بر آمریکا ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="این یک بازی جنگی برای سرگرمی شما است ">
    <title>فاتحان خیبر</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>

    <div class="profile">
        <div class="pro1">
            <div class="p_img">
                <img src="img/usericon.png" alt="" id="pro_img">
            </div>
            <div class="username">
                <h1 id="h_username" ><?php echo $send_user_name ?></h1>
            </div>
        </div>
        <div class="vs">VS</div>
        <div class="pro2">
            <div class="p_img">
                <img src="img/usericon.png" alt="" id="pro_img">
            </div>
            <div class="username">
                <h1 id="h_username"><?php echo $g_user ?></h1>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="name">
            <h1> فاتحان خیبر </h1>
        </div>
        <div class="point">
            <h1 id="point_a">Point</h1>
        </div>
        <div class="timer">
            <h1 id="second">0</h1>
        </div>
        <div class="b_music" > <h1>قطع موزیک </h1></div>
    </div>
    <!-- این کل چیدمان و اجزای بازی است  -->
    <div class="box">
        <!-- این قسمت شامل اجزای مختصاتی می شود  -->
        <div class="table">

            <div class="co">

                <div class="number">
                    <div class="Coordinates">8</div>
                    <div class="Coordinates">7</div>
                    <div class="Coordinates">6</div>
                    <div class="Coordinates">5</div>
                    <div class="Coordinates">4</div>
                    <div class="Coordinates">3</div>
                    <div class="Coordinates">2</div>
                    <div class="Coordinates">1</div>
                </div>
                <div class="home">

                    <div class="B" dir="rtl">

                    </div>

                    <div class="number2">
                        <div class="Coordinates2">1</div>
                        <div class="Coordinates2">2</div>
                        <div class="Coordinates2">3</div>
                        <div class="Coordinates2">4</div>
                        <div class="Coordinates2">5</div>
                        <div class="Coordinates2">6</div>
                        <div class="Coordinates2">7</div>
                        <div class="Coordinates2">8</div>
                    </div>
                </div>
            </div>
            <!-- این قسمت دکمه ها و ورودی ها را تشکیل می دهد  -->
            <div class="main">


                <div class="inputs">
                    <span>X</span> <input id="X" type="number" max="8" min="1">

                    <span>Y</span> <input id="Y" type="number" max="8" min="1">
                </div>


                <div class="btn">
                    <button id="fire">شلیک</button>
                </div>
            </div>

        </div>
        
        <!-- این قسمت شامل عکس سلاح ها است -->
        <div class="gun">

            <div class="jet">
                <img id="Jet" src="img/jet.png" alt="Jet">
                <span> جنگنده </span> <input name="check" id="ch_jet" type="radio" value="jet" >
            </div>

            <div class="tank">
                <img id="Tank" src="img/fr13633880.png" alt="Tank">
                <span> تانک </span> <input name="check" id="ch_tank" type="radio" value="tank" >
            </div>

            <div class="rocket">
                <img id="Rocket" src="img/Rockets.png" alt="Rocket">
                <span> موشک </span> <input name="check" id="ch_rocket" type="radio" value="rocket" >
            </div>

        </div>
    </div>

    <div class="music">
        <audio autoplay loop id="bmusic" src="music/Epic Battle Music Dragon Castle.mp3"></audio>
    </div>
        
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="script2.js"></script>
</html>
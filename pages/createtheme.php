<?php
session_start();
if ($_POST['generated']) {
    $code = file_get_contents("../assets/base_theme.css");
    preg_match_all('/{%(.*?)%}/i', $code, $matches, PREG_SET_ORDER);
    //print_r($matches);
    foreach ($matches as $value) {
        $code = str_replace($value[0], $_POST[$value[1]], $code);
    }
    // Create a temporary file in the temporary 
    // files directory using sys_get_temp_dir()
    $filename = 'ThemeMaker' . session_id() . ".css";
    $temp_file = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $filename;    
    $fp = fopen($temp_file, 'w');
    fwrite($fp, $code);
    fclose($fp);

    header('Content-Description: File Transfer');
    header('Content-Type: text/css');
    header('Content-Disposition: attachment; filename="'.$filename.'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($temp_file));
    readfile($temp_file);
    exit;
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Thememaker</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../img/BD.png">
</head>

<body>

    <div id="wrapper"></div>
    <header>
        <div id="bannerspace">
            <center><img id="banner" src="../img/headerbg_tight.png" alt="banner" draggable=false></center>
            <img id="logo" src="../img/BD_transparent.png" class="logo" alt="ICON BD" draggable=false>
        </div>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li class="cp">Create a Theme</li>
                <li><a href="../pages/clearvision.php">ClearVision</a></li>
                <li><a href="https://shorturl.at/esy46">Download BD</a></li>
            </ul>
        </nav>
        </div>
    </header>
    <main>


        <div class="row">
            <h1 id="titel">Create your own Theme</h1>
            <div class="column">
                <form name="form" method="post">

                    <label for="maincolor">
                        Main Color
                        <span title="Changes the main color">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <input type="color" id="colorinput" name="maincolor" value="#2780e6"><br><br>

                    <label for="hovercolor">
                        Hover Color
                        <span title="Changes the color when hovering over something.">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <input type="color" id="colorinput" name="hovercolor" value="#1e63b3"><br><br>

                    <label for="textcolor">
                        Text Color
                        <span title="Changes the text color.">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <input type="color" id="colorinput" name="textcolor" value="#CCCCCC"><br><br>

                    <label for="channelwidth">
                        Channelwidth in px
                        <span title="Changes the width of text and voice channels">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <input type="number" name="channelswidth" value="220"><br><br>

                    <label for="memberwidth">
                        Memberwidth in px
                        <span title="Changes the width of the members on a server">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <input type="number" name="memberwidth" value="240"><br><br>

                    <label for="bgimg">
                        Background Image URL
                        <span title="Background image will be applied to your discord background">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <input type="url" name="bgimg" value=""><br><br>

                    <label for="bgblur">
                        Background blur in px
                        <span title="Changes the blur of the background">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <input type="number" name="bgblur" value="0"><br><br>


                    <label for="font">
                        Font
                        <span title="Changes all font in discord">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <select name="font" id="font">
                        <option value="Whitney" selected="selected">Whitney</option>
                        <option value="Arial">Arial</option>
                        <option value="Helvetica Neue">Helvetica Neue</option>
                        <option value="Helvetica">Helvetica</option>
                        <option value="sans-serif">sans-serif</option>
                    </select>
                    <input type="hidden" name="generated" value="<?php echo date("YmdHis"); ?>">
                    <input type="submit" value="Submit" action="../assets/base_theme.css">
                </form>
            </div>
            <div2 class="column">
                <img src="../assets/example.png" alt="DiscordImage" id="myImg">
            </div2>
        </main>
    <footer>
        <div class="left">
            <p>Project Contributors: <br>René, Matteo, Robin, Oliver<br></p>
        </div>

        <div class="right">
            <a href="https://github.com/ReddixT/BetterDiscord-Thememaker">GitHub<br></a>
            <a href="https://www.zli.ch/">ZLI</a>
        </div>
    </footer>
    </div>
</body>

</html>
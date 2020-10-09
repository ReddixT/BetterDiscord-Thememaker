<?php
error_reporting(0);
session_start();
$generated = filter_input(INPUT_POST, 'generated', FILTER_SANITIZE_STRING);
if ($generated) {
    $code = file_get_contents("../themesbd/base_theme.css");
    preg_match_all('/{%(.*?)%}/i', $code, $matches, PREG_SET_ORDER);
    //print_r($matches);
    foreach ($matches as $value) {
        $replacement = filter_input(INPUT_POST, $value[1]);
        $code = str_replace($value[0], $replacement, $code);
    }
    $filename = 'ThemeMaker' . session_id() . ".css";
    $temp_file = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $filename;
    $fp = fopen($temp_file, 'w');
    fwrite($fp, $code);
    fclose($fp);
    header('Content-Description: File Transfer');
    header('Content-Type: text/css');
    $themename = filter_input(INPUT_POST, 'themename', FILTER_SANITIZE_STRING);
    header('Content-Disposition: attachment; filename="' . $themename . '.theme.css"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($temp_file));
    readfile($temp_file);
}
$submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING);
if ($submit) {
    $code = file_get_contents("../discordpreview/discordpreview.css");
    preg_match_all('/{%(.*?)%}/i', $code, $matches, PREG_SET_ORDER);
    //print_r($matches);
    foreach ($matches as $value) {
        $replacement = filter_input(INPUT_POST, $value[1]);
        $code = str_replace($value[0], $replacement, $code);
    }
    $filename = "discordpreview".session_id().".css";
    file_put_contents("../discordpreview/$filename", $code);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Themecreator</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/classes.css">
    <link rel="stylesheet" href="../css/ids.css">
    <link rel="icon" href="../img/BD.png">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <div id="wrapper"></div>
    <div id="bannerspace">
        <center>
            <a draggable=false>
                <img id="banner" src="../img/headerbg_tight_transparent.png" alt="banner" draggable=false>
            </a>
        </center>
        <a href="https://github.com/rauenzi/BBDInstaller/releases/latest/download/BandagedBD.exe" draggable=false>
            <img id="logo" src="../img/BD_transparent.png" class="logo" alt="ICON BD" draggable=false>
        </a>
    </div>
    <header>
        <div>
            <nav>
                <ul>
                    <a href="../index.php" draggable=false>
                        <li>Home</li>
                    </a>
                    <li class="cp">Create a Theme</li>
                    <a href="../pages/library.php" draggable=false>
                        <li>Library</li>
                    </a>
                    <a href="../pages/clearvision.php" draggable=false>
                        <li>ClearVision</li>
                    </a>
                    <a href="../pages/tutorial.php" draggable=false><li>Tutorial</li></a>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="row">
            <h1 id="titel">Create your own Theme</h1>
            <center>
                <hr style="width: 50%;">
            </center>
            <div class="column">
                <!-- <center> -->
                <form name="form" method="post">

                    <div id="leftdiv">
                        <label for="themename">
                            Name your Theme
                            <span title="Shows the themename in Discord">
                                <sup id="sup">(?)</sup>
                            </span>
                        </label><br>
                        <input type="text" name="themename" value="<?php 
                                $themename = filter_input(INPUT_POST, 'themename', FILTER_SANITIZE_STRING);
                                if ($submit) { 
                                    echo $themename; 
                                }
                                else {
                                    echo "CustomTheme";
                                }
                            ?>"
                        ><br><br>

                        <label for="author">
                            Author
                            <span title="Shows the author in Discord">
                                <sup id="sup">(?)</sup>
                            </span>
                        </label><br>
                        <input type="text" name="author" value="<?php 
                                $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING);
                                if ($submit) { 
                                    echo $author; 
                                }
                                else {
                                    echo "ROM-R";
                                }
                            ?>"
                        ><br><br>

                        <label for="channelwidth">
                            Channelwidth in px
                            <span title="Changes the width of text and voice channels">
                                <sup id="sup">(?)</sup>
                            </span>
                        </label><br>
                        <input type="number" name="channelwidth" value="<?php 
                                $channelwidth = filter_input(INPUT_POST, 'channelwidth', FILTER_SANITIZE_STRING);
                                if ($submit) { 
                                    echo $channelwidth; 
                                }
                                else {
                                    echo "220";
                                }
                            ?>"
                        ><br><br>

                        <label for="memberwidth">
                            Memberwidth in px
                            <span title="Changes the width of the members on a server">
                                <sup id="sup">(?)</sup>
                            </span>
                        </label><br>
                        <input type="number" name="memberwidth" value="<?php 
                                $memberwidth = filter_input(INPUT_POST, 'memberwidth', FILTER_SANITIZE_STRING);
                                if ($submit) { 
                                    echo $memberwidth; 
                                }
                                else {
                                    echo "240";
                                }
                            ?>"
                        ><br><br>

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
                        <input type="submit" value="Download Theme" id="downloadbtn" name="generated">
                    </div>

                    <div id="rightdiv">
                        <label for="maincolor">
                            Main Color
                            <span title="Changes the main color">
                                <sup id="sup">(?)</sup>
                            </span>
                        </label><br>
                        <input type="color" id="colorinput" name="maincolor" value="<?php 
                                $maincolor = filter_input(INPUT_POST, 'maincolor', FILTER_SANITIZE_STRING);
                                if ($submit) { 
                                    echo $maincolor; 
                                }
                                else {
                                    echo "#2780e6";
                                }
                            ?>"
                        ><br><br>

                        <label for="hovercolor">
                            Hover Color
                            <span title="Changes the color when hovering over something.">
                                <sup id="sup">(?)</sup>
                            </span>
                        </label><br>
                        <input type="color" id="colorinput" name="hovercolor" value="<?php 
                                $hovercolor = filter_input(INPUT_POST, 'hovercolor', FILTER_SANITIZE_STRING);
                                if ($submit) { 
                                    echo $hovercolor; 
                                }
                                else {
                                    echo "#1e63b3";
                                }
                            ?>"
                        ><br><br>

                        <label for="textcolor">
                            Text Color
                            <span title="Changes the text color.">
                                <sup id="sup">(?)</sup>
                            </span>
                        </label><br>
                        <input type="color" id="colorinput" name="textcolor" value="<?php 
                                $textcolor = filter_input(INPUT_POST, 'textcolor', FILTER_SANITIZE_STRING);
                                if ($submit) { 
                                    echo $textcolor; 
                                }
                                else {
                                    echo "#CCCCCC";
                                }
                            ?>"
                        ><br><br>

                        <label for="bgimg">
                            Background Image URL
                            <span title="Background image will be applied to your discord background">
                                <sup id="sup">(?)</sup>
                            </span>
                        </label><br>
                        <input type="url" name="bgimg" value="<?php 
                                $bgimg = filter_input(INPUT_POST, 'bgimg', FILTER_SANITIZE_STRING);
                                if ($submit) { 
                                    echo $bgimg; 
                                }
                                else {
                                    echo "";
                                }
                            ?>"
                        ><br><br>

                        <label for="bgblur">
                            Background blur in px
                            <span title="Changes the blur of the background">
                                <sup id="sup">(?)</sup>
                            </span>
                        </label><br>
                        <input type="number" name="bgblur" value="<?php 
                                $bgblur = filter_input(INPUT_POST, 'bgblur', FILTER_SANITIZE_STRING);
                                if ($submit) { 
                                    echo $bgblur; 
                                }
                                else {
                                    echo "0";
                                }
                            ?>"
                        >
                        <input type="submit" id="submit-btn" value="Submit" name="submit">
                    </div>
                </form>
                <!-- </center> -->
            </div>
            <div class="columnbig">
                <object data="../discordpreview/discordpreview.php" id="preview" ></object>
            </div>
    </main>
    <footer>
        <div class="left">
            <p id="footertext">Project Contributors: <br>René, Matteo, Robin, Oliver<br></p>
        </div>

        <div class="right">
            <a id="projectlogo" draggable="false"><img src="../img/BD_transparent2.png" draggable="false"></a>
            <a id="discordlogo" href="https://discord.com/" draggable="false"><img src="../img/discord_icon.png" draggable="false"></a>
            <a id="waage" href="https://github.com/ReddixT/BetterDiscord-Thememaker/blob/main/LICENSE" draggable="false"><img src="../img/waage.png" draggable="false"></a>
            <a id="githublogo" href="https://github.com/ReddixT/BetterDiscord-Thememaker" draggable="false"><img src="../img/github.png" draggable="false"></a>
            <a id="zlilogo" href="https://www.zli.ch/" draggable="false"><img src="../img/ZLI.png" draggable="false"></a>
        </div>
    </footer>
    </div>
</body>

</html>
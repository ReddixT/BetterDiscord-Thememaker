<!DOCTYPE html>
<html>
    <head>
        <title>Thememaker</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="icon" href="../img/BD.png">
        <link rel="ddm" href="../javascript/dropdownmenu.js">
    </head>
    <body>
        <div id="wrapper"></div>
            <header>
                <div id="bannerspace">
                    <center><img id="banner" src="../img/headerbg_tight.png" alt="banner" draggable=false></center>
                    <img id="logo"src="../img/BD_transparent.png" class="logo" alt="ICON BD" draggable=false>
                </div>                    
                    <nav>
                        <ul>
                            <li><a href="../index.php">Home</a></li>
                            <li class="cp">Create a Theme</li>
                        </ul>
                    </nav>
                </div>
            </header>
            <main>
                <div class="row">
                    <h1 id="titel">Create your own Theme</h1>  
                    <div class="column">
                        <form name="form" method="get">

                            <label for="maincolor"   >
                                Main Color
                                <span title="Changes the main color">
                                    <sup id="sup">(?)</sup>
                                </span>
                            </label><br>
                            <input type="color" id="colorinput" name="maincolor" value="#2780e6"><br><br>

                            <label for="hovercolor"   >
                                Hover Color
                                <span title="Changes the color when hovering over something.">
                                    <sup id="sup">(?)</sup>
                                </span>
                            </label><br>
                            <input type="color" id="colorinput" name="hovercolor" value="#1e63b3"><br><br>

                            <label for="textcolor"   >
                                Text Color
                                <span title="Changes the text color.">
                                    <sup id="sup">(?)</sup>
                                </span>
                            </label><br>
                            <input type="color" id="colorinput" name="textcolor" value="#CCCCCC"><br><br>

                            <label for="channelwidth"   >
                                Channelwidth in px
                                <span title="Changes the width of text and voice channels">
                                    <sup id="sup">(?)</sup>
                                </span>
                            </label><br>
                            <input type="number" name="channelswidth" value="220"><br><br>

                            <label for="memberwidth"   >
                                Memberwidth in px
                                <span title="Changes the width of the members on a server">
                                    <sup id="sup">(?)</sup>
                                </span>
                            </label><br>
                            <input type="number" name="memberwidth" value="240"><br><br>

                            <label for="bgimg"   >
                                Background Image URL
                                <span title="Background image will be applied to your discord background">
                                    <sup id="sup">(?)</sup>
                                </span>
                            </label><br>
                            <input type="url" name="bgimg"     value=""><br><br>

                            
                            <label for="font"   >
                                Font
                                <span title="Changes all font in discord">
                                    <sup id="sup">(?)</sup>
                                </span>
                            </label><br>
                            <select name="font" id="font">
                                <option value="Whitney" selected="selected" >Whitney</option>
                                <option value="Arial"           >Arial</option>
                                <option value="Helvetica Neue"  >Helvetica Neue</option>
                                <option value="Helvetica"       >Helvetica</option>
                                <option value="sans-serif"      >sans-serif</option>
                            </select>
                        </form>
                    </div>
                    <div2 class="column">
                        <img src="../assets/example.png" alt="DiscordImage" id="myImg" > 
                    </div2>
                </div>
            </main>
            <footer>
                <div class="left">
                    
                </div>
                <div class="right">
                </div>
            </footer>
        </div>
    </body>
</html>
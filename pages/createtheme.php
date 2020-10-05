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
                <div>
                    <img src="../img/BD.png" class="logo" alt="ICON BD" draggable=false>
                    <nav>
                        <ul>
                            <li><a href="../index.php">Home</a></li>
                            <li class="cp">Create a Theme</li>
                        </ul>
                    </nav>
                </div>
            </header>
            <main>
                <h1 id="titel">Create your own Theme</h1>
                <form name="form" method="get">
                    <p>Sidebarcolor</p>
                    <input type="color" name="sidebarcolor" value="#000000"><br>
                    <p>App Acent RGB</p>
                    <input type="color" name="appaccentrgb" value="#D73D3D"><br>
                    <p>App Background RGB</p>
                    <input type="color" name="appbgrbg" value="#000000"><br>
                </form>
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
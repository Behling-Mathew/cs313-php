<!DOCTYPE html>
<html lang="en-us">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/head.php'; ?>
    <title>Home | CS 313</title>
    <meta name="description" content="This is the home page for my CS 313 class which includes some of my interests.">

</head>


<body>
    <main>
        <div class="center">
            <h1>CS 313 Home</h1>
            <div class="portal"><a class="portal" href="portal.php">Portal Page</a></div>
            <div>
                <p>Welcome to my homepage. Below you will find some of my interests: </p>
            </div>

            <h2>Sports</h2>
            <div class="grid-container">
                <figure>

                    <img class="basketball" src="assets/basketball.png" height="238" alt="basketball">
                    <figcaption>Basketball</figcaption>
                </figure>
                <figure>
                    <img id="logo" src="assets/take-note.png" width="400" alt="Utah Jazz Logo">
                    <figcaption>Utah Jazz</figcaption>
                </figure>
            </div>
            <h2>Hobbies</h2>
            <div class="grid-container">
                <figure>

                    <img src="assets/piano.jpg" width="400" alt="Piano">
                    <figcaption>Piano</figcaption>
                </figure>
                <figure>

                    <img src="assets/fishing.jpg" width="400" height="264" alt="Fishing">
                    <figcaption>Fishing</figcaption>
                </figure>
            </div>
            <h2>Pokemon</h2>
            <div class="grid-container">
                <figure>

                    <img src="assets/charizard-3.gif" height="127" alt="Charizard">
                    <figcaption>Charizard</figcaption>
                </figure>
                <figure>
                    <img src="assets/lugia.gif" alt="Lugia">
                    <figcaption>Lugia</figcaption>
                </figure>
            </div>
        </div>


    </main>
    <footer>
        <p>&copy;2019 | M Behling | <a href="http://www.byui.edu/online">BYU-Idaho Online Learning</a> |
            <?php echo date('l, d F Y') ?></p>
    </footer>

</body>

</html>
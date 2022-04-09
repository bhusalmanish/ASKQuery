<div id='navbar'>
    <h1 id='logo'>a?kQuery</h1>
    <ul id='ul'>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="addquery.php">Ask Query</a></li>
        <li><a href="#contact"> Trend Topic</a></li>
        <li style="float:right"><a class="active" href="logout.php">LogOut</a></li>
    </ul>

    <h2>Dashboard </h2>
    <br>
    <?php require_once 'check_session.php'; ?>
    <h3>
        <p>Welcome <?php echo $_SESSION['username'] ?></p>
    </h3>




    <hr border=12>

</div>
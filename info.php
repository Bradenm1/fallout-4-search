<!DOCTYPE html>
<html>
    <?php
        include("head.php");
    ?>
    <body id="landing-page-body" style="color:white;">
    <div class="home-button" style="display:block;">
    <a href="http://www.fallout4search.bradenmckewen.com">
      <button type="button" class="check-uncheck-button btn btn-primary home-button-style">Home</button>
    </a>
  </div>
    <div class="wrap-info" style="background-color:rgba(0, 0, 0, 0.43);padding:10px;">
        <h1 style="text-align:center;">Information Page:</h1>

        <h2>Reason for this site</h2>
        <p>Currently there's no site to actually search up all information about NPCs, Objects, Weapons, etc.. 
        I figured I would create it. This website was inspired by the site <a href="http://www.skyrimsearch.com/">Skyrim Search</a>. 
        I found this website still limiting and missing information.</p>
        <p>I hope to have all important information on this website. Currently users would have to open up xEdit or the Creation Kit to get information this website contains. 
        The website currently contains vital information, such as FORMIDs/BASEIDs and EditorIDs for quests, static objects, texture sets, and so forth</p>
        <p>It's sill missing alot of categories, I have just have not implemented them yet. The table structures are subject to change, such as adding race to the NPCs table or their level,
        and so forth. It just comes down to getting this information, converting it and adding it to the database</p>
        <p>Also to add to my portfolio since I'm a student</p>

        <h2>Searching:</h2>
        <p>Please be careful when searching,
        don't be stupid and search for 'a' the database contains over 51K entires it will lag your browser since it uses YOUR compute power to create the tables... 
        Do use the filters and the limit accordingly.</p>

        <h2>Console Commands:</h2>
        <p>The console commands were taken from Skyrim, some of these my not work, or, be out-of-date. It contains the only extensive list I know which contains found commands.</p>
    
        <h2>DLC:</h2>
        <p>The site currently only contains things from the vanilla Fallout 4 game. In the future I may look into adding the DLCs if people would like that information. 
        Not sure about mods at this current time.</p>

        <h2>Subdomain?</h2>
        <p>I'm using a subdomain because I don't want to pay for another domain.</p>

        <h2>Technology Used:</h2>
        <p>Bootstrap, php, javascript, python, MySQL, pascal, creation kit, xEdit.</p>

        <h2>Thanks:</h2>
        <h4>I'd like to thank <a href="https://bethesda.net">Bethesda Studios</a>, <a href="http://skse.silverlock.org/">SKSE</a> team for the <a href="http://skse.silverlock.org/vanilla_commands.html">Console Commands</a>, <a href="https://tes5edit.github.io/">TES5Edit</a> team for making this possible and allow me to gather this information.</h4>
    </div>
    <div class="footer">
        <p>Copyright &copy; 2018 bradenmckewen.com. All rights reserved.</p>
    </div>
    <script src="js/landingPage.js"></script>
    </body>
</html>
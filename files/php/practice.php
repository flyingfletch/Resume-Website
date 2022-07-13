<html>
    <head>

    </head>
    <body>
        <?php
            $greeting = "Hello World!";
            $paragraph = "What a fine day to be alive. :)";
            $farewell = "...well farewell!";
            echo $greeting . "<br>" . $paragraph . "<br>" . $farewell;
            $x = 3;
            $y = 10;
            $z = $x + $y;
            $a = $y - $x;
            $b = $x * $y;
            $c = $y / $x;
            $d = $y % $x;
            echo "<br>" . "$x + $y = $z";
            echo "<br>" . "$y - $x = $a";
            echo "<br>" . "$x * $y = $b";
            echo "<br>" . "$y / $x = $c";
            echo "<br>" . "$y % $x = $d";
        
            $mySkills = array ("HTML", "CSS", "JavaScript", "WordPress", "PHP", "Typing", 
            "Microsoft Office Suite", "Music Performance", "Music Education", "Crafting");
                
            function newList($mySkills) {
                echo "<ul>";
                    foreach ($mySkills as $sk) {
                        echo "<li>" . $sk . "</li>";
                    }
                echo "</ul>";
            }
            echo "<h4>My skills include:</h4>";
            newList($mySkills);
        ?>
    </body>
</html>
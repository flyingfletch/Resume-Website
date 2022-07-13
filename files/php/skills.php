<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="/images/fletchlinghelpbutton.png">
        <title>Jessica Fletcher Skills</title>
    </head>
    <body>
        <header>
            <h1>Jessica<br>Fletcher</h1>
            <nav class="header">
                        <a href="index.php" title="Resume Home">Home</a>
                        <a href="skills.php" title="Skills">Skills</a>
                        <a href="portfolio.php" title="Resume Portfolio">Portfolio</a>
                        <a href="about.php" title="About Jessica">About</a>
            </nav>
            <img src="../../images/headshot.jpg" alt="Headshot of Jessica Fletcher">
        </header>
        <article>
            <section>
                <h2>Skills Overview</h2>
                <div class="padding">
                    <?php
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
                </div>
            </section>
            <section>
                <h2>Technical Skills</h2>
                    <dl>
                        <dt>Typing</dt>
                            <dd>
                                <ul>
                                    <li>66WPM</li>
                                    <li>Limited Errors</li>
                                </ul>
                            </dd>
                        <dt>Office Software</dt>
                            <dd>
                                <ul>
                                    <li>Word</li>
                                    <li>Excell</li>
                                </ul>
                            </dd>
                        <dt>HTML & CSS Basics</dt>
                            <dd>
                                <ul>
                                    <li>Learned on www.freecodecamp.org</li>
                                    <li>Learning more through SLCC Web Development Certification Course</li>
                                </ul>
                            </dd>
                        <dt>Music Performance</dt>
                            <dd>
                                <ul>
                                    <li>Proficient in Clarinet</li>
                                    <li>Intermediate in Piano, Violin, and Saxophone</li>
                                </ul>
                            </dd>
                        <dt>Music Education</dt>
                            <dd>
                                <ul>
                                    <li>Took music education classes</li>
                                    <li>Taught private music lessons</li>
                                </ul>
                            </dd>
                        <dt>Fiber Arts</dt>
                            <dd>
                                <ul>
                                    <li>Crochet</li>
                                    <li>Pattern Making</li>
                                    <li>Sewing</li>
                                    <li>Embroidery</li>
                                </ul>
                            </dd>
                    </dl>
            </section>
            <section>
                <h2>Core Competencies</h2>
                    <dl>
                        <dt>Time Management</dt>
                            <dd>
                                <ul>
                                    <li>Complete projects within dealdine</li>
                                    <li>Set-up reasonable timeline to achieve goals</li>
                                </ul>
                            </dd>
                        <dt>Self-Motivation</dt>
                            <dd>
                                <ul>
                                    <li>Eager to work</li>
                                    <li>Self-starter</li>
                                </ul>
                            </dd>
                        <dt>Organization</dt>
                            <dd>
                                <ul>
                                    <li>Orderly workspace, files, and planning</li>
                                    <li>Keep track of schedules and make plans that work</li>
                                </ul>
                            </dd>
                        <dt>Self-Improvement</dt>
                            <dd>
                                <ul>
                                    <li>Goal oriented</li>
                                    <li>Enjoy the learning process</li>
                                    <li>Looking for different ways to be more effective and efficient</li>
                                </ul>
                            </dd>
                        <dt>Customer Satisfaction</dt>
                            <dd>
                                <ul>
                                    <li>Prioritize kindness</li>
                                    <li>Clear communication</li>
                                    <li>De-escalate difficult situations</li>
                                </ul>
                            </dd>
                    </dl>
            </section>
        </article>
        <footer>
            <nav>
                <a href="index.php" title="Resume Home">Home</a>
                <a href="skills.php" title="Skills">Skills</a>
                <a href="portfolio.php" title="Resume Portfolio">Portfolio</a>
                <a href="about.php" title="About Jessica">About</a>
            </nav>
        </footer>
    </body>
</html>
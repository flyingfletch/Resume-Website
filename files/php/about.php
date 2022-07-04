<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="/images/fletchlinghelpbutton.png">
        <title>About Jessica Fletcher</title>
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
                <h2>Download Resume</h2>
                    <p>If you would like to download a hardcopy of this resume, <a href="../../documents/resume.pdf" download="../documents/resume.pdf">click here!</a></p>
            </section>
            <section>
                <h2>Contact Jessica</h2>
                    <form action="http://form-test.slccwebdev.com/form-success.php" method="get">
                        <div>
                            <label for="name" class="form-label">Name</label><br>
                                <input type="text" id="name" name="name">
                        </div>
                        <div>
                            <label for="phone" class="form-label">Phone</label><br>
                                <input type="tel" id="phone" name="phone">
                        </div>
                        <div>
                            <label for="text" class="form-label">Text</label><br>
                                <input type="tel" id="text" name="text">
                        </div>
                        <div>
                            <label for="email" class="form-label">Email</label><br>
                                <input type="email" id="email" name="email" required>
                        </div>
                        <br>
                        <div>
                            <label class="form-label">Are you a possible employer/contracter?</label><br>
                                <input type="radio" name="employer" id="yes">
                                    <label for="yes">Yes</label>
                                <input type="radio" name="employer" id="no">
                                    <label for="no">No</label>
                        </div>
                        <br>
                        <div>
                            <label class="form-label">May I contact you?</label><br>
                                <input type="radio" name="contact" id="yes">
                                    <label for="yes">Yes</label>
                                <input type="radio" name="contact" id="no">
                                    <label for="no">No</label>
                        </div>
                        <br>
                        <div>
                            <label for="comments" class="form-label">Comments</label><br>
                                <textarea name="comments" id="comments" placeholder="Leave a question or comment..."></textarea>
                        </div>
                        <div>
                            <button>Submit</button>
                        </div>
                    </form>
            </section>
            <section>
                <h2>References</h2>
                    <table class="references">
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Relationship</th>
                            <th>Email</th>
                        </tr>
                        <tr>
                            <td>Carla Pratt</td>
                            <td>Business Owner</td>
                            <td>Manager</td>
                            <td>carla@prattlandmusic.com</td>
                        </tr>
                        <tr>
                            <td>Barbara Nelson</td>
                            <td>1st Grade Teacher</td>
                            <td>Co-worker</td>
                            <td>barbaranelson@alpinedistrict.org</td>
                        </tr>
                        <tr>
                            <td>Robin Brunner</td>
                            <td>Computer Science Teacher</td>
                            <td>Co-worker</td>
                            <td>rbrunner@alpinedistrict.org</td>
                        </tr>
                    </table>
            </section>
            <section>
                <h2>Hobbies & Interests</h2>
                    <dl>
                        <dt>Crafting</dt>
                            <dd>
                                <ul>
                                    <li>Crochet- Amigurumi people & animals</li>
                                    <li>Sewing- Costumes & clothing repairs</li>
                                    <li>Cross-stitch embroidery</li>
                                    <li>Cake decorating</li>
                                    <li>Drawing & painting</li>
                                    <li>Origami</li>
                                </ul>
                            </dd>
                        <dt>Music</dt>
                            <dd>
                                <ul>
                                    <li>Listening to many different genres</li>
                                    <li>Playing various instruments</li>
                                    <li>Guessing song/artist names</li>
                                </ul>
                            </dd>
                        <dt>Computer & Video Games</dt>
                            <dd>
                                <ul>
                                    <li>Steam Platform</li>
                                    <li>X-Box</li>
                                    <li>Nintendo (Switch, Wii, GameCube, 64)</li>
                                    <li>Play Station</li>
                                </ul>
                            </dd>
                        <dt>Sports</dt>
                            <dd>
                                <ul>
                                    <li>Skiing</li>
                                    <li>Ultimate Frisbee</li>
                                    <li>Volleyball</li>
                                </ul>
                            </dd>
                        <dt>Outdoors</dt>
                            <dd>
                                <ul>
                                    <li>Camping</li>
                                    <li>Hiking</li>
                                    <li>ATV Riding</li>
                                    <li>Fishing</li>
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
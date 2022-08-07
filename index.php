    <?php 
    // PHP Section for Contact Form
        // Preventing form resubmission on refresh
        if (!isset($_SESSION)) {
            session_start();
        }

        // Contact PHP Code variables and functions
        // Set empty variables for each form field
        $fullNameErr = $emailErr = $chocVanErr = $contBackErr = "";
        $fullName = $email = $chocVan = $contBack = $comments = "";
        $formErr = false;
        
        // If statement that sets the field values to variables when the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty(trim($_POST["fullName"]))) {
                $fullNameErr = "Everyone has a name, so enter yours!";
                $formErr = true;
            } else {
                $fullName = cleanInput($_POST["fullName"]);
                //Use REGEX to only accept letters and spaces
                if (!preg_match("/^[a-zA-Z ]*$/", $fullName)) {
                    $fullNameErr = "Only letters and standard spaces allowed.";
                    $formErr = true;
                }
            }
            
            if (empty($_POST["email"])) {
                $emailErr = "You shall not pass without an email entered!";
                $formErr = true;
            } else {
                $email = cleanInput($_POST["email"]);
                // Check if e-mail address is formatted correctly
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "That isn't a valid email address.";
                    $formErr = true;
                }
            }
            
            if (empty($_POST["chocolate-vanilla"])) {
                $chocVanErr = "Make your choice!";
                $formErr = true;
            } else {
                $chocVan = cleanInput($_POST["chocolate-vanilla"]);
            }

            if (empty($_POST["contact-back"])) {
                $contBackErr = "Please let us know if we can contact you back.";
                $formErr = true;
            } else {
                $contBack = cleanInput($_POST["contact-back"]);
            }
            
            $comments = cleanInput($_POST["comments"]);
        }
        // Clean Input filtered parameter
        function cleanInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        // Checks the form for Errors
        if (($_SERVER["REQUEST_METHOD"] == "POST") && (!($formErr))) { 
            $hostname = "php-mysql-exercisedb.slccwebdev.com";
            $username = "phpmysqlexercise";
            $password = "mysqlexercise";
            $databasename = "php_mysql_exercisedb";
        
            try {
                // Create NEW PDO object
                $conn = new PDO("mysql:host=$hostname;dbname=$databasename", $username, $password);
                
                // Set PDO error mode to exception
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Variable containing SQL command
                $sql = "INSERT INTO jf_su22_Portfolio_Responses (
                    FullName, 
                    Email, 
                    ChocolateOrVanilla,
                    ContactBack, 
                    Comments
                )
                VALUES (
                    :fullName,
                    :email,
                    :chocolateOrVanilla,
                    :contactBack,
                    :comments
                );";
        
                // Create prepared statement
                $stmt = $conn -> prepare($sql);
        
                // Bind parameters to variables
                $stmt -> bindParam(':fullName', $fullName, PDO::PARAM_STR);
                $stmt -> bindParam(':email', $email, PDO::PARAM_STR);
                $stmt -> bindParam(':chocolateOrVanilla', $chocVan, PDO::PARAM_STR);
                $stmt -> bindParam(':contactBack', $contBack, PDO::PARAM_STR);
                $stmt -> bindParam(':comments', $comments, PDO::PARAM_STR);
        
                // Execute SQL statement on server
                $stmt -> execute();
                
                // Create thank you message
                $_SESSION['message'] = '<p class="font-weight-bold">Thank you for your submission!</p><p class="font-weight-light">Your response has been sent.</p>';
                
                $_SESSION['complete'] = true;

                // Redirect
                header('Location: ' . $_SERVER['REQUEST_URI']);
                return;

            } catch (PDOException $error) {
                
                // Create error message
                $_SESSION['message'] = '<p>We apologize, the form was not submitted successfully. Please try again later.</p>';
                
                $_SESSION['complete'] = true;

                // Redirect
                header('Location: ' . $_SERVER['REQUEST_URI']);
                return;
            } 
            
            $conn = null;
        } 
        
        // PHP Section for Skills
        $mySkills = array ("HTML", "CSS", "JavaScript", "WordPress", "PHP", "Typing", 
            "Microsoft Office Suite", "Music Performance", "Music Education", "Crafting");
            function newList($mySkills) {
                echo "<ul>";
                foreach ($mySkills as $sk) {
                    echo "<li id='skillsList'>" . $sk . "</li>";
                }
                echo "</ul>";
            }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- My CSS -->
        <link rel="stylesheet" type="text/css" href="/files/css/landingpage.css">
        <!-- Page Tab Icon -->
        <link rel="shortcut icon" href="/images/fletchlinghelpbutton.png">
        <!-- Page Tab Title -->
        <title>Jessica Fletcher's Website</title>
    </head>
    <body>
        <!-- NavBar -->
        <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top shadow">
            <div class="container-fluid">
                <img src="/images/fletchling.png" alt="Lil Fletchling Logo" height="75vh">
                <a class="navbar-brand" href="#">Jessica Fletcher</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://www.jessicafletcher.slccwebdev.com/wordpress" target="_blank">WordPress Website</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/files/php/practice.php" target="_blank">PHP Practice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Me</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Resume
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="/files/php/index.php" target="_blank">Work & Education</a></li>
                                <li><a class="dropdown-item" href="/files/php/skills.php" target="_blank">Skills & Competencies</a></li>
                                <li><a class="dropdown-item" href="/files/php/portfolio.php" target="_blank">Portfolio</a></li>
                                <li><a class="dropdown-item" href="/files/php/about.php" target="_blank">References & Interests</a></li>
                            </ul>
                        </li>
                        <button class="rounded-pill btn-outline-dark small" onclick="nameInput()">Who are you?!</button> <span id="nameAlert"></span>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Header -->
        <header class="mainHeader">
            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-center text-center text-white" style="background-color: rgba(0, 0, 0, 0.2);">
                    <div class="col-lg-8">
                         <h1 class="display-1 font-weight-bold">Jessica Fletcher</h1>
                         <hr class="bg-white my-5">
                         <p class="font-weight-light">The perfect candidate for many creative projects. If you have an idea and don't know how to accomplish it yet, you've come to the right place to see your visions become reality.</p>
                         <a class="btn btn-dark btn-lg mt-3 rounded-pill" href="files/php/index.php" target="_blank">View Resume</a>
                     </div>
                 </div>
             </div>
         </header>
        
         <!-- About -->
        <section id="about">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-center text-center py-5">
                    <div class="col-6 col-md-4">
                        <img src="/images/headshot.jpg" alt="Picture of Jessica Fletcher" class="img-fluid">
                    </div>
                    <div class="col-lg-8 my-3">
                        <h2 class="font-weight-bold">About</h2>
                        <hr class="my-5">
                        <p class="font-weight-light">Jessica has experience in many different creative mediums including: music, drawing, painting, photo editing, digital design, various fiber arts, cake decorating, and now web development. She enjoys learning as much as she can about new ways to improve her skills. If you have a vision, she will do all that she can to exceed your expectations.</p>
                        <p>
                            <h4>My skills include:</h4>
                            <?php
                                newList($mySkills);
                            ?>
                        </p>
                        <a class="btn btn-dark btn-lg mt-3 rounded-pill" role="button" href="#contact">Contact Me</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio -->
        <section id="portfolio" class="bg-dark">
            <div class="container-fluid py-5">
                <div class="row text-white text-center">
                    <div class="col">
                        <h2 class="display-4 font-weight-bold">Portfolio</h2>
                        <hr class="bg-white mb-5">
                    </div>
                </div>
                <!-- Portfolio Items Row Start -->
                <div class="row row-cols-1 row-cols-md-2 row-col-lg-3">
                    
                    <!-- Portfolio Item1 -->
                    <div class="col mb-4">
                        <div class="card bg-light text-center border-light shadow h-100">
                            <a href="http://www.jessicafletcher.slccwebdev.com/wordpress/" target="blank">
                                <img class="card-img-top" src="/images/fletchlinglogo.png" alt="Lil Fletchlings Logo" style="object-fit:cover;">
                            </a>
                            <div class="card-body">
                                <h3 class="card-title">Website Development</h3>
                                <hr class="bg-dark">
                                <p class="card-text">A WordPress website geared towards selling and sharing crochet patterns.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Portfolio Item1 End -->
                    
                    <!-- Portfolio Item2 -->
                     <div class="col mb-4">
                        <div class="card bg-light text-center border-light shadow h-100">
                            <div id="carouselIndicators1" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselIndicators1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselIndicators1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselIndicators1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#carouselIndicators1" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                    <button type="button" data-bs-target="#carouselIndicators1" data-bs-slide-to="4" aria-label="Slide 5"></button>
                                    <button type="button" data-bs-target="#carouselIndicators1" data-bs-slide-to="5" aria-label="Slide 6"></button>
                                </div>
                                <div id="portfolio-carousel" class="carousel-inner">
                                    <!-- Ami Image 1 -->
                                    <div class="carousel-item active">
                                        <img src="/images/billy-loomis-thumbnail.jpg" class="d-block w-50 m-auto" alt="Picture of the night sky.">
                                    </div>
                                    <!-- Ami Image 2 -->
                                    <div class="carousel-item">
                                        <img src="/images/lol-doll-thumbnail.jpg" class="d-block w-50 m-auto" alt="Picture of the woods.">
                                    </div>
                                    <!-- Ami Image 3 -->
                                    <div class="carousel-item">
                                        <img src="/images/star-butterfly-thumbnail.jpg" class="d-block w-50 m-auto" alt="Picture of the morning horizon.">
                                    </div>
                                    <!-- Ami Image 4 -->
                                    <div class="carousel-item">
                                        <img src="/images/spiderman-thumbnail.jpg" class="d-block w-50 m-auto" alt="Picture of the morning horizon.">
                                    </div>
                                    <!-- Ami Image 5 -->
                                    <div class="carousel-item">
                                        <img src="/images/peony-ballerina-thumbnail.jpg" class="d-block w-50 m-auto" alt="Picture of the morning horizon.">
                                    </div>
                                    <!-- Ami Image 6 -->
                                    <div class="carousel-item">
                                        <img src="/images/koala-thumbnail.jpg" class="d-block w-50 m-auto" alt="Picture of the morning horizon.">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Custom Amigurmi</h3>
                                <hr class="bg-dark">
                                <p class="card-text">Crochet dolls for your inner child.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Portfolio Item2 End -->
                    
                    <!-- Portfolio Item3 -->
                    <div class="col mb-4">
                        <div class="card bg-light text-center border-light shadow h-100">
                            <div id="carouselIndicators2" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselIndicators2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselIndicators2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselIndicators2" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#carouselIndicators2" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                    <button type="button" data-bs-target="#carouselIndicators2" data-bs-slide-to="4" aria-label="Slide 5"></button>
                                    <button type="button" data-bs-target="#carouselIndicators2" data-bs-slide-to="5" aria-label="Slide 6"></button>
                                </div>
                                <div id="portfolio-carousel" class="carousel-inner">
                                    <!-- Cake Image 1 -->
                                    <div class="carousel-item active">
                                        <img src="/images/rainbow-cake-thumbnail.jpg" class="d-block w-50 m-auto" alt="Picture of the night sky.">
                                    </div>
                                    <!-- Cake Image 2 -->
                                    <div class="carousel-item">
                                        <img src="/images/jet-cake-thumbnail.jpg" class="d-block w-50 m-auto" alt="Picture of the woods.">
                                    </div>
                                    <!-- Cake Image 3 -->
                                    <div class="carousel-item">
                                        <img src="/images/flower-cake-thumbnail.jpg" class="d-block w-50 m-auto" alt="Picture of the morning horizon.">
                                    </div>
                                    <!-- Cake Image 4 -->
                                    <div class="carousel-item">
                                        <img src="/images/cocomelon-cake-thumbnail.jpg" class="d-block w-50 m-auto" alt="Picture of the morning horizon.">
                                    </div>
                                    <!-- Cake Image 5 -->
                                    <div class="carousel-item">
                                        <img src="/images/lil-einstein-cake-thumbnail.jpg" class="d-block w-50 m-auto" alt="Picture of the morning horizon.">
                                    </div>
                                    <!-- Cake Image 6 -->
                                    <div class="carousel-item">
                                        <img src="/images/cupcakes-thumbnail.jpg" class="d-block w-50 m-auto" alt="Picture of the morning horizon.">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Cake Decorating</h3>
                                <hr class="bg-dark">
                                <p class="card-text">Delicious treats for special occasions.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Portfolio Item3 End -->
                    
                    <!-- Portfolio Item4 -->
                    <div class="col mb-4">
                        <div class="card bg-light text-center border-light shadow h-100">
                            <div id="carouselIndicators3" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselIndicators3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselIndicators3" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselIndicators3" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div id="portfolio-carousel" class="carousel-inner">
                                    <!-- Costume Image 1 -->
                                    <div class="carousel-item active">
                                        <img src="/images/dragon-costume-thumbnail.jpg" class="d-block w-50 m-auto" alt="Picture of the night sky.">
                                    </div>
                                    <!-- Costume Image 2 -->
                                    <div class="carousel-item">
                                        <img src="/images/unicorn-costume-thumbnail.jpg" class="d-block w-50 m-auto" alt="Picture of the woods.">
                                    </div>
                                    <!-- Costume Image 3 -->
                                    <div class="carousel-item">
                                        <img src="/images/pumpkin-costume-thumbnail.jpg" class="d-block w-50 m-auto" alt="Picture of the morning horizon.">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Costume Making</h3>
                                <hr class="bg-dark">
                                <p class="card-text">Where personal identity meets with creativity.</p>
                            </div>
                                    <!-- Add #contact so the navbar doesn't cut it off -->
                            <div id="contact"></div>
                        </div>
                    </div>
                    <!-- Portfolio Item4 End -->
                </div>
            </div>
        </section>

        <!-- Contact Section -->
                <!-- #contact link is contained in Costume Making Card so Contact Me isn't cut off by the navbar -->
        <section> 
            <div class="container-fluid my-5">
                <!-- Section Title -->
                <div class="row justify-content-center text-center">
                    <div class="col-md-6">
                        <h2 class="display-4 font-weight-bold">Contact Me</h2>
                        <hr>
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="row justify-content-center">
                    <div class="col-6">
                        <!-- Contact Form Start -->
					        <!-- Set action to return to this page when submitted using PHP_SELF -->
                        <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> method="POST" novalidate>
                            
                            <!-- Name Field -->
                            <div class="form-group">
                                <label for="fullName">Full Name:</label>
                                <span class="text-danger">*<?php echo $fullNameErr; ?></span>
                                <input type="text" class="form-control" id="fullName" placeholder="Full Name" name="fullName" value="<?php if (isset($fullName)) {echo $fullName;} ?>"/>
                            </div>
                            
                            <!-- Email Field -->
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <span class="text-danger">*<?php echo $emailErr; ?></span>
                                <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="<?php if (isset($email)) {echo $email;} ?>"/>
                            </div>
                            
                            <!-- Chocolate or Vanilla Radio Button Field -->
                            <div class="form-group">
                                <label class="control-label">Chocolate or Vanilla?</label>
                                <span class="text-danger">*<?php echo $chocVanErr; ?></span>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="chocolate-vanilla" id="chocolate" value="Chocolate" <?php if ((isset($chocVan)) && ($chocVan == "Chocolate")) {echo "checked";} ?> />
                                    <label class="form-check-label" for="chocolate">Chocolate</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="chocolate-vanilla" id="vanilla" value="Vanilla" <?php if ((isset($contBack)) && ($contBack == "Vanilla")) {echo "checked";} ?> />
                                    <label class="form-check-label" for="vanilla">Vanilla</label>
                                </div>
                            </div>

                            <!-- Contact Back Radio Button Field -->
                            <div class="form-group">
                                <label class="control-label">Can we contact you back?</label>
                                <span class="text-danger">*<?php echo $contBackErr; ?></span>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="contact-back" id="yes" value="Yes" <?php if ((isset($contBack)) && ($contBack == "Yes")) {echo "checked";} ?> />
                                    <label class="form-check-label" for="yes">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="contact-back" id="no" value="No" <?php if ((isset($contBack)) && ($contBack == "No")) {echo "checked";} ?> />
                                    <label class="form-check-label" for="no">No</label>
                                </div>
                            </div>
                            
                            <!-- Comments Field -->
                            <div class="form-group">
                                <label for="comments">Comments:</label>
                                <textarea id="comments" class="form-control" rows="3" name="comments"><?php if (isset($comments)) {echo $comments;} ?></textarea>
                            </div>
                            
                            <!-- Required Fields Note -->
                            <div class="text-danger text-right">* Indicates required fields</div>

                            <!-- Submit Button -->
                            <button class="btn btn-primary mb-2" type="submit" role="button" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Contact Submission Modal -->
            <div class="modal" id="thankYouModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="thankYouModalLabel">Thank You</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php 
                                echo $_SESSION['message'];
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
            <!-- Show Contact Submission Modal -->
            <?php 
                if(isset($_SESSION['complete']) && $_SESSION['complete']) {
                    echo "<script>$('#thankYouModal').modal('show');</script>";
                    session_unset();
                }
            ?>

        <!-- References -->
        <section> 
            <div class="container-fluid my-1 p-4">
                <!-- Section Title -->
                <div class="row justify-content-center text-center">
                    <div class="col-md-6">
                        <h2 class="display-4 font-weight-bold">References</h2>
                        <hr>
                    </div>
                </div>
                <!-- Reference Table -->
                <div class="container-fluid" id="references">
                    <table class="table text-white">
                        <tr class="bg-primary">
                            <th>Name</th>
                            <th>Position</th>
                            <th>Relationship</th>
                            <th>Email</th>
                        </tr>
                        <tbody class="bg-light text-black" id="refList">

                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Picture Carousel -->
        <section class="bg-dark text-white pb-5">
            <h3 class="font-weight-bold pt-4 px-2">Relax with nature:</h3>
                <hr class="bg-white mb-3">
            <div id="carouselIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/nightsky.jpg" class="d-block w-100" alt="Picture of the night sky.">
                </div>
                <div class="carousel-item">
                    <img src="/images/woods.jpg" class="d-block w-100" alt="Picture of the woods.">
                </div>
                <div class="carousel-item">
                    <img src="/images/morning.jpg" class="d-block w-100" alt="Picture of the morning horizon.">
                </div>
                </div>
            </div>
        </section>
        
        <!-- Hidden Hobbies & Interests Section -->
        <section>
            <div class="container-fluid my-1 p-4 row justify-content-center text-center">
                <div>
                    <h3 class="display-4 font-weight-bold">Jessica is a Human!</h3>
                    <button class="rounded-pill btn-outline-dark small" id="btnToggle">Show/Hide Hobbies & Interests</button>
                </div>
                <div class="container-fluid" id="hobbies">
                    <!-- Hobby Item1 Start -->
                    <div class="col mb-4">
                        <div class="card bg-light text-center border-light shadow h-100">
                            <div id="card-height" class="card-body">
                                <h3 class="card-title">Crafting</h3>
                                <hr class="bg-dark">
                                <div id="hobbiesList">
                                    <li>Crochet- Amigurumi people & animals</li>
                                    <li>Sewing- Costumes & clothing repairs</li>
                                    <li>Cross-stitch embroidery</li>
                                    <li>Cake decorating</li>
                                    <li>Drawing & painting</li>
                                    <li>Origami</li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Hobby Item1 End -->
                    
                    <!-- Hobby Item2 Start -->
                    <div class="col mb-4">
                        <div class="card bg-light text-center border-light shadow h-100">
                            <div id="card-height" class="card-body">
                                <h3 class="card-title">Music</h3>
                                <hr class="bg-dark">
                                <div id="hobbiesList">
                                    <li>Listening to many different genres</li>
                                    <li>Playing various instruments</li>
                                    <li>Guessing song/artist names</li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Hobby Item2 End -->
                    
                    <!-- Hobby Item3 Start -->
                    <div class="col mb-4">
                        <div class="card bg-light text-center border-light shadow h-100">
                            <div id="card-height" class="card-body">
                                <h3 class="card-title">Computer & Video Games</h3>
                                <hr class="bg-dark">
                                <div id="hobbiesList">
                                    <li>Nintendo (Switch, Wii, GameCube, 64)</li>
                                    <li>Steam Platform</li>
                                    <li>X-Box</li>
                                    <li>Play Station</li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Hobby Item3 End -->

                    <!-- Hobby Item4 Start -->
                    <div class="col mb-4">
                        <div class="card bg-light text-center border-light shadow h-100">
                            <div id="card-height" class="card-body">
                                <h3 class="card-title">Sports</h3>
                                <hr class="bg-dark">
                                <div id="hobbiesList">
                                    <li>Skiing</li>
                                    <li>Ultimate Frisbee</li>
                                    <li>Volleyball</li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Hobby Item4 End -->
                    
                    <!-- Hobby Item5 Start -->
                    <div class="col mb-4">
                        <div class="card bg-light text-center border-light shadow h-100">
                            <div id="card-height" class="card-body">
                                <h3 class="card-title">Outdoors</h3>
                                <hr class="bg-dark">
                                <div id="hobbiesList">
                                    <li>Camping</li>
                                    <li>Hiking</li>
                                    <li>ATV Riding</li>
                                    <li>Fishing</li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Hobby Item5 End -->

                    <!-- Form Validation with jQuery -->
                    <div class="col mb-4">
                        <div class="card bg-light text-center border-light shadow h-100">
                            <div id="card-height" class="card-body">
                                <h3 class="card-title">What is your favorite activity?</h3>
                                <hr class="bg-dark">
                                <input type="text" id="activity">
                                <span class="errorAct" id="errorAct">*</span>
                                <br>
                                <button class="rounded-pill btn-outline-dark small" id="btnAct" onclick="favAct()">Enter</button>
                                <p id="actResp"></p>
                            </div>
                        </div>
                    </div>
                    <!-- Form Validation with jQuery End -->
                </div>
            </div>
        </section>

        <!-- Help Button -->
            <button type="button" class=" btn rounded-circle shadow" id="helpbutton" data-bs-toggle="modal" data-bs-target="#helpModal">
                <img src="/images/fletchlinghelpbutton.png" alt="Help Button" height="70vw">
            </button>

        <!-- Help Modal -->
        <div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="helpModalLabel">Welcome!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="dayModal"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted absolute-bottom">
            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © <span id="copyrightyear"></span> Copyright - Jessica Fletcher:
                <a href="#">Home</a>
                <a href="/files/html/index.html" target="_blank">Resume</a>
                <a href="#contact">Contact</a>
            </div>
        </footer>
        
        <!-- JavaScript for Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- Personal JavaScript -->
        <script src="/files/js/landingpage.js"></script>
    
    </body>
</html>
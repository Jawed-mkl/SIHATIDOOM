<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email']) || !isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$database = "user";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the patient's details from the session
$email = $_SESSION['email'];
$username = $_SESSION['username'];

// Query to fetch all information of the patient
$sql = "SELECT * FROM patients WHERE email='$email' AND username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $patient_info = mysqli_fetch_assoc($result);
} else {
    echo "No patient information found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Profil </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Render All Elements Normally -->
    <link rel="stylesheet" href="css/normalize.css" />
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- Main Template CSS File -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/profile.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&#038;display=swap" rel="stylesheet" />
</head>

<body>

    <!-- Start Header -->
    <div class="header">
        <video autoplay loop muted plays-inline>
            <source src="img/7658937-hd_1920_1080_25fps.mp4" type="video/mp4">
            <source src="img/7658937-hd_1920_1080_25fps.mp4" type="video/mp4">
        </video>
        <div class="container">

            <a href="#" class="logo">
                <img src="img/sihatiLOGO.png" alt="">
            </a>

            <div class="main-box">
                <ul class="main-nav">
                    <li> <a class="active" href="#aceuil">Acceuil</a> </li>
                    <li> <a href="#propo">A propos</a> </li>
                    <li> <a href="#service">Services </a> </li>
                    <li> <a href="#team">Equipes </a> </li>
                    <li> <a href="#contact">Contact</a> </li>
                </ul>  
                <button class="button">
                    <a href="profile.php" class="special-box">Votre Profil</a>
                    <ul class="links">
                        <li> <a href="rendez-vous-new.php">rendez-vous</a> </li>
                        <li> <a href="historique.php">Historique</a> </li>
                        <li> <a href="modifier.php">paramettre </a> </li>
                        <li> <a href="deconecter.php">deconecter </a> </li>
                    </ul>
                </button> 
            </div>
        </div>
        <div class="text">
            <div class="content">
                <h2>
                    Bienvenue!<br />
                    nous sommes SIHATIDOOM.
                </h2>
                <p>
                    sihatidom est un service en Algérie de soins à domicile. <br>
                    Nous fournissons les meilleurs soins de sante a domicile
                </p>
                <button class="rendv">
                    <a href="login.php" class="rendv-box">Rendez-vous</a>
                </button> 
            </div>
        </div>
        <div class="card" id="card">

            <div class="info">


            <h2>Your Profil</h2>
            <p>Welcome</p>
            </div>

            <div class="texte">
                <span>Full Name</span>
                <p><?php echo $patient_info['username']?></p>
            </div>
            <div class="texte">
                <span>Sex</span>
                <p><?php echo $patient_info['sex']?></p>
            </div>
            <div class="texte">
                <span>Phone</span>
                <p><?php echo $patient_info['phone']?></p>
            </div>
            <div class="texte">
                <span>E-mail</span>
                <p><?php echo $patient_info['email']?></p>
            </div>
            <div class="texte">
                <span>Password</span>
                <p><?php echo $patient_info['password']?></p>
            </div>
            <div class="texte">
                <span>address</span>
                <p><?php echo $patient_info['address']?></p>
            </div>

            
                    

                </div>
        <a href="#propo" class="go-down">
            <i class="fa-solid fa-caret-down fa-2x"></i>
        </a>
    </div>
    <!-- End Header -->

    <!--Start Propo-->
    <div class="propo" id="propo">
        <div class="container">
            <div class="main-title">
                <h2>A propos</h2>
            </div>
            <div class="content">
                <div class="image">
                    <img src="img/istockphoto-1481200360-612x612.jpg" alt="">
                </div>
                <div class="text">
                    <div class="txt">
                        <h3>QUI SOMMES NOUS ?</h3>
                        <p>
                            Sihatidom propose des services de soins à domicile en Algérie, avec une équipe spécialisée disponible 24/7 pour répondre aux besoins médicaux, offrant confort et assistance aux patients nécessitant des soins à domicile
                            </p>
                    </div>
                    <div class="txt">
                        <h3>Ce que met Sihatidom à votre disposition</h3>
                        <p>
                            Un personnel soignant scientifiquement qualifié, spécialisé dans les soins à domicile et soutenu par une équipe d'experts internationaux, avec des tarifs alignés sur ceux de la médecine libérale, hors frais de déplacement et équipements médicaux..
                            </p>
                    </div>
                    <div class="txt">
                        <h3>Dans quels cas faire appel à Sihatidom</h3>
                        <p>
                            Services de soins à domicile disponibles pour les patients nécessitant une assistance médicale, même en dehors des heures normales de travail, offrant une solution pratique pour les familles ayant des contraintes de déplacement ou d'indisponibilité</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!--End propo-->

    <!--Start Service-->
    <div class="service" id="service">
        <div class="container">
            <div class="main-title">
                <h2>Service</h2>
            </div>
            <div class="boxes">
                <div class="flip-card">
                    <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <div class="profile-image">
                        <img src="img/undraw_doctor_kw5l.png" alt="">
                        <div class="name">
                            Infirmiers
                        </div>
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <div class="Description">
                            <i class="fa-solid fa-user-nurse fa-2x"></i>
                        <p class="description">
                            Administration de médicaments, 
                            Soins de plaies, 
                            Prélèvements sanguins, 
                            Surveillance des signes vitaux, 
                            Éducation du patient et de la famille sur la santé et les soins à domicile.
                        </p>
                        
                        </div>
                    </div>
                    </div>
                </div>
                
                <div class="flip-card">
                    <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <div class="profile-image">
                        <img src="img/undraw_Scientist_ft0o.png" alt="">
                        <div class="name">
                            Kinésithérapeutes
                        </div>
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <div class="Description">
                            <i class="fa-solid fa-user-doctor fa-2x"></i>
                        <p class="description">
                            Rééducation après une blessure ou une intervention chirurgicale, 
                            Exercices de renforcement musculaire, 
                            Massages thérapeutiques, 
                            Manipulations articulaires, 
                            Évaluation et traitement des troubles de la posture.
                        </p>
                        
                        </div>
                    </div>
                    </div>
                </div>
                <div class="flip-card">
                    <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <div class="profile-image">
                        <img src="img/undraw_medicine_b1ol.png" alt="">
                        <div class="name">
                            Ergothérapeutes
                        </div>
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <div class="Description">
                            <i class="fa-solid fa-syringe fa-2x"></i>
                        <p class="description">
                            Évaluation des capacités fonctionnelles des patients,
                            Développement de plans de traitement pour aider les patients,
                            Utilisation de techniques et d'adaptations pour améliorer l'indépendance des patients.
                        </p>
                        
                        </div>
                    </div>
                    </div>
                </div>
                <div class="flip-card">
                    <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <div class="profile-image">
                        <img src="img/undraw_Doctors_p6aq.png" alt="">
                        <div class="name">
                            les assistants en <br> thérapie
                        </div>
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <div class="Description">
                            <i class="fa-solid fa-bandage fa-2x"></i>
                        <p class="description">
                            Assistance aux patients pendant les exercices, 
                            Aide à la mobilisation des patients, 
                            Préparation de matériel thérapeutique, 
                            Documentation des progrès des patients.
                        </p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Service-->

    <!-- Start Team -->
    <div class="team" id="team">
        <div class="main-title">
            <h2>Notre Equipe</h2>
        </div>
        <div class="container">
        <div class="box">
            <div class="data">
            <img decoding="async" src="img/pexels-shkrabaanthony-5215024.jpg" alt="" />
            <div class="social">
                <a href="#">
                <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#">
                <i class="fab fa-youtube"></i>
                </a>
            </div>
            </div>
            <div class="info">
            <h3>Name</h3>
            <p>Simple Short Description</p>
            </div>
        </div>
        <div class="box">
            <div class="data">
            <img decoding="async" src="img/pexels-rdne-6129507.jpg" alt="" />
            <div class="social">
                <a href="#">
                <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#">
                <i class="fab fa-youtube"></i>
                </a>
            </div>
            </div>
            <div class="info">
            <h3>Name</h3>
            <p>Simple Short Description</p>
            </div>
        </div>
        <div class="box">
            <div class="data">
            <img decoding="async" src="img/pexels-shvetsa-4167542.jpg" alt="" />
            <div class="social">
                <a href="#">
                <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#">
                <i class="fab fa-youtube"></i>
                </a>
            </div>
            </div>
            <div class="info">
            <h3>Name</h3>
            <p>Simple Short Description</p>
            </div>
        </div>
        <div class="box">
            <div class="data">
            <img decoding="async" src="img/pexels-shvetsa-4225880.jpg" alt="" />
            <div class="social">
                <a href="#">
                <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#">
                <i class="fab fa-youtube"></i>
                </a>
            </div>
            </div>
            <div class="info">
            <h3>Name</h3>
            <p>Simple Short Description</p>
            </div>
        </div>
        
        </div>
    </div>
    <div class="spikes"></div>
    <!-- End Team -->


    <!-- Start Contact -->
    <div class="contact" id="contact">
        <div class="container">
            <div class="main-title">
                <h2>Contactez-nous</h2>
            </div>
            <div class="content">
                <form action="">
                <input class="main-input" type="text" name="name" placeholder="Your Name" />
                <input class="main-input" type="email" name="mail" placeholder="Your Email" />
                <textarea class="main-input" name="message" placeholder="Your Message"></textarea>
                <input type="submit" value="Send Message" />
                </form>
                <div class="info">
                <h4>Get In Touch</h4>
                <span class="phone">+213 745812237 <p>/</p> +213 655234890</span>
                <h4>Where We Are</h4>
                <address>Sidi Bel Abbes</address>
                <div class="location">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d104321.40340690903!2d-0.5489890356952011!3d35.20537653754212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7f0030b5f78f73%3A0x24600b519acfdc29!2z2LPZitiv2Yog2KjZhNi52KjYp9iz4oCO!5e0!3m2!1sar!2sdz!4v1707491122839!5m2!1sar!2sdz"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->

    <!-- Start Footer -->
    <div class="footer">&copy; 2024 <span>Sihatidom</span>Tous droits réservés</div>
    <!-- End Footer -->

</body>
</html>
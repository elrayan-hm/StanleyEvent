<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - STANLEY 2025</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom, #e0f5e9 0%, #ffffff 60%);
            position: relative;
            overflow-x: hidden;
        }

        header {
            text-align: center;
            padding: 40px 20px 20px;
            background-color: #2e7d32;
            color: white;
        }

        .container {
            max-width: 500px;
            margin: 40px auto;
            background: #ffffffcc;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            padding: 30px;
            position: relative;
            z-index: 2;
        }

        h2 {
            text-align: center;
            color: #2e7d32;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            margin-top: 20px;
            background-color: #2e7d32;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        /* WAVE ANIMATION */

        .waves {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 150px;
            overflow: hidden;
            z-index: 1;
        }

        .wave {
            position: absolute;
            width: 200%;
            height: 100%;
            bottom: 0;
            border-radius: 45%;
            opacity: 0.6;
            animation: waveSlide 6s ease-in-out infinite;
        }

        .wave1 {
            background: #a5d6a7;
            animation-delay: 0s;
            z-index: 1;
        }

        .wave2 {
            background: #81c784;
            animation-delay: 2s;
            z-index: 2;
        }

        .wave3 {
            background: #66bb6a;
            animation-delay: 4s;
            z-index: 3;
        }

        @keyframes waveSlide {
            0% {
                transform: translateX(0) translateY(0);
            }
            50% {
                transform: translateX(-25%) translateY(15px);
            }
            100% {
                transform: translateX(0) translateY(0);
            }
        }
    </style>
</head>
<body>

<header>
    <h1>STANLEY 2025 – Renaissance Numérique</h1>
    <p>Jeudi 5 juin 2025 – 18h00 à 20h15<br>Campus HETIC, Montreuil</p>
    <p>IT durable, cybersécurité, IA, open-source, reconditionnement + Cocktail</p>
</header>

<div class="container">
    <h2>Inscription à l'événement</h2>
    <form method="POST">
        <label>Prénom</label>
        <input type="text" name="prenom" placeholder="Entrez votre prénom" minlength="3" required>

        <label>Nom</label>
        <input type="text" name="nom" placeholder="Entrez votre nom" minlength="3" required>

        <label>Téléphone</label>
        <input type="tel" name="tel" placeholder="Entrez votre numero de telephone" minlength="7" required>

        <label>Email</label>
        <input type="email" name="email" placeholder="Entrez votre addresse mail" minlength="7" required>

        <input type="submit" name="submit" value="S'inscrire">
    </form>
</div>

<!-- VAGUES ANIMÉES -->
<div class="waves">
    <div class="wave wave1"></div>
    <div class="wave wave2"></div>
    <div class="wave wave3"></div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $nom = htmlspecialchars(trim($_POST['nom']));
    $tel = htmlspecialchars(trim($_POST['tel']));
    $email = strtolower(trim($_POST['email']));
    $file = "registred.txt";

    if (!file_exists($file)) {
        file_put_contents($file, "");
    }

    $exists = false;
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list(, , , $savedEmail) = explode("|", $line);
        if ($email === strtolower(trim($savedEmail))) {
            $exists = true;
            break;
        }
    }

    if ($exists) {
        echo "<script>alert('Erreur : cet email est déjà inscrit.');</script>";
    } else {
        $entry = "$prenom|$nom|$tel|$email\n";
        file_put_contents($file, $entry, FILE_APPEND);
        echo "<script>alert('Inscription réussie !');</script>";
    }
}
?>

</body>
</html>

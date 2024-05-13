<header>
        <nav class="menu">
            <ul>
                <a href="homepage.php" class="nav_icone" aria-label="visit homepage" aria-current="page">
                    <img src="img/image_menu.png" alt="retour menu">
                    <span>Auto Ecole</span>
                </a>
                
                <li class="contient_sous_nav"><a href="#">Elèves <span id="caractere">▼</span></a>
                    <ul class="sous_nav">
                        <li><a href="ajout_eleve.php">ajout élèves</a></li>
                        <li><a href="inscription_eleve.php">inscription élève</a></li>
                        <li><a href="consultation_eleve.php">consulation élèves</a></li>
                    </ul>
                </li>
                
                <li class="contient_sous_nav"><a href="#">Séances <span id="caractere">▼</span></a>
                    <ul class="sous_nav">
                        <li><a href="ajout_seance.php">Ajout séance</a></li>
                        <li><a href="">Validation séance</a></li>
                        <li><a href="">Désincription séance</a></li>
                    </ul>
                </li>
                
                <li class="contient_sous_nav"><a href="#">Thèmes <span id="caractere">▼</span></a>
                    <ul class="sous_nav">
                        <li><a href="ajout_theme.php">Ajout thème</a></li>
                        <li><a href="suppression_theme.php">Suprrimer thème</a></li>
                    </ul>
                </li>

                <li><a href="#" class="calendrier">calendrier</a></li>
            </ul>
            <div class="bouton-contact">
                <button type="button" onclick="redirectToPage('contact.php')">Nous contacter</button>
            </div>
            <script>
                function redirectToPage(url) {
                window.location.href = url;
            }
            </script>
        </nav>
    </header>

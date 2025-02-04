{{ include('layouts/header.php', {title:'Client Create'})}}

<header class="entete">
    <section class="fil-ariane container">
        <span><a href="">Bonjour</a> > <a href=""> {{ session.user_name }}</a></span>
    </section>
</header>

<main class="produit container">
    <!-- <header>
            <h2>Nos timbres vedettes</h2>
        </header> -->
    <section class="produit-header">
        <!-- <div class="produit-photo">
            <div class="">
                <img src="{{asset}}images/timbre-01.jpg" alt="Photo 01">
            </div>
            <div class="">
                <img src="http://localhost/projet01_v02/public/images/timbre-01.jpg" alt="Photo 01">
            </div>
            <div class="">
                <img src="http://localhost/projet01_v02/public/images/timbre-01.jpg" alt="Photo 02">
            </div>
            <div class="">
                <img src="http://localhost/projet01_v02/public/images/timbre-01.jpg" alt="Photo 0">
            </div>
        </div> -->
        <div class="produit-achat">
            <h1>Création de timbre</h1>

            <form action="upload.php" method="POST" enctype="multipart/form-data"><!-- action vide: travailler avec le même nom de colonne -->
                <h2>Nouveau timbre</h2>
                <label>Nom
                    <input type="text" name="nom" required>
                </label>
                <label>Annee
                    <input type="number" name="annee" required>
                </label>
                <label>Couleur
                    <input type="text" name="couleur" required>
                </label>
                <label>Tirage
                    <input type="text" name="tirage" required>
                </label>
                <label>Dimensions
                    <input type="text" name="dimensions" required>
                </label>
                <label>Certification</label>
                <label for="nonCertifie">Non certifié</label>
                <input type="radio" id="nonCertifie" name="certifie" value="0" required>
                <br>
                <label for="certifie">Certifié</label>
                <input type="radio" id="certifie" name="certifie" value="1" required>
                <br>

                <label for="conditions">Conditions</label>
                <select id="conditions" name="conditions_id_condition" required>
                    {% for condition in conditions %}
                    <option value="{{ condition.id_condition }}">{{ condition.niveau }}</option>
                    {% endfor %}
                </select>

                <label for="countries">Pays</label>
                <select id="countries" name="pays_id_pays" required>
                    {% for country in countries %}
                    <option value="{{ country|sort.id_country }}">{{ country.country_name }}</option>
                    {% endfor %}
                </select>

                Select image to upload:
                <input type="file" name="image_url" id="image_url">

                <input type="submit" class="bouton" value="Créer le timbre">
            </form>
        </div>
    </section>


    <section class="produit-description">
        <div class="produit-description-list">
            <span> <i class="fa fa-list-ul"></i> Détails</span>
            <span class="active"><i class="fa fa-book"></i><strong> Historique</strong></span>
            <span><i class="fa fa-file-text-o"></i> Autre</span>
        </div>
        <div class="produit-description-detail">
            <h3>Historique</h3>
            <p>The Outlander PHEV has evolved to deliver even more power, control and capability. The uniquely balanced twin-electric motors are the key to the Super All-Wheel Control system, which delivers an all-electric performance that’s smoother, quieter and more responsive than ever before.</p>
        </div>

    </section>
    <section class="catalogue">
        <div class="catalogue-title">
            <h2>Vous aimerez peut-être aussi...</h2>
        </div>

        <article class="carte">
            <a href="#" class="image">
                <img src="https://www.mitsubishi-motors.ca/content/dam/mitsubishi-motors-ca/images/cars/outlander-phev/2025/primary/hero/2024_Menu_Outlander_PHEV.png?width=480&quality=70&auto=webp" alt="Outlander PHEV">
            </a>
            <h3><a href="">2025 Outlander PHEV</a></h3>
            <span><span class="carte-prix">À partir de 48,698$</span></span>
            <a class="bouton" href="create">Voir l'enchère</a>
        </article>

        <article class="carte">
            <a href="#" class="image">
                <img src="https://www.mitsubishi-motors.ca/content/dam/mitsubishi-motors-ca/images/cars/eclipse-cross/2024/primary/hero/2024_Menu_Eclipse_Cross.png?width=480&quality=70&auto=webp" alt="Eclipse Cross">
            </a>
            <h3><a href="">2025 Eclipse Cross</a></h3>
            <span><span class="carte-prix">À partir de 34,798$</span></span>
            <a class="bouton" href="create">Voir l'enchère</a>
        </article>

        <article class="carte">
            <a href="#" class="image">
                <img src="https://www.mitsubishi-motors.ca/content/dam/mitsubishi-motors-ca/images/pages/homepage/2024-rvr-menu.png?width=480&quality=70&auto=webp" alt="
                        RVR">
            </a>
            <h3><a href="">2025 RVR</a></h3>
            <span><span class="carte-prix">À partir de 24,798$</span></span>
            <a class="bouton" href="create">Voir l'enchère</a>
        </article>

        <article class="carte">
            <a href="#" class="image">
                <img src="https://www.mitsubishi-motors.ca/content/dam/mitsubishi-motors-ca/images/cars/mirage/2024/primary/hero/2024_Menu_Mirage.png?width=480&quality=70&auto=webp" alt="Mirage">
            </a>
            <h3><a href="">2025 Mirage</a></h3>
            <span><span class="carte-prix">À partir de 16,998$</span></span>
            <a class="bouton" href="create">Voir l'enchère</a>
        </article>
    </section>



</main>
{{ include('layouts/footer.php')}}
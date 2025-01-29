{{ include('layouts/header.php', {title:'Produit Create'})}}

<header class="entete">
    <section class="fil-ariane container">
        <span><a href="">encheres</a> > <a href=""> timbre</a></span>
    </section>
</header>

<main class="produit container">
    <!-- <header>
            <h2>Nos timbres vedettes</h2>
        </header> -->
    <section class="produit-header">
        <div class="produit-photo">
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
        </div>
        <div class="produit-achat">
            <h1><a href="">{{ encheres.id }}
                    {% for timbre in timbres %}
                    {% if timbre.encheres_id_enchere == encheres.id %}
                    {{ timbre.nom }}
                    {% endif %}
                    {% endfor %}
                </a></h1>
            <div class="produit-specs">
                <p>
                    <strong>Année : </strong>
                    {% for timbre in timbres %}
                    {% if timbre.encheres_id_enchere == encheres.id %}
                    {{ timbre.annee }}
                    {% endif %}
                    {% endfor %}
                </p>
                <p>
                    <strong>Couleur : </strong>
                    {% for timbre in timbres %}
                    {% if timbre.encheres_id_enchere == encheres.id %}
                    {{ timbre.couleur }}
                    {% endif %}
                    {% endfor %}
                </p>
                <p>
                    <strong>Tirage : </strong>
                    {% for timbre in timbres %}
                    {% if timbre.encheres_id_enchere == encheres.id %}
                    {{ timbre.tirage }}
                    {% endif %}
                    {% endfor %}
                </p>
                <p>
                    <strong>Dimensions : </strong>
                    {% for timbre in timbres %}
                    {% if timbre.encheres_id_enchere == encheres.id %}
                    {{ timbre.dimensions }}
                    {% endif %}
                    {% endfor %}
                </p>
                <p>
                    <strong>Certification : </strong>
                    {% for timbre in timbres %}
                    {% if timbre.encheres_id_enchere == encheres.id %}
                    {% if timbre.certifie == 1 %}
                    Certifié
                    {% else %}
                    Non certifié
                    {% endif %}
                    {% endif %}
                    {% endfor %}
                </p>
            </div>
            <div class="produit-specs">
                <p>
                    <strong>Prix de départ : </strong>
                    {{ encheres.prix_debut }}$

                </p>
                <p>
                    <strong>Date de début de l'enchère : </strong>
                    {{ encheres.date_debut }}
                </p>
                <p>
                    <strong>Date de fin de l'enchère : </strong>
                    {{ encheres.date_fin }}
                </p>
            </div>
            <form method="POST"><!-- action vide: travailler avec le même nom de colonne -->
                <h2>Nouvelle mise</h2>


                <!-- 
                <label>Nom
                    <input type="text" name="nom">
                </label>
                <label>Adresse
                    <input type="text" name="adresse">
                </label>
                <label>Telephone
                    <input type="number" name="tel">
                </label>
                <label>Code postal
                    <input type="text" name="code_postal">
                </label> -->
                <label>Votre nouvelle mise
                    <input type="number" name="miser">
                </label>

                <input type="submit" class="bouton" value="Faire une mise">
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
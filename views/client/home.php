{{ include('layouts/header.php', {title:'Home'})}}

<main>
    <section class="hero flex-center background-cover row">
        <div class="hero-contenu container">
            <div class="hero-texte">
                <h1>Enchères de timbres rares et de qualités </h1>
                <p>Nous avons des timbres provenant du monde entier</p>
                <a class="bouton" href="catalogue">Voir nos enchères</a>
            </div>
        </div>
    </section>


    <section class="avantages container">
        <article class="avantages-carte carte">
            <div class="avantages-carte-icon flex-center"><i class="fa fa-thumbs-up"></i></div>
            <h3><a href="catalogue">Tout sur les timbres</a></h3>
            <p>Conçue dès le départ pour comprendre les collectionneurs et la façon dont vous collectionnez</p>
        </article>

        <article class="avantages-carte carte">
            <div class="avantages-carte-icon"><i class="fa fa-check"></i></div>
            <h3><a href="catalogue">Vendeur reconnu et certifié</a></h3>
            <p>Couvert sous la protection de Paypal. Vous pouvez miser en toute sécurité</p>
        </article>

        <article class="avantages-carte carte">
            <div class="avantages-carte-icon"><i class="fa fa-list-alt"></i></div>
            <h3><a href="catalogue">Plus de 6 000 000 annonces</a></h3>
            <p>Parcourez une vaste collection de plus de six millions de timbres du monde entier</p>
        </article>
    </section>


    <section class="catalogue container">
        <div class="catalogue-title">
            <h2>Nos nouveaux arrivés</h2>
            <div><a href="catalogue">Voir tous ></a></div>
        </div>
        {% set displayNouveau = 0 %}
        {% for enchere in encheres|sort((a, b) => b.date_debut <=> a.date_debut) %}

        {% if displayNouveau < 4 %}


        {% for timbre in timbres %}
        {% if timbre.encheres_id_enchere == enchere.id  %}
        <article class="carte">
            <a href="{{ base }}/client/produit?id={{enchere.id}}">
                {% for image in images %}
                {% if ((image.timbres_id_timbre == timbre.id_timbre) and (image.principale == 1)) %}
                <img src="{{ db_image }}{{ image.image_url }}" alt="{{ image.alt_text }}">
                {% endif %}
                {% endfor %}
            </a>
            <h3><a href="{{ base }}/client/produit?id={{enchere.id}}">
                    <!-- {{ display }} -->
                    {{ timbre.nom }}

                </a></h3>
            <span><strong>Prix de départ: </strong><span class="carte-prix">{{ enchere.prix_debut }}</span></span>
            <span>Fin: <span>{{ enchere.date_fin }}</span></span>
            <a class="bouton" href="{{ base }}/client/produit?id={{enchere.id}}">Voir l'enchère</a>
        </article>
        {% set displayNouveau = displayNouveau + 1 %}
        {% endif %}
        {% endfor %}
        {% endif %}
        {% endfor %}
    </section>


        <section class="infolettre flex-center background-cover column">
            <div class="infolettre-contenu">
                <div class="infolettre-texte">
                    <h3>Suivez nos dernières enchères</h3>
                    <p>Inscrivez-vous à l'infolettre de Stampee</p>
                    <form id="infolettre-form" action="index.html">

                        <input type="text" id="courriel" name="courriel" placeholder="Votre courriel" value="Votre Courriel">
                        <label for="courriel" aria-labelledby="courriel"></label>
                        <button class="bouton">S'inscrire</button>
                    </form>
                    <p><small>En cliquant sur s'inscrire, vous acceptez de recevoir des infolettre de Stampee.</small></p>
                </div>
            </div>
        </section>



        <section class="catalogue container">
            <div class="catalogue-title">
                <h2>Nos coups de coeur</h2>
                <div><a href="pages/catalogue.html">Voir tous ></a></div>
            </div>
            {% set displayCoeur = 0 %}
            {% for enchere in encheres %}

            {% if (enchere.vedette == 1) and displayCoeur < 4 %}


            {% for timbre in timbres %}

            {% set dateFin = enchere.date_fin|date("YmdHis") %}
            {% set maintenant = 'now'|date("YmdHis") %}
            {% set difference = dateFin - maintenant %}


            {% if timbre.encheres_id_enchere == enchere.id and difference > 0 %}
            <article class="carte">
                <a href="{{ base }}/client/produit?id={{enchere.id}}">
                    {% for image in images %}
                    {% if ((image.timbres_id_timbre == timbre.id_timbre) and (image.principale == 1)) %}
                    <img src="{{ db_image }}{{ image.image_url }}" alt="{{ image.alt_text }}">
                    {% endif %}
                    {% endfor %}
                </a>
                <h3><a href="{{ base }}/client/produit?id={{enchere.id}}">

                        {{ timbre.nom }}

                    </a></h3>
                <span><strong>Prix de départ: </strong><span class="carte-prix">{{ enchere.prix_debut }}</span></span>
                <span>Fin: <span>{{ enchere.date_fin }}</span></span>
                <a class="bouton" href="{{ base }}/client/produit?id={{enchere.id}}">Voir l'enchère</a>
            </article>
            {% set displayCoeur = displayCoeur + 1 %}
            {% endif %}
            {% endfor %}
            {% endif %}
            {% endfor %}

        </section>
</main>


<section class="texte-image">
    <div class="texte-image-contenu container">
        <div class="texte moitie">
            <h3 class="titre">Lord Stampee III:<br>un philatéliste passionné en quête de l’histoire postale </h3>
            <p class="contenu">À 48 ans, Lord Stampee III est un philatéliste anglais dont la passion pour les timbres ne cesse de grandir. Résidant à
                Cambridge. Son intérêt pour les timbres a débuté à l’âge de 10 ans, lorsqu’un
                vieil oncle lui a offert un petit album contenant une collection de timbres britanniques datant de la fin du XIXe
                siècle. Ce cadeau anodin allait devenir...</p>
            <a class="bouton" href="#">En savoir plus</a>
        </div>
        <div class="image moitie">
            <img src="{{ asset }}images/lord-stampee-III_pixabay.jpg" alt="Lord Stampee">
        </div>
    </div>
</section>



{{ include('layouts/footer.php')}}
{{ include('layouts/header.php', {title:'Produit Create'})}}

<header class="entete">
    <section class="fil-ariane container">
        <span><a href="">encheres</a> > <a href=""> timbre</a></span>
    </section>
</header>
<div id="lightbox"></div>
<main class="produit container">
    <!-- <header>
            <h2>Nos timbres vedettes</h2>
        </header> -->
    <section class="produit-header">
        <div class="produit-photo">

            <div class="">
                <img class="zoomD" src='{% for timbre in timbres %}
                    {% if timbre.encheres_id_enchere == encheres.id %}
                    {% for image in images %}
                    {% if ((image.timbres_id_timbre == timbre.id_timbre) and (image.principale == 1)) %}
                    {{ db_image }}{{ image.image_url }}
                    '
                    {% endif %}
                    {% endfor %}
                    {% endif %}
                    {% endfor %}>
            </div>

            {% for timbre in timbres %}
            {% if timbre.encheres_id_enchere == encheres.id %}
            {% for image in images %}
            {% if ((image.timbres_id_timbre == timbre.id_timbre) and (image.principale == 0)) %}
            <div class="">
                <img src="{{ db_image }}{{ image.image_url }}" alt="{{ image.alt_text }}">
            </div>
            {% endif %}
            {% endfor %}
            {% endif %}
            {% endfor %}

            <!-- <div class="">
                <img src="/projet01_v02/public/images/timbre-01.jpg" alt="Photo 02">
            </div>
            <div class="">
                <img src="http://localhost/projet01_v02/public/images/timbre-01.jpg" alt="Photo 0">
            </div> -->
        </div>
        <div class="produit-achat">
            <h1>
                {% for timbre in timbres %}
                {% if timbre.encheres_id_enchere == encheres.id %}
                {{ timbre.nom }}
                {% endif %}
                {% endfor %}
            </h1>
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
                <!-- <p>
                    {% for timbre in timbres %}
                    {% if timbre.encheres_id_enchere == encheres.id %}
                    {% for image in images %}
                    {% if ((image.timbres_id_timbre == timbre.id_timbre) and (image.principale == 1)) %}
                    {{db_image}}{{image.image_url|trim}}
                    {% endif %}
                    {% endfor %}
                    {% endif %}
                    {% endfor %}
                </p> -->
            </div>
            <form method="POST"><!-- action vide: travailler avec le même nom de colonne -->



                <!-- 
                <label>Nom
                    <input type="text" name="nom">
                </label>
                <label>Adresse
                    <input type="text" name="adresse">
                </label>-->
                <label for="users_id" class="hidden">User_id</label>
                <select id="users_id" name="users_id" required class="hidden">
                    <option value="{{ session.user_id }}">{{ session.user_id }}</option>
                </select>
                <label for="encheres_id" class="hidden">Encheres_id</label>
                <select id="encheres_id" name="encheres_id" required class="hidden">
                    <option value="{{ encheres.id }}">{{ encheres.id }}</option>
                </select>
                <!-- <label for="timbres_id">timbre_id</label>
                <select id="timbres_id" name="{{ timbres.id_timbre }}" required>
                    {% for timbre in timbres %}
                    {% if timbre.encheres_id_enchere == encheres.id %}
                    <option value="{{ timbre.id_timbre }}">{{ timbre.id_timbre }}</option>
                    {% endif %}
                    {% endfor %}
                </select> -->
                <h2>Nouvelle mise</h2>

                {% set maxValue = 0 %}

                {% for mise in mises %}
                {% if mise.encheres_id == encheres.id and mise.users_id == session.user_id %}
                {% set maxValue = max(mise.montant_mise, maxValue) %}
                {% endif %}
                {% endfor %}

                {% if maxValue < encheres.prix_debut  %}
                {% set maxValue = encheres.prix_debut %}
                {% endif %}

                {% set mise_minimum = maxValue + 5 %}
                <p class="derniereMise">La dernière mise était de :

                    {{ maxValue }}
                </p>
                <!-- dernier:{{mises|last.users_id}} vous:{{session.user_id}} -->
                {% if mise.user_id == session.user_id and mises|last.users_id == session.user_id  %}
                <p class="derniereMise"><i class="fa fa-check-circle"></i> Vous êtes la dernière personne à avoir misé</p>
                {% endif %}
                <label>Votre nouvelle mise
                    <input type="number" name="montant_mise" min="{{ mise_mimimum }}" value="{{ mise_minimum }}">
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
            <p>Considéré comme le premier timbre-poste officiel, Ce timbre a été émis au Royaume-Uni le 1er mai 1840 et mis en circulation le 6 mai. Il présente un portrait de la reine Victoria sur fond noir et avait une valeur faciale d'un penny. Ce timbre a révolutionné le système postal en introduisant l'affranchissement prépayé, rendant l'envoi de lettres plus accessible. Malgré son élégance, il a été remplacé par le Penny Red en 1841, car l’oblitération sur fond noir était difficile à voir. Aujourd’hui, il est très recherché par les collectionneurs.</p>
        </div>

    </section>
    <section class="catalogue">
        <div class="catalogue-title">
            <h2>Vous aimerez peut-être aussi...</h2>
        </div>


        {% set displayNouveau = 0 %}
        {% for enchereList in encheresList %}

        {% if displayNouveau < 4  %}


        {% for timbre in timbres %}
        {% set dateFin = enchereList.date_fin|date("YmdHis") %}
        {% set maintenant = 'now'|date("YmdHis") %}
        {% set difference = dateFin - maintenant %}

    
        {% if timbre.encheres_id_enchere == enchereList.id and enchereList.id != encheres.id and difference > 0 %}
        <article class="carte">
            <a href="{{ base }}/client/produit?id={{enchere.id}}">
                {% for image in images %}
                {% if ((image.timbres_id_timbre == timbre.id_timbre) and (image.principale == 1)) %}
                <img src="{{ db_image }}{{ image.image_url }}" alt="{{ image.alt_text }}">
                {% endif %}
                {% endfor %}
            </a>
            <h3><a href="{{ base }}/client/produit?id={{enchereList.id}}">
                    <!-- {{ display }} -->
                    {{ timbre.nom }}


                </a></h3>
            <span><strong>Prix de départ: </strong><span class="carte-prix">{{ enchereList.prix_debut }}</span></span>
            <span>Fin: <span>{{ enchereList.date_fin }}</span></span>
            <a class="bouton" href="{{ base }}/client/produit?id={{enchereList.id}}">Voir l'enchère</a>
        </article>
        {% set displayNouveau = displayNouveau + 1 %}
        {% endif %}
        {% endfor %}

        {% endif %}
        {% endfor %}
        <!-- 
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
        </article> -->
    </section>



</main>
{{ include('layouts/footer.php')}}
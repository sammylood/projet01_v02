{{ include('layouts/header.php', {title:'Clients'})}}
<header class="entete">
    <section class="fil-ariane container">
        <span><a href="">Enchères </a> > <a href=""> Toutes les enchères</a></span>
    </section>
</header>

<div class="catalogue-container container">
    <aside class="menu-filtres">

        <form id="aside-form" action="#">
            <div class="as-filtres-titres"><span>filtres</span> <i class="fa fa-chevron-down"></i></div>
            <fieldset class="as-filtres">
                <legend>Provenance</legend>
                <label for="amerique">
                    <input type="checkbox" name="amerique" id="amerique"> <span>Amérique</span>
                </label>
                <label for="europe">
                    <input type="checkbox" name="europe" id="europe"> <span>Europe</span>
                </label>
                <label for="afrique">
                    <input type="checkbox" name="afrique" id="afrique"> <span>Afrique</span>
                </label>
                <label for="asie">
                    <input type="checkbox" name="asie" id="asie"> <span>Asie</span>
                </label>
                <label for="oceanie">
                    <input type="checkbox" name="oceanie" id="oceanie"> <span>céanie</span>
                </label>
                <label for="antartique">
                    <input type="checkbox" name="antartique" id="antartique"> <span>Antartique</span>
                </label>
            </fieldset>
            <fieldset class="as-filtres">
                <legend>Valeur estimée</legend>
                <label for="prix-000100">
                    <input type="checkbox" name="prix-000100" id="prix-000100"> <span>0 - 100$</span>
                </label>
                <label for="prix-100200">
                    <input type="checkbox" name="prix-100200" id="prix-100200"> <span>100.01$ - 200$</span>
                </label>
                <label for="prix-200300">
                    <input type="checkbox" name="prix-200300" id="prix-200300"> <span>200.01$ - 300$</span>
                </label>
                <label for="prix-300500">
                    <input type="checkbox" name="prix-300500" id="prix-300500"> <span>300.01$ - 500$</span>
                </label>
                <label for="prix-5001000">
                    <input type="checkbox" name="prix-5001000" id="prix-5001000"> <span>500.01$ - 1000$</span>
                </label>
                <label for="prix-1000Plus">
                    <input type="checkbox" name="prix-1000Plus" id="prix-1000Plus"> <span>1000.01$ et plus</span>
                </label>
            </fieldset>
            <fieldset class="as-filtres">
                <legend>Couleurs populaires</legend>
                <label for="rouge">
                    <input type="checkbox" name="rouge" id="rouge"> <span>Rouge</span>
                </label>
                <label for="jaune">
                    <input type="checkbox" name="jaune" id="jaune"> <span>Jaune</span>
                </label>
                <label for="vert">
                    <input type="checkbox" name="vert" id="vert"> <span>Vert</span>
                </label>
                <label for="bleu">
                    <input type="checkbox" name="bleu" id="bleu"> <span>Bleu</span>
                </label>
                <label for="orange">
                    <input type="checkbox" name="orange" id="orange"> <span>Orange</span>
                </label>
                <label for="mauve">
                    <input type="checkbox" name="mauve" id="mauve"> <span>Mauve</span>
                </label>
                <label for="sepia">
                    <input type="checkbox" name="sepia" id="sepia"> <span>Sepia</span>
                </label>
                <label for="noirBlanc">
                    <input type="checkbox" name="noirBlanc" id="noirBlanc"> <span>Noir et blanc</span>
                </label>
            </fieldset>
        </form>
    </aside>
    <main>
        <!-- <header>
            <h2>Nos timbres vedettes</h2>
        </header> -->
        <section class="catalogue">
            <div class="catalogue-title">
                <h2>Toutes les enchères</h2>
                <div class="list-grid">
                    <div class="button-list"><i class="fa fa-th-list"></i></div>
                    <div class="button-grid active"><i class="fa fa-th"></i></div>
                </div>
            </div>
            <!-- {% set displayNouveau = 0 %} -->
            {% for enchere in encheres %}

            <!-- {% if displayNouveau < 8 %} -->


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
   
                        {{ timbre.nom }}

                    </a></h3>
                <span><strong>Prix de départ: </strong><span class="carte-prix">{{ enchere.prix_debut }}</span></span>
                <span>Fin: <span>{{ enchere.date_fin }}</span></span>
                <a class="bouton" href="{{ base }}/client/produit?id={{enchere.id}}">Voir l'enchère</a>
            </article>
            <!-- {% set displayNouveau = displayNouveau + 1 %} -->
            {% endif %}
            {% endfor %}
            {% endif %}
            {% endfor %}
            <!-- 

            <article class="carte">
                <a href="#" class="image">
                    <img src="http://localhost/projet01_v02/public/images/timbre-01.jpg" alt="Outlander PHEV">
                </a>
                <h3><a href="">2025 Outlander PHEV</a></h3>
                <span><span class="carte-prix">À partir de 48,698$</span></span>
                <a class="bouton" href="create">Voir l'enchère</a>
            </article>

            <article class="carte">
                <a href="#" class="image">
                    <img src="http://localhost/projet01_v02/public/images/timbre-01.jpg" alt="Eclipse Cross">
                </a>
                <h3><a href="">2025 Eclipse Cross</a></h3>
                <span><span class="carte-prix">À partir de 34,798$</span></span>
                <a class="bouton" href="create">Voir l'enchère</a>
            </article>

            <article class="carte">
                <a href="#" class="image">
                    <img src="http://localhost/projet01_v02/public/images/timbre-01.jpg" alt="
                        RVR">
                </a>
                <h3><a href="">2025 RVR</a></h3>
                <span><span class="carte-prix">À partir de 24,798$</span></span>
                <a class="bouton" href="create">Voir l'enchère</a>
            </article>

            <article class="carte">
                <a href="#" class="image">
                    <img src="http://localhost/projet01_v02/public/images/timbre-01.jpg" alt="Mirage">
                </a>
                <h3><a href="">2025 Mirage</a></h3>
                <span><span class="carte-prix">À partir de 16,998$</span></span>
                <a class="bouton" href="create">Voir l'enchère</a>
            </article>

            <article class="carte">
                <a href="#" class="image">
                    <img src="http://localhost/projet01_v02/public/images/timbre-01.jpg" alt="Outlander PHEV">
                </a>
                <h3><a href="">2024 Outlander PHEV</a></h3>
                <span><span class="carte-prix">À partir de 48,698$</span></span>
                <a class="bouton" href="create">Voir l'enchère</a>
            </article>

            <article class="carte">
                <a href="#" class="image">
                    <img src="http://localhost/projet01_v02/public/images/timbre-01.jpg" alt="Eclipse Cross">
                </a>
                <h3><a href="">2024 Eclipse Cross</a></h3>
                <span><span class="carte-prix">À partir de 34,798$</span></span>
                <a class="bouton" href="create">Voir l'enchère</a>
            </article>

            <article class="carte">
                <a href="#" class="image">
                    <img src="http://localhost/projet01_v02/public/images/timbre-01.jpg" alt="
                        RVR">
                </a>
                <h3><a href="">2024 RVR</a></h3>
                <span><span class="carte-prix">À partir de 24,798$</span></span>
                <a class="bouton" href="create">Voir l'enchère</a>
            </article>

            <article class="carte">
                <a href="#" class="image">
                    <img src="http://localhost/projet01_v02/public/images/timbre-01.jpg" alt="Mirage">
                </a>
                <h3><a href="">2024 Mirage</a></h3>
                <span><span class="carte-prix">À partir de 16,998$</span></span>
                <a class="bouton" href="create">Voir l'enchère</a>
            </article> -->
        </section>

    </main>
</div>

{{ include('layouts/footer.php')}}
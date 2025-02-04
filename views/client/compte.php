{{ include('layouts/header.php', {title:'Mon compte'})}}
<header class="entete">
    <section class="fil-ariane container">
        <span>Bonjour {{ session.user_name }}</span>
    </section>
</header>

<div class="catalogue-container container">
    <aside class="menu-filtres">
        <div class="aside-form">
            <div class="onglet">Mes enchères</div>
            <div class="onglet">Mes mises</div>
        </div>

        <!-- <form id="aside-form" action="#">
            <div class="as-filtres-titres"><span>filtres</span> <i class="fa fa-chevron-down"></i></div>
            <fieldset class="as-filtres">
                <legend>Provenance</legend>
                <label for="amerique">
                    <input type="checkbox" name="amerique" id="amerique"> <span>Amérique</span>
                </label>

            </fieldset>
            <fieldset class="as-filtres">
                <legend>Valeur estimée</legend>

                <label for="prix-1000Plus">
                    <input type="checkbox" name="prix-1000Plus" id="prix-1000Plus"> <span>1000.01$ et plus</span>
                </label>
            </fieldset>
            <fieldset class="as-filtres">
                <legend>Couleurs populaires</legend>

                <label for="noirBlanc">
                    <input type="checkbox" name="noirBlanc" id="noirBlanc"> <span>Noir et blanc</span>
                </label>
            </fieldset>
        </form> -->
    </aside>
    <main>
        <h1>Mes Timbres</h1>
        <table>
            <thead>
                <tr>
                    <th>N° de timbre</th>
                    <th>Nom du timbre</th>
                    <th>Annee</th>
                    <th>condition</th>
                    <th>Pays</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {% for timbre in timbres %}
                <tr>
                    <td><strong><a href="{{ base }}/client/show?id={{timbre.id_timbre}}">{{timbre.id_timbre}} Voir plus ></a></strong></td>
                    <td>{{ timbre.nom }}
                    </td>
                    <td>{{ timbre.annee }}
                    </td>
                    <td>{{ timbre.conditions_id_condition }}
                        {% for condition in conditions %}
                        {% if condition.id_condition == timbre.conditions_id_condition %}
                        {{ condition.niveau }}
                        {% endif %}
                        {% endfor %}
                    </td>
                    <td>{{ timbre.id_country }}
                        {% for country in countries %}
                        {% if country.id_country == timbre.pays_id_pays %}
                        {{ country.country_name }}
                        {% endif %}
                        {% endfor %}
                    </td>
                    <td><a href="{{base}}/client/edit?id={{ timbre.id_timbre }}" class="bouton">Edit</a></td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
        <a href="{{ base }}/client/create" class="bouton">Nouvelle commande</a>
    </main>
</div>
{{ include('layouts/footer.php')}}
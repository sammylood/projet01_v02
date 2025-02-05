{{ include('layouts/header.php', {title:'Mon compte'})}}
<header class="entete">
    <section class="fil-ariane container">
        <span>Bonjour {{ session.user_name }}</span>
    </section>
</header>

<div class="catalogue-container container">
    <aside class="menu-filtres ">
        <div class="aside-form sticky">
            <div class="onglet"><a href="#timbres">Mes timbres</a></div>
            <div class="onglet"><a href="#mises">Mes mises</a></div>
        </div>
    </aside>
    <main>

        <h2 id="timbres">Mes Timbres</h2>
        <table class="compte">
            <thead>
                <tr>
                    <th>N° de timbre</th>
                    <th>Nom du timbre</th>
                    <th>Annee</th>
                    <th>condition</th>
                    <th>Pays</th>

                </tr>
            </thead>
            <tbody>
                {% for timbre in timbres|sort((a, b) => a.id_timbre <=> b.id_timbre) %}
                {% if timbre.users_id_user == session.user_id %}
                <tr>
                    <td><strong><a href="{{ base }}/client/show?id={{timbre.id_timbre}}">{{timbre.id_timbre}} </a></strong></td>
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

                </tr>
                {% endif %}
                {% endfor %}
            </tbody>
        </table>
        <a href="{{ base }}/client/create" class="bouton">Créer un nouveau produit</a>
        <br>
        <h2 id="mises">Mes Mises</h2>
        <table class="compte">
            <thead>
                <tr>
                    <th>N° de Mise</th>
                    <th>N° de l'enchère</th>
                    <th>Montant de la mise</th>


                </tr>
            </thead>
            <tbody>
                {% for mise in mises %}
                {% if mise.users_id == session.user_id %}
                <tr>
                    <td><strong>{{ mise.id_mise }}</strong></td>
                    <td>{{ mise.encheres_id }}
                    </td>
                    <td>{{ mise.montant_mise }}
                    </td>

                </tr>
                {% endif %}
                {% endfor %}
            </tbody>
        </table>
    </main>
</div>
{{ include('layouts/footer.php')}}
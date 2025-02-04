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
        <h1>Réservations</h1>
        <table>
            <thead>
                <tr>
                    <th>N° de Réservation</th>
                    <th>Date</th>
                    <th>Id voiture</th>
                    <th>Id succursale</th>
                    <th>Id client</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {% for achat in achats %}
                <tr>
                    <td><strong><a href="{{ base }}/client/show?id={{achat.id}}">{{achat.id}} Voir plus ></a></strong></td>
                    <td>{{achat.date_achat}}</td>
                    <td>{{ achat.id_voiture }}
                        {% for modele in modeles %}
                        {% if modele.id_voiture == achat.id_voiture %}
                        {{ modele.modele }}
                        {% endif %}
                        {% endfor %}
                    </td>
                    <td>{{ achat.id_succursale }}
                        {% for succursale in succursales %}
                        {% if succursale.id_succursale == achat.id_succursale %}
                        {{ succursale.nom }}
                        {% endif %}
                        {% endfor %}
                    </td>
                    <td>{{ achat.id_client }}
                        {% for client in clients %}
                        {% if client.id == achat.id_client %}
                        {{ client.nom }}
                        {% endif %}
                        {% endfor %}
                    </td>
                    <td><a href="{{base}}/client/edit?id={{ achat.id }}" class="btn">Edit</a></td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
        <a href="{{ base }}/client/create" class="bouton">Nouvelle commande</a>
    </main>
</div>
{{ include('layouts/footer.php')}}
{{ include('layouts/header.php', {title:'Client Show'})}}
<div class="container">
    <h1>Détails de la réservation de l'essai routier</h1>
    <p><strong>Numéro de Réservation: </strong>{{ achat.id }}</p>
    <p><strong>Date de la réservation : </strong>{{ achat.date_achat }}</p>
    <p><strong>Voiture chosie : </strong>
        {% for modele in modeles %}
        {% if modele.id_voiture == achat.id_voiture %}
        {{ modele.modele }}
        {% endif %}
        {% endfor %}
    </p>
    <p><strong>Succursale de la réservation : </strong>
        {% for succursale in succursales %}
        {% if succursale.id_succursale == achat.id_succursale %}
        {{ succursale.nom }}
        {% endif %}
        {% endfor %}
    </p>
    <p><strong>Nom complet : </strong>
        {% for client in clients %}
        {% if client.id == achat.id_client %}
        {{ client.nom }}
        {% endif %}
        {% endfor %}
    </p>
    <a href="{{ base }}/client/edit?id={{ achat.id }}" class="btn">Edit</a>
    <form action="{{ base }}/client/delete" method="post">
        <input type="hidden" name="id" value="{{ client.id }}">
        <button type="submit" class="btn red">Delete</button>
    </form>
</div>
{{ include('layouts/footer.php')}}
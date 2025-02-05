{{ include('layouts/header.php', {title:'Client Create'})}}

<header class="entete">
    <section class="fil-ariane container">
        <span>Bonjour {{ session.user_name }}</span>
    </section>
</header>

<main class="container width-100">

    <section class="produit-header">

        <div class="produit-achat">
            <h1>Création de timbre</h1>
            <br>
            <form method="POST"><!-- action vide: travailler avec le même nom de colonne -->
                <h2>Nouveau timbre</h2>
                <label class="hidden">User ID
                    <input type="hidden" name="users_id_user" value="{{session.user_id}}" required>
                </label>
                <label>Nom
                    <input type="text" name="nom" required>
                </label>
                <label>Annee
                    <input type="number" name="annee" value="1900" required>
                </label>
                <label>Couleur
                    <input type="text" name="couleur" value="bleu" required>
                </label>
                <label>Tirage
                    <input type="text" name="tirage" value="tirage {{ timbres|last.id_timbre }}" required>
                </label>
                <label>Dimensions
                    <input type="text" name="dimensions" value="5cmx5cm" required>
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
                    {% for condition in conditions|sort((a, b) => a.id_condition <=> b.id_condition) %}
                    <option value="{{ condition.id_condition }}">{{ condition.niveau }}</option>
                    {% endfor %}
                </select>

                <label for="countries">Pays</label>
                <select id="countries" name="pays_id_pays" required>
                    {% for country in countries %}
                    <option value="{{ country|sort.id_country }}">{{ country.country_name }}</option>
                    {% endfor %}
                </select>

                <input type="submit" class="bouton" value="Créer le timbre et passer à l'étape suivante">
            </form>
        </div>
    </section>


</main>
{{ include('layouts/footer.php')}}
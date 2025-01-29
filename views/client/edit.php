{{ include('layouts/header.php', {title:'Client Edit'})}}
<div class="container">
    <form method="post">
        <h2>Modifier réservation</h2>

        <label>Modèle
            <select name="modele">
                <option value="">Select</option>
                {% for modele in modeles %}
                <option value="{{modele.id_voiture}}" {% if(modele.id_voiture == inputs.id_voiture) %} selected {%endif%}>{{ modele.modele }}</option>
                {% endfor %}
            </select>
        </label>
        {% if errors.id_voiture is defined %}
        <span class="error">{{ errors.id_voiture}}</span>
        {% endif %}

        <label>Succursale
            <select name="succursale">
                <option value="">Select</option>
                {% for succursale in succursales %}
                <option value="{{succursale.id_succursale}}" {% if(succursale.id_succursale == inputs.id_succursale) %} selected {%endif%}>{{ succursale.nom }}</option>
                {% endfor %}
            </select>
        </label>
        {% if errors.id_succursale is defined %}
        <span class="error">{{ errors.id_succursale }}</span>
        {% endif %}



        <label>Nom
            <input type="text" name="nom" value="{{ inputs.nom }}">
        </label>
        {% if errors.nom is defined %}
        <span class="error">{{ errors.nom }}</span>
        {% endif %}
        <label>Adresse
            <input type="text" name="adresse" value="{{ inputs.adresse }}">
        </label>
        {% if errors.adresse is defined %}
        <span class="error">{{ errors.adresse }}</span>
        {% endif %}
        <label>Telephone
            <input type="text" name="tel" value="{{ inputs.tel }}">
        </label>
        {% if errors.tel is defined %}
        <span class="error">{{ errors.tel }}</span>
        {% endif %}
        <label>Code Postal
            <input type="text" name="code_postal" value="{{ inputs.code_postal }}">
        </label>
        {% if errors.code_postal is defined %}
        <span class="error">{{ errors.code_postal }}</span>
        {% endif %}
        <label>Courriel
            <input type="email" name="courriel" value="{{ inputs.courriel }}">
        </label>
        {% if errors.courriel is defined %}
        <span class="error">{{ errors.courriel }}</span>
        {% endif %}

        <input type="submit" class="btn" value="Sauvegarder">
    </form>
</div>
{{ include('layouts/footer.php')}}
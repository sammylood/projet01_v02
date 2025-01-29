{{ include('layouts/header.php', {title:'Connection'})}}

    <div class="container flex-center">
        <div class="login">
            {% if errors is defined %}
            <div class="error">
                <ul>
                    {% for error in errors %}
                    <li>{{ error }}</li>
                    {% endfor %}
                </ul>
            </div>
            {% endif %}
            <form method="post">
                <h2>Connection</h2>
                <label>Courriel
                    <input type="text" name="username" value="{{ inputs.username }}">
                </label>
                <label>Mot de passe
                    <input type="password" name="password">
                </label>
                <input type="submit" class="bouton" value="Se connecter">
                <a>Créer un compte</a>
            </form>

        </div>
    </div>

{{ include('layouts/footer.php')}}
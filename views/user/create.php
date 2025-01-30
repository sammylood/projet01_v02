{{ include('layouts/header.php', {title:'Créer un compte'})}}
<div class="container">
    <div class="login">
        <form method="post">
            <h2>Nouveau compte</h2>
            <label>Nom
                <input type="text" name="name" value="{{ inputs.name }}">
            </label>
            {% if errors.name is defined %}
            <span class="error">{{ errors.name }}</span>
            {% endif %}
            <label>Courriel
                <input type="email" name="username" value="{{ inputs.username }}">
            </label>
            {% if errors.username is defined %}
            <span class="error">{{ errors.username }}</span>
            {% endif %}
            <label>Mot de passe
                <input type="password" name="password">
            </label>
            {% if errors.password is defined %}
            <span class="error">{{ errors.password }}</span>
            {% endif %}
            <label class="hidden">Privilege
                <select name="privilege_id">
                    <option value="">Select</option>
                    <option value="1"  selected ></option>
                </select>
            </label>
            {% if errors.privilege_id is defined %}
            <span class="error">{{ errors.privilege_id }}</span>
            {% endif %}
            <input type="submit" class="bouton" value="Créer un compte">
        </form>
    </div>
    </div>
    {{ include('layouts/footer.php')}}


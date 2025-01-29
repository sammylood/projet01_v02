{{ include('layouts/header.php', {title:'User Edit'})}}
<header class="entete">
    <section class="fil-ariane container">
        <span><a href="">Comptes </a> > <a href=""> Compte</a></span>
    </section>
</header>

<div class="container">
    <form method="post">
        <h2>Edit User</h2>
        <label>Name
            <input type="text" name="name" value="{{ inputs.name }}">
        </label>
        {% if errors.name is defined %}
        <span class="error">{{ errors.name }}</span>
        {% endif %}
        <label>Username
            <input type="email" name="username" value="{{ inputs.username }}">
        </label>
        {% if errors.username is defined %}
        <span class="error">{{ errors.username }}</span>
        {% endif %}
        <label>Privilege
            <select name="privilege_id">
                <option value="">Select</option>
                {% for privilege in privileges %}
                <option value="{{privilege.id}}" {% if(privilege.id == inputs.privilege_id) %} selected {%endif%}>{{ privilege.privilege}}</option>
                {% endfor %}privilege_id
            </select>
        </label>
        {% if errors.privilege_id is defined %}
        <span class="error">{{ errors.privilege_id }}</span>
        {% endif %}
        <input type="submit" class="btn" value="Save">
    </form>
</div>
{{ include('layouts/footer.php')}}
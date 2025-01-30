{{ include('layouts/header.php', {title:'Connection'})}}
<div class="container flex-center">
    <div class="login">
        <form method="post">
            <h2>New User</h2>
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
            <label>Password
                <input type="password" name="password">
            </label>
            {% if errors.password is defined %}
            <span class="error">{{ errors.password }}</span>
            {% endif %}
            <input type="submit" class="btn" value="Save">
        </form>
    </div>
</div>
    {{ include('layouts/footer.php')}}
{{ include('layouts/header.php', {title:'Comptes'})}}
<header class="entete">
    <section class="fil-ariane container">
        <span><a href="">Comptes </a> > <a href=""> Tous les comptes</a></span>
    </section>
</header>

<div class="container">
    <main>
        <h1>Comptes</h1>
        <table>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Username (email)</th>
                    <th>Niveau de privilège</th>
                    <th>Date de création</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {% for user in user %}
                <tr>
                    <td><strong><a href="{{ base }}/user/userShow?id={{user.id}}">{{user.id}} Voir plus ></a></strong></td>
                    <td>{{user.name }}</td>
                    <td>{{ user.username }}</td>
                    <td>{{ user.privilege_id  }}</td>
                    <td>{{user.created_at}}</td>
                    <td><a href="{{base}}/user/userEdit?id={{ user.id }}" class="btn">Edit</a></td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
        <a href="{{ base }}/user/create" class="bouton">Nouveau compte</a>
    </main>
</div>

{{ include('layouts/footer.php')}}
<div x-data='{ page: 1, users: @json($users->items()), hasMorePages: @json($users->hasMorePages()) }'>
    <ul id="users">
        <template x-for="user in users">
            <li x-text="user.name"></li>
        </template>
    </ul>

    <template x-if="hasMorePages">
        <a href="#" x-on:click.prevent="
            $wire.more(page++)
                .then(res => {
                     users.push(...res.users);
                     hasMorePages = res.hasMorePages
                })
        ">
            Load more
        </a>
    </template>
</div>

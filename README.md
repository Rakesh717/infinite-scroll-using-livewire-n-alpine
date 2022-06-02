## Optimized way to load-more/infinite scroll using livewire and alpine

Example component: app/Http/Livewire/UserList.php

### How to Setup
``` 
cp .env.example .env 

php artisan key:generate 

#update database credentials in .env file

php artisan migrate --seed
```

### Back story
Most of the blogs/videos I found while searching for "infinite scroll using livewire" were doing `Model::query()->paginate($this->page)` on render function and `$this->page += 10` on load more click or using intersection api. 

While this method works, it is very unoptimized and will put more pressure on your server than required. And rehydrating of the component will take more and more longer with increasing load-more click count which can lead to very bad UX.



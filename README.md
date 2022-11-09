# Installation instructions

```
git clone https://github.com/alikmanukian/test-hicaliber.git
cd test-hicaliber
composer install
composer run-script post-root-package-install
composer run-script post-create-project-cmd
./vendor/bin/sail up -d
./vendor/bin/sail php artisan migrate
./vendor/bin/sail php artisan db:seed
./vendor/bin/sail npm i
./vendor/bin/sail npm run build
```

### There are two different variants
1. Using inertia (route: /)
2. Using ajax request (route: /ajax)




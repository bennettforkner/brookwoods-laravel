cd /home/admin/web/app.bennettforkner.com/public_html
git pull
npm install
npm run build
composer install
php artisan migrate:fresh --seed

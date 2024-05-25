#!/bin/bash
cd /home/admin/web/app.campbrookwoods.org/public_html

# redirect stdout/stderr to a file
exec >git-deploy.log 2>&1

git config --global --add safe.directory /home/admin/web/app.campbrookwoods.org/public_html

git fetch

UPSTREAM=${1:-'@{u}'}
LOCAL=$(git rev-parse @)
REMOTE=$(git rev-parse "$UPSTREAM")
BASE=$(git merge-base @ "$UPSTREAM")

if [ $LOCAL = $REMOTE ]; then
    echo "Up-to-date"
elif [ $LOCAL = $BASE ]; then
    git pull
    npm install
    npm run build
    composer install
    php artisan migrate:fresh --seed
fi

if [ ! -f docs/output/app.html ]; then
    echo 'DMC' > docs/output/app.html
fi

php artisan test --coverage-html=storage/coverage --colors --runner WrapperRunner --coverage-text
chmod -R 777 storage/coverage
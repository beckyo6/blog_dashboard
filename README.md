# Blog Dashboard

This is the administration panel of my personal blog, the blog code is found in this [repository](https://github.com/beckyo6/blog_client).
This panel allows me to manage articles, blog users and view overall blog statistics.

## Installation

Start by getting a copy of the project locally with git:

```bash
git clone https://github.com/beckyo6/blog_dashboard
```

Then with composer install the dependencies:

```bash
cd blog_dashboard
composer install
```

Fill in the database connection information in the .env file(if not exist, create one and replace the values with your own):

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
if the .env file is not present, you can rename the .env.example file to .env and fill in the information.

And then run the migrations with artisan:

```bash
php artisan migrate
```

## Usage

Launch the application again using artisan:

```bash
php artisan serve
```

Artisan start a PHP server at the default address [http://localhost:8000](http://localhost:8000) or the one indicated by the return of the previous command.

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)

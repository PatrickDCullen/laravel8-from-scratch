# Laravel Blog (Laracasts Laravel 8 From Scratch Series)

This project is a blog website with an admin panel written in [Laravel](https://laravel.com/). It was made by
following along the [Laracasts](https://laracasts.com/) series [Laravel 8 From Scratch](https://laracasts.com/series/laravel-8-from-scratch). 

Commits with a message that begins with "End Ep" reflect code written along with the series- 
commits without "End Ep" reflect my own work adding features, following along with the 
Further Ideas section of the [original repository](https://github.com/JeffreyWay/Laravel-From-Scratch-Blog-Project#further-ideas).

## Getting Started

Follow these steps in your terminal to get this project running on your machine in development mode.
Code meant for a file within the project is indicated by a comment with the filename.

First, navigate to the directory where you would like the laravel8-from-scratch project to appear.

```
cd your/preferred/directory
```

Clone the project from this repository to your local machine.

```
git clone https://github.com/PatrickDCullen/laravel8-from-scratch.git
```

Navigate to the new directory for the project.

```
cd laravel8-from-scratch
```

Install all the dependencies with Composer.

```
composer install
```

Create a .env file and set your database password.

```
cp .env.example .env
```
```
// .env
DB_DATABASE=laravel8_from_scratch
DB_PASSWORD=password
```

Create the database.

```
mysql -u root -p
```
```
create database laravel8_from_scratch;
exit;
```

Generate the application key.

```
php artisan key:generate
```

Run migrations and seed the database. 

```
php artisan migrate --seed
```

Create the symbolic links for the application.
```
php artisan storage:link
```

Serve the application.
```
php artisan serve
```

Sign in with an email of john@doe.com and a password of password to use the website as an admin, or register your own user.

## Next Steps

These features come directly from the [original repository](https://github.com/JeffreyWay/Laravel-From-Scratch-Blog-Project#further-ideas).

1. <strike>Add a `status` column to the posts table to allow for posts that are still in a "draft" state. Only when this status is changed to "published" should they show up in the blog feed.</strike>
2. Update the "Edit Post" page in the admin section to allow for changing the author of a post.
3. Add an RSS feed that lists all posts in chronological order.
4. Record/Track and display the "views_count" for each post.
5. Allow registered users to "follow" certain authors. When they publish a new post, an email should be delivered to all followers.
6. Allow registered users to "bookmark" certain posts that they enjoyed. Then display their bookmarks in a corresponding settings page.
7. Add an account page to update your username and upload an avatar for your profile.

## Author

Patrick Cullen


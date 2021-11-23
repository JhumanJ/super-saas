# Super SAAS Template

My name is [Julien Nahum](https://twitter.com/JhumanJ), I've founded multiple Software-As-A-Service companies. This
repo is the base I'm using to create a new SAAS. I'll do my best to keep it up to date, but feel free to contribute.

Note that I built this template from the code of my last SAAS: [NotionForms](https://notionforms.io), so it might
look a bit odd in some places.


## Features

- Laravel 8
- Vue + VueRouter + Vuex + VueI18n + ESlint
- Pages with dynamic import and custom layouts
- Login, register, email verification and password reset
- Authentication with JWT
- Socialite integration
- TailwindCSS v2
- Multiple Front-end components (forms, buttons, nav)
- Welcome Page
- Pricing Page
- Admin space with user impersonation
- Stats with [Laravel Model Stats](https://github.com/JhumanJ/laravel-model-stats)

## Installation

- `composer create-project --prefer-dist JhumanJ/laravel-vue-tailwind-spa`
- Edit `.env` and set your database connection details
- (When installed via git clone or download, run `php artisan key:generate` and `php artisan jwt:secret`)
- `php artisan migrate`
- `npm install`

## Usage

#### Development

```bash
# Build and watch
npm run watch
```

#### Production

```bash
npm run production
```

## Socialite

This project comes with GitHub as an example for [Laravel Socialite](https://laravel.com/docs/5.8/socialite).

To enable the provider create a new GitHub application and use `https://example.com/api/oauth/github/callback` as the Authorization callback URL.

Edit `.env` and set `GITHUB_CLIENT_ID` and `GITHUB_CLIENT_SECRET` with the keys form your GitHub application.

For other providers you may need to set the appropriate keys in `config/services.php` and redirect url in `OAuthController.php`.

## Email Verification

To enable email verification make sure that your `App\User` model implements the `Illuminate\Contracts\Auth\MustVerifyEmail` contract.

## Testing

```bash
# Run unit and feature tests
vendor/bin/phpunit

# Run Dusk browser tests
php artisan dusk
```

# NullBin 🔒
 
Nullbin is a text/code storage website designed to offer text or code storage without compromising privacy and security. The website is still under heavy development and changes are constantly being made. 

[![License](https://img.shields.io/badge/License-MIT-6067e2)](#license)
[![GitHub issue](https://img.shields.io/github/issues/k2cn/NullBin?include_prereleases=&sort=semver&color=6067e2)](https://github.com/k2cn/NullBin/issues/)

## Features

- Paste expiration [5 min, 10, min, 30 min, 60 min, 1 day, 1 week]
- Pastes are Encrypted with `AES-256-CBC` from a random generated key.
- Pastes Decryption Key only shown once.
- Pastes are Decrypted in a session.

## Overview

The general purpose of the website is to offer an alternative to pastebin. With more focus on not knowing the data that is stored in the database during the time that the paste or snippet is set to be active. When the paste or snippet is no longer active, it should be deleted. 

The choice for open-source is to be transparent with how the data is processed and how the service is set up. This is to reassure those who might want to use the service or offer code for the project themselves.

![The website](https://i.imgur.com/edyQJT6.png "site")
![The website](https://i.imgur.com/0D6PnOp.png "site")

## Installation and usage

Clone the git down to your desired folder.

```shell
git clone https://github.com/k2cn/NullBin.git
```

`cd` into the folder and install the needed libraries for laravel.

```shell
composer install
```

Edit the `.env` file and set the newly created database, after you have re-named.

```shell
cp .env.example .env
```

Generate a new `APP_KEY` for your project.

```shell
php artisan key:generate
```

Install the needed frontend libs. eg. Tailwindcss.

```shell
npm install
```

Compile the needed frontend

```shell
npm run dev

// Or

npm run prod
```



# media-bank

## ⚙️ Prerequists

### ☑️ IDE

Eclipse: [https://www.eclipse.org/downloads/download.php?file=/oomph/epp/2020-03/R/eclipse-inst-win64.exe](https://www.eclipse.org/downloads/download.php?file=/oomph/epp/2020-03/R/eclipse-inst-win64.exe)

### ☑️ PHP Distribution

PHP 7.4 with XAMPP: [https://www.apachefriends.org/download.html](https://www.apachefriends.org/download.html)

* Run server
```bash
php -S localhost:8000
```
* Run server in a specific dir
```bash
php -S localhost:8000 -t foo/
```

### ☑️ Package manager
#### COMPOSER

> Nécessite que PHP soit déjà installé sur les machines.

*Installation Windows*: https://getcomposer.org/Composer-Setup.exe

*Pour MAC ou Linux*: https://getcomposer.org/installer

* Exécuter Composer : 
```bash
composer
```

* Déclarer un projet: 
```bash
composer init 
```

> Le fichier  *composer.json*  décrit le projet

* Installer les dépendances du projet
```bash
composer install
```

* Installer un package
```bash
composer require vendor/package-name
```
> Les packages sont disonibles sur le site [https://packagist.org/](https://packagist.org/)

### ☑️ PHP Style guide
Checkout PSR:
* [PSR-1](https://www.php-fig.org/psr/psr-1/)

* [PSR-2](https://www.php-fig.org/psr/psr-2/)

### ☑️ Migration

Execute  script:
* [serie-bank.sql](serie-bank.sql)

### ☑️ Skeleton
* **bin** : command-line executables
* **config** : configuration files
* **docs** : documentation files
* **public**: web server files
* **resources**: other resources files
* **src** : PHP source code
* tests


## 📐 Conception

### ✔️ Use Cases

[diagram](uml/UseCaseDiagram)
### ✔️ Package

### ✔️ Class

## 👨‍💻 Development

### ✅ Usage

### ✅ Object Oriented Programming


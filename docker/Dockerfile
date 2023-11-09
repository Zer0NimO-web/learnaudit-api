# Image de départ
FROM php:8.2-apache

# Installation des utilitaires pour la gestion des archives ZIP
RUN apt-get update && \
    apt-get install -y unzip && \
    apt-get install -y libzip-dev && \
    docker-php-ext-install zip

# Installation des extensions php (pdo_pgsql, intl)
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions pdo_pgsql intl

# Installation de composer
RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

# Installation du CLI Symfony
RUN apt-get update && \
    apt-get install -y wget && \
    curl -sS https://get.symfony.com/cli/installer | bash && \
    mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

#Installation de nodejs et yarn
RUN apt update && apt install -yqq nodejs yarn

# Copie les fichiers du projet dans le serveur apache
COPY . /var/www/

# Remplacement de la conf apache standard par la conf conseillée pour Symfony (site officiel)
COPY ./docker/apache-symfony.conf /etc/apache2/sites-available/000-default.conf

# Installation des dépendances (composer)
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN cd /var/www && \
    composer install

# Définition du répertoire de travail (/var/www/ au lieu de /var/www/html/)
WORKDIR /var/www/

# Enfin, on expose le port apache (80) vers l'extérieur du container
EXPOSE 80
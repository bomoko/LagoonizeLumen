ARG CLI_IMAGE
FROM ${CLI_IMAGE:-builder} as builder

FROM amazeeio/php:7.2-fpm

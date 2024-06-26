FROM registry.access.redhat.com/ubi9/php-82:1-15

USER 0

# Add application sources
ADD --chown=1001:0 . .

USER 1001

RUN TEMPFILE=$(mktemp) && \
    curl -o "$TEMPFILE" "https://getcomposer.org/installer" && \
    php <"$TEMPFILE" && \
    php composer.phar run-script post-root-package-install && \
    php composer.phar install --no-interaction --no-ansi

ENV DOCUMENTROOT=/public

CMD /usr/libexec/s2i/run

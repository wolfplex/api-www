#
# Wolfplex API dependencies Makefile
#
# Fetches dependencies through Composer
#

all:
	composer install

clean:
	rm -rf vendor composer.lock

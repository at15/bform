#!/usr/bin/env bash

openssl genrsa -out private.key 1024
openssl rsa -in private.key -pubout -out public.key

# TODO: where should I put the private key http://oauth2.thephpleague.com/installation/
mv private.key ../storage/app
mv public.key ../storage/app

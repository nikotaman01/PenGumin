#!/bin/bash

env=heroku
if [[ "$(hostname)" = *local* ]]; then
  env=local
fi

cp .env.$env .env

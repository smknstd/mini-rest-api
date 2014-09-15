Even a [basic authentication](http://en.wikipedia.org/wiki/Basic_access_authentication) is missing !

tested with curl:

`curl -i -X GET http://localhost:8000/books/1`

`curl -i -X POST -H 'Content-Type: application/json' -d '{"id": "5", "nom": "Lunar Park", "auteur": "Bret Easton Ellis", "note": "mauvais"}' http://localhost:8000/books`
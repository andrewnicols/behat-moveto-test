# Behat Test

Behat test scaffold (baked on MacOS + Docker).

To operate the test, first `docker compose up` to raise the test environment, and then, `chmod +x ./runtests` and `./runtests`.

## The problem

This works on a very old version of Selenium/Chrome (as committed).  However, if you hike it to newer versions you will see that there are 'moveto' errors (deprecation) in the docker service logs.

To experience the problem, `docker compose down -v` and then change the selenium version in docker-compose.yml from 4.2 to 4.8 and execute the tests anew.
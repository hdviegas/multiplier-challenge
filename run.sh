set -e
app="app-multiplier"

up (){
    run="docker-compose up -d"
    runit
    run="docker run --rm -v $(pwd)/src:/app composer install"
    runit
    run="docker exec $app php artisan key:generate"
    runit
    run="docker exec $app php artisan migrate"  
    runit
    run="docker exec $app php artisan migrate --env=testing"   
    runit

}

test (){
    run="docker exec $app php artisan test"  
    runit
}

log ()(
    echo -e "\n $1"
)

runit(){
    log "$run"
    $run
}

$1
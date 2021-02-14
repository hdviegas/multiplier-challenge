set -e
app="app-multiplier"

up (){
    run="docker-compose up -d"
    runit    
}

build () {
    run="docker-compose up -d --build"
    runit
    run="docker run --rm -v $(pwd)/src:/app composer install"
    runit
    run="docker exec $app npm install"
    runit
    run="docker exec $app php artisan key:generate"
    runit    
    run="docker exec $app php artisan migrate:fresh"  
    runit
    run="docker exec $app php artisan migrate:fresh --env=testing"   
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